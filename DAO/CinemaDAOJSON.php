<?php
    namespace DAO;
    use Interfaces\ICinemaDAO as ICinemaDAO;
    use Models\Cinema as Cinema;

    class CinemaDAOJSON implements ICinemaDAO
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

        public function Delete($id)
        {
            $this->RetrieveData();
            foreach($this->cinemaListings as $cinema)
            {
                if($cinema->getId()==$id)
                {
                    $cinema->setIsActive("0"); // Setea el cine como inactivo con un 0
                }
            }
            $this->SaveData();
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
                $valuesArray["id"]=$cinema->getId();
                $valuesArray["isActive"]=$cinema->getIsActive();
                $valuesArray["auditoriums"]=$cinema->getAuditoriums(); // Esto no creo que este bien, porque deberia ser un array

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
                    $cinema->setId($valuesArray["id"]);
                    $cinema->setIsActive($valuesArray["isActive"]);
                    $cinema->setAuditoriums($valuesArray["auditoriums"]); // Esto no creo que este bien, porque deberia ser un array

                    array_push($this->cinemaListings, $cinema);
                }
            }
        }
    }
?>