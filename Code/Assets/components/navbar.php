<?php
include('database.php');
session_start();
if ($_SESSION){
    $SessionUser = $_SESSION['user'];
}

if (isset($_POST['logout'])) {
    unset($_SESSION["user"]["id"]);
    header('Location: index.php');
    exit();
}
?>
<link rel="stylesheet" href="Assets/Styles/navbar-styles.css">
<header class="header">
    <a href=index.php><img class="logo" src="Assets/images/logo.png" alt="Company Logo"></a>
    <div class="search-bar">
        <input type="text" placeholder="What are you looking for?">
    </div>
    <div class="nav-wrapper">
        <nav class="navbar">
            <ul class="nav-items">
                <a href="index.php"><li class="nav-item">Home</li></a>
                <a href=product-page.php><li class="nav-item">Products</li></a>
                <?php if ($_SESSION && isCurrentUserAdmin()):?>
                <a href=admin.php><li class="nav-item">Admin</li></a>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    <div class="top-right-buttons">
<<<<<<< Updated upstream
        <button class="login-button" onclick="gotoLoginPage();">Login</button>
        
        <img src="Assets/images/shopping-cart.png" class="shopping-cart" onclick="toggleShoppingCart();">
=======
        <a href=login.php><button class="login-button">Login</button></a>
        <a href="cart.php"><img src="Assets/images/shopping-cart.png" class="shopping-cart"></a>
>>>>>>> Stashed changes
    </div>
</header>