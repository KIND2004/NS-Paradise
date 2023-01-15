<?php

session_start();

require "connection.php";

if (isset($_POST["email"])) {
    
    if (isset($_POST["code"])) {
        
        $email = $_POST["email"];
        $code = $_POST["code"];

        if (empty($email)) {
            echo "Please Enter Your Email";
        }else if(empty($code)){
            echo "Please Enter Your Verification Code";
        }else {
            
            $adminrs = Database::search("SELECT * FROM `admin` WHERE `email` = '".$email."'");
            $admin = $adminrs->fetch_assoc();

            if ($admin["verification_code"] == $code) {
                $_SESSION["admin"] = $admin;
                echo "Success";
            } else {
                echo "Invalid Code";
            }
            
            
        }

    }else {
        echo "Pease Enter Verification Code";
    }
    
} else {
    echo "Please Enter Your Email";
}
