<?php 
session_start();
require "connection.php";
echo("ok now here saveinvoice");
if(isset($_SESSION["u"])){
    $semail = $_SESSION["u"]["email"];
    $order_id = $_POST["o"];
    $pid = $_POST["i"];
    $mail = $_POST["m"];
    $amount = $_POST["a"];
    $qty = $_POST["q"];

    $product_rs = Database::search("SELECT * FROM `product` WHERE `pid` = '".$pid."'");
    $product_data = $product_rs->fetch_assoc();

    $current_qty = $product_data["qty"];
    $new_qty = $current_qty - $qty;

    Database::iud("UPDATE `product` SET  `qty` = '".$new_qty."' WHERE `pid`='".$pid."'");

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `invoice` (`order_id`,`date`,`total`,`qty`,`status`,`product_id`,`users_email`)
    VALUES ('".$order_id."','".$date."','".$amount."','".$qty."','0','".$pid."','".$semail."')");

    echo("1");

}
?>