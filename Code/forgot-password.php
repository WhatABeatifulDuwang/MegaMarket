<?php include("database.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="Assets/Styles/forgot-page.css">
    <script src="Assets/forgot-password.js"></script>
</head>
<body>
<div class="container">
<div class="header">
    <h1>Forgot your password?</h1>
    <p>No problem, we can mail you a link to set a new password.</p>
</div>
<div class="error">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $user = getUserByEmail($email);

    var_dump($user, $email);
    if (!empty($user)){
        echo "<form method='post'>
            <input type='password' id='password' name='password' placeholder='Enter your new password'>
            <input type='submit' value='Confirm' name='Confirm'>
            </form>";
    }
    if (!empty($_POST['password'])){
        changeUserPassword($user['id'], $_POST['password']);
    }
    else{
        $errorTextTag = "<div style='color:red' id='errorTextTag'>There is no email like this in our records. Please check if the email is correct and try again</div>";
        echo $errorTextTag;
    }
}
?>
</div>
<div id="form">
    <form method="post">
        <input type="email" id="email" name="email" placeholder="Enter your email">
        <br>
        <button onclick="hideForm()" type="submit" class="form-hide">Send</button>
    </form>
</div>
</div>
</body>