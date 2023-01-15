<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {

    $brand = $_POST["brand"];
    $title = $_POST["title"];
    $price = $_POST["price"];
    $qty = $_POST["qty"];
    $crown = $_POST["crown"];
    $shape = $_POST["shape"];
    $caseclr = $_POST["caseclr"];
    $dialclr = $_POST["dialclr"];
    $bracelet = $_POST["bracelet"];
    $braceletclr = $_POST["braceletclr"];
    $gender = $_POST["gender"];
    $datedisplay = $_POST["datedisplay"];
    $description = $_POST["description"];
    $mail = $_SESSION["admin"]["email"];

    if ($brand == "0") {
        echo "Please Select a Brand";
    } else if (empty($title)) {
        echo "Please Add a Title";
    } else if (empty($price)) {
        echo "Please Add a Cost per Item";
    } else if (empty($qty)) {
        echo "Please Add a Qty";
    } else if ($crown == "0") {
        echo "Please Select a Crown Type";
    } else if ($shape == "0") {
        echo "Please Select a Shape";
    } else if ($caseclr == "0") {
        echo "Please Choose Case Colour";
    } else if ($dialclr == "0") {
        echo "Please Choose Dial Colour";
    } else if ($bracelet == "0") {
        echo "Please Select a Bracelet Type";
    } else if ($braceletclr == "0") {
        echo "Please Bracelet Colour";
    } else if ($gender == "0") {
        echo "Please Select a Gender";
    } else if ($datedisplay == "0") {
        echo "Please Select Date Display Type";
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

                Database::iud("INSERT INTO `product`(`brand_id`,`title`,`price`,`qty`,`crown_id`,`shape_id`,`case_color`,
                                `dial_color`,`bracelet_id`,`bracelet_color`,`gender_id`,`date_display_id`,`description`,
                                `img`,`admin_email`,`datetime_added`,`status_id`) 
                                VALUES('" . $brand . "','" . $title . "','" . $price . "','" . $qty . "','" . $crown . "','" . $shape . "','" . $caseclr . "',
                                '" . $dialclr . "','" . $bracelet . "','" . $braceletclr . "','" . $gender . "','" . $datedisplay . "','" . $description . "',
                                '" . $FileName . "','" . $mail . "','" . $datetime . "','1')");

                echo "Success";
            } else {
                echo "Please Select Valid Image. You Can Select Only PNG, JPG, JPEG or SVG Files";
            }
        }
    }
} else {
    echo "Please Sign In First";
}

// echo $brand;
// echo "<br />";
// echo $title;
// echo "<br />";
// echo $price;
// echo "<br />";
// echo $qty;
// echo "<br />";
// echo $crown;
// echo "<br />";
// echo $shape;
// echo "<br />";
// echo $caseclr;
// echo "<br />";
// echo $dialclr;
// echo "<br />";
// echo $bracelet;
// echo "<br />";
// echo $braceletclr;
// echo "<br />";
// echo $gender;
// echo "<br />";
// echo $datedisplay;
// echo "<br />";
// echo $description;
// echo "<br />";
// echo $FileName;
// echo "<br />";
// echo $mail;
// echo "<br />";
// echo $datetime;
// echo "<br />";