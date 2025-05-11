<?php 
session_start();
require "connection.php";
?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Food | Home page</title>
    <link rel="stylesheet" href="bootstrap.css" /> 
       <link rel="icon" href="resource/download.webp"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="style.css" />
</head>
<body class="" style="margin:0px;" >


<?php  include "header.php"; ?>
<div class=" container-fluid col-12 vh-100">
    <div class="row">



<!--  -->
<div class="col-12 " >
    <div class="row">
                <!--  carousel-->
                <div id="carouselExampleControls" class="carousel slide body2" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <p class="d-block w-100 fs-2 text-black text-center" >Order now </p>
    </div>
    <div class="carousel-item">
    <p class="d-block w-100 fs-2 text-black text-center" >www.Masterfood.com</p>
    </div>
    <div class="carousel-item">
    <p class="d-block w-100 fs-2 text-black text-center" >The easiest way to build different sites many themes</p>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon visually-hidden" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon visually-hidden" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
     
     <!-- slider end -->
    </div>
</div>


     <div class="col-12  d-none d-lg-block " >
<div class="row">

<div id="carouselExampleCaptions" class="carousel slide mainimage h-100 "  data-bs-ride="false">
  <div class="carousel-indicators">

  </div>
  <div class="carousel-inner col-12">
    <div class="carousel-item active">
      <img src="resource/imagek.jpg" class="d-block w-100" >
      <div class="col-12  ">
      <div class="carousel-caption d-block ">
      <div class="spinner-grow bg-info " role="status" >
    
     
     <!-- <h1><i class="bi bi-flower1 ">&nbsp;</i><i class="bi bi-flower1"></i>&nbsp;<i class="bi bi-flower1"></i>&nbsp;<i class="bi bi-house-heart ">&nbsp;<i class="bi bi-flower1 ">&nbsp;</i><i class="bi bi-flower1"></i>&nbsp;<i class="bi bi-flower1"></i></i></h1></button> -->
      </div>
    </div>
    </div>

  </div>
  <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button> -->
</div>

</div>
</div>
     </div>

     <div class="col-12 text-center ">
      <div class=" d-block d-lg-none ">
      
     <button class="btn "   >
     <h5  >our Food House</h5></br/>
     <h1><i class="bi bi-flower1 ">&nbsp;</i><i class="bi bi-flower1"></i>&nbsp;<i class="bi bi-flower1"></i>&nbsp;<i class="bi bi-house-heart">&nbsp;<i class="bi bi-flower1 ">&nbsp;</i><i class="bi bi-flower1"></i>&nbsp;<i class="bi bi-flower1"></i></i></h1></button>
      </div>
    </div>




<div class="col-10 ">
  <hr class="offset-1 border border-light opacity-25">
</div>

     <!-- search -->
     <div class="col-12 mt-5 mt-lg-0 ">
            <div class="row">
              <div class="col-8">
<div class="input-group mb-3 offset-2 mt-3">
  <input type="text" class="form-control " placeholder="search here" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <span class="input-group-text bgct" id="basic-addon2">search</span> 
</div>
 </div>

        
<!-- search -->
<div class=" offset-2 col-2 mt-3">
<span ><i class="bi bi-cart text-light" style="font-size: 30px;"></i></span>
</div>
    
            </div>
        </div>

<?php
$items_rs = Database::search("SELECT * FROM items");
$items_num = $items_rs-> num_rows;

