<?php include "database.php"; ?>
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
    <div class="categories">
        <h2>Categories</h2>
        <ul class="category-list">
            <li>Bakery</li>
            <li>Beverages</li>
            <li>Dairy</li>
            <li>Fish</li>
            <li>Fruit</li>
            <li>Meat</li>
            <li>Snacks</li>
            <li>Sweets</li>
            <li>Vegetables</li>
        </ul>
    </div>
    <main class="product-container">
        <div class="product-card">
            <div class="product-img-placeholder"></div>
            <div class="product-info">
                <h2>Product Name</h2>
                <p class="price">€ 10.99</p>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img-placeholder"></div>
            <div class="product-info">
                <h2>Product Name</h2>
                <p class="price">€ 10.99</p>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img-placeholder"></div>
            <div class="product-info">
                <h2>Product Name</h2>
                <p class="price">€ 10.99</p>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img-placeholder"></div>
            <div class="product-info">
                <h2>Product Name</h2>
                <p class="price">€ 10.99</p>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img-placeholder"></div>
            <div class="product-info">
                <h2>Product Name</h2>
                <p class="price">€ 10.99</p>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img-placeholder"></div>
            <div class="product-info">
                <h2>Product Name</h2>
                <p class="price">€ 10.99</p>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img-placeholder"></div>
            <div class="product-info">
                <h2>Product Name</h2>
                <p class="price">€ 10.99</p>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img-placeholder"></div>
            <div class="product-info">
                <h2>Product Name</h2>
                <p class="price">€ 10.99</p>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img-placeholder"></div>
            <div class="product-info">
                <h2>Product Name</h2>
                <p class="price">€ 10.99</p>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img-placeholder"></div>
            <div class="product-info">
                <h2>Product Name</h2>
                <p class="price">€ 10.99</p>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img-placeholder"></div>
            <div class="product-info">
                <h2>Product Name</h2>
                <p class="price">€ 10.99</p>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img-placeholder"></div>
            <div class="product-info">
                <h2>Product Name</h2>
                <p class="price">€ 10.99</p>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img-placeholder"></div>
            <div class="product-info">
                <h2>Product Name</h2>
                <p class="price">€ 10.99</p>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img-placeholder"></div>
            <div class="product-info">
                <h2>Product Name</h2>
                <p class="price">€ 10.99</p>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img-placeholder"></div>
            <div class="product-info">
                <h2>Product Name</h2>
                <p class="price">€ 10.99</p>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img-placeholder"></div>
            <div class="product-info">
                <h2>Product Name</h2>
                <p class="price">€ 10.99</p>
            </div>
        </div>
        <div class="pagination-buttons">
        <button onclick="gotoPage(1)">1</button>
        <button onclick="gotoPage(2)">2</button>
        <button onclick="gotoPage(3)">3</button>
    </div>
    </main>
</body>

</html>