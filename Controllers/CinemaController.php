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
            //$this->cinemaDAO = new CinemaDAOJSON();
            $this->cinemaDAO = new CinemaDAOMySQL();   
        }


        public function ShowCinemaList($message="")
        {
            $auditoriumDAO = new AuditoriumDAO();

            $cinemasList = $this->cinemaDAO->GetAll();
            
            /*foreach($cinemasList as $cinema)
            {
                $auditoriums=$auditoriumDAO->GetById($cinema->getIdCinema());
                $cinema->setAuditoriums($auditoriums);
            }*/

            require_once(VIEWS_PATH."CinemaList.php");
        }
   
        
        public function ShowAddView($message="")
        {
            require_once(VIEWS_PATH."AddCinema.php");
        }


        public function ShowCinemaEdit($cinemaId)
        {
            require_once(VIEWS_PATH."EditCinema.php");
        }


        public function AddCinema($name, $capacity, $adress) // este es con MySQL
        {
            $cinemaDAO = new CinemaDAOMySQL;

            $exists = $cinemaDAO->Search($adress);

            if($exists==false)
            {
                $newCinema = new Cinema();
                $newCinema->setName($name);
                $newCinema->setCapacity($capacity);
                $newCinema->setAdress($adress);
                $newCinema->setAuditoriums(NULL);

                $this->cinemaDAO->Add($newCinema);
                $message="Cinema added succesfully";
                $this->ShowCinemaList($message);
            }
            else
            {
                $message= "There is already a cinema in that adress, please enter another one";
                $this->ShowAddView($message);
            }
        }


        public function DeleteCinema($idCinema) // ESTE ES CON MYSQL
        {
            $cinemaDAO = new CinemaDAOMySQL;

            $supr = $cinemaDAO->Delete($idCinema);

            if($supr==true)
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
        

        public function ShowAuditoriums($idCinema)
        {
            $cinemaDAO = new CinemaDAOMySQL();
            $cinemasList = $cinemaDAO->GetAll();
            
            require_once(VIEWS_PATH."AuditoriumList.php");

        }


        /*public function Add($name, $capacity, $adress) // esto es con json
        {
            $adressExist=0; // Creo una variable para verificar si la direccion enviada ya está registrada, 0 significa NO, 1 Significa SI
            $listCounter=-1; // Esto sirve para ir contando cuantos cines ya hay agregados y poder saber que id asignarle al nuevo cine
            $cinemaList = $this->cinemaDAO->GetAll(); //Llamo a la lista de cines y luego verifico si existe

            if($cinemaList != NULL)
            {
                foreach($cinemaList as $cinema)
                {
                    if($cinema->getActive()==1) // Compara solamente los cines que esten activos.
                    {
                        if($adress == $cinema->getAdress())
                        {
                            $adressExist=1;
                            $message= "There is already a cinema in that adress, please enter another one";
                            $this->ShowAddView($message);
                        }
                        $listCounter++;   
                    }
                }
            }
            if($adressExist==0)// Si es igual a 0, entonces no hay un cine con esa direccion o no hay ninguno, y se agrega al Json
            {
                $newCinema = new Cinema();
                $newCinema->setName($name);
                $newCinema->setCapacity($capacity);
                $newCinema->setAdress($adress);
                $newCinema->setIdCinema($listCounter+1);
                $newCinema->setAuditoriums(NULL); // Por defecto se crea un cine sin auditoriums
                $this->cinemaDAO->Add($newCinema);
                $message="Cinema added succesfully";
                $this->ShowCinemaList($message);
            }
        }*/


        /*public function Delete($idCinema) // ESTE ES CON JSON
        {
            $this->cinemaDAO->Delete($idCinema);
            $message="Cinema deleted";
            $this->ShowCinemaList($message); // Retorna un mensaje diciendo que se logro borrar el cine
        }*/
    }
?>