<?php

require_once '../../config/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id             = $_POST["id"];
    $title          = $_POST["title"];
    $description    = $_POST["description"];
    $price          = $_POST["price"];
    $score          = $_POST["score"];

    $_SESSION['db']->updateProduct($title, $description, $price, $score, $id);

    header('Location: ../../public/settings.php');
    exit;
}

?>