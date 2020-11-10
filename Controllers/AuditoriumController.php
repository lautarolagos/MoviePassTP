<?php
    namespace Controllers;

    use DAO\AuditoriumDAO as AuditoriumDAO;
    use DAO\CinemaDAOMySQL as CinemaDAOMySQL;
    use DAO\ProjectionDAO as ProjectionDAO;
    use Models\Auditorium as Auditorium;
    use Models\Cinema as Cinema;

    require_once("Config/Autoload.php");

    class AuditoriumController
    {
        private $auditoriumDAO;
        private $cinemaDAO;
        private $projectionDAO;

        public function __construct()
        {
            $this->auditoriumDAO = new AuditoriumDAO();
            $this->cinemaDAO = new CinemaDAOMySQL();
            $this->projectionDAO = new ProjectionDAO();
        }

        public function AddView($idCinema, $message="")
        {
            require_once(VIEWS_PATH."AddAuditorium.php");
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
                #$this->ShowAuditoriumList($idCinema, $message);
                $this->AddView($idCinema, $message);
            }
            else
            {
                $message="There is already an auditorium with that name, please enter another one";
                $this->AddView($idCinema, $message); // Cuidado aca
            }
        }

        // public function AssignProjections($idAuditorium, $idCinema)
        // {
        //     $this->cinemaDAO();
        //     $projectionsList = $this->projectionDAO->GetProjections($idAuditorium);
        // } 

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