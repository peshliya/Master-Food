<?php
require "connection.php";

if(isset($_GET["id"])){

    $product_id = $_GET["id"];

    $product_rs =Database::search("SELECT * FROM `product` WHERE `pid` = '".$product_id."'");
    $product_num = $product_rs->num_rows;

    if($product_num == 1){

        $product_data = $product_rs -> fetch_assoc();

        if($product_data["status_id"] == 1){
            Database::iud("UPDATE `product` SET `status_id` = '2' WHERE `pid` ='".$product_id."'");
            echo("Activated");
        }else if($product_data["status_id"] == 2){
            Database::iud("UPDATE `product` SET `status_id` = '1' WHERE `pid` ='".$product_id."'");
            echo ("Dactivated");
        }
    }else{
        echo("Cannot find the product. Please try again later.");
    }

}else{
    echo("Something went wrong.");
}
?>