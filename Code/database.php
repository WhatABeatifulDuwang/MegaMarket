<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "megaMarket";

try {
    $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE myMegaMarket";
    $conn->exec($sql);
    $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL,
            password VARCHAR(255) NOT NULL,
            admin INT DEFAULT 0
            )";
    $conn->exec($sql);
    $sql = "CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            product_name VARCHAR(255) NOT NULL,
            product_type VARCHAR(255) NOT NULL,
            price FLOAT NOT NULL
            )";
    $conn->exec($sql);
    $sql = "CREATE TABLE IF NOT EXISTS shopping_cart (
            product_id INT NOT NULL,
            user_id INT NOT NULL,
            PRIMARY KEY(product_id, user_id),
            CONSTRAINT fk_products
                FOREIGN KEY (product_id)
                REFERENCES products(id) ON DELETE CASCADE,
            CONSTRAINT fk_users
                FOREIGN KEY (user_id)
                REFERENCES users(id) ON DELETE CASCADE
            )";
    $conn->exec($sql);
} catch (PDOException $e) {}