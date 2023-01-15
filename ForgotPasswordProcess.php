<?php

require "connection.php";

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_GET["e"])) {

    $e = $_GET["e"]; 

    if (empty($e)) {
        echo "Please enter your email address";
    } else {

        $rs = Database::search("SELECT * FROM `customer` WHERE `email` = '" . $e . "'");

        if ($rs->num_rows == 1) {

            $code = uniqid();

            Database::iud("UPDATE `customer` SET `v_code` = '" . $code . "' WHERE `email` = '" . $e . "'");

            //email code
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
            $mail->addAddress($e);
            $mail->isHTML(true);
            $mail->Subject = 'NS Paradaise Forgot Password Verification Code';
            $bodyContent = '<h1 style="color:red;">Your Verification Code : ' . $code . '</h1>';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo "Verification Code sending fail";
            } else {
                echo 'Success';
            }
            //email code


            //echo "Verification email sent";
        } else {
            echo "Email address not found";
        }
    }
} else {
    echo "Please enter your email address";
}
