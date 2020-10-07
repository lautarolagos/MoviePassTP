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

        public function ShowAddView($msg="")
        {
            require_once(VIEWS_PATH."Login.php");
        }

        public function Add()
        {
            $emailSent=$_POST["email"];
            $passwordSent=$_POST["password"];
            $emailExists=0; // Creo una variable para verificar si el email enviado ya está registrado, 0 significa NO, 1 Significa SI

            $clientsList=$this->clientDAO->GetAll(); //Llamo a la lista de clientes y luego verifico si existe
            if($clientsList!=NULL)
            {
                
                foreach($clientsList as $client)
                {   
                    if($emailSent==$client->getEmail())
                    {
                        $emailExists=1;
                        $message="Email already registered";
                        $this->ShowAddView($message);
                    }  
                }
            }
            if($emailExists==0) // Si es igual a 0, entonces no hay un cliente con ese Email o no hay ninguno, y se agrega al Json
            {   
                $newClient = new Client();
                $newClient->setEmail($emailSent);
                $newClient->setPassword($passwordSent);
                $this->clientDAO->Add($newClient);
                $message="Registration finished, please log in to continue";
                $this->ShowAddView($message);
            }
        }
    }
     

?>
