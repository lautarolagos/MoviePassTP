<?php
    namespace Controllers;

    use DAO\CinemaDAOJSON as CinemaDAOJSON;
    use DAO\CinemaDAOMySQL as CinemaDAOMySQL;
    use DAO\AuditoriumDAO as AuditoriumDAO;
    use Models\Cinema as Cinema;
    use Models\Auditorium as Auditorium;

    require_once("Config/Autoload.php");

    Class CinemaController
    {
        private $cinemaDAO;
        private $auditoriumDAO;

        public function __construct()
        {
            $this->cinemaDAO = new CinemaDAOMySQL();
            $this->auditoriumDAO = new AuditoriumDAO();
        }


        public function ShowCinemaList($message="")
        {
            $cinemasList = $this->cinemaDAO->GetAll(); // Lista de cines sin los auditoriums asignados
            $cinemasList = $this->AssignAuditoriums($cinemasList); // cargo los auditoriums a sus cines correspondientes
            require_once(VIEWS_PATH."CinemaList.php");
        }

        public function ShowAuditoriums($idCinema)
        {
            $cinemasList = $this->cinemaDAO->GetAll(); 
            $cinemasList = $this->AssignAuditoriums($cinemasList);
            $message="";
            require_once(VIEWS_PATH."AuditoriumList.php");
        }
   
        public function AssignAuditoriums($cinemasList)
        {
            foreach($cinemasList as $cinema) // Recorro la lista de Cinemas, para asignarles sus Auditoriums
            {
                $capacityCounter=0;
                $auditoriums = $this->auditoriumDAO->GetById($cinema->getIdCinema()); // Obtengo la lista de Auditoriums por ID de cine
                
                foreach($auditoriums as $audi) // Asigno a cada cine sus salas y hago el conteo de asientos para asignarle la capacidad total al cine
                {
                    $capacityCounter = $capacityCounter + $audi->getAmountOfSeats();
                    $cinemaAudi = new Cinema();
                    $cinemaAudi->setName($cinema->getName());
                    $cinemaAudi->setIdCinema($cinema->getIdCinema());
                    $audi->setCinema($cinemaAudi); // Aca el objeto "Auditorium" tiene un objeto "Cine" que solo contiene la ID del Cine al que pertenece
                    $cinemaAudi->setAdress($cinema->getAdress());
                    $cinemaAudi->setIsActive($cinema->getIsActive());
                    $audi->setCinema($cinemaAudi);
                }
                
                $cinema->setCapacity($capacityCounter);
                $cinema->setAuditoriums($auditoriums);
            }
            return $cinemasList;
        }
        
        public function ShowAddView($message="")
        {
            require_once(VIEWS_PATH."AddCinema.php");
        }


        public function ShowCinemaEdit($cinemaId)
        {
            $message="";
            require_once(VIEWS_PATH."EditCinema.php");
        }


        public function AddCinema($name, $adress)
        {
            $exists = $this->cinemaDAO->Search($name);

            if($exists==false)
            {
                $newCinema = new Cinema();
                $newCinema->setName($name);
                $newCinema->setCapacity("0");
                $newCinema->setAdress($adress);
                $newCinema->setAuditoriums(NULL);

                $this->cinemaDAO->Add($newCinema);
                $message="Cinema added succesfully";
                $this->ShowCinemaList($message);
            }
            else
            {
                $message= "There is already a cinema with that name, please enter another one";
                $this->ShowAddView($message);
            }
        }

        public function EditCinema($name, $adress, $idCinema)
        {
            $edited = $this->cinemaDAO->Edit($name, $adress, $idCinema);

            if($edited == true){
                $message = "Cinema edited";
                $this->ShowCinemaList($message);
            }
            else
            {
                $message = "Sorry, try again";
                $this->ShowCinemaEdit($message);
            }
        }

        public function DeleteCinema($idCinema) // ESTE ES CON MYSQL
        {
            $supr = $this->cinemaDAO->Delete($idCinema);
            $suprAudit = $this->auditoriumDAO->DeleteFromCinema($idCinema);
            if($supr==true && $suprAudit ==true)
            {
                $message="Cinema and auditoriums deleted";
                $this->ShowCinemaList($message);
            }
            else if($supr==true)
            {
                $message="Cinema deleted";
                $this->ShowCinemaList($message);
            }
            else
            {
                $message="Cinema not found";
                $this->ShowCinemaList($message);
            }
        }
    }
?>