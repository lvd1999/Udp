<!--insert into upcoming-->
<?php
session_start();
require('../../model/patient/patient_functions.php');
if (isset($_POST['submit'])) {
    $schedule_id = $_POST['schedule_id'];
    $doctor_id = $_POST['doctor_id'];
    $patient_id = $_POST['patient_id'];
    $time = $_POST['time'];
    $status = $_POST['status'];
    
    $con = mysqli_connect("localhost","root","","drbook");
//    $query = "UPDATE upcoming_appointments SET status=\"cancelled\" WHERE id = " . $schedule_id ;
    $query1 = "INSERT INTO past_records (id, patient_id, doctor_id, time, status) VALUES ('$schedule_id', '$patient_id', '$doctor_id', '$time', 'cancelled') ";
    mysqli_query($con, $query1);
    $query2 = "DELETE FROM upcoming_appointments WHERE id = " . $schedule_id ;
    mysqli_query($con, $query2);
// echo "Booked successfully";
 header("Location: upcoming_appointments.php");
} else {
 echo "Error: " . $query . "<br>" . mysqli_error($con);
}
