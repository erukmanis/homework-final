<?php

session_start();

$SERVER = "localhost";
const USER = "root";
const PW = "";
$DB = "todolist";

try {
    $conn = new PDO("mysql:host=$SERVER;dbname=$DB;charset=utf8", USER, PW);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}


//require_once '../../source/db.php';

if (!isset($_SESSION['username'])) {
    echo "You need to login for To do List";
    return;
} else {
    echo "Here you can edit your tasks " . $_SESSION['username'] . " !";
}


$stmt = $conn->prepare("SELECT * FROM schedule
WHERE (user = :user)");
$stmt->bindParam(':user', $_SESSION['idusers']);
$stmt->execute();


$isFetchModeSet = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$allRows = $stmt->fetchAll();


$columnsPrinted = false;
foreach ($allRows as $row) {
    if (!$columnsPrinted) {
        foreach ($row as $key => $value) {
            //echo "<div><span> KEY:  $key </span></div>";
        }
        $columnsPrinted = true;
    }

    echo "<form action='/updatetodo.php' method='post'>";

    foreach ($row as $key => $value) {

        switch ($key) {

            case 'duedate':
                echo "<input type='date' class='taskdisplay' name='$key' value='$value'></input>";
                break;
            case 'taskname':
                echo "<input class='taskdisplay' name='$key' value='$value'></input>";
                break;
            case 'details':

                echo "<input class='taskdisplay' name='$key' value='$value'></input>";
                break;
            default:
                //echo "<span>$value </span>";
                break;
        }
    }

    echo "<button name='updatebutton' value='" . $row['idschedule'] . "'>Update</button>";
    echo "</form>";

    echo "<form action='/deletetodo.php' method='post'>";
    echo "<button name='delete' value='" . $row['idschedule'] . "'>Delete</button>";
    echo "</form>";
}