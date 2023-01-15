<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {

    if (empty($_GET["crown"])) {
        echo "Please Enter the Crown";
    } else {

        $crown = $_GET["crown"];

        $crownrs = Database::search("SELECT * FROM `crown` WHERE `name` = '" . $crown . "'");

        if ($crownrs->num_rows == 1) {
            echo "This Crown Already Exists";
        } else {
            Database::iud("INSERT INTO `crown`(`name`) VALUES('" . $crown . "')");
            echo "Success";
        }

    }

} else {
    echo "Please Sign In First";
}

?>