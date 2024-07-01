<?php

$result = $_SESSION['db']->getProducts();
$productArray = [];

foreach ($result as $product) {
    $productArray[] = $product;
}

?>

<div class="dasboard-content">
    <h2>Products</h2>
    <table class="form-dashboard">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Score</th>
            <th>Action</th>
        </tr>
        <tr>
            <form method="post" action="../database/product/add.php">
                <td></td>
                    <td><input type="text" name="title"></td>
                    <td><input type="text" name="description"></td>
                    <td><input type="number" name="price"></td>
                    <td><input type="number" name="score"></td>
                <td><input type="submit" value="Ajouter"></td>
            </form>
        </tr>
        <?php foreach ($productArray as $product) { ?>
            <tr>
                <form method="post" action="../database/product/update.php">
                    <td><?php echo $product->getId(); ?></td>
                    <td><input type="text" name="title" value="<?php echo $product->getTitle(); ?>"></td>
                    <td><input type="text" name="description" value="<?php echo $product->getDescription(); ?>"></td>
                    <td><input type="number" name="price" value="<?php echo $product->getPrice(); ?>"></td>
                    <td><input type="number" name="score" value="<?php echo $product->getScore(); ?>"></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $product->getId(); ?>">
                        <input type="submit" value="Modifier">
                    </td>
                </form>
                <form method="post" action="../database/product/delete.php">
                    <td>
                        <input type="hidden" name="id" value="<?php echo $product->getId(); ?>">
                        <input type="submit" value="Supprimer">
                    </td>
                </form>
            
        <?php } ?>
    </table>
</div>