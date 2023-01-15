<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {

    $email = $_SESSION["admin"]["email"];

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];

    if (empty($fname)) {
        echo "Please Enter Your First Name";
    } else if (empty($lname)) {
        echo "Please Enter Your Last Name";
    } else {

        Database::iud("UPDATE `admin` SET `fname` = '" . $fname . "',`lname` = '" . $lname . "' WHERE `email` = '" . $email . "'");

        if (isset($_FILES["img"])) {

            $allowed_image_extension = array("png", "jpg", "jpeg", "svg");

            $file_extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);

            if (in_array($file_extension, $allowed_image_extension)) {
                $FileName = "Resources//AdminProfile//" . uniqid() . $_FILES["img"]["name"];
                move_uploaded_file($_FILES["img"]["tmp_name"], $FileName);

                $profilers = Database::search("SELECT * FROM `admin_profile` WHERE `admin_email` = '" . $email . "'");

                if ($profilers->num_rows == 1) {
                    Database::iud("UPDATE `admin_profile` SET `code` = '" . $FileName . "' WHERE `admin_email` = '" . $email . "'");
                } else {
                    Database::iud("INSERT INTO `admin_profile`(`code`,`admin_email`) VALUES('" . $FileName . "','" . $email . "')");
                }
            } else {
                echo "Please Select Valid Image. You Can Select Only PNG, JPG, JPEG or SVG Files";
            }
        }
        echo "Success";
    }
} else {
    echo "Please Sign In First";
}
