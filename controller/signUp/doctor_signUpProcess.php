<?php
session_start();

// initializing variables
$firstname = "";
$lastname = "";
$pps = "";
$email    = "";
$gender = "";
$speciality = "";
$county = "";
$hospital = "";


$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'drbook');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $pps = mysqli_real_escape_string($db, $_POST['pps']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $speciality = mysqli_real_escape_string($db, $_POST['speciality']);
  $county = mysqli_real_escape_string($db, $_POST['county']);
  $hospital = mysqli_real_escape_string($db, $_POST['hospital']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($pps)) { array_push($errors, "PPS Number is required"); }
  if (empty($firstname)) { array_push($errors, "First Name is required"); }
  if (empty($lastname)) { array_push($errors, "Last Name is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($county)) { array_push($errors, "County is required"); }
  if (empty($speciality)) { array_push($errors, "Speciality is required"); }
  if (empty($hospital)) { array_push($errors, "Hospital is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM doctors WHERE pps_num='$pps' OR email='$email' LIMIT 1";
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

  	$query = "INSERT INTO doctors (d_first_name,d_last_name,pps_num,gender, email, password, speciality, hospital_id) 
  			  VALUES('$firstname', '$lastname', '$pps', '$gender', '$email', '$password_1', '$speciality', '$hospital')";
  	echo $query;
        mysqli_query($db, $query);

//  	header('location: ../../index.php');
        echo "Registered successfully.";
  }
}