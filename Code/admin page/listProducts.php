<?php
require_once 'config.php';

echo "<a href='admin.php?function=addProduct'>Add New Product</a>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Name</th><th>Price</th><th>Actions</th></tr>";

try {
    $stmt = $pdo->query("SELECT id, name, price FROM products");
    while ($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['price']) . "</td>";
        echo "<td><a href='admin.php?function=editProduct&id=" . $row['id'] . "'>Edit</a> | <a href='deleteProduct.php?id=" . $row['id'] . "'>Delete</a></td>";
        echo "</tr>";
    }
} catch (PDOException $e) {
    die("Could not fetch products: " . $e->getMessage());
}

echo "</table>";
?>
