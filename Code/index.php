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
            <h2>Whatever you need</h2>
            <h2>We might have it!</h2>
            <a href="product-page.php"><button class="check-product-button">Check our products</button></a>
        </div>
        <div class="product-cards">
            <?php

            for ($i = 1; $i <= 3; $i++) {
                $totalProducts = getTotalProducts();
                $randomProductId = rand(1, $totalProducts);
                $product = getProductById($randomProductId);
                ?>
                <a href="product-info.php?id=<?php echo $randomProductId; ?>" class="product-card">
                    <div>
                        <img class="product-image" src="Assets/product-images/<?php echo $randomProductId; ?>.png"
                            alt="Random Product">
                        <div class="product-info">
                            <?php if ($product) { ?>
                                <h2><?php echo $product['name']; ?></h2>
                                <h3><?php echo $product['description']; ?></h3>
                                <p>€<?php echo $product['price']; ?></p>
                            <?php } else { ?>
                                <p>Product with ID <?php echo $randomProductId; ?> not found!</p>
                            <?php } ?>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </main>
    <?php include "Assets/components/footer.php" ?>
</body>

</html>