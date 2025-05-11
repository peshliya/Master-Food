<?php
 require "connection.php";
 session_start();

 require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;


   if(isset($_POST["e"])){
    $email = $_POST["e"];

    $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email` ='".$email."'");
    $admin_num = $admin_rs-> num_rows;

    if($admin_num > 0){
$code = uniqid();
Database::iud("UPDATE `admin` SET `verification_code`='".$code."' WHERE `email`='".$email."'");

$mail = new PHPMailer;

$mail->IsSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'peshliya123@gmail.com';
$mail->Password = '123456';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('peshliya123@gmail.com', 'Admin Verification');
$mail->addReplyTo('peshliya123@gmail.com', 'Admin Verification ');
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject = 'MasterFood Admin LogIN Verification Code';
$bodyContent = '<h1 style="color:green;">Your Verification code is '.$code.'</h1>';
$mail->Body    = $bodyContent;

if (!$mail->send()) {
    echo 'Verification code sending failed';
} else {
    echo 'Success';
}

    }else{
        echo("You are not a valid user.");
    }

   }else{
    echo("Email feild should not be empty.");
   }
?>