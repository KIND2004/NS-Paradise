<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {

    if (empty($_GET["bracelet"])) {
        echo "Please Enter the Bracelet";
    } else {

        $bracelet = $_GET["bracelet"];

        $braceletrs = Database::search("SELECT * FROM `bracelet` WHERE `name` = '" . $bracelet . "'");

        if ($braceletrs->num_rows == 1) {
            echo "This Bracelet Already Exists";
        } else {
            Database::iud("INSERT INTO `bracelet`(`name`) VALUES('" . $bracelet . "')");
            echo "Success";
        }

    }

} else {
    echo "Please Sign In First";
}

?>