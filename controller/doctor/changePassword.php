<?php
require_once('../../model/database.php');
session_start();

$old_password = filter_input(INPUT_POST, 'old_password');
$new_password = filter_input(INPUT_POST, 'new_password');
$confirm_new_password = filter_input(INPUT_POST, 'confirm_new_password');

$doctor_pps = $_SESSION['pps2'];

$query1 = 'SELECT * FROM doctors WHERE pps_num = :doctor_pps';
$statement1 = $db->prepare($query1);
$statement1->bindValue(':doctor_pps', $doctor_pps);
$statement1->execute();
$list1 = $statement1->fetch();
$statement1->closeCursor();

$password = $list1['password'];

if ($old_password == $password) {
    if ($new_password == $confirm_new_password) {
        $query2 = 'UPDATE doctors SET password = :new_password WHERE pps_num = :doctor_pps';
        $statement2 = $db->prepare($query2);
        $statement2->bindValue(':new_password', $new_password);
        $statement2->bindValue(':doctor_pps', $doctor_pps);
        $statement2->execute();
        $statement2->closeCursor();
    }
    else
    {
        echo 'new password != old password';
    }
}
else{
    echo 'old password wrong!';
}
?>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
