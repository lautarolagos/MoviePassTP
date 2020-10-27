<?php
    namespace Controllers;

    use DAO\CinemaDAOJSON as CinemaDAOJSON;
    use DAO\CinemaDAOMySQL as CinemaDAOMySQL;
    use Models\Cinema as Cinema;

    require_once("Config/Autoload.php");

    Class CinemaController
    {
        private $cinemaDAO;

        public function __construct()
        {
            // aca los profes dijeron que habia que hacer esto, cosa que si queremos cambiar entre usar JSON y MySql solo hay que comentar una linea
            //$this->cinemaDAO = new CinemaDAOJSON();
            $this->cinemaDAO = new CinemaDAOMySQL();   
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

        public function ShowCinemaEdit($cinemaId)
        {
            require_once(VIEWS_PATH."EditCinema.php");
        }


        public function AddCinema($name, $capacity, $adress)
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

        public function Add($name, $capacity, $adress) // esto es con json
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
                $newCinema->setId($listCounter+1);
                $newCinema->setActive("1");
                $newCinema->setAuditoriums(NULL); // Por defecto se crea un cine sin auditoriums
                $this->cinemaDAO->Add($newCinema);
                $message="Cinema added succesfully";
                $this->ShowCinemaList($message);
            }
        }

        public function DeleteCinema($cinemaId) // ESTE ES CON MYSQL
        {
            $cinemaDAO = new CinemaDAOMySQL;

            $supr = $cinemaDAO->Delete($cinemaId);

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
        
        public function Delete($cinemaId) // ESTE ES CON JSON
        {
            $this->cinemaDAO->Delete($cinemaId);
            $message="Cinema deleted";
            $this->ShowCinemaList($message); // Retorna un mensaje diciendo que se logro borrar el cine
        }
    }
?>