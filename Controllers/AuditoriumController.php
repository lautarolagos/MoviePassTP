<?php
    namespace Controllers;

    use DAO\AuditoriumDAO as AuditoriumDAO;
    use DAO\CinemaDAOMySQL as CinemaDAOMySQL;
    use Models\Auditorium as Auditorium;
    use Models\Cinema as Cinema;

    require_once("Config/Autoload.php");

    class AuditoriumController
    {
        private $auditoriumDAO;
        private $cinemaDAO;

        public function __construct()
        {
            $this->auditoriumDAO = new AuditoriumDAO();
            $this->cinemaDAO = new CinemaDAOMySQL();
        }


        public function AddView($idCinema, $message="")
        {
            require_once(VIEWS_PATH."AddAuditorium.php");
        }

        public function ShowAuditoriumList($idCinema, $message="")
        {
            $cinemasList = $this->cinemaDAO->GetAll(); // Lista de cines sin los auditoriums asignados
            $cinemasList = $this->AssignAuditoriums($cinemasList); // cargo los auditoriums a sus cines correspondientes
            require_once(VIEWS_PATH."AuditoriumList.php");
        }

        public function AssignAuditoriums($cinemasList)
        {
            foreach($cinemasList as $cinema) // Recorro la lista de Cinemas, para asignarles sus Auditoriums
            {
                $capacityCounter=0;
                $auditoriums = $this->auditoriumDAO->GetById($cinema->getIdCinema()); // Obtengo la lista de Auditoriums por ID de cine
                
                foreach($auditoriums as $audi) // Asigno a cada cine sus salas y hago el cuento de asientos para asignarle la capacidad total al cine
                {
                    $capacityCounter = $capacityCounter + $audi->getAmountOfSeats();
                    $cinemaAudi = new Cinema();
                    $cinemaAudi->setName($cinema->getName());
                    $cinemaAudi->setIdCinema($cinema->getIdCinema());
                    $cinemaAudi->setAdress($cinema->getAdress());
                    $cinemaAudi->setIsActive($cinema->getIsActive());
                    $audi->setCinema($cinemaAudi); 
                }
                
                $cinema->setCapacity($capacityCounter);
                $cinema->setAuditoriums($auditoriums);
            }
            return $cinemasList;
        }


        public function Add($nameAuditorium, $amountOfSeats, $ticketPrice, $idCinema)
        {

            $exists = $this->auditoriumDAO->Search($nameAuditorium, $idCinema);

            if($exists==false)
            {
                $newAuditorium = new Auditorium();
                $newAuditorium->setNameAuditorium($nameAuditorium);
                $newAuditorium->setAmountOfSeats($amountOfSeats);
                $newAuditorium->setTicketPrice($ticketPrice);

                $this->auditoriumDAO->Add($newAuditorium, $idCinema);
                $message="Auditorium added succesfully";
                $this->ShowAuditoriumList($idCinema, $message);
            }
            else
            {
                $message="There is already an auditorium with that name, please enter another one";
                $this->AddView($idCinema, $message); // Cuidado aca
            }
        }

        public function ShowEditView($idAuditorium, $idCinema)
        {
            $message="";
            require_once(VIEWS_PATH."EditAuditorium.php");
        }

        public function Edit($nameAuditorium, $amountOfSeats, $ticketPrice, $idAuditorium, $idCinema)
        {

            $edited = $this->auditoriumDAO->Edit($nameAuditorium, $amountOfSeats, $ticketPrice, $idAuditorium);

            if($edited == true)
            {
                $message = "Auditorium edited";
                $this->ShowAuditoriumList($idCinema, $message);
            }
            else
            {
                $message = "Sorry, try again";
                $this->ShowAuditoriumList($idCinema, $message);
            }
        }

        public function Delete($idAuditorium, $idCinema)
        {
            
            $supr = $this->auditoriumDAO->Delete($idAuditorium);

            if($supr==true)
            {
                $message="Auditorium deleted";
                $this->ShowAuditoriumList($idCinema, $message);
            }
            else
            {
                $message="Sorry, something went wrong";
                $this->ShowAuditoriumList($idCinema, $message);
            }
        } 
    }

?>