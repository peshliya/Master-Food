<?php

session_start();
require "connection.php";

$email = $_SESSION["u"]["email"];
$product = $_SESSION["p"];
$title = $product['title'];
// echo($title);
// echo($product['pid']);
$description = $_POST["description"];
$price = $_POST["price"];
$qty = $_POST["qty"];

// echo($description);
// echo($price);
// echo($qty);
if(empty($price)){
    echo ("Please Enter the price.");
}else if(empty($qty)){
    echo ("Please Enter quantity.");
    }else if($qty == "0" | $qty == "e" | $qty < 0){
        echo ("Invalid input for Quantity");
    }else if(!is_numeric($price)){
        echo ("Invalid input for Cost");
    }else if(empty($description)){
    echo ("Please Enter a Description.");
}else{
    
    $product_rs = Database::search("SELECT * FROM `product` WHERE `pid`='".$product['pid']."' AND `users_email`='".$email."'");
$product_data = $product_rs->fetch_assoc();
    // $model_has_brand_id;



    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");


    Database::iud("UPDATE `product` SET `qty` = '".$qty."' ,`description`='".$description."',`price`='".$price."' WHERE `pid`='".$product_data['pid']."' ");
echo("product save successful");

    $length = sizeof($_FILES);

    if($length <= 3 && $length > 0){

        $allowed_img_extentions = array ("image/jpg","image/jpeg","image/png","image/svg+xml");

for($x = 0; $x < $length;$x++){
if(isset($_FILES["image".$x])){

$img_file = $_FILES["image".$x];
$file_extention = $img_file["type"];

if(in_array($file_extention,$allowed_img_extentions)){

$new_img_extention;

if($file_extention == "image/jpg"){
$new_img_extention = ".jpg";
}else if($file_extention == "image/jpeg"){
$new_img_extention = ".jpeg";
}else if($file_extention == "image/png"){
$new_img_extention = ".png";
}else if($file_extention == "image/svg+xml"){
$new_img_extention = ".svg";
}

$file_name = "resource//item//".$title."_".$x."_".uniqid().$new_img_extention;
move_uploaded_file($img_file["tmp_name"],$file_name);

Database::iud("INSERT INTO `images`(`cade`,`product_id`) VALUES ('".$file_name."','".$product_data['pid']."')");
echo("success");

}else{
echo ("File type not allowed");
}

}
}

}
else{
echo ("Invalid image count");
}
    
    
    
}

?>