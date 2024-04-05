<?php include("database.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="Assets/Styles/register-page.css">
</head>
<body>
<header class="header">
    <a href="index.html"><img class="logo" src="Assets/logo.png" alt="Company Logo"></a>
</header>
<?php
session_start();

// Retrieves data from all users for checks
$allUsers = getAllUsers();
foreach ($allUsers as $user){
    $emailCheck = $user["email_address"];
    $phoneCheck = $user["phone_number"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailUsed = false;
    $currentUser = new User(
        $_POST["email"],
        $_POST["first-name"],
        $_POST["surname"],
        $_POST["password"],
        $_POST["country"],
        $_POST["postal-code"],
        $_POST["house-number"],
        $_POST["additional"],
        $_POST["phone-number"]
    );

    $passwordCheck = "";
    $password = htmlspecialchars($currentUser->getPassword());
    $confirmPassword = htmlspecialchars($_POST["confirm-password"]);

    // Password needs to contain at least 1 uppercase, lowercase, number and special character and also at least a length of 8
    $patternCheck = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

    // Checks if the email is already in use
    if ($emailCheck == $currentUser->getEmailAddress()){
        $emailUsed = true;
    }
    // Checks if the passwords are the same
    if ($password != $confirmPassword){
        $passwordCheck .= "Passwords are not the same!\n";
    }
    // Checks if the password is according to password rules
    if (!preg_match($patternCheck, $password)){
        $passwordCheck .= "Password must have at least 8 character length with minimum of 1 uppercase, 1 lowercase, 1 number and 1 special character!\n";
    }
    else {
        // Password hashing
        $hashedPassword = password_hash($currentUser->getPassword(), PASSWORD_DEFAULT);
        // Passing model variables to a query in the database
        createUser(
            $currentUser->getEmailAddress(),
            $currentUser->getFirstName(),
            $currentUser->getSurname(),
            $hashedPassword,
            $currentUser->getCountry(),
            $currentUser->getPostalCode(),
            $currentUser->getHouseNumber(),
            $currentUser->getAdditional(),
            $currentUser->getPhoneNumber()
        );

        // Making a local variable and putting it in the session
        $user = getUserByEmailAndPassword($currentUser->getEmailAddress(), $currentUser->getPassword());
        //setFirstAccountAsAdmin();
        $_SESSION["user"] = $user;
        header("Location: index.html");
    }
}
?>
<div class="container">
    <div class="form">
        <h2>Create your account today!</h2>
        <form method="post">
            <label for="email">Email-address:</label><br>
            <input type="email" id="email" name="email" required><br>
            <?php
            if (!empty($emailUsed)){
                echo "<div style = 'color:red'>This email already has been used!</div>";
            }
            ?>
            <label for="first-name">First Name:</label><br>
            <input type="text" id="first-name" name="first-name" required><br>
            <label for="surname">Surname:</label><br>
            <input type="text" id="surname" name="surname" required><hr>
            <label for="country"></label>Country:<br>
            <input type="text" id="country" name="country" required><br>
            <label for="postal-code"></label>Postal Code:<br>
            <input type="text" id="postal-code" name="postal-code" required><br>
            <label for="house-number"></label>House Number:<br>
            <input type="number" id="house-number" name="house-number" required><br>
            <label for="additional"></label>Additional:<br>
            <input type="text" id="additional" name="additional"><br>
            <label for="phone-number"></label>Phone Number:<br>
            <input type="number" id="phone-number" name="phone-number" required><hr>
            <label for="password"></label>Password:<br>
            <input type="password" id="password" name="password" required><br>
            <?php
            if (!empty($passwordCheck)){
            echo "<div style = 'color:red'>$passwordCheck</div>";
            }
            ?>
            <div class="patternCheck">
                Your password must contain at least the following:
                <ul>
                    <li>A minimum of 8 characters</li>
                    <li>A minimum of 1 letter</li>
                    <li>A minimum of 1 number</li>
                    <li>A minimum of 1 special character (for example: !?@$%&)</li>
                </ul>
            </div>
            <label for="confirm-password"></label>Confirm Password:<br>
            <input type="password" id="confirm-password" name="confirm-password" required><br><br>
            <input id ="postButton" type="submit" value="Register">
        </form>
    </div>
    <div class="info">
        Why you should order at MegaMarket:
        <ul>
            <li>No need to carry all your heavy groceries.</li>
            <li>Our products are super cheap compared to other supermarket chains.</li>
            <li>If you order today, you will receive it tomorrow.</li>
        </ul>
        Already own an account?
        <a href="login.php">Login here</a>
    </div>
</div>
</body>
</html>