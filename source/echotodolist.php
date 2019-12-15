<?php

require_once 'db.php';

if (!isset($_SESSION['username'])) {

    return;
} else { }

require_once '../public/templates/addtasks.php';


$stmt = $conn->prepare("SELECT * FROM schedule
WHERE (user = :user)");
$stmt->bindParam(':user', $_SESSION['idusers']);
$stmt->execute();


$isFetchModeSet = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$allRows = $stmt->fetchAll();


$columnsPrinted = false;
foreach ($allRows as $row) {
    if (!$columnsPrinted) {
        foreach ($row as $key => $value) { }
        $columnsPrinted = true;
    }




    foreach ($row as $key => $value) {

        switch ($key) {

            case 'duedate':
                echo "<div class=taskdate>Due Date '$value'</div>";
                break;
            case 'taskname':
                echo "<div class=taskname>'$value'</div>";
                break;
            case 'details':
                echo "<div class=taskdetails>Details '$value'</div>";
                break;
        }
    }
}
