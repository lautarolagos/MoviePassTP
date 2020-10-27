<?php
    namespace Interfaces;
    
    use Models\User as User;
    use DAO\Connection as Connection;


    interface IUserDAO
    {
        function Add(User $user);
        function GetAll();
        function Read($email, $password);
        function Search($email);
    }
?>