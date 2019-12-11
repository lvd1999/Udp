<!--insert into upcoming-->
<?php
session_start();
require('../../model/patient/patient_functions.php');
if (isset($_POST['submit'])) {
    $patient_id = $_SESSION['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $time = $_POST['date'] . " " . $_POST['time'];
    $status = "pending";
    $schedule_id = $_POST['schedule_id'];
    
    $con = mysqli_connect("localhost","root","","drbook");
    $query2 = "INSERT INTO upcoming_appointments (patient_id, doctor_id, time, status) VALUES ( '$patient_id', '$doctor_id', '$time', '$status') ";
    $query3 = "UPDATE schedules SET status='not_available' WHERE id= $schedule_id ";
        mysqli_query($con, $query2);
        mysqli_query($con, $query3);
 

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

//header("Location: upcoming_appointments.php");
}
?>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">