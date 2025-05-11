<?php
require "connection.php";
session_start();
$pid = $_GET["id"];
// echo ($pid);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Food View | MasterFood</title>
    <link rel="icon" href="resource/download.webp"/>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class=" container-fluid">
    <div class=" row">
    <?php include "header.php"; ?>

   

<div class=" col-12 mt-0 bg-white">
    <div class=" row">
   
<div class=" col-12">
    <div class=" row">
      
<div class=" col-10 d-lg-none d-block order-2 order-lg-1">
    <ul>
    <li class=" d-flex flex-column justify-content-center align-items-center border-1 border-secondary mb-1">
            <img src="resource/Screenshot 2022-10-28 191928.jpg" class="img-thumbnail mt-1 mb-1">
        </li>   
        <li class=" d-flex flex-column justify-content-center align-items-center border-1 border-secondary mb-1">
            <img src="resource/Screenshot 2022-10-28 191736.jpg" class="img-thumbnail mt-1 mb-1">
        </li>
        <li class=" d-flex flex-column justify-content-center align-items-center border-1 border-secondary mb-1">
            <img src="resource/facial hair remover.jpg" class="img-thumbnail mt-1 mb-1">
        </li>
        
        
    </ul>
</div> 


    </div>
</div>






<!--  -->
<div class=" offset-1  mt-2 mb-2 col-lg-5 d-none d-lg-block  order-2 order-lg-1">
    <div class=" row">

<div class=" col-12 align-items-center border border-1 border-secondary ">
    <div class=" main-img" id="main_img">
    </div>
</div>
<div class=" col-12">
<div class="row justify-content-start">
<?php
    
    $image_rs = Database::search("SELECT * FROM `images` WHERE  `product_id`='".$pid."' ");
    $image_num = $image_rs -> num_rows;
    $img = array();

    if($image_num != 0 ){

        for($x = 0; $x < $image_num ; $x++){
            $image_data = $image_rs-> fetch_assoc();
            $img[$x] = $image_data["cade"];
            ?>
            
          <div class="col-4">
          <li class="d-flex flex-column justify-content-center align-items-center border border-1 border-secondary mb-1">
            <img src="<?php echo $img["$x"]; ?>" style="height: 200px;" class="img-thumbnail mt-1 mb-1" 
               id="productImg<?php echo $x; ?>" onclick="loadMainImg(<?php echo $x; ?>);"/>
            </li>
          </div>
            
            <?php
        }
    }else{
        ?>
      <div class="col-4" >
      <li class=" d-flex flex-column justify-content-center align-items-center border border-1 border-secondary mb-1">
        <img src="resource/noimg.jpg" style="height: 150px;"  class="img-thumbnail mt-1 mb-1" />
    </li>
      </div>
      <div class="col-4">
      <li class=" d-flex flex-column justify-content-center align-items-center border border-1 border-secondary mb-1">
        <img src="resource/noimg.jpg" style="height: 150px;" class="img-thumbnail mt-1 mb-1" />
    </li>
      </div>
      <div class="col-4">
      <li class=" d-flex flex-column justify-content-center align-items-center border border-1 border-secondary mb-1">
        <img src="resource/noimg.jpg" style="height: 150px;" class="img-thumbnail mt-1 mb-1" />
    </li>
      </div>
    
<?php
    }
    
    ?>
  
  </div>
  </div>
    </div>
</div>


<?php
    $product_rs = Database::search("SELECT * FROM `product` WHERE `pid`='" . $pid . "'");
$product_num = $product_rs->num_rows;





