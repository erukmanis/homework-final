<?php
require_once '../source/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);


    $stmt = $conn->prepare('INSERT INTO users 
    (username, hash)
    VALUES (:username, :hash)');
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':hash', $hash);


    $stmt->execute();

    header('Location: /');
} else {
    echo "that was not a POST, maybe GET";
}
