<?php

session_start();

require "connection.php";

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

if ($_SESSION["admin"]) {

    if (isset($_POST["email"])) {

        if (empty($_POST["msg"])) {
            echo "Please Type Your Message";
        } else {

            $admin = $_SESSION["admin"]["email"];
            $email = $_POST["email"];
            $msg = $_POST["msg"];

            $d = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tz);
            $date = $d->format("Y-m-d H:i:s");

            Database::iud("INSERT INTO `message`(`customer_email`,`admin_email`,`msg`,`datetime`) VALUES('" . $email . "','" . $admin . "','" . $msg . "','" . $date . "')");

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
            $mail->Subject = 'NS Paradaise';
            $bodyContent = '' . $msg . '';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo "Verification Code sending fail";
            } else {
                echo 'Success';
            }
        }
    } else {
        echo "Invalid Request";
    }
} else {
    echo "Please Sign In First";
}
