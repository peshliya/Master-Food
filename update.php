<?php 
require "connection.php";
session_start();

if(isset($_SESSION["u"])){
if(isset($_SESSION["p"])){

$product= $_SESSION["p"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Foods | MasterFood</title>
    <link rel="icon" href="resource/download.webp"/>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class=" col-12 container-fluid">
        <div class=" row">

        <?php include "header.php"; ?>

     
<div class=" col-2 offset-10 mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="sellerProductViewPage.php">my Food page</a></li>
    <li class="breadcrumb-item active" aria-current="page">Update</li>
  </ol>
</nav>
</div>

<div class=" offset-1 col-10 ">
    <div class=" row">
        <div class="mb-2"><h1>Update Foods</h1></div>
    <div class="col-12">
    <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
      <h4 id="list-item-1">Cell phones  &blacktriangleright;</h4>
      <p>
      <div class="container text-center">

  <div class="col-12 row mb-1 bg-secondary text-light">
    <div class="col-2">Image</div>
    <div class="col-2">Name</div>
    <div class="col-2">Description</div>
    <!-- <div class="col-2">Update</div> -->
    <div class="col-3 ">Price</div>
    <div class="col-1">Qty</div>
    <div class="col-2 text-end" ><i class="bi bi-trash3-fill"></i>del</div>
    </div>
<?php 
$product_rs = Database::search("SELECT * FROM `product` WHERE `pid`='".$product['pid']."'");

$product_data = $product_rs->fetch_assoc();
$imgs_rs = Database::search("SELECT *
FROM images
INNER JOIN product ON images.product_id=product.pid
WHERE `product`.pid='".$product_data['pid']."' 
");
$imgs_data= $imgs_rs->fetch_assoc();

?>
    <div class="col-12 row mb-1 mt-2 ">
    <div class="col-2 " ><img src="<?php echo $imgs_data['cade']; ?>" style="height:100px;" id="image" /></div>
    <div class="col-2" ><label id="title"><?php echo $product_data['title']; ?></label></div>
    <div class="col-2" ><input type="text" class="border-0 border-bottom border-dark " id="description" value="<?php echo $product_data['description']; ?>"/></div>
    <!-- <div class="col-2"><a onclick="updateProduct();" class="text-decoration-none text-dark activeupdate" style="cursor: pointer;">Update</a></div> -->
    
    <div class="col-3">
        <div class="row">
            <div class="col-1">Rs.</div>
            <div class="col-7"><input type="text" id="price" value="<?php echo $product_data['price'];?>" class="border-0 border-bottom border-dark"></div>
            <div class="col-2">.00</div>
        </div></div>
    <div class="col-1">
        <input type="text" id="qty" value="<?php echo $product_data['qty']; ?>" class="border-0 border-bottom border-dark">
     </div>
     <div class="col-2 text-end" id="del" onclick="deleteProductsBySeller();" ><a href="deletehere.php" class=" text-decoration-none text-dark"><i class="bi bi-trash3-fill"></i></a>del</div>

    </div>

<div class="col-12 ">
    <div class="row">
    <div class=" col-9 mt-3">
<div class="row justify-content-start">
    <div class="col-3">
    <li class=" d-flex flex-column justify-content-center align-items-center border-1 border-secondary mb-1">
            <img src="resource/noimg.jpg" class="img-thumbnail mt-1 mb-1" id="i0" style="height: 200px;" >
        </li>
    </div>
    <div class="col-3">
    <li class=" d-flex flex-column justify-content-center align-items-center border-1 border-secondary mb-1">
            <img src="resource/noimg.jpg" class="img-thumbnail mt-1 mb-1" id="i1" style="height:200px;">
        </li>
    </div>
    <div class="col-3">
    <li class=" d-flex flex-column justify-content-center align-items-center border-1 border-secondary mb-1" >
            <img src="resource/noimg.jpg" class="img-thumbnail mt-1 mb-1" id="i2" style="height:200px;" >
        </li>
    </div>
  </div>
  </div>

<div class="col-3">
    <button class="rounded-circle btn btn-outline-primary fs-5  activeupdate" id="updatebtn" onclick="updateProduct();" >update</button>
</div>

    </div>
</div>

  <div class=" col-6 flex-column">
    <div class=" col-3">
    <input type="file" class="d-none rounded-pill" id="imageuploader" multiple />
<label for="imageuploader" class="col-12 btn btn-secondary rounded-pill" onclick="uploadproductimg();">Choose Images</label>
    </div>
  </div>
  

    </div>
    </div>
    </div>
    </div>
    </div>

    <div class=" offset-1 col-10 mt-4">
        <div class="row">
            <div class="offset-1 col-10"><i class="bi bi-plus-lg fw-bold fs-5" style="cursor:pointer ;" id="dnonetoggle1" onclick="toggle();" > Add</i></div>
            <div class=" offset-1 col-10 d-none " id="dnonetoggle2">

            <div class="col-12 row mb-1 bg-secondary text-light">
 
<div class="col-2">Image</div>
    <div class="col-2">Name</div>
    <div class="col-2">Description</div>
    <div class="col-2">Update</div>
    <div class="col-2">Price</div>
    <div class="col-1">Qty</div>
    <div class="col-1" ><i class="bi bi-trash3-fill"></i></div>
    
    </div>
     <div class="col-12 row mb-1">
     <div class="col-2">Image</div>
    <div class="col-2"><input type="text" value="Name" class="border-0 border-bottom"></div>
    <div class="col-2"><input type="text" value="Description" class="border-0 border-bottom"></div>
    <div class="col-2">Update</div>
    <div class="col-2"><input type="text" value="Price" class="border-0 border-bottom"></div>
    <div class="col-1"><input type="text" value="Qty" class="border-0 border-bottom"></div>
    <div class="col-1" ><i class="bi bi-trash3-fill"></i></div>
    </div>
    <div class=" col-6 mt-3">
<div class="row justify-content-start">
    <div class="col-2">
    <li class=" d-flex flex-column justify-content-center align-items-center border-1 border-secondary mb-1">
            <img src="resource/Screenshot 2022-10-28 191928.jpg" class="img-thumbnail mt-1 mb-1">
        </li>
    </div>
    <div class="col-2">
    <li class=" d-flex flex-column justify-content-center align-items-center border-1 border-secondary mb-1">
            <img src="resource/Screenshot 2022-10-28 191736.jpg" class="img-thumbnail mt-1 mb-1">
        </li>
    </div>
    <div class="col-2">
    <li class=" d-flex flex-column justify-content-center align-items-center border-1 border-secondary mb-1">
            <img src="resource/facial hair remover.jpg" class="img-thumbnail mt-1 mb-1">
        </li>
    </div>
  </div>
  </div>

  <div class=" col-6 flex-column mb-5">
    <div class=" col-3">
    <input type="file" class="d-none rounded-pill" id="imageuploader" multiple />
<label for="imageuploader" class="col-12 btn btn-secondary rounded-pill">Choose Food</label>
    </div>
  </div>

            </div>
        </div>
    </div>
        </div>
    </div>
<script src="bootstrap.bundle.js"></script>
<script src="script.js"></script>
</body>
</html>

<?php
}else{
header("location:myProduct.php");
}
}else{
    echo("Please logon First");
}
?>