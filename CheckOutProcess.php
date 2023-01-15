<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    $email = $_SESSION["user"]["email"];

    $array;

    $line1 = $_POST["line1"];
    $line2 = $_POST["line2"];
    $city = $_POST["city"];
    $postalcode = $_POST["postalcode"];
    $district = $_POST["district"];
    $province = $_POST["province"];

    if (empty($line1)) {
        echo "Please Enter Address Line 1";
    } else if (empty($city)) {
        echo "Please Enter Your City";
    } else if (empty($postalcode)) {
        echo "Please Enter Your Postal Code";
    } else if ($postalcode <  5) {
        echo "Invalid Postal Code";
    } else {

        $orderid = uniqid();

        $array['orderid'] = $orderid;

        $totalprice = "00";

        $title = "";

        $cartrs = Database::search("SELECT * FROM `cart` WHERE `customer_email` = '" . $email . "'");

        for ($x = 0; $x < $cartrs->num_rows; $x++) {

            $cart = $cartrs->fetch_assoc();

            $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $cart["product_id"] . "'");
            $product = $productrs->fetch_assoc();

            $title = $title . "(" . $product["title"] . ")";

            $total = $product["price"] * $cart["qty"];

            $totalprice = $totalprice + $total;
        }

        $array['title'] = $title;

        $array['price'] = $totalprice;

        $customerrs = Database::search("SELECT * FROM `customer` WHERE `email` = '" . $email . "'");

        if ($customerrs->num_rows == 1) {

            $customer = $customerrs->fetch_assoc();

            $array['fname'] = $customer["fname"];
            $array['lname'] = $customer["lname"];
            $array['email'] = $customer["email"];

            $customer_has_addressrs = Database::search("SELECT `customer_has_address`.`line1`, `customer_has_address`.`line2`, `customer_has_address`.`customer_email`, 
                    `city`.`name` AS `city` FROM `customer_has_address` INNER JOIN `city` ON `customer_has_address`.`city_id` = `city`.`id` WHERE `customer_email` = '" . $email . "'");

            if ($customer_has_addressrs->num_rows == 1) {

                $customer_has_address = $customer_has_addressrs->fetch_assoc();

                $array['address'] = $customer_has_address["line1"] . " " . $customer_has_address["line2"];
                $array['city'] = $customer_has_address["city"];
            } else {
                $array['address'] = $line1 . " " . $line2;
                $array['city'] = $city;
            }
            $array['delivery_address'] = $line1 . " " . $line2;
            $array['delivery_city'] = $city;
        } else {
            echo "Invalid User";
        }
        echo json_encode($array);
    }
} else {
    echo "Please Sign In First";
}
