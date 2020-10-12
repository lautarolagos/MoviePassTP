<?php
    namespace Controllers;

    use DAO\CinemaDAO AS CinemaDAO;
    use Models\Cinema as Cinema;

    require_once("Config/Autoload.php");

    Class CinemaController
    {
        private $cinemaDAO;

        public function __construct()
        {
            $this->cinemaDAO = new cinemaDAO();
        }

        public function ShowCinemaList($message="")
        {
            $cinemasList = $this->cinemaDAO->GetAll();
            require_once(VIEWS_PATH."CinemaList.php");
        }

        public function ShowAddView($message="")
        {
            require_once(VIEWS_PATH."AddCinema.php");
        }

        public function AddCinema($name, $capacity, $adress, $ticketPrice)
        {
            $adressExist=0; // Creo una variable para verificar si la direccion enviada ya está registrada, 0 significa NO, 1 Significa SI
            $listCounter=-1; // Esto sirve para ir contando cuantos cines ya hay agregados y poder saber que id asignarle al nuevo cine
            $cinemaList = $this->cinemaDAO->GetAll(); //Llamo a la lista de cines y luego verifico si existe

            if($cinemaList != NULL)
            {
                foreach($cinemaList as $cinema)
                {
                    if($adress == $cinema->getName())
                    {
                        $adressExist=1;
                        $message= "There is already a cinema in that adress, please enter another one";
                        $this->ShowAddView($message);
                    }
                    $listCounter++;
                }
            }
            if($adressExist==0)// Si es igual a 0, entonces no hay un cine con esa direccion o no hay ninguno, y se agrega al Json
            {
                $newCinema = new Cinema();
                $newCinema->setName($name);
                $newCinema->setCapacity($capacity);
                $newCinema->setAdress($adress);
                $newCinema->setTicketPrice($ticketPrice);
                $newCinema->setId($listCounter+1);
                $this->cinemaDAO->Add($newCinema);
                $message="Cinema added succesfully";
                $this->ShowCinemaList($message);
            }
        }

        public function Delete($cinemaId) // Recibe la ID del cinema a borrar
        {
            $this->cinemaDAO->DeleteCinema($cinemaId);
            $message="Cinema deleted";
            $this->ShowCinemaList($message); // Retorna un mensaje diciendo que se logro borrar el cine
        }
    }
?>