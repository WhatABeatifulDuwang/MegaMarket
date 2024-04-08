<?php include "database.php"; ?>
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
    <header class="header">
        <img class="logo" src="Assets/images/logo.png" alt="Company Logo">
        <div class="search-bar">
            <input type="text" placeholder="What are you looking for?">
        </div>
        <div class="nav-wrapper">
            <nav class="navbar">
                <ul class="nav-items">
                    <li class="nav-item" onclick="gotoProductPage();">Products</li>
                    <li class="nav-item">Placeholder</li>
                    <li class="nav-item">Placeholder</li>
                    <li class="nav-item">Placeholder</li>
                    <li class="nav-item">Contact us</li>
                </ul>
            </nav>
        </div>
        <div class="top-right-buttons">
            <button class="login-button" onclick="gotoLoginPage();">Login</button>
            <img src="Assets/images/shopping-cart.png" class="shopping-cart" onclick="toggleShoppingCart();">
        </div>
    </header>
    <main class="content">
        <div class="background-image">
            <img class="background-img" src="Assets/images/index-bg.png" alt="Background Image">
        </div>
        <div class="center-items">
            <h2>Whaterver you need</h2>
            <h2>We might have it!</h2>
            <button class="check-product-button" onclick="gotoProductPage();">Check our products</button>
        </div>
        <div class="product-cards">
            <div class="product-card">
                <img class="product-image" src="Assets/images/placeholder.png" alt="Random Product">
                <h3 class="product-title">
                    <?php $totalProducts = getTotalProducts();
                    $randomProductId = rand(1, $totalProducts);
                    $product = getProductById($randomProductId);
                    if ($product) {
                        echo "<h2>{$product['name']}</h2>";
                        echo "<p>€   {$product['price']}</p>";
                    } else {
                        echo "Product with ID $randomProductId not found!";
                    } ?>
                </h3>
            </div>
            <div class="product-card">
                <img class="product-image" src="Assets/images/placeholder.png" alt="Random Product">
                <h3 class="product-title">
                    <?php $totalProducts = getTotalProducts();
                    $randomProductId = rand(1, $totalProducts);
                    $product = getProductById($randomProductId);
                    if ($product) {
                        echo "<h2>{$product['name']}</h2>";
                        echo "<p>€   {$product['price']}</p>";
                    } else {
                        echo "Product with ID $randomProductId not found!";
                    } ?>
                </h3>
            </div>
            <div class="product-card">
                <img class="product-image" src="Assets/images/placeholder.png" alt="Random Product">
                <h3 class="product-title">
                    <?php $totalProducts = getTotalProducts();
                    $randomProductId = rand(1, $totalProducts);
                    $product = getProductById($randomProductId);
                    if ($product) {
                        echo "<h2>{$product['name']}</h2>";
                        echo "<p>€   {$product['price']}</p>";
                    } else {
                        echo "Product with ID $randomProductId not found!";
                    } ?>
                </h3>
            </div>
        </div>
    </main>
    <footer class="footer">
        <img class="footer-logo" src="Assets/images/logo.png" alt="Footer Logo">
        <p>© 2024 MegaMarket. All rights reserved.</p>
    </footer>
</body>

</html>