<?php
require_once('../../model/database.php');
session_start();

$university = filter_input(INPUT_POST, 'university');
$course = filter_input(INPUT_POST, 'course');
$conferal_date = filter_input(INPUT_POST, 'conferal_date');
$registration_num = filter_input(INPUT_POST, 'registration_num');
$registration_date = filter_input(INPUT_POST, 'registration_date');
$speciality_name = filter_input(INPUT_POST, 'speciality_name');
$speciality_date = filter_input(INPUT_POST, 'speciality_date');

$doctor_pps = $_SESSION['pps2'];

$query1 = 'SELECT speciality_name FROM speciality WHERE speciality_name = :speciality_name';
$statement1 = $db->prepare($query1);
$statement1->bindValue(':speciality_name', $speciality_name);
$statement1->execute();
$list1 = $statement1->fetch();
$statement1->closeCursor();

if (empty($list1)) {
    $query2 = 'INSERT INTO speciality (speciality_name) VALUES (:speciality_name)';
    $statement2 = $db->prepare($query2);
    $statement2->bindValue(':speciality_name', $speciality_name);
    $statement2->execute();
    $statement2->closeCursor();
}
    $query3 = 'UPDATE doctors
                    SET university = :university, course = :course, conferal_date = :conferal_date, registration_num = :registration_num,
                        registration_date = :registration_date, 
                        speciality_id = (SELECT id FROM speciality WHERE speciality_name = :speciality_name), 
                        speciality_date = :speciality_date
                            WHERE pps_num = :doctor_pps';
    $statement3 = $db->prepare($query3);
    $statement3->bindValue(':university', $university);
    $statement3->bindValue(':course', $course);
    $statement3->bindValue(':conferal_date', $conferal_date);
    $statement3->bindValue(':registration_num', $registration_num);
    $statement3->bindValue(':registration_date', $registration_date);
    $statement3->bindValue(':speciality_name', $speciality_name);
    $statement3->bindValue(':speciality_date', $speciality_date);
    $statement3->bindValue(':doctor_pps', $doctor_pps);
    $statement3->execute();
    $statement3->closeCursor();
header('Location: ../../view/Doctor/doctor_profile.php');
?>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
