<?php
include('database.php');
session_start();
if ($_SESSION !=  null){
    $SessionUser = $_SESSION['user'];
}

if (isset($_POST['logout'])) {
    unset($_SESSION["user"]["id"]);
    header('Location: index.php');
    exit();
}
?>
<link rel="stylesheet" href="Assets/Styles/navbar-styles.css">
<script src="Assets/Scripts/navbar-scripts.js"></script>
<header class="header">
    <img class="logo" src="Assets/images/logo.png" alt="Company Logo" onclick="goToHomePage();">
    <div class="search-bar">
        <input type="text" placeholder="What are you looking for?">
    </div>
    <div class="nav-wrapper">
        <nav class="navbar">
            <ul class="nav-items">
                <li class="nav-item" onclick="goToHomePage();">Home</li>
                <li class="nav-item" onclick="gotoProductPage();">Products</li>
                <?php
                if (!empty($SessionUser) && isCurrentUserAdmin()):?>
                <li class="nav-item" onclick="goToAdminPage();">Admin</li>
                <?php endif; ?>
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