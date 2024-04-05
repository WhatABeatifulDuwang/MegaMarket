<?php
require_once '../database.php';

$name = $description = $price = "";
$name_err = $price_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter a name.";
    } else{
        $name = trim($_POST["name"]);
    }
    
    // Validate price
    if(empty(trim($_POST["price"]))){
        $price_err = "Please enter the price amount.";
    } elseif(!ctype_digit(trim($_POST["price"]))){
        $price_err = "Please enter a positive integer value.";
    } else{
        $price = trim($_POST["price"]);
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($price_err)){
        $sql = "INSERT INTO id, name, type, price VALUES :name, :type, :price";

        if($stmt = $conn->prepare($sql)){
            // Binding variables
            $stmt->bindParam(":name", $param_name);
            $stmt->bindParam(":description", $param_description);
            $stmt->bindParam(":price", $param_price);
            
            //parameters
            $param_name = $name;
            $param_description = $_POST["description"];
            $param_price = $price;
            
            if($stmt->execute()){ //er word gezegt dat in deze lijn iets verkeerds gaat
                header("location: admin.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }

            unset($stmt);
        }
    }
    
    // Close connection
    unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
</head>
<body>
    <div>
        <h2>Add Product</h2>
        <p>Please fill this form and submit to add a product.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Name</label>
                <input type="text" name="name" value="<?php echo $name; ?>">
                <span><?php echo $name_err; ?></span>
            </div>    
            <div>
                <label>Description</label>
                <textarea name="description"><?php echo $description; ?></textarea>
            </div>
            <div>
                <label>Price</label>
                <input type="text" name="price" value="<?php echo $price; ?>">
                <span><?php echo $price_err; ?></span>
            </div>
            <div>
                <input type="submit" value="Submit">
                <a href="admin.php">Cancel</a>
            </div>
        </form>
    </div>    
</body>
</html>