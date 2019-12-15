<?php
session_start();
require_once '../source/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $duedate = $_POST['duedateinput'];
    $taskname = $_POST['taskinput'];
    $details = $_POST['taskdetailsinput'];
    $user = $_SESSION['idusers'];

    $stmt = $conn->prepare('INSERT INTO schedule 
    (duedate, taskname, details, user) 
    VALUES (:duedateinput, :taskinput, :taskdetailsinput, :user)');
    $stmt->bindParam(':duedateinput', $duedate);
    $stmt->bindParam(':taskinput', $taskname);
    $stmt->bindParam(':taskdetailsinput', $details);
    $stmt->bindParam(':user', $user);
    $stmt->execute();

    header('Location: /');
} else {
    echo "Try again";
}
