<?php
session_start();
require "connection.php";

$email = $_SESSION["u"]["email"];

$category = $_POST["ca"];
$items = $_POST["b"];
$type = $_POST["m"];
$title = $_POST["t"];
$condition = $_POST["con"];
$colour = $_POST["col"];
$colour_input = $_POST["col_in"];
$qty = $_POST["qty"];
$cost = $_POST["cost"];
$dwc = $_POST["dwc"];
$doc = $_POST["doc"];
$desc = $_POST["desc"];
// echo ($category);
// echo ($items);
// echo ($type);
// echo ($title);
// echo ($condition);
// echo ($colour);
// echo ($colour_input);
// echo ($qty);
// echo ($cost);
// echo ($dwc);



if($category == "0"){
    echo ("Please select a Category");
}else if($items == "0"){
    echo ("Please select a Items");
}else if($type == "0"){
    echo ("Please select a Type");
}else if(empty($title)){
    echo ("Please Enter a Title");
}else if(strlen($title) >= 100){
    echo ("Title should have lover than 100 characters");
}else if($colour == "0"){
        echo ("Please select a colour");
}else if(empty($qty)){
    echo ("Please Enter the Quantity.");
}else if($qty == "0" | $qty == "e" | $qty < 0){
    echo ("Invalid input for Quantity");
}else if(empty($cost)){
    echo ("Please Enter the Price.");
}else if(!is_numeric($cost)){
    echo ("Invalid input for Cost");
}else if(empty($dwc)){
    echo ("Please Enter the delivery fee for Colombo.");
}else if(!is_numeric($dwc)){
    echo ("Invalid input for delivery cost inside Colombo");
}else if(empty($doc)){
    echo ("Please Enter the delivery fee for out of Colombo.");
}else if(!is_numeric($doc)){
    echo ("Invalid input for delivery cost out of Colombo");
}else if(empty($desc)){
    echo ("Please Enter a Description.");
}else{
 
    $itrm_type_rs = Database::search("SELECT * FROM `type_has_items` WHERE `items_id`='".$items."' AND `type_id`='".$type."'");

    $item_has_type_id;

    if($itrm_type_rs->num_rows == 1){

        $itrm_type_data = $itrm_type_rs->fetch_assoc();
        $item_has_type_id = $itrm_type_data["id"];

    }else{

        Database::iud("INSERT INTO `type_has_items`(`items_id`,`type_id`) VALUES ('".$items."','".$type."')");
        $item_has_type_id = Database::$connection->insert_id;

    }

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

$status = 1;
// echo($date);
// echo($status);
Database::iud("INSERT INTO `product`
(`price`,`qty`, `description`, `title`, `datetime_addsd`, `delivery_fee_colombo`, 
`delivery_fee_other`, `status_id`, `condition_id`, `colour_id`, `users_email`, `type_has_items_id`, `category_id`) VALUES 
('".$cost."','".$qty."','".$desc."','".$title."','".$date."','".$dwc."','".$doc."','".$status."','".$condition."','".$colour."','".$uemail."','".$item_has_type_id."','".$category."') ");



echo("Product saved successfully");


$product_id = Database::$connection->insert_id;

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

Database::iud("INSERT INTO `images`(`cade`,`product_id`) VALUES ('".$file_name."','".$product_id."')");

}else{
echo ("Invalid Image type");
}

}
}

echo ("Product image saved successfully");

}else{
echo ("Invalid image count");
}

}



?>