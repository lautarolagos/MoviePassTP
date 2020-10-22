<?php
    namespace Controllers;
    use DAO\AuditoriumDAO as AuditoriumDAO;
    use Models\Auditorium as Auditorium;

    require_once("Config/Autoload.php");

    Class AuditoriumController
    {
        private $auditoriumDAO;

        public function __construct()
        {
            $this->auditoriumDAO = new AuditoriumDAO();
        }

        
        public function ShowAddView($cinemaID, $message="")
        {
            require_once(VIEWS_PATH."AddAuditorium.php");
        }


        public function ShowAuditoriums($cinemaID, $message="")
        {
            $auditoriumList = $this->auditoriumDAO->GetAuditoriumByCinema($cinemaID); // obtengo la lista de salas segun cine y redirecciono a la vista
            require_once(VIEWS_PATH."AuditoriumList.php");
        }


        public function AddAuditorium($idCinemaFK, $nameAuditorium, $amountOfSeats, $ticketPrice)
        {
            $nameExists=0; // Creo una variable para verificar que el nombre de la sala no este registrado
            $listCounter=-1; // Esto sirve para ir contando cuantas salas hay y setear la ID
            $auditoriumList = $this->auditoriumDAO->GetAuditoriumByCinema($idCinemaFK); // Verifico en la lista de cines del mismo cine, puede haber salas con el mismo nombre siempre y cuando esten en distintos cines
            
            if($auditoriumList!=NULL)
            {
                foreach($auditoriumList as $auditorium)
                {
                    if($auditorium->getActive()==1) // 1 Significa que el auditorium esta activo
                    {
                        if($nameAuditorium == $auditorium->getNameAuditorium())
                        {
                            $nameExists=1;
                            $message="There is already an Auditorium with that name, please use another";
                            $this->ShowAddView($idCinemaFK, $message);
                        }
                        
                    }
                    $listCounter++;
                }
            }
            echo $listCounter;
            if($nameExists==0)
            {
                $newAuditorium = new Auditorium();
                $newAuditorium->setAmountOfSeats($amountOfSeats);
                $newAuditorium->setIdCinemaFK($idCinemaFK);
                $newAuditorium->setIdAuditorium($listCounter+1);
                $newAuditorium->setTicketPrice($ticketPrice);
                $newAuditorium->setNameAuditorium($nameAuditorium);
                $newAuditorium->setActive("1");
                $this->auditoriumDAO->Add($newAuditorium);
                $message="Auditorium added succesfully";
                $this->ShowAuditoriums($idCinemaFK, $message);
            }
        }
    }
?>