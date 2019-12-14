<?php
require_once '../source/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $taskid = $_POST['delete'];
    $stmt = $conn->prepare("DELETE FROM `schedule` WHERE `schedule`.`idschedule` = (:tasknum)");
    $stmt->bindParam(':tasknum', $taskid);
    $stmt->execute();
    header('Location: /');
} else {
    echo "Try again";
}
