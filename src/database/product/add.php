<?php

require_once '../../config/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title          = $_POST["title"];
    $description    = $_POST["description"];
    $price          = $_POST["price"];
    $score          = $_POST["score"];

    $_SESSION['db']->createProduct($title, $description, $price, $score);

    header('Location: ../../public/settings.php');
    exit;
}

?>