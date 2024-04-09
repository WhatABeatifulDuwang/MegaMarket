<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="Assets/Styles/forgot-page.css">
    <script src="Assets/Scripts/forgot-password.js"></script>
</head>
<body>
<nav>
    <?php include "Assets/components/navbar.php";?>
</nav>
<div class="container">
<div class="head">
    <h1>Did you forgot your password?</h1>
    <p>No problem, we can mail you a link to reset your password.</p>
</div>
<div class="error">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $user = getUserByEmail($email);
    $emailCorrect = false;
    function hideForm(){
        echo '<script type="text/javascript">
              hideForm();
        </script>';
    }

    if (!empty($user)){
        hideForm();
        $emailCorrect = true;
    }
    else{
        $errorTextTag = "<div style='color:red' id='errorTextTag'>There is no email like this in our records. Please check if the email is correct and try again</div>";
        echo $errorTextTag;
    }
    if (!empty($user) && !empty($_POST['password'])){
        $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        changeUserPassword($user['id'], $hashedPassword);
        $successTag = "<div style='color:green' id='successTag'>Password has been updated successfully!</div>";
        echo $successTag;
    }
}
?>
</div>
<form id="formEmail" method="post">
    <input type="email" id="email" name="email" placeholder="Enter your email">
    <br>
    <input id="SendButton" type="submit" value="Send">
</form>
<?php
if (!empty($emailCorrect)){
    echo "<h3>Your email has been recorded in our database!<br>Enter your new password below!</h3>";
    echo "<form id='formPassword' method='post'>
            <input type='hidden' id='confirmed-email' name='email' value='$email'>
            <input type='password' id='password' name='password' placeholder='Enter your new password'><br>
            <input id='ChangeButton' type='submit' value='Confirm' name='Confirm'>
            </form>";
}
?>
</div>
</body>