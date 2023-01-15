<?php

session_start();

require "connection.php";

if ($_SESSION["user"]) {

    $email = $_SESSION["user"]["email"];

    if (isset($_POST["content"]) && isset($_POST["product_id"])) {

        $content = $_POST["content"];
        
        if (empty($content)) {
            echo "Please Add a Feedback";
        } else {
            $product_id = $_POST["product_id"];

            $d = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tz);
            $date = $d->format("Y-m-d H:i:s");

            Database::iud("INSERT INTO `feedback`(`datetime`,`content`,`customer_email`,`product_id`) 
            VALUES('" . $date . "','" . $content . "','" . $email . "','" . $product_id . "')");
            echo "Success";
        }
    } else {
        echo "Invalid Request";
    }
} else {
    echo "Please Sign In First";
}
