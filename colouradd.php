<?php
require "connection.php";

$clr = $_POST["clr"];

Database::iud("INSERT INTO masterfood.colour (`name`) VALUES ('".$clr."')");

echo("success");


?>