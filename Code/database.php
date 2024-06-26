<?php

// Database credentials
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "megamarket";

// Creating database with PDO
try {
    $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
    $sql = "CREATE DATABASE IF NOT EXISTS megamarket";
    $conn->exec($sql);
    $sql = "USE megamarket";
    $conn->exec($sql);
    // Creates user table
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
    // Creates product table
    $sql = "CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            type VARCHAR(255) NOT NULL,
            price FLOAT NOT NULL,
            description text NOT NULL,
            quantity int(11) NOT NULL,
            img text NOT NULL
            )";
    $conn->exec($sql);
    // Creates order table
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
    echo $e->getMessage();
}

// Creates user in the database
function createUser($email, $first_name, $surname, $password, $country, $postal_code, $house_number, $additional, $phone_number, $admin = 0) {
    global $conn;

    try {
        $sql = "INSERT INTO users (email_address, first_name, surname, password, country, postal_code, house_number, additional, phone_number, admin) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $conn->prepare($sql)->execute([$email, $first_name, $surname, $password, $country, $postal_code, $house_number, $additional, $phone_number, $admin]);
        return $conn->lastInsertId();
    } catch (PDOException $e) {
        return false;
    }
}

// Changes users address in the database
function changeUserAddress($userId, $country, $postal_code, $house_number, $additional = null) {
    global $conn;

    try {
        $stmt = $conn->prepare("UPDATE users SET country = ? , postal_code = ? , house_number = ? , additional = ? WHERE id = ?");
        $stmt->execute([$country, $postal_code, $house_number, $additional, $userId]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

// Changes users personal data in the database
function changeUserPersonalData($userId, $email, $first_name, $surname, $phone_number){
    global $conn;

    try {
        $stmt = $conn->prepare("UPDATE users SET email_address = ? , first_name = ? , surname = ? , phone_number = ? WHERE id = ?");
        $stmt->execute([$email, $first_name, $surname, $phone_number, $userId]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

// Changes users password
function changeUserPassword($userId, $password){
    global $conn;

    try {
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        $stmt->execute([$password, $userId]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

// Deletes user in the database
function deleteUser($userId) {
    global $conn;

    try {
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$userId]);
    } catch (PDOException $e) {
        return false;
    }
}

function getUserByEmail($email) {
    global $conn;

    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email_address = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

// Retrieves user by email and password combination
function getUserByEmailAndPassword($email, $password) {
    global $conn;

    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email_address LIKE ? AND password LIKE ?");
        $stmt->execute([$email, $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

// Retrieves userId by email
function getUserIdByEmail($username) {
    global $conn;

    try {
        $stmt = $conn->prepare("SELECT id FROM users WHERE email_address = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

// Retrieves all users from the database
function getAllUsers() {
    global $conn;

    try {
        $stmt = $conn->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

// Checks if current user is an admin
function isCurrentUserAdmin() {
    global $conn;

    try {
        $stmt = $conn->prepare("SELECT admin FROM users WHERE id = ?");
        $stmt->execute([getCurrentUserId()['id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && $user['admin'] == 1) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        return false;
    }
}

function getCurrentUserId() {
    return $_SESSION['user']['id'];
}

// Sets first account created as admin
function setFirstAccountAsAdmin(){
    global $conn;

    try {
        $stmt = $conn->prepare("UPDATE users SET admin = 1 WHERE id = 1");
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

// Gets a product from their id
function getProductById($productId) {
    global $conn;

    try {
        $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$productId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

// Gets the amount of products in the product table
function getTotalProducts() {
    global $conn;

    try {
        $stmt = $conn->query("SELECT COUNT(*) FROM products WHERE id IS NOT NULL");
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        return 0;
    }
}

// Gets all the products
function getAllProducts($category = null) {
    global $conn;

    try {
        if ($category) {
            $stmt = $conn->prepare("SELECT * FROM products WHERE type = :category");
            $stmt->bindParam(':category', $category);
            $stmt->execute();
        } else {
            $stmt = $conn->query("SELECT * FROM products");
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return array();
    }
}

// Searches Products
function searchProducts($searchTerm) {
    global $conn;

    try {
        $searchTerm = '%' . $searchTerm . '%';
        $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE :searchTerm OR description LIKE :searchTerm");
        $stmt->bindParam(':searchTerm', $searchTerm);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return array();
    }
}