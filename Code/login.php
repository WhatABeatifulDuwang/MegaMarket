<?php include("database.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/Styles/login-page.css">
</head>
<body>
<div class="container">
<div class="error">
<?php include("User.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorTextTag = "<div></div>";
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user = getUserByEmail($email);
    var_dump($user);

if ($user &&password_verify($password, $user['password'])) {
    $userId = getUserIdByEmail($email);
    $_SESSION["user"] = $userId;
    header("Location: index.php");
    exit();
} else {
    $errorTextTag = "<div style='color:red' id='errorTextTag'>There is no account like this in our records. Please re-check the password and username and try again</div>";
    echo $errorTextTag;
    echo "<script>
        setTimeout(function() {
            document.getElementById('errorTextTag').innerHTML = '<div></div>';
        }, 5000);
    </script>";
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
    <input type="submit" value="Login" name="Submit">
</form>
    <a href="forgot-password.php">I forgot my password</a>
</div>
<div class="bottom">
<p class="sign-up"> Don't have an account? <a href="register.php">Sign Up</a></p>
</div>
<div id="confirmationMessage"></div>
<div id="errorTextTag"></div>
</div>
</body>