<?php
 require "connection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewTech | Watchlist  </title>
    <link rel="icon" href="resource/download.webp"/>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />
</head>
<body class="bg-light">

<div class=" col-12 container-fluid">
    <div class="row">

    <?php 
    include "header.php"; 
    if(isset($_SESSION["u"])){
?>

        <div class="col-12 mt-5 mt-lg-3">
            <div class="offset-1 col-2">
            <div class="mb-2"><h1>Watchlist  <img src="resource/heart.png" style="width: 40px;"></h1>
       
        </div>
            </div>
            <div class="col-8 ">
      
<div class="input-group mb-3 offset-2  mt-3 mb-2">
  <input type="text" class="form-control " placeholder="search here" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <span class="input-group-text bgct" id="basic-addon2">search</span> 
</div>
 </div>
    
            

            </div>
        </div>

<div class=" col-12 mt-3 mb-3">
    <div class=" row">
<?php 
  $watch_rs = Database::search("SELECT * FROM `watchlist` WHERE `users_email`='" . $_SESSION["u"]["email"] . "'");
  $watch_num = $watch_rs->num_rows;
?>
    <div class="offset-1 mt-3 col-6 col-lg-2 flex-column">
        <div class=" ms-3">All added <button class=" rounded-pill"> &nbsp;&nbsp; <?php echo $watch_num; ?> &nbsp;&nbsp; </button></div>
        <div class="ms-3 mt-3 mb-3"><a href="#" class=" text-decoration-none text-dark" onclick="deletewatchlist();" >delete all</a></div>
        <div class="ms-3 mt-3 mb-3"><a href="#" class=" text-decoration-none text-dark" >all items add to cart </a></div>
        <div class="ms-3 mt-3 mb-3"><a href="cart.php" class=" text-decoration-none text-dark" >My cart</a></div>
        <div class="ms-3 mt-3 mb-3"><a href="home.php" class=" text-decoration-none text-dark" >looking more Foods <img src="resource/heart icon.jpg" style="width: 20px;"></a></div>
        <div class="ms-3 mt-3 mb-3"><a href="#" class=" text-decoration-none text-dark" >recent added</a></div>
        <div class="ms-3 mt-3 mb-3"><a href="#" class=" text-decoration-none text-dark" >recycle bin</a></div>
</div>
<?php 

   if($watch_num == 0){
    ?>
           <!-- empty view -->
           <div class="col-12 col-lg-8 border-start border-dark mt-3">
           <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-12 emptyView"></div>
                                            <div class="col-12 text-center">
                                                <label class="form-label fs-1 fw-bold">You have no items in your Watchlist yet.</label>
                                            </div>
                                            <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-3">
                                                <a href="home.php" class="btn btn-warning fs-3 fw-bold" style="margin-top: 100px; margin-bottom: 100px;">Start Shopping</a>
                                            </div>
                                        </div>
                                    </div>
           </div>
<!-- empty view -->
    <?php
   }else{
    ?>
<div class="col-11 col-lg-8 border-start border-dark mt-3" id="watchlistarea">

    <?php 
    for($x =0; $x < $watch_num ; $x++){
                $watch_data = $watch_rs->fetch_assoc();

                $img = array();
                $images_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $watch_data['product_id'] . "' ");
                $images_data = $images_rs->fetch_assoc();

                ?>
<div class="col-12 row mb-1 " >
<div class="col-lg-2 col-1 ">
     <img src="<?php echo $images_data['cade']; ?>" style="height: 100px;"> </div>

     <?php
                   $pro_rs = Database::search("SELECT * FROM `product` WHERE `pid`='" . $watch_data["product_id"] . "'");
                   $pro_data = $pro_rs->fetch_assoc();
     ?>
    <div class="col-2 offset-2 offset-lg-0  col-lg-2"><?php echo $pro_data['title']; ?></div>
    <div class="col-3"><?php echo $pro_data['description']; ?></div>
    
    <div class="col-3 col-lg-2">Rs. <?php echo $pro_data['price']; ?> .00</div>
    <div class="col-1"><?php echo $pro_data['qty']; ?></div>
        <div class="col-md-1 offset-4 offset-lg-0">
                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" 
                            data-bs-content="<?php echo $pro_data["title"]; ?>"
                             title="move to recycle bin" >
                            <div " class="img-fluid rounded-start" style="max-width: 200px;">
                            <div class="col-1 col-lg-1" ><a href="deletehere.php" class=" text-decoration-none text-dark"><i class="bi bi-trash3-fill"></i></a>

                        </div>

</span>
</div>

</div>
    </div>
                <?php
    }
    ?>



   
</div>
    <?php
   }
?>


    </div>
</div>
<?php
    
    }else{
        header("Location:home.php");
    }
    ?>
    </div>
</div>
<script src="bootstrap.js"></script>
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