<?php
require_once('../../model/database.php');
session_start();

$university = filter_input(INPUT_POST, 'university');
$course = filter_input(INPUT_POST, 'course');
$conferal_date = filter_input(INPUT_POST, 'conferal_date');
$registration_num = filter_input(INPUT_POST, 'registration_num');
$registration_date = filter_input(INPUT_POST, 'registration_date');
$speciality_id = filter_input(INPUT_POST, 'speciality_id');
$speciality_date = filter_input(INPUT_POST, 'speciality_date');

$doctor_pps = $_SESSION['pps2'];

$query1 = 'UPDATE doctors
                SET university = :university, course = :course, conferal_date = :conferal_date, registration_num = :registration_num,
                    registration_date = :registration_date, speciality_id = :speciality_id, speciality_date = :speciality_date
                        WHERE pps_num = :patient_pps';
$statement1 = $db->prepare($query1);
$statement1->bindValue(':university', $university);
$statement1->bindValue(':course', $course);
$statement1->bindValue(':conferal_date', $conferal_date);
$statement1->bindValue(':registration_num', $registration_num);
$statement1->bindValue(':registration_date', $registration_date);
$statement1->bindValue(':speciality_id', $speciality_id);
$statement1->bindValue(':speciality_date', $speciality_date);
$statement1->bindValue(':doctor_pps', $doctor_pps);
$statement1->execute();
$statement1->closeCursor();
?>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
