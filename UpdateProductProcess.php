<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {

    if (isset($_POST["id"])) {

        $id = $_POST["id"];
        $title = $_POST["title"];
        $price = $_POST["price"];
        $qty = $_POST["qty"];
        $description = $_POST["description"];

        if (empty($title)) {
            echo "Please Add a Title";
        } else if (empty($price)) {
            echo "Please Add a Cost per Item";
        } else if (empty($qty)) {
            echo "Please Add a Qty";
        } else {

            if (!isset($_FILES["img"])) {
                echo "Please Add Product Image";
            } else {

                $allowed_image_extension = array("png", "jpg", "jpeg", "svg");

                $file_extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);

                if (in_array($file_extension, $allowed_image_extension)) {
                    $d = new DateTime();
                    $tz = new DateTimeZone("Asia/Colombo");
                    $d->setTimezone($tz);
                    $datetime = $d->format("Y-m-d H:i:s");

                    $FileName = "Resources//Products//" . uniqid() . $_FILES["img"]["name"];
                    move_uploaded_file($_FILES["img"]["tmp_name"], $FileName);

                    Database::iud("UPDATE `product` SET `title` = '" . $title . "',`price` = '" . $price . "' ,`qty` = '" . $qty . "',`description` = '" . $description . "',`img` = '" . $FileName . "'
                    WHERE `id` = '" . $id . "'");

                    echo "Success";
                } else {
                    echo "Please Select Valid Image. You Can Select Only PNG, JPG, JPEG or SVG Files";
                }
            }
        }
    } else {
        echo "Invalid Request";
    }
} else {
    echo "Please Sign In First";
}
