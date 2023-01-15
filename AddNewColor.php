<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {

    if (empty($_GET["color"])) {
        echo "Please Enter the Color";
    } else {

        $color = $_GET["color"];

        $colorrs = Database::search("SELECT * FROM `color` WHERE `name` = '" . $color . "'");

        if ($colorrs->num_rows == 1) {
            echo "This Color Already Exists";
        } else {
            Database::iud("INSERT INTO `color`(`name`) VALUES('" . $color . "')");
            echo "Success";
        }

    }

} else {
    echo "Please Sign In First";
}

?>