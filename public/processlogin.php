
<?php

session_start();

require_once '../source/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare('SELECT idusers, hash FROM users WHERE  (username = :username)');

    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $isFetchModeSet = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $allRows = $stmt->fetchAll();



    if (count($allRows) > 0) {
        $hash = $allRows[0]['hash'];
        $idusers = $allRows[0]['idusers'];


        if (password_verify($password, $hash)) {
            echo "You are logged in!";
            $_SESSION['username'] = $username;
            $_SESSION['idusers'] = $idusers;
        } else {
            echo "Login failed!";
        }
    }
    header('Location: /');
}
