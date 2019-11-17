<?php
require_once('../../model/database.php');
session_start();

$smoker = filter_input(INPUT_POST, 'smoker');
$doner = filter_input(INPUT_POST, 'doner');
$blood_type = filter_input(INPUT_POST, 'bloodtype');
$allergies = filter_input(INPUT_POST, 'allergies');
$diseases = filter_input(INPUT_POST, 'diseases');
$immunisations = filter_input(INPUT_POST, 'immunisations');

$patient_pps = $_SESSION['pps1'];

$query1 = 'UPDATE patients
                SET smoker = :smoker, doner = :doner, blood_type = :blood_type, allergies = :allergies,
                    diseases = :diseases, immunisations = :immunisations
                        WHERE pps_num = :patient_pps';
$statement1 = $db->prepare($query1);
$statement1->bindValue(':smoker', $smoker);
$statement1->bindValue(':doner', $doner);
$statement1->bindValue(':blood_type', $blood_type);
$statement1->bindValue(':allergies', $allergies);
$statement1->bindValue(':diseases', $diseases);
$statement1->bindValue(':immunisations', $immunisations);
$statement1->bindValue(':patient_pps', $patient_pps);
$statement1->execute();
$statement1->closeCursor();
?>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
