<title>Deleting...</title>
<?php

require_once '../database.php';

if(isset($_GET['id'])) {
    $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
    $id = $_GET['id'];

    $sql = "DELETE FROM products WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(["id" => $id]);

    header("location: ../admin.php");
    exit();
}
?>