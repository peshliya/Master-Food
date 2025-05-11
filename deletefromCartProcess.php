<?php
require "connection.php"; 
session_start();

if(isset($_SESSION["u"])){
$email = $_SESSION["u"]["email"];
$pid = $_GET["pid"];



    Database::iud("INSERT INTO `recent`(product_id,users_email)VALUES ('".$pid."','".$email."')");
Database::iud("DELETE FROM `cart` WHERE `product_id`='".$pid."'");
echo("success");

}else{
    echo("Please Login First");
}
?>