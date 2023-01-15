<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    $email = $_SESSION["user"]["email"];

    $customer_rs = Database::search("SELECT * FROM `customer` WHERE `email` = '" . $email . "'");
    $customer = $customer_rs->fetch_assoc();

    if ($customer["v_status_id"] == 1) {

        if (isset($_GET["id"])) {

            $id = $_GET["id"];

            $watchlistrs = Database::search("SELECT * FROM `watchlist` WHERE `product_id` = '" . $id . "' AND `customer_email` = '" . $email . "'");
            $n = $watchlistrs->num_rows;

            if ($n == 1) {
                echo "You Have Recently Addded this Product to the Watchlist.";
            } else {

                $d = new DateTime();
                $tz = new DateTimeZone("Asia/Colombo");
                $d->setTimezone($tz);
                $datetime = $d->format("Y-m-d H:i:s");

                Database::iud("INSERT INTO `watchlist` (`datetime_added`,`product_id`,`customer_email`) VALUES('" . $datetime . "','" . $id . "','" . $email . "')");

                echo "Success";
            }
            
        } else {
            echo "Invalid Product";
        }
    } else {
        echo "Please Verify Your Account in My Profile";
    }
} else {
    echo "Sign In First";
}
