<?php
require_once '../database.php';

$name = $type = $description = $price = "";
$name_err = $price_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter a name.";
    }
    else{
        $name = trim($_POST["name"]);
    }
    
    // Validate price
    if(empty(trim($_POST["price"]))){
        $price_err = "Please enter the price amount.";
    }
    elseif(!is_numeric(trim($_POST["price"]))){
        $price_err = "Please enter a positive integer value.";
    }
    else{
        $price = trim($_POST["price"]);
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($price_err)){
        $sql = "INSERT INTO products (name, type, description, price) VALUES (:name, :type, :description, :price)";

        if($stmt = $conn->prepare($sql)){
            
            $stmt->bindParam(":name", $param_name);
            $stmt->bindParam(":type", $param_type);
            $stmt->bindParam(":description", $param_description);
            $stmt->bindParam(":price", $param_price);
            
            //parameters
            $param_name = $name;
            $param_type = $_POST["type"];
            $param_description = $_POST["description"];
            $param_price = $price;
            
            if($stmt->execute()){
                header("location: ../admin.php");
                exit();
            }
            else{
                echo "Something went wrong. Please try again later.";
            }

            unset($stmt);
        }
    }
    
    unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link rel="stylesheet" href="../Assets/Styles/admin-style.css">
</head>
<body>
    <div class="container">
        <div class="form">
            <h2>Add Product</h2>
            <hr>
            <p>Fill the form to add a NEW product!</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div>
                    <label>Name:</label><br>
                    <input type="text" name="name" value="<?php echo $name; ?>">
                    <span><?php echo $name_err; ?></span>
                </div>    
                <div>
                    <label>Type:</label><br>
                    <input type="text"><?php echo $type; ?></input>
                </div>
                <div>
                    <label>Description:</label><br>
                    <textarea name="description"><?php echo $description; ?></textarea>
                </div>
                <div>
                    <label>Price: (€/Euro will be added automatically!)</label><br>
                    <input type="text" name="price" value="<?php echo $price; ?>">
                    <span><?php echo $price_err; ?></span>
                </div>
                <div>
                    <br>
                    <input type="submit" value="Submit" id="postButton">
                    <a href="../admin.php">Cancel</a>
                </div>
            </form>
        </div>
    </div>    
</body>
</html>