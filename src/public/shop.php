<?php

require_once '../config/session.php';

if (!isset($_SESSION['log'])) {
    header('Location: signin.php');
    exit;
}

$products = $_SESSION['db']->getProducts();
$productArray = [];

foreach ($products as $product) {
    $productArray[] = $product;
}

// Filter products based on search criteria
if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
    $search = $_GET['search'];
    $filteredproducts = [];

    foreach ($productArray as $product) {
        if (stripos($product->getTitle(), $search) !== false) {
            $filteredproducts[] = $product;
        }
    }

    $productArray = $filteredproducts;
}

require_once '../components/menu.html';

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Shop</title>
        <link rel="stylesheet" type="text/css" href="../styles/menu.css">
        <link rel="stylesheet" type="text/css" href="../styles/searchbar.css">
        <link rel="stylesheet" type="text/css" href="../styles/style.css">
    </head>
    <body>
        <div class="main-container">
            <div class="header">
                <h1>AMAZON ECO+</h1>
                <?php require_once '../components/form/searchbar.html'; ?>
            </div>

            <div class="grid-container">
                <?php foreach ($productArray as $product) { ?>
                    <div class="grid-item">
                        <h2><?php echo $product->getTitle(); ?></h2>
                        <div class="grid-description">
                            <p><?php echo $product->getDescription(); ?></p>
                        </div>
                        <div class="grid-info">
                            <p><?php echo $product->getPrice(); ?> €</p>
                        </div>
                        <div style="text-align: right;">
                            <p><?php echo $product->getScore(); ?> / 10</p>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </body>
</html>