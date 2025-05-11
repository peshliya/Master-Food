<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])){
$umail = $_SESSION["u"]["email"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Food | seller Food view page</title>
    <link rel="icon" href="resource/download.webp"/>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="style.css" />
</head>
<body class="productregbackimg opacity-100">
<div class=" col-12 container-fluid " style="background-color:rgba(90, 200, 198, 0.21);">

    <div class="row">
<?php
$u_rs = Database::search("SELECT * FROM `users` WHERE `email`='".$umail."' ");
$u_data = $u_rs-> fetch_assoc();
?>

<!-- sliderbar -->
    <div class="offcanvas offcanvas-start show text-bg-dark " style="width: 200px ;" tabindex="-1"  aria-labelledby="offcanvasDarkLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" >Hi,<br> <?php echo $u_data["fname"]." ".$u_data["lname"]; ?></h5>
    <!-- <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvasDark" aria-label="Close"></button> -->
  </div>
  <div class="offcanvas-body">
<p> 
        <div  class="list-group">
          <?php
          $items_rs = Database::search("SELECT * FROM `items`");
          $items_num = $items_rs-> num_rows;

          for($x = 0 ; $x <$items_num ; $x++){
            $items_data = $items_rs-> fetch_assoc();
            ?>
<a  class="text-decoration-none text-light"  href="#list-item-'<?php echo $items_data["id"]; ?>'"><?php echo $items_data["name"]; ?>  &blacktriangleright;</a>

            <?php
          }

          ?>
      
    
    </div>


</p>
<a class="text-decoration-none text-light" href="home.php">Home page</a><br/>
<a class="text-decoration-none text-light" href="index.php">Sign out</a>
  </div>

  
</div> 

<!-- sliderbar -->
 
<div class=" offset-2 col-10">
    <div class=" row">
        <div class="mb-2"><h1>My Foods</h1></div>

 <?php  
     $item_rs = Database::search("SELECT * FROM `items`");
     $item_num = $items_rs-> num_rows;
 for($y =0; $y < $item_num ;  $y++){
  
  $item_data =$item_rs->fetch_assoc();
?>
  <div class="col-12" >
  <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
    <h4 id="list-item-'<?php echo $item_data["id"]; ?>'"><?php echo $item_data["name"]; ?>  &blacktriangleright;</h4>

    <?php
   
   if($item_data["id"]==1){
?>
<p> 

    
<div class="col-12 row mb-1 bg-secondary text-light">
  <div class="col-1 text-start ">Image</div>
  <div class="col-2 text-start">Name</div>
  <div class="col-4 text-start">Description</div>
  <div class="col-1 text-start">Update</div>
  <div class="col-2 text-start">Price</div>
  <div class="col-1 text-start">Qty</div>
  <div class="col-1" ><i class="bi bi-trash3-fill"></i></div>
  </div>
  <?php
  $pots_rs = Database::search("SELECT *
  FROM `product` 
  INNER JOIN type_has_items ON `product`.`type_has_items_id` = `type_has_items`.`id`
  INNER JOIN items ON `type_has_items`.`items_id` = `items`.`id` 
  WHERE `product`.`users_email` ='".$umail."' AND `items`.`name`='pots' ");
$pots_num = $pots_rs->num_rows;
for($pot = 0 ; $pot < $pots_num; $pot++){
  $pot_data = $pots_rs-> fetch_assoc();
  ?>
  <div class="col-12 row mb-1 ">
    <?php 
    $pot_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$pot_data["pid"]."'");
    $pot_img_num = $pot_img_rs-> num_rows;
    $pot_img_data = $pot_img_rs->fetch_assoc();
    ?>
  <div class="col-1  text-start alo"><img src="<?php echo $pot_img_data["cade"]; ?>" alt="" style="height: 70px;"/></div>
  <div class="col-2 text-start alo"><?php echo $pot_data["title"]; ?></div>
  <div class="col-4 text-start alo"><?php echo $pot_data["description"]; ?></div>
  <div class="col-1 text-start alo" >  <a class="text-decoration-none text-black activeupdate " style="cursor:pointer;" onclick="sendid(<?php echo  $pot_data['pid'];?>);">Update</a></div>

  <div class="col-2 text-start alo">Rs. <?php echo $pot_data["price"]; ?> .00</div>
  <div class="col-1 text-start alo"><?php echo $pot_data["qty"]; ?></div>
  <div class="col-1 alo" onclick="deleteProductsBySeller();"><a href="deletehere.php" class=" text-decoration-none text-dark"><i class="bi bi-trash3-fill"></i></a>del</div>
  </div>
  <?php

}

  ?>

<div class=" col-12 mb-1 text-start">
<div class=" col-2 alo "><a class=" text-decoration-none text-dark" href="productregisterationpage.php" >+add</a></div>
</div>
<div class=" col-12 mb-1 text-start">
<div class=" col-2 alo"><a class=" text-decoration-none text-dark" href="productregisterationpage.php" >+add</a></div>
</div>
  
    </p>  
<?php

   }
   ?>

   
<?php
   
   if($item_data["id"]==2){
?>
<p> 
    
<div class="col-12 row mb-1 bg-secondary text-light">
  <div class="col-1 text-start">Image</div>
  <div class="col-2 text-start">Name</div>
  <div class="col-4 text-start">Description</div>
  <div class="col-1 text-start">Update</div>
  <div class="col-2 text-start">Price</div>
  <div class="col-1 text-start">Qty</div>
  <div class="col-1" ><i class="bi bi-trash3-fill"></i></div>
  </div>
  <?php
  $orchidmixes_rs = Database::search("SELECT *
  FROM `product` 
  INNER JOIN type_has_items ON `product`.`type_has_items_id` = `type_has_items`.`id`
  INNER JOIN items ON `type_has_items`.`items_id` = `items`.`id` 
  WHERE `product`.`users_email` ='".$umail."' AND `items`.`name`='orchid mixes' ");
$orchidmixes_num = $orchidmixes_rs->num_rows;
for($o = 0 ; $o < $orchidmixes_num; $o++){
  $orchidmixes_data = $orchidmixes_rs-> fetch_assoc();
  ?>
  <div class="col-12 row mb-1 ">
    <?php 
    $orchidmixes_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$orchidmixes_data["pid"]."'");
    $orchidmixes_img_num = $orchidmixes_img_rs-> num_rows;
    $orchidmixes_img_data = $orchidmixes_img_rs->fetch_assoc();
    ?>
  <div class="col-1  text-start alo"><img src="<?php echo $orchidmixes_img_data["cade"]; ?>" alt="" style="height: 70px;"/></div>
  <div class="col-2 text-start alo"><?php echo $orchidmixes_data["title"]; ?></div>
  <div class="col-4 text-start alo"><?php echo $orchidmixes_data["description"]; ?></div>
  <div class="col-1 text-start alo"><a href="update.php" class="text-decoration-none text-dark ">Update</a></div>
  <div class="col-2 text-start alo">Rs. <?php echo $orchidmixes_data["price"]; ?> .00</div>
  <div class="col-1 text-start alo"><?php echo $orchidmixes_data["qty"]; ?></div>
  <div class="col-1 alo" ><a href="deletehere.php" class=" text-decoration-none text-dark"><i class="bi bi-trash3-fill"></i></a></div>
  </div>
  <?php

}

  ?>

<div class=" col-12 mb-1 text-start">
<div class=" col-2 alo"><a class=" text-decoration-none text-dark" href="productregisterationpage.php" >+add</a></div>
</div>
<div class=" col-12 mb-1 text-start">
<div class=" col-2 alo"><a class=" text-decoration-none text-dark" href="productregisterationpage.php" >+add</a></div>
</div>
  
</p>  
<?php

   }
   ?>

   
<?php
   
   if($item_data["id"]==3){
?>
<p> 
      
<div class="col-12 row mb-1 bg-secondary text-light">
  <div class="col-1 text-start">Image</div>
  <div class="col-2 text-start">Name</div>
  <div class="col-4 text-start">Description</div>
  <div class="col-1 text-start">Update</div>
  <div class="col-2 text-start">Price</div>
  <div class="col-1 text-start">Qty</div>
  <div class="col-1" ><i class="bi bi-trash3-fill"></i></div>
  </div>
  <?php
  $fertilizers_rs = Database::search("SELECT *
  FROM `product` 
  INNER JOIN type_has_items ON `product`.`type_has_items_id` = `type_has_items`.`id`
  INNER JOIN items ON `type_has_items`.`items_id` = `items`.`id` 
  WHERE `product`.`users_email` ='".$umail."' AND `items`.`name`='fertilizers' ");
$fertilizers_num = $fertilizers_rs->num_rows;
for($f = 0 ; $f < $fertilizers_num; $f++){
  $fertilizers_data = $fertilizers_rs-> fetch_assoc();
  ?>
  <div class="col-12 row mb-1 ">
    <?php 
    $fertilizers_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$fertilizers_data["pid"]."'");
    $fertilizers_img_num = $fertilizers_img_rs-> num_rows;
    $fertilizers_img_data = $fertilizers_img_rs->fetch_assoc();
    ?>
  <div class="col-1  text-start alo"><img src="<?php echo $fertilizers_img_data["cade"]; ?>" alt="" style="height: 70px;"/></div>
  <div class="col-2 text-start alo"><?php echo $fertilizers_data["title"]; ?></div>
  <div class="col-4 text-start alo"><?php echo $fertilizers_data["description"]; ?></div>
  <div class="col-1 text-start alo"><a href="update.php" class="text-decoration-none text-dark ">Update</a></div>
  <div class="col-2 text-start alo">Rs. <?php echo $fertilizers_data["price"]; ?> .00</div>
  <div class="col-1 text-start alo"><?php echo $fertilizers_data["qty"]; ?></div>
  <div class="col-1 alo" ><a href="deletehere.php" class=" text-decoration-none text-dark"><i class="bi bi-trash3-fill"></i></a></div>
  </div>
  <?php

}

  ?>

<div class=" col-12 mb-1 text-start">
<div class=" col-2 alo"><a class=" text-decoration-none text-dark" href="productregisterationpage.php" >+add</a></div>
</div>
<div class=" col-12 mb-1 text-start">
<div class=" col-2 alo"><a class=" text-decoration-none text-dark" href="productregisterationpage.php" >+add</a></div>
</div>
  
</p>  
<?php

   }
   ?>

   
<?php
   
   if($item_data["id"]==4){
?>
<p>
      
<div class="col-12 row mb-1 bg-secondary text-light">
  <div class="col-1 text-start ">Image</div>
  <div class="col-2 text-start">Name</div>
  <div class="col-4 text-start ">Description</div>
  <div class="col-1 text-start ">Update</div>
  <div class="col-2 text-start ">Price</div>
  <div class="col-1 text-start ">Qty</div>
  <div class="col-1 " ><i class="bi bi-trash3-fill"></i></div>
  </div>
  <?php
  $potting_medias_rs = Database::search("SELECT *
  FROM `product` 
  INNER JOIN type_has_items ON `product`.`type_has_items_id` = `type_has_items`.`id`
  INNER JOIN items ON `type_has_items`.`items_id` = `items`.`id` 
  WHERE `product`.`users_email` ='".$umail."' AND `items`.`name`='potting medias' ");
$potting_medias_num = $potting_medias_rs->num_rows;
for($potm = 0 ; $potm < $potting_medias_num; $potm++){
  $potting_medias_data = $potting_medias_rs-> fetch_assoc();
  ?>
  <div class="col-12 row mb-1 ">
    <?php 
    $potting_medias_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$potting_medias_data["pid"]."'");
    $potting_medias_img_num = $potting_medias_img_rs-> num_rows;
    $potting_medias_img_data = $potting_medias_img_rs->fetch_assoc();
    ?>
  <div class="col-1  text-start alo "><img src="<?php echo $potting_medias_img_data["cade"]; ?>" alt="" style="height: 70px;"/></div>
  <div class="col-2 text-start alo"><?php echo $potting_medias_data["title"]; ?></div>
  <div class="col-4 text-start alo"><?php echo $potting_medias_data["description"]; ?></div>
  <div class="col-1 text-start alo"><a href="update.php" class="text-decoration-none text-dark ">Update</a></div>
  <div class="col-2 text-start alo">Rs. <?php echo $potting_medias_data["price"]; ?> .00</div>
  <div class="col-1 text-start alo"><?php echo $potting_medias_data["qty"]; ?></div>
  <div class="col-1 alo" ><a href="deletehere.php" class=" text-decoration-none text-dark"><i class="bi bi-trash3-fill"></i></a></div>
  </div>
  <?php

}

  ?>

<div class=" col-12 mb-1 text-start">
<div class=" col-2 alo"><a class=" text-decoration-none text-dark" href="productregisterationpage.php" >+add</a></div>
</div>
<div class=" col-12 mb-1 text-start">
<div class=" col-2 alo"><a class=" text-decoration-none text-dark" href="productregisterationpage.php" >+add</a></div>
</div>
   
</p>  
<?php

   }
   ?>
   
   <?php
   
   if($item_data["id"]==5){
?>
<p> 
      
<div class="col-12 row mb-1 bg-secondary text-light">
  <div class="col-1 text-start">Image</div>
  <div class="col-2 text-start">Name</div>
  <div class="col-4 text-start">Description</div>
  <div class="col-1 text-start">Update</div>
  <div class="col-2 text-start">Price</div>
  <div class="col-1 text-start">Qty</div>
  <div class="col-1" ><i class="bi bi-trash3-fill"></i></div>
  </div>
  <?php
  $pest_control_rs = Database::search("SELECT *
  FROM `product` 
  INNER JOIN type_has_items ON `product`.`type_has_items_id` = `type_has_items`.`id`
  INNER JOIN items ON `type_has_items`.`items_id` = `items`.`id` 
  WHERE `product`.`users_email` ='".$umail."' AND `items`.`name`='pest control' ");
$pest_control_num = $pest_control_rs->num_rows;
for($pc = 0 ; $pc < $pest_control_num; $pc++){
  $pest_control_data = $pest_control_rs-> fetch_assoc();
  ?>
  <div class="col-12 row mb-1 ">
    <?php 
    $pest_control_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$pest_control_data["pid"]."'");
    $pest_control_img_num = $pest_control_img_rs-> num_rows;
    $pest_control_img_data = $pest_control_img_rs->fetch_assoc();
    ?>
  <div class="col-1  text-start alo"><img src="<?php echo $pest_control_img_data["cade"]; ?>" alt="" style="height: 70px;"/></div>
  <div class="col-2 text-start alo"><?php echo $pest_control_data["title"]; ?></div>
  <div class="col-4 text-start alo"><?php echo $pest_control_data["description"]; ?></div>
  <div class="col-1 text-start alo"><a href="update.php" class="text-decoration-none text-dark ">Update</a></div>
  <div class="col-2 text-start alo">Rs. <?php echo $pest_control_data["price"]; ?> .00</div>
  <div class="col-1 text-start alo"><?php echo $pest_control_data["qty"]; ?></div>
  <div class="col-1 alo" ><a href="deletehere.php" class=" text-decoration-none text-dark"><i class="bi bi-trash3-fill"></i></a></div>
  </div>
  <?php

}

  ?>

<div class=" col-12 mb-1 text-start">
<div class=" col-2 alo"><a class=" text-decoration-none text-dark" href="productregisterationpage.php" >+add</a></div>
</div>
<div class=" col-12 mb-1 text-start">
<div class=" col-2 alo"><a class=" text-decoration-none text-dark" href="productregisterationpage.php" >+add</a></div>
</div>
  
</p>  
<?php

   }
   ?>

   
<?php
   
   if($item_data["id"]==6){
?>
<p> 
      
<div class="col-12 row mb-1 bg-secondary text-light">
  <div class="col-1 text-start">Image</div>
  <div class="col-2 text-start">Name</div>
  <div class="col-4 text-start">Description</div>
  <div class="col-1 text-start">Update</div>
  <div class="col-2 text-start">Price</div>
  <div class="col-1 text-start">Qty</div>
  <div class="col-1" ><i class="bi bi-trash3-fill"></i></div>
  </div>
  <?php
  $orchid_health_rs = Database::search("SELECT *
  FROM `product` 
  INNER JOIN type_has_items ON `product`.`type_has_items_id` = `type_has_items`.`id`
  INNER JOIN items ON `type_has_items`.`items_id` = `items`.`id` 
  WHERE `product`.`users_email` ='".$umail."' AND `items`.`name`='orchid health' ");
$orchid_health_num = $orchid_health_rs->num_rows;
for($oh = 0 ; $oh < $orchid_health_num; $oh++){
  $orchid_health_data = $orchid_health_rs-> fetch_assoc();
  ?>
  <div class="col-12 row mb-1 ">
    <?php 
    $orchid_health_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$orchid_health_data["pid"]."'");
    $orchid_health_img_num = $orchid_health_img_rs-> num_rows;
    $orchid_health_img_data = $orchid_health_img_rs->fetch_assoc();
    ?>
  <div class="col-1  text-start alo"><img src="<?php echo $orchid_health_img_data["cade"]; ?>" alt="" style="height: 70px;"/></div>
  <div class="col-2 text-start alo"><?php echo $orchid_health_data["title"]; ?></div>
  <div class="col-4 text-start alo"><?php echo $orchid_health_data["description"]; ?></div>
  <div class="col-1 text-start alo"><a href="update.php" class="text-decoration-none text-dark ">Update</a></div>
  <div class="col-2 text-start alo">Rs. <?php echo $orchid_health_data["price"]; ?> .00</div>
  <div class="col-1 text-start alo"><?php echo $orchid_health_data["qty"]; ?></div>
  <div class="col-1 alo" ><a href="deletehere.php" class=" text-decoration-none text-dark"><i class="bi bi-trash3-fill"></i></a></div>
  </div>
  <?php

}

  ?>

<div class=" col-12 mb-1 text-start">
<div class=" col-2 alo"><a class=" text-decoration-none text-dark" href="productregisterationpage.php" >+add</a></div>
</div>
<div class=" col-12 mb-1 text-start">
<div class=" col-2 alo"><a class=" text-decoration-none text-dark" href="productregisterationpage.php" >+add</a></div>
</div>
  
</p>  
<?php

   }
   ?>

<?php
   
   if($item_data["id"]==7){
?>
<p> 
  
    
<div class="col-12 row mb-1 bg-secondary text-light">
  <div class="col-1 text-start">Image</div>
  <div class="col-2 text-start">Name</div>
  <div class="col-4 text-start">Description</div>
  <div class="col-1 text-start">Update</div>
  <div class="col-2 text-start">Price</div>
  <div class="col-1 text-start">Qty</div>
  <div class="col-1" ><i class="bi bi-trash3-fill"></i></div>
  </div>
  <?php
  $flower_plants_rs = Database::search("SELECT *
  FROM `product` 
  INNER JOIN type_has_items ON `product`.`type_has_items_id` = `type_has_items`.`id`
  INNER JOIN items ON `type_has_items`.`items_id` = `items`.`id` 
  WHERE `product`.`users_email` ='".$umail."' AND `items`.`name`='flower plants' ");
$flower_plants_num = $flower_plants_rs->num_rows;
for($f = 0 ; $f < $flower_plants_num; $f++){
  $flower_plants_data = $flower_plants_rs-> fetch_assoc();
  ?>
  <div class="col-12 row mb-1 ">
    <?php 
    $flower_plants_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$flower_plants_data["pid"]."'");
    $flower_plants_img_num = $flower_plants_img_rs-> num_rows;
    $flower_plants_img_data = $flower_plants_img_rs->fetch_assoc();
    ?>
  <div class="col-1  text-start alo"><img src="<?php echo $flower_plants_img_data["cade"]; ?>" alt="" style="height: 70px;"/></div>
  <div class="col-2 text-start alo"><?php echo $flower_plants_data["title"]; ?></div>
  <div class="col-4 text-start alo"><?php echo $flower_plants_data["description"]; ?></div>
  <div class="col-1 text-start alo"><a href="update.php" class="text-decoration-none text-dark ">Update</a></div>
  <div class="col-2 text-start alo">Rs. <?php echo $flower_plants_data["price"]; ?> .00</div>
  <div class="col-1 text-start alo"><?php echo $flower_plants_data["qty"]; ?></div>
  <div class="col-1 alo" ><a href="deletehere.php" class=" text-decoration-none text-dark"><i class="bi bi-trash3-fill"></i></a></div>
  </div>
  <?php

}

  ?>

<div class=" col-12 mb-1 text-start">
<div class=" col-2 alo"><a class=" text-decoration-none text-dark" href="productregisterationpage.php" >+add</a></div>
</div>
<div class=" col-12 mb-1 text-start">
<div class=" col-2 alo"><a class=" text-decoration-none text-dark" href="productregisterationpage.php" >+add</a></div>
</div>
</p>  
<?php

   }
   ?>


   
   
  </div>
</div>

<?php

 }
 ?>

    </div>
</div>  
    </div>
</div>
    <script src="script.js"></script>
</body>
</html>
<?php
}else{
  echo ("Please sign in first");
}
?>
