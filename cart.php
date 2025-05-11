<?php
require "connection.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Food | Cart</title>
    <link rel="icon" href="resource/download.webp"/>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="col-12 container-fluid">
        <div class=" row">
<?php include "header.php"; 
if(isset($_SESSION["u"])){
  $email = $_SESSION["u"]["email"];

$u_rs = Database::search("SELECT * FROM users_has_adderss WHERE `users_email`='".$email."'");
if($u_rs->num_rows == 0){
echo("Please Update your Profile First.");
?>
<br/>
My Profile = <a href="userProfile.php">GO to my profile page</a>
<?php
}else{


  $total = 0;
  $subtotal = 0;
  $shipping = 0;
  ?>




        <div class=" col-12 mt-3 mb-1">
          <div class="row">
                <div class=" col-4">
                   <span ><h3><img src="resource/logo6.webp" style="width: 70px;"> Master Food </h3></span>
                </div>
                <div class="offset-6 col-2 text-start">
                <span><i class="bi bi-lock-fill"></i>SECURED</span>
                </div>
            </div>
        </div>

        <div class=" offset-1 col-10"><hr></div>
        <?php
        $cart_rs = Database::search("SELECT * FROM `cart` WHERE users_email='" . $email . "'");
        $cart_num = $cart_rs->num_rows;

        if($cart_num == 0){
          
          ?>
     <div class="col-12">
                <div class="row">
                    <div class="col-12 emptyCart"></div>
                    <div class="col-12 text-center mb-3">
                        <label class="form-label fs-1 fw-bold">
                            You have no items in your cart yet.
                        </label>
                    </div>
                    <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-3">
                        <a href="home.php" class="btn btn-outline-info fs-3 fw-bold">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>
          <?php
        }else{
          ?>
<div class="col-12">
    <div class="row">

        <div class="col-12 col-lg-7 d-flex flex-column">
          <div class="row">

<div class="offset-2 mt-1 mb-1 "><h4>Shooping Cart</h4></div>
<div class=" offset-2  "> <hr class="border border-2 border-secondary  opacity-25 bg-secondary rounded-0"/></div>



<div class="col-12">
  <div class="row">
  <div class="offset-2 col-6 d-flex flex-column">
        <div  class="fw-bold mt-2 mb-2">Product Details</div>
        <div ></div></div>


<div class="col-2 text-center">
    <div class="fw-bold mt-2 mb-2">Quantity</div>
        
           
        </div>

        <div class=" col-2 text-end">
        <div class="fw-bold mt-2 mb-2">Sub Total</div>
      
        </div>
  </div>
</div>



<!--  -->

        <?php


      for($x=0; $x < $cart_num; $x++){
        $cart_data = $cart_rs->fetch_assoc();
        ?>
<div class="col-12">
  <div class="row">



  <div class="offset-2 col-6 d-flex flex-column">
        <div class="col-12">
          <div class="row">
            <?php
        $product_rs =  Database::search("SELECT * FROM product  WHERE pid ='".$cart_data['product_id']."' ");
        $product_data = $product_rs->fetch_assoc();
$pid = $product_data['pid'];
// echo ($pid);
        $total = $total + ($product_data["price"] * $cart_data["qty"]);

        $address_rs = Database::search("SELECT district_id1 AS did FROM users_has_adderss 
        INNER JOIN city ON users_has_adderss.city_id=city.id WHERE `users_email` = '" . $email . "' ");

$address_data= $address_rs->fetch_assoc();

        $ship = 0;

        if($address_data['did'] == 4){
          $ship = $product_data["delivery_fee_colombo"];
          $shipping = $shipping + $product_data["delivery_fee_colombo"];
        }else{
          $ship = $product_data["delivery_fee_other"];
          $shipping = $shipping + $product_data["delivery_fee_other"];
        }
        $sellr_rs =Database::search("SELECT * FROM  `users` WHERE `email` ='".$product_data["users_email"]."'");
$seller_data=$sellr_rs -> fetch_assoc();
$seller =$seller_data["fname"]." ".$seller_data["lname"];

        ?>



                            

        <div class="card mb-3 rounded-0 border-0" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
    <?php
        $images_rs = Database::search("SELECT * FROM `images` WHERE product_id='" . $product_data['pid'] . "'");
        $images_num = $images_rs->num_rows;

        if($images_num ==0){
          ?>
          <img src="resource/noimg.jpg" class="img-fluid  rounded-0" style="height: 100px;" >
          <?php
        }else{
          $images_data = $images_rs->fetch_assoc();
          ?>
          <img src="<?php echo $images_data['cade']; ?>" class="img-fluid  rounded-0" style="height: 100px;" >
 
          <?php
        }
    ?>
      
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title mb-3"><?php echo $product_data['title']; ?></h5>
        <span class="card-text">Price = Rs. <?php echo $product_data['price']; ?> . 00</span><br>
        <span class="card-text"><span>
          <?php 
          if($address_data['did']==4){
            ?>
           delivery fee = Rs.  <?php echo $ship ?>  . 00</p>
            <?php
          }else{
            ?>
delivery fee = Rs.  <?php echo $ship ?>  . 00</p>
            <?php
          }
          ?>
        </span>
        <div class="col-md-4">
                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" 
                            data-bs-content="<?php echo $product_data["description"]; ?> "
                             title="Delete form card" >
                            <div " class="img-fluid rounded-start" style="max-width: 200px;">
                         <button class="btn border-info activeupdate" onclick="deletefromCart(<?php echo $product_data['pid']?>);">remove</button>
                          
                          </div>

</span>
</div>
        
      </div>
    </div>
  </div>
</div>



        </div></div></div>

<div class="col-2 text-center">
    <div class="fs-5"><?php echo $cart_data['qty']; ?></div>
        </div>

        <div class=" col-2 text-end">
        <div class="fs-5">Rs. <?php echo $cart_data['qty'] * $product_data['price']; ?> .00</div>
      
        </div>
 
<!--  -->


 </div>
</div>

 <?php
          }
          ?>



      </div></div>
      
      


       

        



        <div class="col-12 col-lg-5">
          <div class=" ps-5 pe-5">
                <div class="text-center" >Need Help &rAarr;</div>
<div class="text-center">
    <span>Contact us : +9471 1 256 588</span>
</div>
<div class="text-center">we are available 24 hrs</div>

<div class="bg-secondary bg-opacity-10 col-12 mt-4 rounded">
   <div class="row">
    <div class="text-center "> <button>CHECKOUT</button></div>


            <!--summary  -->

            <div class="col-12 ">
                <div class="row">

                    <div class="col-12">
                        <label class="form-label fs-3 fw-bold">Summary</label>
                    </div>

                    <div class="col-12">
                        <hr />
                    </div>

                    <div class="col-6 mb-3">
                        <span class="fs-6 fw-bold">Sub totals</span>
                    </div>

                    <div class="col-6 text-end mb-3">
                        <span class="fs-6 fw-bold">Rs. <?php echo $total; ?> .00</span>
                    </div>

                    <div class="col-6">
                        <span class="fs-6 fw-bold">Shipping</span>
                    </div>

                    <div class="col-6 text-end">
                        <span class="fs-6 fw-bold">Rs.<?php echo $shipping; ?>.00</span>
                    </div>

                    <div class="col-12 mt-3">
                        <hr />
                    </div>

                    <div class="col-6 mt-2">
                        <span class="fs-4 fw-bold">Total</span>
                    </div>

                    <div class="col-6 mt-2 text-end">
                        <span class="fs-4 fw-bold">Rs. <?php echo $total + $shipping; ?> .00</span>
                    </div>

<!--  -->
<?php 
 
$cartPass_rs=Database::search("SELECT * FROM `cart` WHERE users_email='".$email."'");


?>
<!-- > -->
                    <div class="col-12 mt-3 mb-3 d-grid">
                        <button class="btn btn-warning fs-5 fw-bold" onclick="payment2(<?php   ?>);">PAY</button>
                    </div>

                </div>
            </div>

            <!--summary  -->



   </div>
</div>
            </div>
            </div>
            </div>
        </div>

          <?php
        }

?>  


   


      </div>
</div>
       
       
<?php 
}
?>   
        
    
<script src="bootstrap.bundle.js"></script>
<script src="script.js"></script>
<script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
</body>
</html>
      <?php 
}
      ?>