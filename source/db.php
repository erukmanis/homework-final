<?php

require_once '../config/config.php';

try {
    $conn = new PDO("mysql:host=$SERVER;dbname=$DB;charset=utf8", USER, PW);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die('No Database');
}
