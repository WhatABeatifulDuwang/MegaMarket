<?php
include "Assets/components/navbar.php";

// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $conn->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)z
    if (!$product) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/Styles/cart-style.css">
    <title>Mega Market</title>
</head>
<main>
<div class="product content-wrapper">
    <img src="Assets/product-images/<?= $product['id'] ?>.png" width="500" height="500" alt="<?= $product['name'] ?>">
    <div>
        <h1 class="name"><?= $product['name'] ?></h1>
        <span class="price">
            &euro;<?= $product['price'] ?>
        </span>
        <form action="cart.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?= $product['quantity'] ?>"
                placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
            <input type="submit" value="Add To Cart">
        </form>
        <div class="description">
            <?= $product['description'] ?>
        </div>
    </div>
</div>
</main>

</html>