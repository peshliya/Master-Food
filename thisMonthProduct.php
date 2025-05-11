<?php 
require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Food | Admin Panal |  Recently Added</title>
    <link rel="icon" href="resource/download.webp"/>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="col-12 container-fluid  p-3">
    <div class="row" >
      <div class="col-12 " >
   <div class="row" >
<div class=" offset-2 mb-2 col-10 text-center"><h4>10 Days Before Added Foods</h4></div>
   <div class=" offset-1 col-2" >
        <div class="ms-3 mt-3 mb-3"><a href="productAndUserManagement.php" class=" text-decoration-none text-dark" > All product</a></div>
        <div class="ms-3 mt-3 mb-3"><a href="adminPanel.php" class=" text-decoration-none text-dark" >Dashboard</a></div>
        </div>
        <div class="col-9 border-start border-dark" >
<div class=" row " >
<div class="col-12 row mb-1 bg-black text-light">
    <div class="col-2">Image</div>
    <div class="col-2">Name</div>
    <div class="col-3">Description</div>
    <div class="col-2">Price</div>
    <div class="col-1">Qty</div>
    <div class="col-1" >Deactive</div>
    </div>
<?php 

$today = date("Y-m-d");
$thismonth = date("m");
$thisyear = date("Y");


$weekProduct_rs =Database::search("SELECT * from product
where datetime_added > now() - INTERVAL 7 DAY ");
$weekProduct_num = $weekProduct_rs-> num_rows;

for($w=0;$w < $weekProduct_num; $w++){
    $weekProduct_data = $weekProduct_rs-> fetch_assoc();
?>
    <div class="col-12 row mb-1 mt-1 mpcolorchange">
<?php 

$pro_img_rs = Database::search("SELECT * FROM images WHERE `product_id`='".$weekProduct_data['pid']."'");
$pro_img_data =$pro_img_rs->fetch_assoc();
?>

    <div class="col-2 p-2">
<div  style="background-color: white;">
<img src="<?php echo $pro_img_data['cade']; ?>" style="height: 100px; " />
</div>
</div>
    <div class="col-2"><?php echo$weekProduct_data["title"]; ?></div>
    <div class="col-3"><?php echo$weekProduct_data["description"]; ?>.</div>
    
    <div class="col-2">Rs. <?php echo$weekProduct_data["price"]; ?> .00</div>
    <div class="col-1"><?php echo$weekProduct_data["qty"]; ?></div>
    <div class="col-1" ><a href="deletehere.php" class=" text-decoration-none text-dark"><i class="bi bi-trash3-fill"></i></a></div>
    </div>

<?php
}


?>

</div>
        </div>

   </div>
      </div>
    </div>
</div>
    <script src="script.js"></script>
</body>
</html>