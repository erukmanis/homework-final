<?php
require_once '../source/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $taskid = $_POST['updatebutton'];
    $duedate = $_POST['duedate'];
    $taskname = $_POST['taskname'];
    $details = $_POST['details'];

    $stmt = $conn->prepare("UPDATE `schedule` SET `duedate` = (:duedate),`taskname` = (:taskname),
    `details` = (:details) WHERE `schedule`.`idschedule` = (:tasknum)");

    $stmt->bindParam(':tasknum', $taskid);
    $stmt->bindParam(':duedate', $duedate);
    $stmt->bindParam(':taskname', $taskname);
    $stmt->bindParam(':details', $details);

    $stmt->execute();

    header('Location: /');
} else {
    echo "Try again";
}
