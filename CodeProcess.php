<?php

require "connection.php";

$email = $_POST["email"];
$vc = $_POST["vc"];

if (empty($email)) {
    echo "Please enter your email";
} else if (empty($vc)) {
    echo "Please enter your verification code";
} else {

    $r = Database::search("SELECT * FROM `customer` WHERE `email` = '" . $email . "' AND `v_code` = '" . $vc . "'");

    if ($r->num_rows == "1") {
        Database::iud("UPDATE `customer` SET `v_status_id` = '1' WHERE `email` = '" . $email . "'");
        echo "Success";
    } else {
        echo "Invalid Code";
    }
}
