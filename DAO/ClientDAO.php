<?php
    namespace DAO;
    use DAO\IClientDAO as IClientDAO;
    use Models\Client as Client;

    class ClientDAO implements IClientDAO
    {
        private $clientsList = array();
        private $fileName;

        public function __construct()
        {
            $this->fileName=dirname(__DIR__)."/Data/Clients.json";
        }

        public function Add(Client $client)
        {
            $this->RetrieveData();
            array_push($this->clientsList, $client);
            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();
            return $this->clientsList;
        }

        public function SaveData()
        {
            $arrayToEncode = array();
            foreach($this->clientsList as $client)
            {
                $valuesArray["email"]=$client->getEmail();
                $valuesArray["password"]=$client->getPassword();
                array_push($arrayToEncode, $valuesArray);
            }
            $jsonContent=json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            file_put_contents($this->fileName, $jsonContent);
        }

        private function RetrieveData()
        {
            $this->clientsList = array();
            if(file_exists($this->fileName))
            {
                $jsonContent = file_get_contents($this->fileName);
                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
                
                foreach($arrayToDecode as $valuesArray)
                {
                    $client = new Client();
                    $client->setEmail($valuesArray["email"]);
                    $client->setPas($valuesArray["capacity"]);

                    array_push($this->cinemaListings, $cinema);
                }
            }
        }
    }
?>