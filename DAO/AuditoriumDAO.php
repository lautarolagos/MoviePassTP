<?php
    namespace DAO;
    use DAO\IAuditoriumDAO as IAuditoriumDAO;
    use Models\Auditorium as Auditorium;

    class AuditoriumDAO implements IAuditoriumDAO
    {
        private $auditoriumList = array();
        private $fileName;

        public function __construct()
        {
            $this->fileName=dirname(__DIR__)."/Data/Auditoriums.json";
        }


        public function Add(Auditorium $auditorium)
        {
            $this->RetrieveData();
            array_push($this->auditoriumList, $auditorium);
            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();
            return $this->auditoriumList;
        }


        public function GetAuditoriumByCinema($cinemaID) // id del cine al que se deben buscar las salas pertenecientes
        {
            $this->RetrieveData();
            $auditoriumList = array(); // Array que contiene todos los datos
            $auditoriumById = array(); // Array filtrado

            foreach($this->auditoriumList as $auditorium)
            {
                if($cinemaID == $auditorium->getIdCinemaFK()) // Busco las salas donde coincida la FK con la ID del cine
                {
                    array_push($auditoriumById, $auditorium); // Meto las salas en un Array y lo retorno
                }
            }
            return $auditoriumById;
        }


        public function SaveData()
        {
            $arrayToEncode = array();
            foreach($this->auditoriumList as $auditorium)
            {
                $valuesArray["amountOfSeats"]=$auditorium->getAmountOfSeats();
                $valuesArray["idCinemaFK"]=$auditorium->getIdCinemaFK();
                $valuesArray["idAuditorium"]=$auditorium->getIdAuditorium();
                $valuesArray["ticketPrice"]=$auditorium->getTicketPrice();
                $valuesArray["nameAuditorium"]=$auditorium->getNameAuditorium();
                $valuesArray["active"]=$auditorium->getActive();

                array_push($arrayToEncode, $valuesArray);
            }
            $jsonContent=json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            file_put_contents($this->fileName, $jsonContent);
        }

        
        private function RetrieveData()
        {
            $this->auditoriumList = array();
            if(file_exists($this->fileName))
            {
                $jsonContent = file_get_contents($this->fileName);
                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
                
                foreach($arrayToDecode as $valuesArray)
                {
                    $auditorium = new Auditorium();
                    $auditorium->setAmountOfSeats($valuesArray["amountOfSeats"]);
                    $auditorium->setIdCinemaFK($valuesArray["idCinemaFK"]);
                    $auditorium->setIdAuditorium($valuesArray["idAuditorium"]);
                    $auditorium->setTicketPrice($valuesArray["ticketPrice"]);
                    $auditorium->setNameAuditorium($valuesArray["nameAuditorium"]);
                    $auditorium->setActive($valuesArray["active"]);

                    array_push($this->auditoriumList, $auditorium);
                }
            }
        }
    }
?>