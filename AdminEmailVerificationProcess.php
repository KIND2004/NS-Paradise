<?php

require "connection.php";

if (isset($_POST["email"])) {

    $email = $_POST["email"];

    if (empty($email)) {
        echo "Please Enter Your Email";
    } else {
        $emailrs = Database::search("SELECT * FROM `admin` WHERE `email` = '" . $email . "'");

        if ($emailrs->num_rows == 1) {
            echo "Success";
        } else {
            echo "Invalid Email";
        }
    }
} else {
    echo "Invalid Request";
}
