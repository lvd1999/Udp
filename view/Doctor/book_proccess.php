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
    echo "<script>
    setTimeout(function () { 
swal({
  title: \"There was a problem.\",
  text: \"User with PPS Number $p_pps not exist.\" ,
  type: \"error\",
  confirmButtonText: \"Back\"
},
function(isConfirm){
  if (isConfirm) {
    window.location.href = \"add_appointment.php\";
  }
}); }, 100);</script>";
} else {
    $query2 = "INSERT INTO upcoming_appointments (patient_id, doctor_id, time, status) VALUES ((SELECT id FROM patients WHERE pps_num = '$p_pps') , '$doctor_id', '$time', '$status') ";
    $query3 = "UPDATE schedules SET status='not_available' WHERE id=" . $schedule_id;
    $run = mysqli_query($con, $query2);
    $run2 = mysqli_query($con, $query3);
    echo "<script>
    setTimeout(function () { 
swal({
  title: \"Appointment booked successfully.\",
  text: \"Time: $time\" ,
  type: \"success\",
  confirmButtonText: \"OK\"
},
function(isConfirm){
  if (isConfirm) {
    window.location.href = \"upcoming_appointments.php\";
  }
}); }, 100);</script>";
}
?>

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">