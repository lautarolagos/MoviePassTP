<?php
    namespace Controllers;

    session_start();
    session_destroy();
    header("location:index.php");
?>