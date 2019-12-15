<?php

require_once 'db.php';

if (!isset($_SESSION['username'])) {
    echo "You need to login for To do List";
    return;
} else {
    echo "<div class='generalmessages'>Welcome to your private todolist " . $_SESSION['username'] . " !</div>";
}

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
                echo "<div class=taskname>Task '$value'</div>";
                break;
            case 'details':
                echo "<div class=taskdetails>Details '$value'</div>";
                break;
                // default:
                //     //echo "<span>$value </span>";
                //     break;
        }
    }

    // echo "<form action='templates/updateform.php'>";
    // echo "<button>Update</button>";
    // echo "</form>";




    // echo "<form action='deletetodo.php' method='post'>";
    // echo "<button name='delete' value='" . $row['idschedule'] . "'>Delete</button>";
    // echo "</form>";
}
