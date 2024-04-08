<link rel="stylesheet" href="Assets/Styles/navbar-styles.css">
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