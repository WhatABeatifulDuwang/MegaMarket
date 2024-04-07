<?php
require_once '../database.php';
$id = $sql;

$id = $_POST['id'];

$sql = "DELETE FROM products WHERE id = $id";

if($id->execute()){
    header("location: admin.php");
    // confirm("has been deleted");
    exit();
}
?>