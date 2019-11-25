<?php
require_once('../../model/database.php');
session_start();

// initializing variables
$email = "";
$firstname = "";
$lastname = "";
$pps = "";
$gender = "";
$errors = array();
$dob = "";


// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $firstname = filter_input(INPUT_POST, 'firstname');
    $lastname = filter_input(INPUT_POST, 'lastname');
    $dob = filter_input(INPUT_POST, 'dob');
    $pps = filter_input(INPUT_POST, 'pps');
    $gender = filter_input(INPUT_POST, 'gender');
    $email = filter_input(INPUT_POST, 'email');
    $password_1 = filter_input(INPUT_POST, 'password_1');
    $password_2 = filter_input(INPUT_POST, 'password_2');

    $count = 1;

    if ($password_1 != $password_2) {
        $count++;
        echo '<script>
    setTimeout(function () { 
swal({
  title: "There was a problem.",
  text: "Confirm password and password are not the same.",
  type: "error",
  confirmButtonText: "Back"
},
function(isConfirm){
  if (isConfirm) {
    window.location.href = "../../view/Doctor/doctor_signUp.php";
  }
}); }, 1000);</script>';
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $query = "SELECT * FROM patients WHERE pps_num='$pps' OR email='$email' LIMIT 1";
    $statement1 = $db->prepare($query);
    $statement1->execute();
    $user = $statement1->fetch();
    $statement1->closeCursor();

    if ($user) { // if user exists
        if ($user['pps_num'] === $pps) {
            $count++;
            echo '<script>
    setTimeout(function () { 
swal({
  title: "There was a problem.",
  text: "PPS number already exist.",
  type: "error",
  confirmButtonText: "Back"
},
function(isConfirm){
  if (isConfirm) {
    window.location.href = "../../view/Doctor/doctor_signUp.php";
  }
}); }, 1000);</script>';
        }

        if ($user['email'] === $email) {
            $count++;
            echo '<script>
    setTimeout(function () { 
swal({
  title: "There was a problem.",
  text: "Email already exist.",
  type: "error",
  confirmButtonText: "Back"
},
function(isConfirm){
  if (isConfirm) {
    window.location.href = "../../view/Patient/patient_signUp.php";
  }
}); }, 1000);</script>';
        }
    }

    // Finally, register user if there are no errors in the form
    if ($count == 1) {
        $password = md5($password_1); //encrypt the password before saving in the database

        $query = "INSERT INTO patients (p_first_name,p_last_name,birthdate,pps_num,gender, email, password) 
  			  VALUES(':firstname', ':lastname', ':dob', ':pps', ':gender', ':email', ':password')";
        $statement3 = $db->prepare($query);
        $statement3->bindValue(':firstname', $firstname);
        $statement3->bindValue(':lastname', $lastname);
        $statement3->bindValue(':dob', $dob);
        $statement3->bindValue(':pps', $pps);
        $statement3->bindValue(':gender', $gender);
        $statement3->bindValue(':email', $email);
        $statement3->bindValue(':$password', $password);
        $statement3->execute();
        $statement3->closeCursor();

        echo '<script>
    setTimeout(function () { 
swal({
  title: "Congratulations!",
  text: "Account created.",
  type: "success",
  confirmButtonText: "Back"
},
function(isConfirm){
  if (isConfirm) {
    window.location.href = "../../index.php";
  }
}); }, 1000);</script>';
    }
}
?>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
