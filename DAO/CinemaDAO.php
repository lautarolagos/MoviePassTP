<?php
    namespace DAO;
    use DAO\ICinemaDAO as ICinemaDAO;
    use Models\Cinema as Cinema;

    class CinemaDAO implements ICinemaDAO
    {
        private $cinemaListings = array();
        private $fileName;

        public function __construct()
        {
            $this->fileName=dirname(__DIR__)."/Data/Cinemas.json";
        }

        public function Add(Cinema $cinema)
        {
            $this->RetrieveData();
            array_push($this->cinemaListings, $cinema);
            $this->SaveData();
        }

        public function DeleteCinema($id)
        {
            $this->RetrieveData();
            foreach($this->cinemaListings as $cinema)
            {
                if($cinema->getId()==$id)
                {
                    $pos = array_search($cinema, $this->cinemaListings); // con array search obtengo la posicion del arreglo del cinea eliminar
                    unset($this->cinemaListings[$pos]); // con esto borro el cine de la lista
                }
            }
            $this->SaveData(); // guardo los cambios
        }

        public function GetAll()
        {
            $this->RetrieveData();
            return $this->cinemaListings;
        }

        public function SaveData()
        {
            $arrayToEncode = array();
            foreach($this->cinemaListings as $cinema)
            {
                $valuesArray["name"]=$cinema->getName();
                $valuesArray["capacity"]=$cinema->getCapacity();
                $valuesArray["adress"]=$cinema->getAdress();
                $valuesArray["ticketPrice"]=$cinema->getTicketPrice();
                $valuesArray["id"]=$cinema->getId();

                array_push($arrayToEncode, $valuesArray);
            }
            $jsonContent=json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            file_put_contents($this->fileName, $jsonContent);
        }

        private function RetrieveData()
        {
            $this->cinemaListings = array();
            if(file_exists($this->fileName))
            {
                $jsonContent = file_get_contents($this->fileName);
                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
                
                foreach($arrayToDecode as $valuesArray)
                {
                    $cinema = new Cinema();
                    $cinema->setName($valuesArray["name"]);
                    $cinema->setCapacity($valuesArray["capacity"]);
                    $cinema->setAdress($valuesArray["adress"]);
                    $cinema->setTicketPrice($valuesArray["ticketPrice"]);
                    $cinema->setId($valuesArray["id"]);

                    array_push($this->cinemaListings, $cinema);
                }
            }
        }
    }
?>