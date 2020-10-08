<?php
    namespace Controllers;

    require_once("Config/Autoload.php");

    use Models\Client as Client;
    use DAO\ClientDAO as ClientDAO;

    class LoginController
    {
        private $clientDAO;

        public function __construct()
        {
            $this->clientDAO = new ClientDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."Billboard.php");
        }

        public function Check($email, $password)
        {
            $clientsList = $this->clientDAO->GetAll();

            if($clientsList!=NULL)
            {
                foreach($clientsList as $key)
                {
                    if($email==$key->getEmail())
                    {
                        if($password==$key->getPassword());
                        {
                            $this->ShowAddView();
                        }
                    }
                    else
                    {
                        echo "|no se encontro";
                    }
                }
            }
            else
            {
                echo "no hay nada";
            }
        }
    }
?>