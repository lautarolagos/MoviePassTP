<?php namespace Config;

define("ROOT", dirname(__DIR__) . "/");
//Path to your project's root folder
//define("FRONT_ROOT", "/Trabajos/Visual Studio/TP2020MoviePass/");// laiot
define("FRONT_ROOT","/TP2020MoviePass/"); //lakes leiva
define("VIEWS_PATH", "Views/");
define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "css/"); 
define("JS_PATH", FRONT_ROOT.VIEWS_PATH. "js/");
define("IMG_PATH", VIEWS_PATH . "img/");

// Database
define("DB_HOST", "localhost");
define("DB_NAME", "moviepassdb");
define("DB_USER", "root");
define("DB_PASS", "root");

//API
define("API_PATH", "https://api.themoviedb.org/3/");
define("API_KEY", "?api_key=92c4495ef346859068c8ab366d26228c");
?>
