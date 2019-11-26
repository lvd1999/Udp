<?php
require_once('../model/database.php');
session_start();

$email = filter_input(INPUT_POST, 'email');

require '../PHPMailer-master/PHPMailerAutoload.php';
$mail = new PHPMailer();
$mail->IsSmtp();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = "smtp.gmail.com";
$mail->Port = '465'; // or 587
$mail->IsHTML();
$mail->Username = "udp.book@gmail.com";
$mail->Password = "!udpbook1234";
$mail->SetFrom('Dr.Book <no_reply@drbook.com>');

$query1 = 'SELECT * FROM patients WHERE email = :email';
$statement1 = $db->prepare($query1);
$statement1->bindValue(':email', $email);
$statement1->execute();
$list1 = $statement1->fetch();
$statement1->closeCursor();

$query1 = 'SELECT * FROM doctors WHERE email = :email';
$statement1 = $db->prepare($query1);
$statement1->bindValue(':email', $email);
$statement1->execute();
$list2 = $statement1->fetch();
$statement1->closeCursor();

$password1 = $list1['password'];

$password2 = $list2['password'];

if (empty($list1) && empty($list2)) {
    echo '<script>
    setTimeout(function () { 
swal({
  title: "There was a problem.",
  text: "User not found.",
  type: "error",
  confirmButtonText: "Back"
},
function(isConfirm){
  if (isConfirm) {
    window.location.href = "../index.php";
  }
}); }, 100);</script>';
} elseif (!empty($list1)) {

    $subject = 'Dr.Book - Find Password';
    $message = 'Your password is ' . password_verify($password1, $md5hash) . '.';
    $headers = 'From: Dr.Book <no_reply@drbook.com>\r\n';
    $headers .= 'Content-type: text/html\r\n';

    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AddAddress($email);
    $mail->Send();

    echo '<script>
    setTimeout(function () { 
swal({
  title: "User exist.",
  text: "The password has been sent to your mailbox.",
  type: "success",
  confirmButtonText: "Back"
},
function(isConfirm){
  if (isConfirm) {
    window.location.href = "../index.php";
  }
}); }, 1000);</script>';
} else {
    $subject = 'Dr.Book - Find Password';
    $message = 'Your password is ' . password_verify($password2, $md5hash) . '.';

    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AddAddress($email);
    $mail->Send();

    echo '<script>
    setTimeout(function () { 
swal({
  title: "User exist.",
  text: "The password has been sent to your mailbox.",
  type: "success",
  confirmButtonText: "Back"
},
function(isConfirm){
  if (isConfirm) {
    window.location.href = "../index.php";
  }
}); }, 1000);</script>';
}
?>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
