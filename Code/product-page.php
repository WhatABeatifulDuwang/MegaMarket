<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/Styles/product-page-style.css">
    <script src="Assets/Scripts/product-page-script.js"></script>
    <title>Products</title>
</head>

<body>
    <?php include "Assets/components/navbar.php" ?>
    <div class="categories">
        <h2>Categories</h2>
        <ul class="category-list">
            <li><a href="product-page.php">All</a></li>
            <li><a href="product-page.php?category=Bakery">Bakery</a></li>
            <li><a href="product-page.php?category=Beverages">Beverages</a></li>
            <li><a href="product-page.php?category=Dairy">Dairy</a></li>
            <li><a href="product-page.php?category=Fish">Fish</a></li>
            <li><a href="product-page.php?category=Fruit">Fruit</a></li>
            <li><a href="product-page.php?category=Meat">Meat</a></li>
            <li><a href="product-page.php?category=Snacks">Snacks</a></li>
            <li><a href="product-page.php?category=Sweets">Sweets</a></li>
            <li><a href="product-page.php?category=Vegetables">Vegetables</a></li>
        </ul>
    </div>
    <main class="product-container">
        <?php

        $category = isset($_GET['category']) ? $_GET['category'] : null;
        $products = getAllProducts($category);

        if (!empty($products)) {
            foreach ($products as $product) {
                ?>
                <a href="product-info.php?id=<?php echo $product['id']; ?>" class="product-card">
                    <div class='product-img'><img src='Assets/product-images/<?php echo $product["id"]; ?>.png'
                            alt='Product Image'></div>
                    <div class='product-info'>
                        <h2><?php echo $product["name"]; ?></h2>
                        <h3><?php echo $product["description"]; ?></h3>
                        <p class='price'>€ <?php echo $product["price"]; ?></p>
                    </div>
                </a>
                <?php
            }
        } else {
            echo "No products found";
        }
        ?>
    </main>
    <div class="pagination-buttons">

    </div>
</body>

</html>