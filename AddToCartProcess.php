<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    $email = $_SESSION["user"]["email"];

    $customer_rs = Database::search("SELECT * FROM `customer` WHERE `email` = '" . $email . "'");
    $customer = $customer_rs->fetch_assoc();

    if ($customer["v_status_id"] == 1) {
        if (isset($_GET["id"])) {

            if (isset($_GET["qty"])) {

                $id = $_GET["id"];
                $qty = $_GET["qty"];

                if ($qty == 0) {
                    echo "Please add a quantity";
                } else {

                    $cartrs = Database::search("SELECT * FROM `cart` WHERE `customer_email` = '" . $email . "' AND `product_id` = '" . $id . "'");
                    $cn = $cartrs->num_rows;

                    if ($cn == 1) {
                        echo "This Product is already exists in your Cart.";
                    } else {

                        $productrs = Database::search("SELECT `qty` FROM `product` WHERE `id` = '" . $id . "'");
                        $pr = $productrs->fetch_assoc();

                        if ($pr["qty"] >= $qty) {
                            $d = new DateTime();
                            $tz = new DateTimeZone("Asia/Colombo");
                            $d->setTimezone($tz);
                            $date = $d->format("Y-m-d H:i:s");
                            Database::iud("INSERT INTO `cart`(`datetime_added`,`qty`,`customer_email`,`product_id`) VALUES('" . $date . "','" . $qty . "','" . $email . "','" . $id . "')");
                            echo "Success";
                        } else {
                            echo  "Please enter a valid Quantity below " . $pr['qty'] . ".";
                        }
                    }
                }
            } else {
                echo "Please Add a Quantity";
            }
        } else {
            echo "Invalid Product";
        }
    } else {
        echo "Please Verify Your Account in My Profile";
    }
} else {
    echo "Please Sign In First";
}
