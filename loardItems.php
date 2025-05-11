<?php
require "connection.php";
 if(isset ($_GET["category"])){
    $category = $_GET["category"];
echo($category);
   $chi_rs = Database::search("SELECT * FROM `category_has_items` WHERE `category_id`='".$category."'");
   $chi_num = $chi_rs->num_rows;

   for($x=0; $x<$chi_num ;$x++){
$chi_data = $chi_rs-> fetch_assoc();

$items_rs = Database::search("SELECT * FROM `items` WHERE id='".$chi_data["items_id"]."'");
$items_data = $items_rs->fetch_assoc();

?>
<option value="<?php echo $items_data["id"]; ?>"><?php echo $items_data["name"]; ?></option>
<?php

   }
 }

?>