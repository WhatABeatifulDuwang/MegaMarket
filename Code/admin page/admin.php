<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="">
<h1>Admin Dashboard</h1>
    <nav>
        <ul>
            <li><a href="admin.php?function=listProducts">Manage Products</a></li>
            <!-- Add more navigation items as needed -->
        </ul>
    </nav>
<?php
require_once 'config.php'; // database connectie

try {
    $sql = "SELECT id, username, email, address, phone FROM users";
    $stmt = $pdo->query($sql);
    
    if($stmt->rowCount() > 0) {
        echo "<table class=>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Username</th>";
        echo "<th>Email</th>";
        echo "<th>Address</th>";
        echo "<th>Phone</th>";
        echo "</tr>";
        
        while($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
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

if (isset($_GET['function'])) {
    $function = $_GET['function'];
    switch ($function) {
        case 'listProducts':
            require 'listProducts.php';
            break;
        // Handle other cases
    }
}

unset($pdo);
?>

</body>
</html>