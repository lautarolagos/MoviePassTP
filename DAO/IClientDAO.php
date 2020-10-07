<?php
    namespace DAO;
    use Models\Client as Client;

    interface IClientDAO
    {
        function Add(Client $client);
        function GetAll();
        // Function Delete falta hacer
    }
?>