for($x =0; $x < $items_num ; $x++){
  $items_data = $items_rs ->fetch_assoc();

 
    $product_rs = Database::search("SELECT *
    FROM `product`
    INNER JOIN type_has_items ON product.type_has_items_id=type_has_items.id
    INNER JOIN items ON type_has_items.items_id=items.id
    WHERE items.name='".$items_data['name']."' AND 
    product.status_id='1'
    ORDER BY datetime_addsd DESC
    LIMIT 4 OFFSET 0
    ");
  $product_num  = $product_rs-> num_rows;
  
   $product_data = $product_rs->fetch_assoc();
   
   
  

  
  
    ?>
<?php
if($items_data["name"]=="pots"){
  $imgp_rs = Database::search("SELECT *
  FROM images
  INNER JOIN product ON images.product_id=product.pid
  INNER JOIN type_has_items ON product.type_has_items_id= type_has_items.id
  INNER JOIN items ON type_has_items.items_id =items.id WHERE items.name='pots' AND product.pid ='".$product_data["pid"]."'
  ");
  
  $imgp_data = $imgp_rs->fetch_assoc();
  ?>
    <div class="col-12 d-block">
      <div class="row">
      <div class="card mb-3 offset-lg-2 border-0" style="max-width:65%;">
    <div class="row g-0">
      <div class="col-md-4">
        <?php  
        if(isset($imgp_data["cade"])){
          ?>
     <img src="<?php echo $imgp_data["cade"]; ?>" class="img-fluid rounded-start" alt="..." style="height: 300px;">
          <?php
        }else{
          ?>
     <img src="resource/noimg.jpg" class="img-fluid rounded-start" alt="...">
          <?php
        }
        ?>
     
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?php echo $items_data["name"]; ?></h5>
          <p class="card-text">
            <?php 
            echo $imgp_data["title"];
            echo("<br/>");
            echo $imgp_data["description"];
            echo("<br/>");
       
            ?>
           <b> If you want to view more. Please click bellow button.</b>
          </p>
          <p class="card-text"><small class="text-muted"><a onclick="viewProductProcess(0);" class="btn  btn-primary">view all</a></small></p>
        </div>
      </div>
    </div>
  </div>
      </div>
  </div>
  <?php
}
?>

<?php
if($items_data["name"]=="orchid mixes"){
  $imgom_rs = Database::search("SELECT *
  FROM images
  INNER JOIN product ON images.product_id=product.pid
  INNER JOIN type_has_items ON product.type_has_items_id= type_has_items.id
  INNER JOIN items ON type_has_items.items_id =items.id WHERE items.name='orchid mixes' AND product.pid ='".$product_data["pid"]."'
  ");
  
  $imgom_data = $imgom_rs->fetch_assoc();
  ?>
    <div class="col-12 d-block">
      <div class="row">
      <div class="card mb-3 offset-lg-2 border-0" style="max-width:65%;">
    <div class="row g-0">
      <div class="col-md-4">
        <?php  
        if(isset($imgom_data["cade"])){
          ?>
     <img src="<?php echo $imgom_data["cade"]; ?>" class="img-fluid rounded-start" alt="..." style="height: 300px;">
          <?php
        }else{
          ?>
     <img src="resource/noimg.jpg" class="img-fluid rounded-start" alt="...">
          <?php
        }
        ?>
     
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?php echo $items_data["name"]; ?></h5>
          <p class="card-text">
          <?php 
            echo $imgom_data["title"];
            echo("<br/>");
            echo $imgom_data["description"];
            echo("<br/>");
       
            ?>
           <b> If you want to view more. Please click bellow button.</b>          </p>
          <p class="card-text"><small class="text-muted"><a onclick="viewProductProcessom(0);" class=" btn btn-primary">view all</a></small></p>
        </div>
      </div>
    </div>
  </div>
      </div>
  </div>
  <?php
}
?>

<?php
if($items_data["name"]=="fertilizers"){
  $imgf_rs = Database::search("SELECT *
  FROM images
  INNER JOIN product ON images.product_id=product.pid
  INNER JOIN type_has_items ON product.type_has_items_id= type_has_items.id
  INNER JOIN items ON type_has_items.items_id =items.id WHERE items.name='fertilizers' AND product.pid ='".$product_data["pid"]."'
  ");
  
  $imgf_data = $imgf_rs->fetch_assoc();
  ?>
    <div class="col-12 d-block">
      <div class="row">
      <div class="card mb-3 offset-lg-2 border-0" style="max-width:65%;">
    <div class="row g-0">
      <div class="col-md-4">
        <?php  
        if(isset($imgf_data["cade"])){
          ?>
     <img src="<?php echo $imgf_data["cade"]; ?>" class="img-fluid rounded-start" alt="..." style="height: 300px;">
          <?php
        }else{
          ?>
     <img src="resource/noimg.jpg" class="img-fluid rounded-start" alt="...">
          <?php
        }
        ?>
     
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?php echo $items_data["name"]; ?></h5>
          <p class="card-text">
          <?php 
            echo $imgf_data["title"];
            echo("<br/>");
            echo $imgf_data["description"];
            echo("<br/>");
       
            ?>
           <b> If you want to view more. Please click bellow button.</b>
          </p>
          <p class="card-text"><small class="text-muted"><a onclick="viewProductProcessf(0);" class="btn  btn-primary">view all</a></small></p>
        </div>
      </div>
    </div>
  </div>
      </div>
  </div>
  <?php
}
?>

<?php
if($items_data["name"]=="potting medias"){
  $imgpm_rs = Database::search("SELECT *
  FROM images
  INNER JOIN product ON images.product_id=product.pid
  INNER JOIN type_has_items ON product.type_has_items_id= type_has_items.id
  INNER JOIN items ON type_has_items.items_id =items.id WHERE items.name='potting medias' AND product.pid ='".$product_data["pid"]."'
  ");
  
  $imgpm_data = $imgpm_rs->fetch_assoc();
  ?>
    <div class="col-12 d-block">
      <div class="row">
      <div class="card mb-3 offset-lg-2 border-0" style="max-width:65%;">
    <div class="row g-0">
      <div class="col-md-4">
        <?php  
        if(isset($imgpm_data["cade"])){
          ?>
     <img src="<?php echo $imgpm_data["cade"]; ?>" class="img-fluid rounded-start" alt="..." style="height: 300px;">
          <?php
        }else{
          ?>
     <img src="resource/noimg.jpg" class="img-fluid rounded-start" alt="...">
          <?php
        }
        ?>
     
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?php echo $items_data["name"]; ?></h5>
          <p class="card-text">
          <?php 
            echo $imgpm_data["title"];
            echo("<br/>");
            echo $imgpm_data["description"];
            echo("<br/>");
       
            ?>
           <b> If you want to view more. Please click bellow button.</b>
          </p>
          <p class="card-text"><small class="text-muted"><a onclick="viewProductProcesspm(0);" class="btn  btn-primary">view all</a></small></p>
        </div>
      </div>
    </div>
  </div>
      </div>
  </div>
  <?php
}
?>

<?php
if($items_data["name"]=="pest control"){
  $imgpc_rs = Database::search("SELECT *
  FROM images
  INNER JOIN product ON images.product_id=product.pid
  INNER JOIN type_has_items ON product.type_has_items_id= type_has_items.id
  INNER JOIN items ON type_has_items.items_id =items.id WHERE items.name='pest control' AND product.pid ='".$product_data["pid"]."'
  ");
  
  $imgpc_data = $imgpc_rs->fetch_assoc();
  ?>
    <div class="col-12 d-block">
      <div class="row">
      <div class="card mb-3 offset-lg-2 border-0" style="max-width:65%;">
    <div class="row g-0">
      <div class="col-md-4">
        <?php  
        if(isset($imgpc_data["cade"])){
          ?>
     <img src="<?php echo $imgpc_data["cade"]; ?>" class="img-fluid rounded-start" alt="..." style="height: 300px;">
          <?php
        }else{
          ?>
     <img src="resource/noimg.jpg" class="img-fluid rounded-start" alt="...">
          <?php
        }
        ?>
     
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?php echo $items_data["name"]; ?></h5>
          <p class="card-text">
          <?php 
            echo $imgp_data["title"];
            echo("<br/>");
            echo $imgp_data["description"];
            echo("<br/>");
       
            ?>
           <b> If you want to view more. Please click bellow button.</b>
          </p>
          <p class="card-text"><small class="text-muted"><a onclick="viewProductProcesspc(0);" class="btn  btn-primary">view all</a></small></p>
        </div>
      </div>
    </div>
  </div>
      </div>
  </div>
  <?php
}
?>

<?php
if($items_data["name"]=="orchid health"){
  $imgoh_rs = Database::search("SELECT *
  FROM images
  INNER JOIN product ON images.product_id=product.pid
  INNER JOIN type_has_items ON product.type_has_items_id= type_has_items.id
  INNER JOIN items ON type_has_items.items_id =items.id WHERE items.name='orchid health' AND product.pid ='".$product_data["pid"]."'
  ");
  
  $imgoh_data = $imgoh_rs->fetch_assoc();
  ?>
    <div class="col-12 d-block">
      <div class="row">
      <div class="card mb-3 offset-lg-2 border-0" style="max-width:65%;">
    <div class="row g-0">
      <div class="col-md-4">
        <?php  
        if(isset($imgoh_data["cade"])){
          ?>
     <img src="<?php echo $imgoh_data["cade"]; ?>" class="img-fluid rounded-start" alt="..." style="height: 300px;">
          <?php
        }else{
          ?>
     <img src="resource/noimg.jpg" class="img-fluid rounded-start" alt="...">
          <?php
        }
        ?>
     
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?php echo $items_data["name"]; ?></h5>
          <p class="card-text">
          <?php 
            echo $imgoh_data["title"];
            echo("<br/>");
            echo $imgoh_data["description"];
            echo("<br/>");
       
            ?>
           <b> If you want to view more. Please click bellow button.</b>          </p>
          <p class="card-text"><small class="text-muted"><a onclick="viewProductProcessoh(0);" class="btn  btn-primary">view all</a></small></p>
        </div>
      </div>
    </div>
  </div>
      </div>
  </div>
  <?php
}
?>

<?php
if($items_data["name"]=="flower plants"){
  $imgfp_rs = Database::search("SELECT *
  FROM images
  INNER JOIN product ON images.product_id=product.pid
  INNER JOIN type_has_items ON product.type_has_items_id= type_has_items.id
  INNER JOIN items ON type_has_items.items_id =items.id WHERE items.name='flower plants' AND product.pid ='".$product_data["pid"]."'
  ");
  
  $imgfp_data = $imgfp_rs->fetch_assoc();
  ?>
    <div class="col-12 d-block">
      <div class="row">
      <div class="card mb-3 offset-lg-2 border-0" style="max-width:65%;">
    <div class="row g-0">
      <div class="col-md-4">
        <?php  
        if(isset($imgfp_data["cade"])){
          ?>
     <img src="<?php echo $imgfp_data["cade"]; ?>" class="img-fluid rounded-start" alt="..." style="height: 300px;">
          <?php
        }else{
          ?>
     <img src="resource/noimg.jpg" class="img-fluid rounded-start" alt="...">
          <?php
        }
        ?>
     
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?php echo $items_data["name"]; ?></h5>
          <p class="card-text">
          <?php 
            echo $imgfp_data["title"];
            echo("<br/>");
            echo $imgfp_data["description"];
            echo("<br/>");
       
            ?>
           <b> If you want to view more. Please click bellow button.</b>          </p>
          <p class="card-text"><small class="text-muted"><a onclick="viewProductProcessfp(0);" class="btn  btn-primary">view all</a></small></p>
        </div>
      </div>
    </div>
  </div>
      </div>
  </div>
  <?php
}
?>
 


  <?php
}

?>
                           
<!-- card -->

                                   



<!-- card -->





<?php include "footer.php"; ?>
<script src="bootstrap.bundle.js"></script>
<script src="script.js"></script>
</body>
</html>