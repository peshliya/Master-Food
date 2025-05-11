<?php
session_start();
require "connection.php";

$user = $_SESSION["u"];

$price = $_POST["price"];
$brand = $_POST["brand"];
$pro = $_POST["pro"];
$page = $_POST["page"];

$productQuery = "SELECT * FROM `product` 
INNER JOIN `type_has_items` ON `product`.type_has_items_id = `type_has_items`.id WHERE `type_has_items`.items_id='6' ";

if($brand != "0"){
    $productQuery .= " AND `product`.condition_id='" .$brand. "' ";
}

if($price != "0"){
    if($price == "1"){
        $productQuery .= " ORDER BY `price` DESC";
    } else if($price == "2"){
        $productQuery .= " ORDER BY `price` ASC";
    }
}



// if($pro != "0"){
//     if($pro == "1"){
//         $productQuery .= " ORDER BY `product`.datetime_addsd DESC";
//     } else if($pro == "2"){
//         $productQuery .= " ORDER BY `product`.datetime_addsd ASC";
//     }
// }

if($price !="0" && $pro != "0" ){
    if($pro == "1"){
        $productQuery .= " , `product`.datetime_addsd DESC";
        // desc yanu desending order eka
    }else if($pro == "2"){
        $productQuery .= " , `product`.datetime_addsd ASC";
    }
} else if ($price == "0" && $pro != "0" ) {
    if ($pro == "1") {
        $productQuery .= " ORDER BY `product`.datetime_addsd DESCC";
    } else if ($pro == "2") {
        $productQuery .= " ORDER BY `product`.datetime_addsd ASC";
    }
}


?>

<div class="offset-1 col-10 text-center ">
    <div class="row justify-content-center">

<?php
if("0" != ($_POST["page"])){
    $pagenum = $_POST["page"];
}else{
    $pagenum = 1;
}

$products_rs = Database::search("$productQuery");
$products_num = $products_rs->num_rows;

$result_per_page = 4;
$number_of_pages = ceil($products_num / $result_per_page);

$page_result = ($pagenum - 1) * $result_per_page;

$selected_rs = Database::search($productQuery . " LIMIT " . $result_per_page . " OFFSET " . $page_result . " ");
$selected_num = $selected_rs->num_rows;

for ($x = 0; $x < $selected_num; $x++){
    $selected_data = $selected_rs->fetch_assoc();

    ?>
<!-- card -->
<div class="card mb-3 mt-3 col-12 col-lg-5 m-5" >
<div class="row">
<div class="col-md-4 mt-4">


<?php
                    
$product_img_rs = Database::search("SELECT *
FROM `product`
INNER JOIN type_has_items ON `product`.type_has_items_id = `type_has_items`.id
INNER JOIN images ON `product`.pid = `images`.product_id WHERE `product`.pid='".$selected_data['pid']."' ");
$product_img_data =$product_img_rs->fetch_assoc();
                    
                    
?>

<img src="<?php  echo $product_img_data["cade"]; ?>" class="img-fluid rounded-start" style="height: 150px;" />
</div>
<div class="col-md-8">
<div class="card-body">
<h5 class="card-title fw-bold"><?php  echo $selected_data["title"]; ?></h5>
<span class="card-text fw-bold text-primary">Rs. <?php  echo $selected_data["price"]; ?> .00</span><br />
<span class="card-text fw-bold text-success"><?php  echo $selected_data["qty"]; ?> Items left</span>
<div class="col-12 col-lg-6 d-grid pt-4">
<button class="btn btn-success fw-bold" onclick="addToCart(<?php echo $selected_data['pid']; ?>);">add to cart</button>
</div>

<div class="col-12 col-lg-6 d-grid pt-4">
<button class="btn btn-success fw-bold "><a href='<?php echo "singleProductView.php?id=".$selected_data["pid"];?>' class="text-decoration-none text-white">Buy Now</a></button>
</div>
</div>
</div>
</div>
</div>
<!-- card -->
    <?php
}
?>    
    </div>
</div>


<div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
<nav aria-label="Page navigation example">
<ul class="pagination pagination-lg justify-content-center">
<li class="page-item">
<a class="page-link" <?php if ($pagenum <= 1) {
echo "#";
} else {
   ?>
   onclick="sort('<?php echo ($pagenum - 1); ?>');"
   <?php
// echo "?page=" . ($pageno - 1);
} ?> aria-label="Previous">
<span aria-hidden="true">&laquo;</span>
</a>
</li>
<?php

for ($x = 1; $x <= $number_of_pages; $x++) {
if ($x == $pagenum) {

?>
<li class="page-item active">
<a class="page-link bg-success" onclick="sort('<?php echo $x; ?>');"><?php echo $x; ?></a>
</li>
<?php

} else {
?>
<li class="page-item">
<a class="page-link" onclick="sort('<?php echo $x; ?>');"><?php echo $x; ?></a>
</li>
<?php
}
}

?>

<li class="page-item">
<a class="page-link" <?php if ($pagenum >= $number_of_pages) {
echo "#";
} else {
    ?>
   onclick="sort('<?php echo ($pagenum + 1); ?>');"
   <?php
// echo "?page=" . ($pageno + 1);
} ?> aria-label="Next">
<span aria-hidden="true">&raquo;</span>
</a>
</li>
</ul>
</nav>
</div>
