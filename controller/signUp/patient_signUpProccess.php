<?php
session_start();

// initializing variables
$email    = "";
$firstname = "";
$lastname = "";
$pps = "";
$gender = "";
$errors = array(); 
$dob = "";
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'drbook');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $dob = mysqli_real_escape_string($db, $_POST['dob']);
  $pps = mysqli_real_escape_string($db, $_POST['pps']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($pps)) { array_push($errors, "Username is required"); }
  if (empty($firstname)) { array_push($errors, "First Name is required"); }
  if (empty($lastname)) { array_push($errors, "Last Name is required"); }
  if (empty($dob)) { array_push($errors, "Birthdate is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM patients WHERE pps_num='$pps' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['pps_num'] === $pps) {
      array_push($errors, "PPS already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
//  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO patients (first_name,last_name,birthdate,pps_num,gender, email, password) 
  			  VALUES('$firstname', '$lastname','$dob', '$pps', '$gender', '$email', '$password_1')";
  	mysqli_query($db, $query);

//  	header('location: ../../index.php');
        echo "Registered successfully.";
  }
}