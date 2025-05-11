<?php 
session_start();
require "connection.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Food | Invoice</title>
    <link rel="stylesheet" href="bootstrap.css" /> 
       <link rel="icon" href="resource/download.webp"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="style.css" />
</head>
<body class="bodyinvoice">
    <div class=" container-fluid">
        <div class=" row">
            <?php include "header.php"; ?>
<div class=" offset-1 offset-lg-2 col-10 col-lg-8 bg-light">
    <div class=" row flex-column">
        <div class="bg-info" style="height:60px ;"></div>
        <div class=" col-12 bg-light">
            <div class=" row">
            <!-- <div class="col-6 text-primary mt-2 " style="font-family:Arial ;"><h2>INVOICE</h2></div> -->
            <div class="col-12 text-danger mt-2 text-end fs-5" style="cursor:pointer;" onclick="printInvoice();"><i class="bi bi-filetype-pdf"></i>print or take a pdf</div>
            </div>

        </div>
        <div id="page">
        <div class=" col-12 bg-light border-bottom border-danger">
            <div class=" row">
            <div class="col-6 text-primary mt-2 " style="font-family:Arial ;"><h2>INVOICE</h2></div>
            
            </div>

        </div>
        <div class="col-12 mt-2 bg-light">
            <div class="row">
                <div class=" col-6" style="font-family:Arial ;">masterfood,<br>Havelock city,  Colombo 07.</div>
                <div class="col-6 text-end" style="font-family:Arial ;">masterfood@gmail.com <br> +94722623589</div>
                <!-- <div class=" col-3">Sala,<br>Hokandara,<br> Dakuna.</div> -->
            </div>
        </div>
<?php 
if(isset($_SESSION["u"])){
    $email = $_SESSION["u"]["email"];
    $oid = $_GET["id"];

    $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `users_email`='".$email."' AND `order_id`='".$oid."'");
    $invoice_data = $invoice_rs->fetch_assoc();
$user_rs =Database::search("SELECT * FROM `users` INNER JOIN `users_has_adderss` ON `users`.email = `users_has_adderss`.`users_email` WHERE `users_email`='".$invoice_data['users_email']."'");
$user_data = $user_rs->fetch_assoc();
    ?>
     <div class="col-6 mt-4 bg-light">
            <div class="row">
            <div style="font-family:Arial ;">BILLED TO:</div>
                <div style="font-family:Arial ;"><?php echo $user_data['fname']; ?>,<br><?php echo $user_data['line_1']?> ,<?php echo $user_data['line_2']?>.</div>
            </div>
        </div>
        

        <!--  -->
<div class=" col-12">
    <div class="row">

    <div class="col-10 col-lg-4 flex-column">
        <div class=" text-center text-black mt-4 mb-2 fs-4" style="font-family:Arial ;">masterfood</div>
        <div class=" text-center text-black-50 mb-1" style="font-family:Arial ;">INVOICE NUMBER<br/><b><?php echo $invoice_data['order_id']; ?></b></div>
<div class="text-center text-black-50 mb-1">DATE OF ISSUE<br/> <b><?php echo $invoice_data['date']; ?></b></div>
    </div>

    <div class="offset-1  offset-lg-0 col-lg-7 col-10 " style="font-size: 13px;">
    <table class="table table-bordered border-dark">
  <thead class=" bg-opacity-25 bg-secondary">
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Unit Cost</th>
      <th scope="col">Quantity Rate</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <?php 
        $product_rs = Database::search("SELECT * FROM `product` WHERE `pid`='".$invoice_data['product_id']."'");
        $product_data = $product_rs->fetch_assoc();
        ?>
      <th scope="row"><?php echo $product_data["title"]?></th>
      <td>Rs. <?php echo $product_data['price']; ?> .00</td>
      <td><?php echo $invoice_data['qty']; ?></td>
      <td>Rs. <?php echo $invoice_data['total']; ?> .00</td>
    </tr>

 
  </tbody>
</table>

<div class=" text-end  ">
    <div class="row  ">
        <?php
       $subtotal =  ((int)$product_data["price"] * (int)$invoice_data['qty'])
        ?>
        <div class="col-9  text-end" style="font-family:Arial ;">SUBTOTAL</div><div class="col-3 text-end" style="font-family:Arial ;">Rs. <?php echo $subtotal; ?> .00</div>
    </div>
    <div class="row">
        <?php 
        $total = $invoice_data['total'];
        $dfree=(int)$total-$subtotal;
        ?>
        <div class="col-9 text-end" style="font-family:Arial ;">DISCOUNT</div><div class="col-3 text-end" style="font-family:Arial ;">Rs. 00 .00</div>
    </div>
    <div class="row">
        <div class="col-9 text-end" style="font-family:Arial ;">DELIVERY FEE</div><div class="col-3 text-end" style="font-family:Arial ;">Rs. <?php echo $dfree; ?> .00</div>
    </div>
    <div class=" offset-6 row col-6 text-end ">
        <hr>
    </div>
    <div class="row fw-bold mt-1 mb-3">
        <div class="col-9 text-end" style="font-family:Arial ;">TOTAL</div><div class="col-3 text-end" style="font-family:Arial ;">Rs. <?php echo $invoice_data['total']; ?> .00</div>
    </div>
   
</div>

    </div>
    
    </div>
</div>
<!--  -->
    <?php
}
?>
   

<div class="bg-info" style="height:60px ;"></div>
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