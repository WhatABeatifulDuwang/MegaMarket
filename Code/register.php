<?php include "database.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="Assets/Styles/register-page.css"
</head>
<body>
<?php include "User.php";
session_start();

$allUsers = getAllUsers();
foreach ($allUsers as $user){
    $emailCheck = $user["email_address"];
    $phoneCheck = $user["phone_number"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

//    $passwordCheck = "";
//    if (!empty($_POST["password"] != !empty($_POST["confirm-password"]))){
//        $password = htmlspecialchars($_POST["password"]);
//        $confirmPassword = htmlspecialchars($_POST["confirm-password"]);
//
//        // Password needs to contain at least 1 uppercase, lowercase, number and special character and also at least a length of 8
//        $patternCheck = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
//
//        if ($password != $confirmPassword){
//            $passwordCheck .= "Passwords are not the same!\n";
//        }
//        if (!preg_match($patternCheck, $password)){
//            $passwordCheck .= "Password must have at least 8 character length with minimum of 1 uppercase, 1 lowercase, 1 number and 1 special character!\n";
//        }
//    }
//    if (!empty($passwordCheck)){
//        echo "<div style = 'color:red'>$passwordCheck</div>";
//    }
    if ($emailCheck == $currentUser->getEmailAddress()){
        echo "<div style = 'color:red'>This email already has been used</div>";
    }
    if ($phoneCheck == $currentUser->getPhoneNumber()) {
        echo "<div style = 'color:red'>This phone number already has been used</div>";
    }
    else {
        // Password hashing
        //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        createUser(
            $currentUser->getEmailAddress(),
            $currentUser->getFirstName(),
            $currentUser->getSurname(),
            $currentUser->getPassword(),
            $currentUser->getCountry(),
            $currentUser->getPostalCode(),
            $currentUser->getHouseNumber(),
            $currentUser->getAdditional(),
            $currentUser->getPhoneNumber()
        );

        $user = getUserByEmailAndPassword($currentUser->getEmailAddress(), $currentUser->getPassword());
        //setFirstAccountAsAdmin();
        $_SESSION["user"] = $user;
        //header(index.php);
    }
}
?>
<div class="register-page">
    <h2>Create your account today!</h2>
    <div class="content">
        <form method="post">
            <label for="email">Email-address:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="first-name">First Name:</label><br>
            <input type="text" id="first-name" name="first-name" required><br>
            <label for="surname">Surname:</label><br>
            <input type="text" id="surname" name="surname" required><br>
            <label for="country"></label>Country:<br>
            <input type="text" id="country" name="country" required><br>
            <label for="postal-code"></label>Postal Code:<br>
            <input type="text" id="postal-code" name="postal-code" required><br>
            <label for="house-number"></label>House Number:<br>
            <input type="number" id="house-number" name="house-number" required><br>
            <label for="additional"></label>Additional:<br>
            <input type="text" id="additional" name="additional"><br>
            <label for="phone-number"></label>Phone Number:<br>
            <input type="text" id="phone-number" name="phone-number" required><br>
            <label for="password"></label>Password:<br>
            <input type="password" id="password" name="password" required><br>
            <label for="confirm-password"></label>Confirm Password:<br>
            <input type="password" id="confirm-password" name="confirm-password" required><br><br>
            <input type="submit" value="Register">
        </form>
    </div>
</div>
</body>
</html>