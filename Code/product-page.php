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
                echo "<div class='product-card'>";
                echo "<div class='product-img'><img src='Assets/product-images/" . $product["id"] . ".png' alt='Product Image'></div>";
                echo "<div class='product-info'>";
                echo "<h2>" . $product["name"] . "</h2>";
                echo "<h3>" . $product["description"] . "</h3>";
                echo "<p class='price'>€ " . $product["price"] . "</p>";
                echo "</div>";
                echo "</div>";
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