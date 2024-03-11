<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "mysql";

try {
    $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE megamarket";
    $conn->exec($sql);
    $sql = "USE megamarket";
    $conn->exec($sql);
    $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            email_address VARCHAR(255) NOT NULL,
            first_name VARCHAR(50) NOT NULL,
            surname VARCHAR(50) NOT NULL,
            password VARCHAR(255) NOT NULL,
            country VARCHAR(100) NOT NULL,
            postal_code VARCHAR(10) NOT NULL,
            house_number INT NOT NULL,
            additional VARCHAR(10) DEFAULT NULL,
            phone_number VARCHAR(20) NOT NULL,
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
    $sql = "CREATE TABLE IF NOT EXISTS orders (
            id INT AUTO_INCREMENT PRIMARY KEY,
            product_id INT NOT NULL,
            user_id INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
            CONSTRAINT fk_products
                FOREIGN KEY (product_id)
                REFERENCES products(id) ON DELETE CASCADE,
            CONSTRAINT fk_users
                FOREIGN KEY (user_id)
                REFERENCES users(id) ON DELETE CASCADE
            )";
    $conn->exec($sql);
}
catch (PDOException $e) {
    echo "Database has not been created successfully!";
}

function createUser($email, $first_name, $surname, $password, $country, $postal_code, $house_number, $additional = null, $phone_number, $admin = 0) {
    global $conn;

    try {
        $stmt = $conn->prepare("INSERT INTO users (email, first_name, surname, password, country, postal_code, house_number, additonal, phone_number admin) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$email, $first_name, $surname, $password, $password, $country, $postal_code, $house_number, $additional, $phone_number, $admin]);
        return $conn->lastInsertId();
    } catch (PDOException $e) {
        return false;
    }
}