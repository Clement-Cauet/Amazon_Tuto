<?php

    session_start();
    //session_destroy();

    define('ROOT_PATH', 'C:/wamp64/www/Amazon_Tuto/');

    include ROOT_PATH . "src/database/database.php";
    include ROOT_PATH . "src/classes/user.php";
    include ROOT_PATH . "src/classes/product.php";

    $host   = "localhost";
    $dbname = "sun_carry";
    $login  = "root";
    $mdp    = "root";

    $_SESSION['db'] = new Database($host, $login, $mdp, $dbname);

    $_SESSION["user"]       = new User($_SESSION['db']);
    $_SESSION["product"]    = new Product($_SESSION['db']);

    if (isset($_SESSION["log"]) && $_SESSION["log"] == true){
        if(isset($_SESSION["user_id"])){
            $_SESSION["user"]->setUserById($_SESSION["user_id"]);
        }
    }

?>