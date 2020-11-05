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
            require_once(VIEWS_PATH."CinemaList.php");
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
            $cinemasList = $this->cinemaDAO->GetAll();
            $message="";
            require_once(VIEWS_PATH."AuditoriumList.php");
        }
    }
?>