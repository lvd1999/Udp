<!--insert into upcoming-->
<?php
session_start();
require('../../model/patient/patient_functions.php');
if (isset($_POST['submit'])) {
    $patient_id = $_SESSION['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $time = $_POST['date'] . " " . $_POST['time'];
    $status = "pending";
    
    $con = mysqli_connect("localhost","root","","drbook");
    $query2 = "INSERT INTO upcoming_appointments (patient_id, doctor_id, time, status) VALUES ( '$patient_id', '$doctor_id', '$time', '$status') ";
    if (mysqli_query($con, $query2)) {
// echo "Booked successfully";
 header("Location: upcoming_appointments.php");
} else {
 echo "Error: " . $query2 . "<br>" . mysqli_error($con);
}
}
else {
    echo "no book no book";
}