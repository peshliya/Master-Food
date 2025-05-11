<?php 
session_start();
require "connection.php";
if(isset($_SESSION["p"])){
    $pid = $_SESSION["p"]["pid"];
echo($pid);
Database::iud("DELETE FROM `product` WHERE `pid`='".$pid."'");
echo("success");
}else{
    echo("something went wrong");
}
?>