<?php
session_start();
$_SESSION['block'] = true;
//if(!isset($_SESSION['patientSession']))
//{
// header("Location: patient_home.php");
//}
//else if(isset($_SESSION['patientSession'])!="")
//{
// header("Location: ../index.php");
//}

if(isset($_GET['logout']))
{
 unset($_SESSION['patientSession']);
 header("Location: ../../index.php");
}
?>