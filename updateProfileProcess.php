<?php

session_start();

require "connection.php"; 

if (isset($_SESSION["u"])) {

    $fname = $_POST["fn"];
    $lname = $_POST["ln"];
    $mobile = $_POST["m"];
    $line1 = $_POST["l1"];
    $line2 = $_POST["l2"];
    $province = $_POST["p"];
    $district = $_POST["d"];
    $city = $_POST["c"];
    $pcode = $_POST["pc"];

    if (isset($_FILES["image"])) {
        $image = $_FILES["image"];

        $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
        $file_ex = $image["type"];

        if (!in_array($file_ex, $allowed_image_extentions)) {
            echo ("Please select a valid image.");
        } else {

            $new_file_extention;

            if ($file_ex == "image/jpg") {
                $new_file_extention = ".jpg";
            } else if ($file_ex == "image/jpeg") {
                $new_file_extention = ".jpeg";
            } else if ($file_ex == "image/png") {
                $new_file_extention = ".png";
            } else if ($file_ex == "image/svg+xml") {
                $new_file_extention = ".svg";
            }

            $file_name = "resource/" . $_SESSION["u"]["fname"] . "_" . uniqid() . $new_file_extention;

            move_uploaded_file($image["tmp_name"], $file_name);

            $image_rs = Database::search("SELECT * FROM `profile_image` WHERE 
            `users_email`='" . $_SESSION["u"]["email"] . "'");
            $image_num = $image_rs->num_rows;

            if ($image_num == 1) {

                Database::iud("UPDATE `profile_image` SET `path`='" . $file_name . "' WHERE 
                `users_email`='" . $_SESSION["u"]["email"] . "'");
            } else {

                Database::iud("INSERT INTO `profile_image` (`path`,`users_email`) VALUES 
                ('" . $file_name . "','" . $_SESSION["u"]["email"] . "')");
            }
        }
    }

   

    Database::iud("UPDATE `users` SET `fname`='" . $fname . "',`lname`='" . $lname . "',`mobile`='" . $mobile . "' 
            WHERE `email`='" . $_SESSION["u"]["email"] . "'");

    $address_rs = Database::search("SELECT * FROM `users_has_adderss` WHERE 
            `users_email`='" . $_SESSION["u"]["email"] . "'");
    $address_num = $address_rs->num_rows;

    if ($address_num == 1) {

        Database::iud("UPDATE `users_has_adderss` SET `line_1`='" . $line1 . "',
                `line_2`='" . $line2 . "',
                `city_id`='" . $city . "',
                `postal_code`='" . $pcode . "' WHERE `users_email`='" . $_SESSION["u"]["email"] . "'");
    } else {

        Database::iud("INSERT INTO `users_has_adderss`
        (`line_1`,`line_2`,`users_email`,`city_id`,`postal_code`) VALUES 
        ('" . $line1 . "','" . $line2 . "','" . $_SESSION["u"]["email"] . "','" . $city . "','" . $pcode . "')");
    }

    echo ("success");

  

} else {
   
    echo ("Please login first");
}
