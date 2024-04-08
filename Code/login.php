<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/Styles/login-page.css">
</head>
<body>
<nav>
    <?php include "Assets/components/navbar.php"?>
</nav>
<div class="container">
    <div class="error">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $errorTextTag = "<div></div>";
            $email = $_POST["email"];
            $password = $_POST["password"];
            $user = getUserByEmail($email);

        if ($user &&password_verify($password, $user['password'])) {
            $userId = getUserIdByEmail($email);
            $_SESSION["user"]["id"] = $userId;
            header("Location: index.php");
            exit();
        } else {
            $errorTextTag = "<div style='color:red' id='errorTextTag'>There is no account like this in our records. Please re-check the password and username and try again</div>";
            echo $errorTextTag;
            }
        }
        ?>
    </div>
    <div class="form">
        <form method="post">
            <input type="email" id="email" name="email" placeholder="Enter your email">
            <br>
            <input type="password" id="password" name="password" placeholder="Enter your password">
            <br>
            <input id="postButton" type="submit" value="Login" name="Submit">
        </form>
        <a href="forgot-password.php">I forgot my password</a>
            <div class="bottom">
                <p class="sign-up"> Don't have an account?<br>
                    <a href="register.php">Sign Up</a></p>
            </div>
        <div id="confirmationMessage"></div>
        <div id="errorTextTag"></div>
    </div>
</div>
</body>