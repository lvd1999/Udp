<?php

require_once('../../model/database.php');
session_start();

$doctor_pps = $_SESSION['pps2'];
if ($_POST) {
    $time = $_POST['time'];
    // Now we want to JSON encode these values to send them to $.ajax success.
    foreach ($time as $t) {
        $date = substr($t, 0, 10);
        $time = substr($t, 11, 8);
        $query = "INSERT INTO schedules (doctor_id,date,time) VALUES ((SELECT id FROM doctors WHERE pps_num = :doctor_pps),:date,:time)";
        $statement = $db->prepare($query);
        $statement->bindValue(':doctor_pps', $doctor_pps);
        $statement->bindValue(':date', $date);
        $statement->bindValue(':time', $time);
        $statement->execute();
        $statement->closeCursor();
    }
    echo $time;

    exit; // to make sure you arn't getting nothing else
} else {
    // so you can access the error message in jQuery
    echo json_encode(array('errror' => TRUE, 'message' => 'a problem occured'));
    exit;
}
?>