<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/Styles/index-styles.css">
    <script src="Assets/Scripts/index-script.js"></script>
    <title>Mega Market</title>
</head>

<body>
    <?php include "Assets/components/navbar.php" ?>
    <main class="content">
        <div class="background-image">
            <img class="background-img" src="Assets/images/index-bg.png" alt="Background Image">
        </div>
        <div class="center-items">
            <h2>Whaterver you need</h2>
            <h2>We might have it!</h2>
            <a href="product-page.php"><button class="check-product-button">Check our products</button></a>
        </div>
        <div class="product-cards">
            <div class="product-card">
                <?php $totalProducts = getTotalProducts();
                $randomProductId = rand(1, $totalProducts);
                $product = getProductById($randomProductId); ?>
                <img class="product-image" src="<?php echo "Assets/product-images/$randomProductId.png"; ?>"
                    alt="Random Product">
                <h3 class="product-title">
                    <?php
                    if ($product) {
                        echo "<h2>{$product['name']}</h2>";
                        echo "<h3>{$product['description']}</h2>";
                        echo "<p>€   {$product['price']}</p>";
                    } else {
                        echo "Product with ID $randomProductId not found!";
                    } ?>
                </h3>
            </div>
            <div class="product-card">
                <?php $totalProducts = getTotalProducts();
                $randomProductId = rand(1, $totalProducts);
                $product = getProductById($randomProductId); ?>
                <img class="product-image" src="<?php echo "Assets/product-images/$randomProductId.png"; ?>"
                    alt="Random Product">
                <h3 class="product-title">
                    <?php
                    if ($product) {
                        echo "<h2>{$product['name']}</h2>";
                        echo "<h3>{$product['description']}</h2>";
                        echo "<p>€   {$product['price']}</p>";
                    } else {
                        echo "Product with ID $randomProductId not found!";
                    } ?>
                </h3>
            </div>
            <div class="product-card">
                <?php $totalProducts = getTotalProducts();
                $randomProductId = rand(1, $totalProducts);
                $product = getProductById($randomProductId); ?>
                <img class="product-image" src="<?php echo "Assets/product-images/$randomProductId.png"; ?>"
                    alt="Random Product">
                <h3 class="product-title">
                    <?php
                    if ($product) {
                        echo "<h2>{$product['name']}</h2>";
                        echo "<h3>{$product['description']}</h2>";
                        echo "<p>€   {$product['price']}</p>";
                    } else {
                        echo "Product with ID $randomProductId not found!";
                    } ?>
                </h3>
            </div>
        </div>
    </main>
    <?php include "Assets/components/footer.php" ?>
</body>

</html>