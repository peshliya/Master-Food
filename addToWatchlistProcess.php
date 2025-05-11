<?php
session_start();
require "connection.php";

if(isset($_SESSION["u"])){

if(isset($_GET["pid"])){
        $email = $_SESSION["u"]["email"];
        $pid = $_GET["pid"];

        $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `users_email`='" . $email . "' AND `product_id`= '" . $pid . "'");
        $watchlist_num = $watchlist_rs->num_rows;

        if($watchlist_num == 1){

            $watchlist_data = $watchlist_rs->fetch_assoc();
            $like_id = $watchlist_data["id"];

            Database::iud("DELETE FROM `watchlist` WHERE `id`='" . $like_id . "' ");
            echo ("removed");
        }else{
            Database::iud("INSERT INTO `watchlist` (`product_id`,`users_email`)VALUES ('" . $pid . "','" . $email . "')");
            echo ("added");
        }
}else{
        echo ("Somthing went wrong!!");
}
}else{
    echo ("Please Loging or Register");
}
?>