for($x=0; $x < $product_num; $x++){
    $product_data = $product_rs->fetch_assoc();
    $price = $product_data["price"];
$adding_price = ($price / 100) * 3;
$new_price = $price + $adding_price;
$difference = $new_price - $price;
$percentage = ($difference / $price) * 100;
    ?>
  



<!--  -->
<div class=" col-12 col-lg-5 mt-3 ">
    <div class=" row">
    <table class="table">
  <thead>
    <tr>
      <th scope="col"> &nbsp;></th>
      <th scope="col">Product details</th>
      
      
    </tr>
  </thead>
  <tbody>

    <tr>
      <th scope="row"></th>
      <td>product name :</td>
      <td><?php echo $product_data["title"]; ?></td>
      
    </tr>
    <tr>
      <th scope="row"></th>
      <td>price :</td>
      <td>Rs. <?php echo $product_data["price"]; ?> .00 &nbsp;&nbsp;  <span class="text-decoration-line-through opacity-50">Rs. <?php echo $new_price; ?> .00</span></td>
      
    </tr>
 <tr>
      <th scope="row"></th>
      <td>save</td>
      <td>Rs. <?php echo $difference; ?> .00 &nbsp;&nbsp;(<?php echo $percentage; ?>%)
    </td>
      
    </tr>


    <tr>
      <th scope="row"></th>
      <td>warrenty</td>
      <td>6 months warrenty</td>
      
    </tr>
   
    <tr>
      <th scope="row"></th>
      <td>delivery fee :</td>
      <td>Within Colombo Rs. <?php echo $product_data["delivery_fee_colombo"]; ?> .00</td>
      
    </tr>
    <tr>
      <th scope="row"></th>
      <td>delivery fee :</td>
      <td>Whithout Colombo Rs. <?php echo $product_data["delivery_fee_other"]; ?> .00</td>
      
    </tr>
    <tr>
      <th scope="row"></th>
      <td>Ratings :</td>
      <td>    
         <i class="bi bi-star-fill text-warning fs-5"></i>
        <i class="bi bi-star-fill text-warning fs-5"></i>
        <i class="bi bi-star-fill text-warning fs-5"></i>
        <i class="bi bi-star-fill text-warning fs-5"></i>
        <i class="bi bi-star-half text-warning fs-5"></i>
    </td>
      
    </tr>
   
  </tbody>
</table>

<div class=" col-12">
    <div class=" row">

<div class="col-4 ">
    <label class="form-label "></label>
    <select class="form-select bg-black rounded-0 " style="color: white;">
    <option class="bg-light" style="color: black;">select Food Category </option>
        <option class="bg-light" style="color: black;">Dessert</option>
        <option class="bg-light" style="color: black;">Soup </option>
        <option class="bg-light" style="color: black;">Pizza</option>
        <option class="bg-light" style="color: black;">Drinks</option>
        <option class="bg-light" style="color: black;">Meals</option>
       
        
    </select>
</div>  

<div class=" col-7 mt-4">
    <div class=" row ">
    <div class="input-group ">
  <span class="input-group-text bg-body rounded-0">Quantity :</span>
  <input type="text" aria-label="First name" class="form-control " pattern="[0-9]"  value="1"  id="qty_input"  onkeyup='checkValue(<?php echo $product_data["qty"]; ?>);' />
  <span class="input-group-text rounded-0" >
    <div class="position-absolute qty-buttons">
<div class="justify-content-center d-flex flex-column align-items-center 
border border-1 border-secondary qty-inc rounded-0">
<i class="bi bi-caret-up-fill text-black fs-5" onclick='qty_inc(<?php echo $product_data["qty"]; ?>);'></i>
</div>
<div class="justify-content-center d-flex flex-column align-items-center 
border border-1 border-secondary qty-dec rounded-0">
<i class="bi bi-caret-down-fill text-black fs-5" onclick="qty_dec();"></i>
</div>
</div>
</span>
 
</div>
   
        
    </div>
</div>

    </div>
</div>

<div class=" col-12 mt-3 mt-lg-5 mb-3">
    <div class=" row">
        <div class=" col-4 text-end">
        <button type="button" class="btn btn-dark" onclick="payment(<?php echo $pid ?>);">
            Buy Now</button>
        </div>
        <div class=" col-4 text-center">
        <!-- <button type="button" class="btn btn-dark" data-bs-toggle="button">
         Add To Card</button> -->
         <button type="button" class="btn btn-dark" data-bs-toggle="button" onclick="addToCart(<?php echo $product_data['pid']; ?>);">Add to cart</button>
        </div>
        <div class=" col-2 text-start">
        <button type="button" class="btn btn-dark" data-bs-toggle="button">
        <i class="bi bi-heart-fill text-light "></i></button>
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

<div class="col-10">
  <hr class="offset-1 border border-success opacity-25 bg-success">
</div>

<div class=" col-12">
  <p class="text-start opacity-50" style="font-size: 30px;">Related Foods &blacktriangleright;</p>
</div>



<div class="col-12 mb-3">
<div class="row ">


                            <div class="col-12 mt-4 ">
                                <div class="row justify-content-center gap-2 ">
                                    
                                    


<?php
$type_rs = Database::search("SELECT `type_has_items_id` FROM product WHERE pid='" . $pid . "'");
$type_data = $type_rs->fetch_assoc();

$related_rs = Database::search("SELECT * FROM `product` WHERE `type_has_items_id`='" . $type_data['type_has_items_id']. "' LIMIT 5");
$related_num = $related_rs->num_rows;
for($r = 0; $r < $related_num ; $r++){
    $related_data = $related_rs->fetch_assoc();
?>
                                    <div class="card mt-2 mb-2 border-dark me-2" style="width: 15rem;">
                                    <?php
        $im_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $related_data['pid'] . "'");
        $im_num = $im_rs->num_rows;
        $im_data = $im_rs->fetch_assoc();
?>
                                   <?php
                                   if($im_num==0){
                                    ?>
                                    <img src="resource/noimg.jpg" class="card-img-top " style="height: 200px;">
                                    <?php
                                   }else{
                                    ?>
                                         <img src="<?php echo $im_data['cade']; ?>" class="card-img-top " style="height: 200px;"  >
                                    <?php
                                   }
                                   ?>
                                        <div class="card-body ms-0 m-0 text-center">
                                            <h5 class="card-title"><?php echo $related_data['title']; ?>
                                            <?php
                                      $con_rs= Database::search("SELECT * FROM product INNER JOIN `condition` ON `product`.condition_id=`condition`.id WHERE pid='" . $related_data['pid'] . "'");
                                            $con_data = $con_rs->fetch_assoc();
                                            ?>
                                            <span class="badge bg-black"><?php echo $con_data['name']; ?></span></h5>
                                            <span class="card-text text-primary">Rs.<?php echo $related_data['price']; ?> .00
                                            </span>
                                            <span class="card-text text-warning fw-bold"> In Stock
                                            </span><br/>
                                            <span class="card-text text-success fw-bold"><?php echo $related_data['qty']; ?>  Items Available
                                            </span><br/><br/>
                                            <div class="row">
                                            <!-- <button class="offset-1 col-5 btn btn-primary " >buy Now</button> -->
                                            <a href='<?php echo "singleProductView.php?id=".$related_data["pid"];?>' class="offset-1 col-5 btn btn-primary">Buy Now</a>
                                            <button class="offset-1 col-3 btn btn-primary mt-2 " ><span ><i class="bi bi-cart" style="font-size: 20px;"></i></span></button>
                                            </div>
                                        <!-- <button class="col-12 btn btn-light mt-2"><i class="bi bi-heart-fill text-danger "></i></button> -->
                                        <button class="col-12 btn btn-light mt-2" onclick="addToCart(<?php echo $related_data['pid']; ?>);"><i class="bi bi-heart-fill text-danger "></i></button>
                                        </div>
                                    </div>
                         
<?php
}

?>
                                
                                </div></div>
                            

                            </div></div>
                                                        

<div class="col-10">
  <hr class="offset-1 border border-success opacity-25 bg-success">
</div>

<div class=" col-12">
  <p class="text-start opacity-50" style="font-size: 30px;">Food description &blacktriangleright;</p>
</div>
                    
<div class=" col-12">
    <div class=" row">
        <p><?php echo $product_data["description"]; ?></p>
    </div>
</div>

    </div>
</div>
<?php include "footer.php"; ?>
<script src="bootstrap.bundle.js"></script>
<script src="script.js"></script> 
</body>
</html>