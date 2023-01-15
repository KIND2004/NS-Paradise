<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {
    $email = $_SESSION["user"]["email"];

    $customerrs = Database::search("SELECT * FROM `customer` WHERE `email` = '" . $email . "'");
    $customer = $customerrs->fetch_assoc();

    if ($customer["v_status_id"] == 1) {
        echo "Success";
    } else {
        echo "Please Verify your Email in My Profile";
    }
} else {
    echo "Please Sign In First";
}
