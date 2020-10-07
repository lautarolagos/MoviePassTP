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
            require_once(VIEWS.PATH."Login.php");
        }

        public function Add()
        {
            $emailSent=$_POST["email"];
            $passwordSent=$_POST["password"];

           /* $clientsList=$this->clientDAO->GetAll();
            echo "Antes de entrar al foreach";
            print_r($clientsList);
            foreach($clientsList as $value)
            {   
                echo "se metio al foreach";
                if($emailSent==$value->getEmail())
                {
                    echo "Se metio al if de si es igual el mail";
                    // $msg="Email already registered";
                }
                else
                {*/
                    $newClient = new Client();
                    $newClient->setEmail($emailSent);
                    $newClient->setPassword($passwordSent);
                    $this->clientDAO->Add($newClient);
                    echo "agregado";
                    //$this->ShowAddView();
               // }
            }
           // return $msg;
        }
    //}

?>
