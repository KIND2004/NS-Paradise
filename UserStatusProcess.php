<?php

session_start();

require "connection.php";

if ($_SESSION["admin"]) {

    if (isset($_POST["email"])) {

        $email = $_POST["email"];

        $customerrs = Database::search("SELECT * FROM `customer` WHERE `email` = '" . $email . "'");

        if ($customerrs->num_rows == 1) {

            $customer = $customerrs->fetch_assoc();

            $status = $customer["status_id"];

            if ($status == "1") {
                Database::iud("UPDATE `customer` SET `status_id` = '2' WHERE `email` = '" . $email . "'");
                echo "Deactivated";
            } else {
                Database::iud("UPDATE `customer` SET `status_id` = '1' WHERE `email` = '" . $email . "'");
                echo "Activated";
            }

        } else {
            echo "Invalid Customer";
        }
    } else {
        echo "Invalid Request";
    }
} else {
    echo "Please Sign In First";
}
