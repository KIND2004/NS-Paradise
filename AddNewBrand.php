<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {

    if (empty($_GET["brand"])) {
        echo "Please Enter the Brand";
    } else {

        $brand = $_GET["brand"];

        $brandrs = Database::search("SELECT * FROM `brand` WHERE `name` = '" . $brand . "'");

        if ($brandrs->num_rows == 1) {
            echo "This Brand Already Exists";
        } else {
            Database::iud("INSERT INTO `brand`(`name`) VALUES('" . $brand . "')");
            echo "Success";
        }

    }

} else {
    echo "Please Sign In First";
}

?>