<?php

session_start();

require "connection.php";

if ($_SESSION["admin"]) {

    $profilers = Database::search("SELECT * FROM `admin_profile` WHERE `admin_email` = '" . $_SESSION["admin"]["email"] . "'");

    if ($profilers->num_rows == 1) {
        Database::iud("DELETE FROM `admin_profile` WHERE `admin_email` = '" . $_SESSION["admin"]["email"] . "'");
        echo "Success";
    } else {
        echo "Invalid Request";
    }
} else {
    echo "Sign In First";
}
