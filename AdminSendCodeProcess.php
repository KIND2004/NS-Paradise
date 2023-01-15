<?php

require "connection.php";

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST["email"])) {

    $email = $_POST["email"];
    $code = uniqid();

    Database::search("UPDATE `admin` SET `verification_code` = '" . $code . "' WHERE `email` = '" . $email . "'");

    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'abdullahzufar414@gmail.com';
    $mail->Password = 'awowynomgttfmugm';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('abdullahzufar414@gmail.com', 'NS Paradaise');
    $mail->addReplyTo('abdullahzufar414@gmail.com', 'NS Paradaise');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'NS Paradaise Email Verification Code';
    $bodyContent = '<h1 style="color: red;">Your Verification Code : ' . $code . '</h1>';
    $mail->Body    = $bodyContent;

    if (!$mail->send()) {
        echo "Verification Code sending fail";
    } else {
        echo 'Success';
    }
} else {
    echo "Please Add your Email";
}
