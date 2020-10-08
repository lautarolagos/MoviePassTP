<?php
    namespace Controllers;

    use DAO\ClientDAO as ClientDAO;
    use Models\Client as Client;
    require_once("Config/Autoload.php");


    class RegisterController
    {
        private $clientDAO;

        public function __construct()
        {
            $this->clientDAO = new ClientDAO();
        }

        public function ShowAddView($message = "")
        {
            require_once(VIEWS_PATH."Login.php");
        }

        public function AddClient($email, $password)
        {
            $emailExists=0; // Creo una variable para verificar si el email enviado ya está registrado, 0 significa NO, 1 Significa SI

            $clientsList = $this->clientDAO->GetAll(); //Llamo a la lista de clientes y luego verifico si existe
            if($clientsList!=NULL)
            {
                
                foreach($clientsList as $client)
                {   
                    if($email==$client->getEmail())
                    {
                        $emailExists=1;
                        $message="Email already registered";
                        $this->ShowAddView($message);
                        break;
                    }  
                }
            }
            if($emailExists==0) // Si es igual a 0, entonces no hay un cliente con ese Email o no hay ninguno, y se agrega al Json
            {   
                $newClient = new Client();
                $newClient->setEmail($email);
                $newClient->setPassword($password);
                $newClient->setIsAdmin("0"); 
                $this->clientDAO->Add($newClient);
                $message = "Registration finished, please log in to continue";
                $this->ShowAddView($message);
            }
        }
    }
     

?>
