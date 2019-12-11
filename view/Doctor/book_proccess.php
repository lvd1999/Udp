<!--insert into upcoming-->
<?php
session_start();
require('../../model/patient/patient_functions.php');
//if (isset($_POST['submit'])) {
//    $p_pps = $_POST['p_pps'];
//    $doctor_id = $_POST['doctor_id'];
//    $time = $_POST['date'] . " " . $_POST['time'];
//    $status = "pending";
//    $schedule_id = $_POST['schedule_id'];
//    
//    
//    $con = mysqli_connect("localhost","root","","drbook");
//    $query2 = "INSERT INTO upcoming_appointments (patient_id, doctor_id, time, status) VALUES ((SELECT id FROM patients WHERE pps_num = '$p_pps') , '$doctor_id', '$time', '$status') ";
//    $query3 = "UPDATE schedules SET status='not_available' WHERE id=" . $schedule_id ;
//    if (mysqli_query($con, $query2)) {
//        mysqli_query($con, $query3);
//// echo "Booked successfully";
// header("Location: upcoming_appointments.php");
//} else {
// echo "Error: " . $query2 . "<br>" . mysqli_error($con);
//}
//}
$p_pps = $_POST['p_pps'];
$doctor_id = $_POST['doctor_id'];
$time = $_POST['date'] . " " . $_POST['time'];
$status = "pending";
$schedule_id = $_POST['schedule_id'];
$con = mysqli_connect("localhost", "root", "", "drbook");
$query = "SELECT * FROM patients WHERE pps_num='" . $p_pps . "'";
$result = mysqli_query($con, $query);

if ($result->num_rows == 0) {
    echo 'User not exist';
} else {
    $query2 = "INSERT INTO upcoming_appointments (patient_id, doctor_id, time, status) VALUES ((SELECT id FROM patients WHERE pps_num = '$p_pps') , '$doctor_id', '$time', '$status') ";
    $query3 = "UPDATE schedules SET status='not_available' WHERE id=" . $schedule_id;
    $run = mysqli_query($con, $query2);
    $run2 = mysqli_query($con, $query3);
    echo "Booked successfully.";
}
?>