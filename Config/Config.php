<?php 
    namespace Config;

    define("ROOT", dirname(__DIR__) . "/");
    //Path to your project's root folder


    define("FRONT_ROOT", "/PetHero/");
    define("VIEWS_PATH", "Views/");
   // define("CSS_PATH", FRONT_ROOT. "Assets/css/");
   define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "css/"); 
   define("JS_PATH", FRONT_ROOT. "Assets/js/");

    define('IMG_UPLOADS', ROOT . 'Assets/img');
    define('IMG_PATH', FRONT_ROOT . 'Assets/img');
    define('IMG_UPLOADS_PATH', FRONT_ROOT . 'Assets/img');

    ///Date Base Config
    define("DB_HOST", "localhost");
    define("DB_NAME", "pethero");
    define("DB_USER", "root");
    define("DB_PASS", "");
?>