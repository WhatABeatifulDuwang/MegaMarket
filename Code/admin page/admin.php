<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="">
<h1>Admin</h1>
    <!-- <nav>
        <ul>
            <li><a href="add_product.php">Manage Products</a></li>
            Add more navigation items as neede
        </ul>
    </nav> -->
<?php
require_once '../database.php'; // database connectie

try {
    $sql = "SELECT id, first_name, surname, email_address, postal_code, house_number, additional, phone_number FROM users";
    global $conn;
    $stmt = $conn->query($sql);
    
    if($stmt->rowCount() > 0) {
        echo "<h3>Users</h3>";
        echo "<table class=>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Email</th>";
        echo "<th>Address</th>";
        echo "<th>Phone</th>";
        echo "</tr>";
        
        while($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['first_name']. ' '. $row['surname'] . "</td>";
            echo "<td>" . $row['email_address'] . "</td>";
            echo "<td>" . $row['postal_code'] . ', ' . $row['house_number'] . $row['additional'] . "</td>";
            echo "<td>" . $row['phone_number'] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
        
        unset($stmt);
    } else {
        echo "No records matching your query were found.";
    }
}
catch(PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// if (isset($_GET['function'])) {
//     $function = $_GET['function'];
//     switch ($function) {
//         case 'add_product':
//             require 'add_product.php';
//             break;
//         // Handle other cases
//     }
// }

unset($pdo);

try {
    $sql = "SELECT id, name, type, price FROM products";
    $stmt = $conn->query($sql);

    if($stmt->rowCount() > 0) {
        echo "<h3>Products</h3>";
        echo "<a href='add_product.php'>Add New Product</a><br/><br/>";
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Type</th>";
        echo "<th>Price</th>";
        echo "<th>Action</th>";
        echo "</tr>";
        
        while($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['type'] . "</td>";
            echo "<td>€" . $row['price'] . "</td>";
            echo "<td>";
            echo "<a href='edit_product.php?id=". $row['id'] ."'>Edit</a>";
            echo " | ";
            echo "<a href='delete_product.php?id=". $row['id'] ."' onclick='return confirm(\"Delete this product?\");'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "No products found.";
    }
} catch(PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

unset($pdo);
?>

</body>
</html>