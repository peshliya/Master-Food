<?php
require "connection.php";
session_start();

$email = $_SESSION["u"]["email"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="bootstrap.css">
   <link rel="stylesheet" href="style.css">
    <title>View Food | MasterFood</title>
    <link rel="icon" href="resource/download.webp"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

</head>
<body class="picforviewProduct">

<?php include "header.php"; ?>
<div class="col-12 d  mb-1 container-fluid">
        <div class="row ">
        <div class="col-12 bg-success mt-3 rounded">
<div class="row">

    <div class="col-3">
    <div class="form-check">
<input class="form-check-input" type="radio" name="price" id="pricehigh">
<label class="form-check-label text-white" for="pricehigh">
Price High to low
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="price" id="pricelow">
<label class="form-check-label text-white" for="pricelow">
Price Low to high
</label>
</div>
    </div>

    <div class="col-3">
    <div class="form-check">
<input class="form-check-input " type="radio" name="brand" id="brand">
<label class="form-check-label text-white" for="brand">
Brandnew
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="brand" id="used">
<label class="form-check-label text-white" for="used">
Used
</label>
</div>
    </div>

    <div class="col-3">
    <div class="form-check">
<input class="form-check-input" type="radio" name="bla" id="newest">
<label class="form-check-label text-white" for="newest">
New Foods (within this week)
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="bla" id="allproduct">
<label class="form-check-label text-white" for="allproduct">
All type Foods
</label>
</div>
    </div>

<div class="col-3">
    <div class="row">
        <div class="col-6 d-grid pt-2">
            <button class="btn btn-danger" onclick="sortpc(0);">Sort</button>
        </div>
        <div class="col-6 d-grid pt-2">
            <button class="btn btn-warning " onclick="clearSorts();">Clear</button>
        </div>
    </div>
</div>

</div>
</div>
        </div>
    </div>

    <div class="container-fluid col-12 ">
        <div class="row" id="sortViewpc">



<?php
if(isset($_GET["page"])){
    $pageno=$_GET["page"];
    
    
    }else{
$pageno = 1; 
    }
$product_rs_nopg = Database::search("SELECT *
FROM `product` 
INNER JOIN type_has_items ON `product`.`type_has_items_id` = `type_has_items`.`id`
INNER JOIN items ON `type_has_items`.`items_id` = `items`.`id` 
WHERE `items`.`name`='pest control'");
$product_num_nopg = $product_rs_nopg-> num_rows;

$result_per_page = 4;
$number_of_pages = ceil($product_num_nopg/$result_per_page);

$page_result = ($pageno - 1)* $result_per_page;

$product_rs = Database::search("SELECT *
FROM `product` 
INNER JOIN type_has_items ON `product`.`type_has_items_id` = `type_has_items`.`id`
INNER JOIN items ON `type_has_items`.`items_id` = `items`.`id` 
WHERE `items`.`name`='pest control' LIMIT ".$result_per_page." OFFSET ".$page_result." ");
$product_num = $product_rs-> num_rows;

for ($p =0 ; $p < $product_num; $p++){
    $product_data = $product_rs->fetch_assoc();
    ?>
<!-- card -->
<div class="card mb-3 mt-3 col-12 col-lg-5 m-5">
<div class="row">
<div class="col-md-4 mt-4">


<?php
                    
                    $img_rs = Database::search("SELECT *
                    FROM images
                    INNER JOIN product ON images.product_id=product.pid
                    INNER JOIN type_has_items ON product.type_has_items_id= type_has_items.id
                    INNER JOIN items ON type_has_items.items_id =items.id WHERE items.name='pest control' AND product.pid ='".$product_data["pid"]."'
                    ");
            $img_data = $img_rs-> fetch_assoc();        
                    
?>
<img src="<?php  echo $img_data["cade"]; ?>" class="img-fluid rounded-start" style="height: 200px;" />
</div>
<div class="col-md-8">
<div class="card-body">
<h5 class="card-title fw-bold"><?php  echo $product_data["title"]; ?></h5>
<span class="card-text fw-bold text-primary">Rs. <?php  echo $product_data["price"]; ?> .00</span><br />
<span class="card-text fw-bold text-success"><?php  echo $product_data["qty"]; ?>Items left</span>

<div class="row">
<div class="col-12">
<div class="row g-1">
<div class="col-12 col-lg-3 d-grid pt-4">
    <?php

                                                    $watchlist_rs= Database::search("SELECT * FROM `watchlist` WHERE `product_id`='".$product_data["pid"]."' AND
                                                    `users_email`= '".$_SESSION["u"]["email"]."'");
                                                    $watchlist_num = $watchlist_rs->num_rows;

                                                    if($watchlist_num ==1){
                                                        ?>
                                                    <button class="col-12 btn btn-outline-light mt-2 " 
                                                    onclick="addToWatchlist(<?php  echo $product_data['pid']; ?>);">
                                                        <i class="bi bi-heart-fill text-danger fs-5" id='heart<?php  echo $product_data["pid"]; ?>'></i>
                                                    </button>


                                                        <?php

                                                    }else{
                                                        ?>

                                                    <button class="col-12 btn btn-outline-light mt-2 " 
                                                    onclick="addToWatchlist(<?php  echo $product_data['pid']; ?>);">
                                                        <i class="bi bi-heart-fill text-dark fs-5" id='heart<?php  echo $product_data["pid"]; ?>'></i>
                                                    </button>
                                                        <?php

                                                    }

                                                    ?>
<!-- <a class="btn btn-success fw-bold" onclick="sendid(<?php echo  $selected_data['id'];?>);">watchlist</a> -->
</div>
<div class="col-12 col-lg-6 d-grid pt-4">
<button class="btn btn-success fw-bold" onclick="addToCart(<?php echo $product_data['pid']; ?>);">add to cart</button>
</div>

<div class="col-12 col-lg-9 d-grid pt-4">
<button class="btn btn-success fw-bold "><a href='<?php echo "singleProductView.php?id=".$product_data["pid"];?>' class="text-decoration-none text-white">Buy Now</a></button>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- card -->
    <?php
}
?>
<!--  -->
<div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
<nav aria-label="Page navigation example">
<ul class="pagination pagination-lg justify-content-center">
<li class="page-item">
<a class="page-link" href="<?php  
if($pageno <= 1){
echo"#";

}else{
echo "?page=" . ($pageno - 1);
}
                                            
?>" aria-label="Previous">
<span aria-hidden="true">&laquo;</span>
</a>
</li>
<?php  
for($x = 1; $x <= $number_of_pages; $x++){
if($x == $pageno){
?>
<li class="page-item active">
<a class="page-link bg-success" href="<?php  echo "?page=".($x); ?>"><?php echo $x; ?></a>
</li>

<?php

}else{
?>
<li class="page-item ">
<a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
</li>
 

<?php

}
}
?>
                              
<li class="page-item">
<a class="page-link" href="<?php if($pageno >= $number_of_pages){

echo"#";

}else{
echo "?page=" . ($pageno + 1);

} ?>" aria-label="Next">
<span aria-hidden="true">&raquo;</span>
</a>
</li>
</ul>
</nav>
</div>
<!--  -->
 
        </div>
    </div>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>
</html>