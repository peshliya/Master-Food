
<?php 
require "connection.php";
session_start();
$email = $_SESSION["u"]["email"];
?>
<!-- • Purchased History and Invoicing.  -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchased History</title>
    <link rel="icon" href="resource/download.webp"/>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="style.css" />
</head>
<body class="historyoforderbody">

<div class=" container-fluid">
    <div class="row">
        <?php include "header.php"; ?>
<div class=" d-flex justify-content-center align-items-center">
    <div class=" offset-1 col-10 bg-body border mt-5 mb-5 rounded-2">
        <div class=" row">
            <div class="col-12 text-center mt-2 mb-2"><h3>Purchased History</h3></div>

            <div class=" col-12 mt-2 mb-2">
                <div class="row">
                <div class=" col-6 text-center">Product Details</div>
                <div class="col-3 text-start">Quantity</div>
                <div class="col-3 text-start">Order Date & Time</div>
            </div>
</div>
<?php 
$invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `users_email`='".$email."' ");
$invoice_num = $invoice_rs-> num_rows;

for($i=0;$i < $invoice_num; $i++){
  $invoice_data = $invoice_rs->fetch_assoc();
  ?>
  <div class=" col-12 mt-2 mb-2">
                <div class="row">
                <div class=" col-6 text-center">
                <div class="card m-3 rounded-0 border-0" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
    <?php 
       $product_rs = Database::search("SELECT * FROM `product` WHERE `pid`='".$invoice_data['product_id']."'");
       $product_data = $product_rs->fetch_assoc();
        ?>
      <?php 
      $images_rs = Database::search("SELECT * FROM `images` WHERE `product_id` ='".$invoice_data['product_id']."'");
      $images_data = $images_rs->fetch_assoc();
      ?>
      <img src="<?php echo $images_data['cade']; ?>" class="img-fluid  rounded-0" style="height: 200px;" >
    </div>
    <div class="col-md-8">
      <div class="card-body">
      
        <h5 class="card-title mb-3"><?php echo $product_data['title']; ?> </h5>
        <p class="card-text">Price = Rs. <?php echo $product_data['price']; ?> . 00</p>
        <?php 
        $total =$invoice_data['total'];
        $dfree = $total - (int)$product_data['price'];
        ?>
        <p class="card-text">delivery fee = Rs. <?php echo $dfree; ?> . 00</p>
        <p class="card-text">description = <?php echo $product_data['description']; ?></p>
        
      </div>
    </div>
  </div>
</div>
                </div>


                <div class="col-3 text-start fs-5"><?php echo $invoice_data['qty']; ?></div>
                <div class="col-3 text-start fs-5"><?php echo $invoice_data['date']; ?></div>
            </div>
        </div>
        <div class=" offset-2 col-9">
            <hr>
        </div>

  <?php
}
?>

      
   

      

        </div>

    </div>
</div>
        <?php include "footer.php"; ?>
    </div>
</div>
<script src="bootstrap.bundle.js"></script>
<script src="script.js"></script>
</body>
</html>