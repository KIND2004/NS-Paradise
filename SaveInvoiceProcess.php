<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    $email = $_SESSION["user"]["email"];

    $orderid = $_POST["orderid"];
    $qty = $_POST["qty"];
    $total = $_POST["total"];
    $delivery_address = $_POST["delivery_address"];
    $delivery_city = $_POST["delivery_city"];
    $product_id = $_POST["product_id"];
    $postalcode = $_POST["postalcode"];
    $district = $_POST["district"];
    $province = $_POST["province"];

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `invoice`(`order_id`,`datetime`,`qty`,`total`,`customer_email`,`product_id`) 
    VALUES('" . $orderid . "','" . $date . "','" . $qty . "','" . $total . "','" . $email . "','" . $product_id . "')");

    $invoicers = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $orderid . "'");
    $invoice = $invoicers->fetch_assoc();

    $cityrs = Database::search("SELECT * FROM `city` WHERE  `name` = '" . $delivery_city . "' AND `postalcode` = '" . $postalcode . "'");

    if ($cityrs->num_rows == 1) {
        $cityid = $cityrs->fetch_assoc();
        Database::iud("INSERT INTO `delivery_details`(`address`,`city_id`,`invoice_id`) VALUES('" . $delivery_address . "','" . $cityid["id"] . "','" . $invoice["id"] . "')");
    } else {
        Database::iud("INSERT INTO `city`(`name`,`postalcode`,`district_id`) VALUES('" . $delivery_city . "','" . $postalcode . "','" . $district . "')");

        $newcityrs = Database::search("SELECT * FROM `city` WHERE  `name` = '" . $delivery_city . "' AND `postalcode` = '" . $postalcode . "'");
        $newcity = $newcityrs->fetch_assoc();

        Database::iud("INSERT INTO `delivery_details`(`address`,`city_id`,`invoice_id`) VALUES('" . $delivery_address . "','" . $newcity["id"] . "','" . $invoice["id"] . "')");
    }

    Database::iud("DELETE FROM `cart` WHERE `product_id` = '" . $product_id . "' AND `customer_email` = '" . $email . "'");

    Database::iud("DELETE FROM `watchlist` WHERE `product_id` = '" . $product_id . "' AND `customer_email` = '" . $email . "'");

    echo "Success";

} else {

    echo "Please Sign In First";

}
