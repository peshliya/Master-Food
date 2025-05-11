<?php

require "connection.php";

$searchText =$_POST["search"];
$category =$_POST["category"];
$brand =$_POST["items"];
$model =$_POST["type"];
$colour =$_POST["color"];
$priceFrom =$_POST["pf"];
$priceTo =$_POST["pt"];
$sort =$_POST["sortby"];

$query = "SELECT * FROM `product`";
$status = 0;

if($sort == 0 ){

    if(!empty($searchText)){
        $query .= " WHERE `title` LIKE '%$searchText%'";
        $status =1;
        
    }
    if($status == 0 && $category !=0){
        $query .= " WHERE `category_id`='".$category."'";
        $status = 1; 
    } else if($status !=0 && $category !=0){
        $query .= " AND `category_id`='".$category."'";
    } 
    
    $pid =0;
    if($brand != 0 && $model ==0){

$brand_rs = Database::search("SELECT * FROM `type_has_items` WHERE `items_id`='".$brand."'");
$brand_num = $brand_rs->num_rows;
for($x = 0; $x <$brand_num ; $x++){
$brand_data = $brand_rs->fetch_assoc();
$pid=$brand_data["id"];
}

if($status == 0){
$query .= " WHERE  `type_has_items_id` = '".$pid."'";
$status = 1;
}else if ($status != 0){
    $query .=" AND `type_has_items_id`='".$pid."'";
}
    } 

    if($brand == 0 && $model !=0){
        $model_rs = Database::search("SELECT * FROM `type_has_items` WHERE `type_id`='".$model."'");
        $model_num = $model_rs->num_rows;
        for($x = 0; $x <$model_num ; $x++){
        $model_data = $model_rs->fetch_assoc();
        $pid=$model_data["id"];
        }
        if($status == 0){
        $query .= " WHERE  `type_has_items_id` = '".$pid."'";
        $status = 1;
        }else if ($status != 0){
            $query .=" AND `type_has_items_id`='".$pid."'";
        }
            } 

            if($brand != 0 && $model !=0){

                $model_has_brand_rs = Database::search("SELECT * FROM `type_has_items` WHERE `items_id`='".$brand."'
                AND `type_id`='".$model."'");
                $model_has_brand_num = $model_has_brand_rs->num_rows;
                for($x = 0; $x <$model_has_brand_num  ; $x++){
                $model_has_brand_data = $model_has_brand_rs->fetch_assoc();
                $pid=$model_has_brand_data["id"];
                }

                if($status == 0){
                $query .= " WHERE  `type_has_items_id` = '".$pid."'";
                $status = 1;
                }else if ($status != 0){
                    $query .=" AND `type_has_items_id`='".$pid."'";
                }
                    }


//      if($status == 0 && $condition !=0){
//         $query .= " WHERE `condition_id`='".$condition."'";
//         $status = 1;
//      }else if($status != 0 && $condition !=0){
// $query .= " AND `condition_id`='".$condition."'";

//      }
     
     if($status == 0 && $colour !=0){
        $query .= " WHERE `colour_id`='".$colour."'";
    $status=1;

     }else if($status != 0 && $colour !=0){
        $query .= " AND `colour_id`='".$colour."'";
     }
       if(!empty($priceFrom)&& empty($priceTo)){
if($status==0){
    $query .=" WHERE `price` >= '". $priceFrom."'";
    $status == 1;
}else if($status !=0){
$query .= " AND `price` >= '".$priceFrom."'";
}

}else if(empty($priceFrom) && !empty($priceTo)){
if($status == 0){
    $query .= " WHERE  `price` <= '".$priceTo."'";
    $status = 1;
}else if($status !=0){
$query .=" AND `price` <= '".$priceTo."'";
}

}else if(!empty($priceFrom) && !empty($priceTo)){
    if($status==0){
        $query .= " WHERE `price` BETWEEN  '".$priceTo."' AND '".$priceTo."'";
        $status = 1;
    }else if($status != 0){
        $query .= " AND `price` BETWEEN '".$priceFrom."' AND '".$priceTo."'";

    }
}
     
    


                
  }else if ($sort == 1){
    
 
    if(!empty($searchText)){
        $query .=" WHERE title LIKE '%$searchText%' ORDER BY price DESC";
    
       
        $status = 1;
    }else{
        $status = 1;
        $query .=" WHERE `title` LIKE '%$status%' ORDER BY `price` DESC";
        
    }
    // echo("PRICE HIGH TO LOW");
}else if($sort == 2){
    if(!empty($searchText)){
        $query .=" WHERE `title` LIKE '%$searchText%' ORDER BY `price` ASC";
        $status = 1;
    }
    else{
        $status = 1;
        $query .=" WHERE `title` LIKE '%$status%' ORDER BY `price` ASC";
        
    }
    // echo("PRICE LOW TO HIGH");
}else if($sort == 3){
    if(!empty($searchText)){
        $query .=" WHERE `title` LIKE '%$searchText%' ORDER BY `qty` DESC";
        $status = 1;
    }else{
        $status = 1;
        $query .=" WHERE `title` LIKE '%$status%' ORDER BY `qty` DESC";
        
    }
    // echo("QUANTITY HIGH TO LOW");
}
else if($sort == 4){
    if(!empty($searchText)){
        $query .=" WHERE `title` LIKE '%$searchText%' ORDER BY `qty` ASC";
        $status = 1;
    }else{
        $status = 1;
        $query .=" WHERE `title` LIKE '%$status%' ORDER BY `qty` ASC";
        
    }
    // echo("QUANTITY LOW TO HIGH");
}

?>
<?php

if ($_POST["page"] != "0") {

    $pageno = $_POST["page"];
} else {

    $pageno = 1;
}

$product_rs = Database::search($query);
$product_num = $product_rs->num_rows;

$results_per_page = 6;
$number_of_pages = ceil($product_num / $results_per_page);

$viewed_results_count = ($pageno - 1) * $results_per_page;

$query .= " LIMIT " . $results_per_page . " OFFSET " . $viewed_results_count . "";
$results_rs = Database::search($query);
$results_num = $results_rs->num_rows;

while ($results_data = $results_rs->fetch_assoc()) {
?>

    <div class="card mb-3 mt-3 col-12 col-lg-5 m-2 ">
        <div class="row">

            <div class="col-md-4 mt-4">
<?php 
$image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$results_data['pid']."' ");
$image_data = $image_rs-> fetch_assoc();

?>
                <img src="<?php echo $image_data["cade"]; ?>" class="img-fluid rounded-start" style="height:100px ;"/>
            </div>
            <div class="col-md-8">
                <div class="card-body">

                    <h5 class="card-title fw-bold"><?php echo $results_data["title"]; ?></h5>
                    <span class="card-text text-primary fw-bold"><?php echo $results_data["price"]; ?></span>
                    <br />
                    <span class="card-text text-success fw-bold fs"><?php echo $results_data["qty"]; ?></span>

                    <div class="row">
                        <div class="col-12">

                            <div class="row g-1">
                                <div class="col-12 col-lg-6 d-grid">
                                    <a href='<?php echo "singleProductView.php?id=".$results_data["pid"];?>' class="btn btn-success fs">Buy Now</a>
                                </div>
                                <div class="col-12 col-lg-6 d-grid">
                                    <!-- <a href="#" class="btn btn-danger fs">Add Cart</a> -->
                                    <button class="btn btn-danger fs" onclick="addToCart(<?php echo $results_data['pid']; ?>);">Add cart</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php
}

?>



   <!--  -->
   <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-lg justify-content-center">
                        <li class="page-item">
                            <a class="page-link" <?php if ($pageno <= 1) {
                                                        echo ("#");
                                                    } else {
                                                    ?> onclick="advanceSearch(<?php echo ($pageno - 1) ?>);" <?php
                                                         } ?> aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php

                        for ($x = 1; $x <= $number_of_pages; $x++) {
                            if ($x == $pageno) {
                        ?>
                                <li class="page-item active">
                                    <a class="page-link" onclick="advanceSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                                </li>
                            <?php
                            } else {
                            ?>
                                <li class="page-item">
                                    <a class="page-link" onclick="advanceSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                                </li>
                        <?php
                            }
                        }

                        ?>

                        <li class="page-item">
                            <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                                        echo ("#");
                                                    } else {
                                                    ?> onclick="advanceSearch(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                    } ?> aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!--  -->




