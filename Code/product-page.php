<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/Styles/product-page-style.css">
    <title>Products</title>
</head>

<body>
    <?php include "Assets/components/navbar.php" ?>
    <div class="categories">
        <h2>Categories</h2>
        <ul class="category-list">
            <a href="product-page.php">
                <li>All</li>
            </a>
            <a href="product-page.php?category=Bakery">
                <li>Bakery</li>
            </a>
            <a href="product-page.php?category=Beverages">
                <li>Beverages</li>
            </a>
            <a href="product-page.php?category=Dairy">
                <li>Dairy</li>
            </a>
            <a href="product-page.php?category=Fish">
                <li>Fish</li>
            </a>
            <a href="product-page.php?category=Fruit">
                <li>Fruit</li>
            </a>
            <a href="product-page.php?category=Meat">
                <li>Meat</li>
            </a>
            <a href="product-page.php?category=Snacks">
                <li>Snacks</li>
            </a>
            <a href="product-page.php?category=Sweets">
                <li>Sweets</li>
            </a>
            <a href="product-page.php?category=Vegetables">
                <li>Vegetables</li>
            </a>

        </ul>
    </div>
    <main class="product-container">
        <?php
        $searchBarInput = isset($_GET['searchBarInput']) ? $_GET['searchBarInput'] : null;
        $category = isset($_GET['category']) ? $_GET['category'] : null;

        if ($searchBarInput !== null) {
            $products = searchProducts($searchBarInput);
        } else {
            $products = getAllProducts($categoy);
        }

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
</body>

</html>