<?php
require "connection.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$cemail = $_POST["cemail"];
$pw = $_POST["pw"];
$gender = $_POST["gender"];

if(empty($fname)){
    echo("Please enter your first name");
}else if (strlen($fname)>44) {
    echo("Your first name is too long.");
}else if(empty($lname)){
    echo("Please enter your last name");
}elseif(strlen($lname)>44){
 echo("Your last name is too long");
}elseif(empty($email)){
    echo("Please enter your email");
}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo("Please enter valid email");
}elseif(empty($cemail)){
    echo("Please re-enter your email");
}elseif(!($email == $cemail)){
    echo("Email is not match");
}elseif(empty($pw)){
    echo("Please enter your password");
}elseif(strlen($pw) <5 || strlen($pw) >20){
echo("Password must be 5-20 characters");
}elseif ($gender == 0){
 echo ("Please select your gender!!!");
} else{

    $rs = Database::search("SELECT * FROM `users` WHERE `email`='".$email."' ");
    $n = $rs->num_rows;
    
    if($n > 0){
        echo ("User with the same Email already exists.");
    }else{
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");
    
        Database::iud("INSERT INTO `users`(`email`,`fname`,`lname`,`password`,`joined_date`,`status`,`gender_id`)VALUES ('".$email."','".$fname."','".$lname."','".$pw."','".$date."','1','".$gender."') ");
    
        echo "success";
    
    }
}


?>