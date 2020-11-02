<?php
    namespace Controllers;

    use DAO\AuditoriumDAO as AuditoriumDAO;
    use DAO\CinemaDAOMySQL as CinemaDAOMySQL;
    use Models\Auditorium as Auditorium;

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

        public function ShowAuditoriumList($idCinema, $message)
        {
            $cinemasList = $this->cinemaDAO->GetAll();

            require_once(VIEWS_PATH."AuditoriumList.php");
        }

        public function Add($nameAuditorium, $amountOfSeats, $ticketPrice, $idCinema)
        {
            $auditoriumDAO = new AuditoriumDAO();

            $exists = $auditoriumDAO->Search($nameAuditorium, $idCinema);

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
    }

?>