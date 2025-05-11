<?php 
session_start();
require "connection.php";
if(isset($_SESSION["u"])){
    $email = $_SESSION["u"]["email"];

Database::iud("DELETE FROM `watchlist` WHERE `watchlist`.users_email='".$email."'");
}else{
    echo("something went wrong");
}
?>