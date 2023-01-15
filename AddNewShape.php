<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {

    if (empty($_GET["shape"])) {
        echo "Please Enter the Shape";
    } else {

        $shape = $_GET["shape"];

        $shapers = Database::search("SELECT * FROM `shape` WHERE `name` = '" . $shape . "'");

        if ($shapers->num_rows == 1) {
            echo "This Shape Already Exists";
        } else {
            Database::iud("INSERT INTO `shape`(`name`) VALUES('" . $shape . "')");
            echo "Success";
        }

    }

} else {
    echo "Please Sign In First";
}

?>