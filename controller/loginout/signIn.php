<?php
require_once('../../model/database.php');
session_start();

$login_pps = filter_input(INPUT_POST, 'login_pps');
$login_password = filter_input(INPUT_POST, 'login_password');

$query1 = 'SELECT * FROM patients WHERE pps_num = :login_pps';
$statement1 = $db->prepare($query1);
$statement1->bindValue(':login_pps', $login_pps);
$statement1->execute();
$list1 = $statement1->fetch();
$statement1->closeCursor();

$query1 = 'SELECT * FROM doctors WHERE pps_num = :login_pps';
$statement1 = $db->prepare($query1);
$statement1->bindValue(':login_pps', $login_pps);
$statement1->execute();
$list2 = $statement1->fetch();
$statement1->closeCursor();

$_SESSION['first_name1'] = $list1['p_first_name'];
$_SESSION['last_name1'] = $list1['p_last_name'];
$_SESSION['pps1'] = $list1['pps_num'];
$_SESSION['profile_pic'] = $list1['profile_pic'];
$_SESSION['patient_id'] = $list1['id'];

$_SESSION['first_name2'] = $list2['d_first_name'];
$_SESSION['last_name2'] = $list2['d_last_name'];
$_SESSION['pps2'] = $list2['pps_num'];
$_SESSION['profile_pic2'] = $list2['profile_pic'];
if (empty($list1) && empty($list2)) {
    echo '<script>
    setTimeout(function () { 
swal({
  title: "There was a problem.",
  text: "User not found.",
  type: "error",
  confirmButtonText: "Back"
},
function(isConfirm){
  if (isConfirm) {
    window.location.href = "../../index.php";
  }
}); }, 100);</script>';
} elseif (!empty($list1)) {
    $password1 = $list1['password'];

    if ($login_password == $password1) {
        header('Location: ../../view/Patient/patient_home.php');
    } elseif ($login_password != $password1) {
        echo 'no1';
    }
//    if (password_verify($login_password, $password1)) {
//        $_SESSION['block'] = NULL;
//        header('Location: patient_home.php');
//    } else if (!(password_verify($login_password, $password1))) {
//
//        echo '<script>
//    setTimeout(function () { 
//swal({
//  title: "There was a problem.",
//  text: "Wrong password.",
//  type: "error",
//  confirmButtonText: "Back"
//},
//function(isConfirm){
//  if (isConfirm) {
//    window.location.href = "../index.php";
//  }
//}); }, 1000);</script>';
//    }
} else {
    $password2 = $list2['password'];

    if ($login_password == $password2) {
        header('Location: ../../view/Doctor/doctor_home.php');
    } elseif ($login_password != $password2) {
        echo 'no2';
    }
    
//    if (password_verify($login_password, $password2)) {
//        $_SESSION['block'] = NULL;
//        header('Location: doctor_home.php');
//    } else if (!(password_verify($login_password, $password2))) {
//
//        echo '<script>
//    setTimeout(function () { 
//swal({
//  title: "There was a problem.",
//  text: "Wrong password.",
//  type: "error",
//  confirmButtonText: "Back"
//},
//function(isConfirm){
//  if (isConfirm) {
//    window.location.href = "../index.php";
//  }
//}); }, 1000);</script>';
//    }
}
?>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
