<?php 
require "connection.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product & User management </title>
    <link rel="icon" href="resource/download.webp"/>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="style.css" />
</head>
<body>
  
<ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"  onclick="product();">Product</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"  onclick="product();">user</button>
                                        </li>
                                    </ul>


    <div class=" col-12 mt-3 d-block" id="product" >
    <div class=" col-12 mt-3 mb-3">
    <div class=" row">

    <?php 
$product_rs  = Database::search("SELECT * FROM product ");
$product_num = $product_rs-> num_rows;

?>

    <div class="offset-1 mt-3 col-2 flex-column">
        <div class=" ms-3">All added <button class=" rounded-pill"> &nbsp;&nbsp; <?php echo $product_num; ?> &nbsp;&nbsp; </button></div>
        <div class="ms-3 mt-3 mb-3 "><a href="#" class=" text-decoration-none text-dark "  >product details</a></div>
        <div class="ms-3 mt-3 mb-3"><a href="#"class="text-decoration-none text-dark" >user's products </a></div>
        <div class="ms-3 mt-3 mb-3"><a href="thisMonthProduct.php" class=" text-decoration-none text-dark" >Resently added</a></div>
        <div class="ms-3 mt-3 mb-3"><a href="#" class=" text-decoration-none text-dark" >recycle bin</a></div>
        <div class="ms-3 mt-3 mb-3"><a href="adminPanel.php" class=" text-decoration-none text-dark" >Dashboard</a></div>
</div>
<div class="col-8 border-start border-dark mt-3">
<div class="col-12 row mb-1 ">

<div class="col-12 row mb-1 bg-black text-light">
    <div class="col-2">Image</div>
    <div class="col-2">Name</div>
    <div class="col-3">Description</div>
    
    <div class="col-2">Price</div>
    <div class="col-1">Qty</div>
    <div class="col-1" >Status</div>
    </div>

<?php 
for ($x = 0; $x <$product_num; $x++){
    $product_data = $product_rs -> fetch_assoc();
    ?>
   <div class="col-12 row mb-1 mt-1 mpcolorchange">
<?php 
$pro_img_rs = Database::search("SELECT * FROM images WHERE `product_id`='".$product_data['pid']."'");
$pro_img_data =$pro_img_rs->fetch_assoc();
?>

    <div class="col-2 p-2">
<div  style="background-color: white;">
<img src="<?php echo $pro_img_data['cade']; ?>" style="height: 100px; " />
</div>
</div>
    <div class="col-2"><?php echo$product_data["title"]; ?></div>
    <div class="col-3"><?php echo$product_data["description"]; ?>.</div>
    
    <div class="col-2">Rs. <?php echo$product_data["price"]; ?> .00</div>
    <div class="col-1"><?php echo$product_data["qty"]; ?></div>
    <?php
    if( $product_data["status_id"] == 1){
?>
  
  <div class="col-1 activeupdate" style="cursor:pointer;" onclick="blockProduct('<?php echo $product_data['pid']; ?>');" id="pb<?php echo $product_data['pid']; ?>" ><a href="#" class=" text-decoration-none text-dark">Activated</a></div>

<?php
  }else{
?>    
  <div class="col-1 activeupdate" style="cursor:pointer;" onclick="blockProduct('<?php echo $product_data['pid']; ?>');" id="pb<?php echo $product_data['pid']; ?>" ><a href="#" class=" text-decoration-none text-dark">Deactivated</a></div>
<?php  
  }
  ?>
    </div>
    <?php
}
?>


 

</div>
</div>



    </div>
</div>
    </div>




    <div class=" col-12 mt-3 d-none " id="user">
    <div class=" col-12 mt-3 mb-3">
    <div class=" row">

<?php 
$user_rs = Database::search("SELECT * FROM users");
$user_num = $user_rs-> num_rows;
?>

    <div class="offset-1 mt-3 col-2 flex-column">
        <div class=" ms-3">All users <button class=" rounded-pill"> &nbsp;&nbsp; <?php echo $user_num; ?> &nbsp;&nbsp; </button></div>
        <div class="ms-3 mt-3 mb-3"><a href="#" class=" text-decoration-none text-dark" >users details</a></div>
        <div class="ms-3 mt-3 mb-3"><a href="#" class=" text-decoration-none text-dark" >user's products </a></div>
        <div class="ms-3 mt-3 mb-3"><a href="#" class=" text-decoration-none text-dark" >recent added</a></div>
        <div class="ms-3 mt-3 mb-3"><a href="#" class=" text-decoration-none text-dark" >recycle bin</a></div>
</div>
<div class="col-8 border-start border-dark mt-3">
<div class="col-12 row mb-1 ">

<div class="col-12 row mb-1 bg-black text-light">
    <div class="col-2">Image</div>
    <div class="col-2">Name</div>
    <div class="col-4">email</div>
    
    <div class="col-2">mobile</div>
 
    <div class="col-1">store</div>
    <div class="col-1" >block</div>
    </div>
<?php 


for($u=0; $u< $user_num ; $u++){
    $user_data = $user_rs->fetch_assoc();
    ?>

    <div class="col-12 row mb-1 mpcolorchange">
        <?php 
       $pro_rs =  Database::search("SELECT * FROM profile_image WHERE users_email = '".$user_data['email']."'");
      $pro_num = $pro_rs-> num_rows;
       if($pro_num ==0){
        ?>
      
        <div class="col-2 userimgforadmin" style="height: 90px;">

    </div>
        <?php
       }else{
        $pro_data = $pro_rs -> fetch_assoc();
        ?>

        <div class="col-2 ">
        <div  style="background-color: white;">
        <img src="<?php echo $pro_data['path'];?>" style="height: 100px;">
</div>    
        </div>
        <?php
       }
        ?>
    
    <div class="col-2"><?php echo $user_data['fname']." ".$user_data['lname']; ?> </div>
    <div class="col-4"><?php echo $user_data['email']; ?> </div>
    <div class="col-2"><?php echo $user_data['mobile']; ?></div>
    <?php 
    $user_has_product_count_rs = Database::search("SELECT COUNT(pid) AS count FROM product WHERE `users_email`='".$user_data['email']."'");
    $user_has_product_count_data = $user_has_product_count_rs->fetch_assoc();
    ?>
    <div class="col-1"><?php echo $user_has_product_count_data['count']; ?></div>
    <div class="col-1" ><a href="deletehere.php" class=" text-decoration-none text-dark"><i class="bi bi-slash-circle-fill"></i></a></div>
    </div> 
    <?php
}
?>
   



</div>



    </div>
</div>
    </div>




    <script src="bootstrap.bundle.js"></script>
<script src="script.js"></script>
</body>
</html>