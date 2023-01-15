<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];

    if (empty($fname)) {
        echo "Please Enter First Name";
    } else if (empty($lname)) {
        echo "Please Enter Last Name";
    } else if (empty($email)) {
        echo "Please Enter Email";
    } else {

        $adminrs = Database::search("SELECT * FROM `admin` WHERE `email` = '" . $email . "'");

        if ($adminrs->num_rows == 0) {
            Database::iud("INSERT INTO `admin`(`email`,`fname`,`lname`) VALUES('" . $email . "','" . $fname . "','" . $lname . "')");
            echo "Success";
        } else {
            echo "This Email Already Exists";
        }
    }
} else {
    echo "Please Sign In First";
}
