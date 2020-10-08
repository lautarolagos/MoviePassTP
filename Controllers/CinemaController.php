<?php
    namespace Controllers;

    use DAO\CinemaDAO AS CinemaDAO;
    use Models\Cinema as Cinema;

    require_once("Congif/Autoload.php");

    Class CinemaController
    {
        private $cinemaDAO;

        public function __construct()
        {
            $this->cinemaDAO = new cinemaDAO();
        }
        
        public function ShowAddView($message = "")
        {
            require_once(VIEWS_PATH."CinemasList.php");
        }

        public function AddCinema($name, $capacity, $adress, $ticketPrice)
        {
            $adressExist=0;//// Creo una variable para verificar si la direccion enviada ya está registrada, 0 significa NO, 1 Significa SI

            $cinemaList = $this->cinemaDAO->GetAll(); //Llamo a la lista de cines y luego verifico si existe

            if($cinemaList != NULL)
            {
                foreach($cinemaList as $cinema)
                {
                    if($adress == $cinema->getName())
                    {
                        $adressExist=1;
                        $message= "Adress already registered, please enter a new address";
                        $this->ShowAddView($message);
                    }
                }
            }
            if($adressExist==0)// Si es igual a 0, entonces no hay un cine con esa direccion o no hay ninguno, y se agrega al Json
            {
                $newCinema = new Cinema();
                $newCinema->setName($name);
                $newCinema->setCapacity($capacity);
                $newCinema->setAdress($adress);
                $newCinema->setTicketPrice($ticketPrice);
                $this->cinemaDAO->Add($newCinema);
                $message = "Cinema agregated";
                $this->ShowAddView($message); 
            }
        }
    }
?>