<?php
require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product | Masterfood</title>
    <link rel="icon" href="resource/logo6.webp"/>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="style.css" />
</head>
<body class="p-5 productregbackimg vh-100 "   >
<div class="container-fluid">
<div class="row ">

<div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home.php" class="">Home</a></li>
    <li class="breadcrumb-item"><a href="sellerProductViewPage.php">My Product</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Product page</li>
  </ol>
</nav>
</div>


<p>
<div class=" offset-8 col-3 d-grid">
<button class="btn btn-primary btnimg" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2"><h4>Add new products</h4></button>

</div>
</p>
<div class="row">
  <div class="col">
   
  </div>
  <div class="col-10 ">
    <div class="collapse multi-collapse" id="multiCollapseExample2"> 
      <div class="card card-body " style="background-color:rgba(31, 151, 255, 0.27);">
        <!--  -->


<div class="container-fluid ">
<div class="row gy-3">


<div class="col-12 ">
<div class="row">

<div class="col-12 text-center">
<h2 class="h2 text-primary fw-bold">Add New Product</h2>
</div>

<div class="col-12">
<div class="row">

<div class="col-12 col-lg-4 border-end border-success">
<div class="row">

<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">CATEGORY</label>
</div>
<?php
$category_rs = Database::search("SELECT * FROM `category`");
$category_num = $category_rs -> num_rows;
?>
<div class="col-12">
<select class="form-select text-center" id="category" onchange="loarditems();" >
<option value="0">Select Category</option>
  <?php
  for($x=0; $x< $category_num ; $x++){
    $category_data = $category_rs-> fetch_assoc();
?>
<option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>
<?php

  }
  ?>




</select>
</div>

</div>
</div>

<div class="col-12 col-lg-4 border-end border-success">
<div class="row">

<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">ITEMS</label>
</div>

<?php
$items_rs = Database::search("SELECT * FROM `items`");
$items_num = $items_rs -> num_rows;
?>
<div class="col-12">
<select class="form-select text-center" id="items" onchange="loardtypes();">
<option value="0">Select type</option>
  <?php
  for($x=0; $x< $items_num ; $x++){
    $items_data = $items_rs-> fetch_assoc();
?>
<option value="<?php echo $items_data["id"]; ?>"><?php echo $items_data["name"]; ?></option>
<?php

  }
  ?>

</select>
</div>

</div>
</div>

<div class="col-12 col-lg-4 border-end border-success">
<div class="row">

<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">TYPE</label>
</div>
<?php
$type_rs = Database::search("SELECT * FROM `type`");
$type_num = $type_rs -> num_rows;
?>
<div class="col-12">
<select class="form-select text-center" id="type" >
<option value="0">Select type</option>
  <?php
  for($x=0; $x< $type_num ; $x++){
    $type_data = $type_rs-> fetch_assoc();
?>
<option value="<?php echo $type_data["id"]; ?>"><?php echo $type_data["name"]; ?></option>
<?php

  }
  ?>

</select>
</div>

</div>
</div>

<div class="col-12">
<hr class="border-success" />
</div>

<div class="col-12">
<div class="row">
<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">
Add a Title to your Product
</label>
</div>
<div class="offset-0 offset-lg-2 col-12 col-lg-8">
<input type="text" class="form-control" id="title" />
</div>
</div>
</div>

<div class="col-12">
<hr class="border-success" />
</div>

<div class="col-12">
<div class="row">


<div class="col-12 col-lg-4 border-end border-success">
<div class="row">
<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">Select Product Colour</label>
</div>
<?php
$color_rs = Database::search("SELECT * FROM `colour`");
$color_num= $color_rs->num_rows;
?>
<div class="col-12">

<select class="form-select " id="clr">
<option value="0">Select Colour</option>
<?php
for($x=0; $x< $color_num; $x++){
  $color_data= $color_rs->fetch_assoc();
  ?>
<option value="<?php echo $color_data["id"]; ?>"><?php echo $color_data["name"]; ?></option>
  <?php
}
?>






</select>
</div>

<div class="col-12">
<div class="input-group mt-2 mb-2">
<input type="text" class="form-control" placeholder="Add new Colour" id="clr_in" />
<button class="btn btn-outline-primary" type="button" id="button-addon2" onclick="colouradd();">+ Add</button>
</div>
</div>
</div>
</div>

<div class="col-12 col-lg-4">
<div class="row">
<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">Add Product Quantity</label>
</div>
<div class="col-12">
<input type="number" class="form-control" value="0" min="0" id="qty" />
</div>
</div>
</div>

</div>
</div>

<div class="col-12">
<hr class="border-success" />
</div>

<div class="col-12">
<div class="row">

<div class="col-6 border-end border-success">
<div class="row">
<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">Cost Per Item</label>
</div>
<div class="offset-0 offset-lg-2 col-12 col-lg-8">
<div class="input-group mb-2 mt-2">
<span class="input-group-text">Rs.</span>
<input type="text" class="form-control" id="cost" />
<span class="input-group-text">.00</span>
</div>
</div>
</div>
</div>

<div class="col-6">
<div class="row">
<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">Approved Payment Methods</label>
</div>
<div class="col-12">
<div class="row">
<div class="offset-0 offset-lg-2 col-2 pm pm1"></div>
<div class="col-2 pm pm2"></div>
<div class="col-2 pm pm3"></div>
<div class="col-2 pm pm4"></div>
</div>
</div>
</div>
</div>

</div>
</div>

<div class="col-12">
<hr class="border-success" />
</div>

<div class="col-12">
<div class="row">
<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">Delivery Cost</label>
</div>
<div class="col-12 col-lg-6 border-end border-success">
<div class="row">
<div class="col-12 offset-lg-1 col-lg-3">
<label class="form-label">Delivery cost Within Colombo</label>
</div>
<div class="col-12 col-lg-8">
<div class="input-group mb-2 mt-2">
<span class="input-group-text">Rs.</span>
<input type="text" class="form-control" id="dwc" />
<span class="input-group-text">.00</span>
</div>
</div>
</div>
</div>
<div class="col-12 col-lg-6">
<div class="row">
<div class="col-12 offset-lg-1 col-lg-3">
<label class="form-label">Delivery cost out of Colombo</label>
</div>
<div class="col-12 col-lg-8">
<div class="input-group mb-2 mt-2">
<span class="input-group-text">Rs.</span>
<input type="text" class="form-control" id="doc" />
<span class="input-group-text">.00</span>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="col-12">
<hr class="border-success" />
</div>

<div class="col-12">
<div class="row">
<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">Product Description</label>
</div>
<div class="col-12">
<textarea cols="30" rows="15" class="form-control" id="desc"></textarea>
</div>
</div>
</div>

<div class="col-12">
<hr class="border-success" />
</div>

<div class="col-12">
<div class="row">
<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">Add Product Images</label>
</div>
<div class="offset-lg-3 col-12 col-lg-6" style="background-color: #dfe0d7;">
<div class="row">
<div class="col-4 border border-primary rounded">
<img src="resource/noimg.jpg" class="img-fluid" style="height:150px ;" id="i0" />
</div>
<div class="col-4 border border-primary rounded">
<img src="resource/noimg.jpg" class="img-fluid" style="height:150px ;" id="i1" />
</div>
<div class="col-4 border border-primary rounded">
<img src="resource/noimg.jpg" class="img-fluid" style="height:150px ;" id="i2" />
</div>
</div>
</div>
<div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
<input type="file" class="d-none" id="imageuploader" multiple />
<label for="imageuploader" class="col-12 btn btn-primary" onclick="uploadproductimg();">Upload Images</label>
</div>
</div>
</div>

<div class="col-12">
<hr class="border-success" />
</div>

<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">Notice...</label><br />
<label class="form-label">
We are taking 3% of the product from price from every<br/>
product as a service charge.
</label>
</div>

<div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3 mb-3">
<button class="btn btn-success" onclick="addProduct();" >Save Product</button>
</div>

</div>
</div>

</div>
</div>


<!--  -->
      </div>
    </div>
  </div>
</div>

</div>
</div>







<div class="container-fluid">
<div class="row ">




<p>
<div class=" offset-8 col-3 d-grid">
<button class="btn btn-primary btnimg" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample3" aria-expanded="false" aria-controls="multiCollapseExample2"><h4>Add orchid plants</h4></button>

</div>
</p>
<div class="row">
  <div class="col">
   
  </div>
  <div class="col-10">
    <div class="collapse multi-collapse" id="multiCollapseExample3">
      <div class="card card-body">
        <!--  -->


<div class="container-fluid">
<div class="row gy-3">


<div class="col-12">
<div class="row">

<div class="col-12 text-center">
<h2 class="h2 text-primary fw-bold">Add New Product</h2>
</div>

<div class="col-12">
<div class="row">

<div class="col-12 col-lg-4 border-end border-success">
<div class="row">

<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">CATEGORY</label>
</div>
<?php
$category_rs = Database::search("SELECT * FROM `category`");
$category_num = $category_rs -> num_rows;
?>
<div class="col-12">
<select class="form-select text-center" id="category" >
<option value="0">Select Category</option>
  <?php
  for($x=0; $x< $category_num ; $x++){
    $category_data = $category_rs-> fetch_assoc();
?>
<option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>
<?php

  }
  ?>




</select>
</div>

</div>
</div>

<div class="col-12 col-lg-4 border-end border-success">
<div class="row">

<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">ITEMS</label>
</div>

<?php
$items_rs = Database::search("SELECT * FROM `items`");
$items_num = $items_rs -> num_rows;
?>
<div class="col-12">
<select class="form-select text-center" id="brand" >
<option value="0">Select type</option>
  <?php
  for($x=0; $x< $items_num ; $x++){
    $items_data = $items_rs-> fetch_assoc();
?>
<option value="<?php echo $items_data["id"]; ?>"><?php echo $items_data["name"]; ?></option>
<?php

  }
  ?>

</select>
</div>

</div>
</div>

<div class="col-12 col-lg-4 border-end border-success">
<div class="row">

<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">TYPE</label>
</div>
<?php
$type_rs = Database::search("SELECT * FROM `type`");
$type_num = $type_rs -> num_rows;
?>
<div class="col-12">
<select class="form-select text-center" id="brand" >
<option value="0">Select type</option>
  <?php
  for($x=0; $x< $type_num ; $x++){
    $type_data = $type_rs-> fetch_assoc();
?>
<option value="<?php echo $type_data["id"]; ?>"><?php echo $type_data["name"]; ?></option>
<?php

  }
  ?>

</select>
</div>

</div>
</div>

<div class="col-12">
<hr class="border-success" />
</div>

<div class="col-12">
<div class="row">
<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">
Add a Title to your Product
</label>
</div>
<div class="offset-0 offset-lg-2 col-12 col-lg-8">
<input type="text" class="form-control" id="title" />
</div>
</div>
</div>

<div class="col-12">
<hr class="border-success" />
</div>

<div class="col-12">
<div class="row">


</div>
</div>

<div class="col-12 col-lg-4 border-end border-success">
<div class="row">
<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">Select Product Colour</label>
</div>
<div class="col-12">

<select class="form-select " id="clr">
<option value="0">Select Colour</option>



<option value="1">orange</option>

<option value="1">yellow</option>

<option value="1">green</option>



</select>
</div>

<div class="col-12">
<div class="input-group mt-2 mb-2">
<input type="text" class="form-control" placeholder="Add new Colour" id="clr_in" />
<button class="btn btn-outline-primary" type="button" id="button-addon2">+ Add</button>
</div>
</div>
</div>
</div>

<div class="col-12 col-lg-4">
<div class="row">
<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">Add Product Quantity</label>
</div>
<div class="col-12">
<input type="number" class="form-control" value="0" min="0" id="qty" />
</div>
</div>
</div>

</div>
</div>

<div class="col-12">
<hr class="border-success" />
</div>

<div class="col-12">
<div class="row">

<div class="col-6 border-end border-success">
<div class="row">
<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">Cost Per Item</label>
</div>
<div class="offset-0 offset-lg-2 col-12 col-lg-8">
<div class="input-group mb-2 mt-2">
<span class="input-group-text">Rs.</span>
<input type="text" class="form-control" id="cost" />
<span class="input-group-text">.00</span>
</div>
</div>
</div>
</div>

<div class="col-6">
<div class="row">
<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">Approved Payment Methods</label>
</div>
<div class="col-12">
<div class="row">
<div class="offset-0 offset-lg-2 col-2 pm pm1"></div>
<div class="col-2 pm pm2"></div>
<div class="col-2 pm pm3"></div>
<div class="col-2 pm pm4"></div>
</div>
</div>
</div>
</div>

</div>
</div>

<div class="col-12">
<hr class="border-success" />
</div>

<div class="col-12">
<div class="row">
<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">Delivery Cost</label>
</div>
<div class="col-12 col-lg-6 border-end border-success">
<div class="row">
<div class="col-12 offset-lg-1 col-lg-3">
<label class="form-label">Delivery cost Within Colombo</label>
</div>
<div class="col-12 col-lg-8">
<div class="input-group mb-2 mt-2">
<span class="input-group-text">Rs.</span>
<input type="text" class="form-control" id="dwc" />
<span class="input-group-text">.00</span>
</div>
</div>
</div>
</div>
<div class="col-12 col-lg-6">
<div class="row">
<div class="col-12 offset-lg-1 col-lg-3">
<label class="form-label">Delivery cost out of Colombo</label>
</div>
<div class="col-12 col-lg-8">
<div class="input-group mb-2 mt-2">
<span class="input-group-text">Rs.</span>
<input type="text" class="form-control" id="doc" />
<span class="input-group-text">.00</span>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="col-12">
<hr class="border-success" />
</div>

<div class="col-12">
<div class="row">
<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">Product Description</label>
</div>
<div class="col-12">
<textarea cols="30" rows="15" class="form-control" id="desc"></textarea>
</div>
</div>
</div>

<div class="col-12">
<hr class="border-success" />
</div>

<div class="col-12">
<div class="row">
<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">Add Product Images</label>
</div>
<div class="offset-lg-3 col-12 col-lg-6">
<div class="row">
<div class="col-4 border border-primary rounded">
<img src="resource/addproductimg.svg" class="img-fluid" style="height: 300px;" id="i0" />
</div>
<div class="col-4 border border-primary rounded">
<img src="resource/addproductimg.svg" class="img-fluid" style="height: 300px;" id="i1" />
</div>
<div class="col-4 border border-primary rounded">
<img src="resource/addproductimg.svg" class="img-fluid" style="height: 300px;" id="i2" />
</div>
</div>
</div>
<div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
<input type="file" class="d-none" id="imageuploader" multiple />
<label for="imageuploader" class="col-12 btn btn-primary" >Upload Images</label>
</div>
</div>
</div>

<div class="col-12">
<hr class="border-success" />
</div>

<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">Notice...</label><br />
<label class="form-label">
We are taking 5% of the product from price from every food <br/>
product as a service charge.
</label>
</div>

<div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3 mb-3">
<button class="btn btn-success" >Save Product</button>
</div>

</div>
</div>

</div>
</div>


<!--  -->
      </div>
    </div>
  </div>
</div>

</div>
</div>


<!-- mixes -->

<!-- plants -->

<div class="container-fluid">
<div class="row ">




<p>
<div class="offset-8 col-3 d-grid">
<button class="btn btn-primary btnimg" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample4" aria-expanded="false" aria-controls="multiCollapseExample2"><h4 class="">Share your orchid care tips</h4></button>

</div>
</p>
<div class="row">
  <div class="col">
   
  </div>
  <div class="col-10">
    <div class="collapse multi-collapse" id="multiCollapseExample4">
      <div class="card card-body">
        <!--  -->


<div class="container-fluid">
<div class="row gy-3">


<div class="col-12">
<div class="row">

<div class="col-12 text-center">
<h2 class="h2 text-primary fw-bold">Add New Product</h2>
</div>

<div class="col-12">
<div class="row">

<div class="col-12 col-lg-4 border-end border-success">
<div class="row">

<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">CATEGORY</label>
</div>
<?php
$category_rs = Database::search("SELECT * FROM `category`");
$category_num = $category_rs -> num_rows;
?>
<div class="col-12">
<select class="form-select text-center" id="category" >
<option value="0">Select Category</option>
  <?php
  for($x=0; $x< $category_num ; $x++){
    $category_data = $category_rs-> fetch_assoc();
?>
<option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>
<?php

  }
  ?>




</select>
</div>

</div>
</div>

<div class="col-12 col-lg-4 border-end border-success">
<div class="row">

<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">ITEMS</label>
</div>

<?php
$items_rs = Database::search("SELECT * FROM `items`");
$items_num = $items_rs -> num_rows;
?>
<div class="col-12">
<select class="form-select text-center" id="brand" >
<option value="0">Select type</option>
  <?php
  for($x=0; $x< $items_num ; $x++){
    $items_data = $items_rs-> fetch_assoc();
?>
<option value="<?php echo $items_data["id"]; ?>"><?php echo $items_data["name"]; ?></option>
<?php

  }
  ?>

</select>
</div>

</div>
</div>

<div class="col-12 col-lg-4 border-end border-success">
<div class="row">

<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">TYPE</label>
</div>
<?php
$type_rs = Database::search("SELECT * FROM `type`");
$type_num = $type_rs -> num_rows;
?>
<div class="col-12">
<select class="form-select text-center" id="brand" >
<option value="0">Select type</option>
  <?php
  for($x=0; $x< $type_num ; $x++){
    $type_data = $type_rs-> fetch_assoc();
?>
<option value="<?php echo $type_data["id"]; ?>"><?php echo $type_data["name"]; ?></option>
<?php

  }
  ?>

</select>
</div>

</div>
</div>

<div class="col-12">
<hr class="border-success" />
</div>

<div class="col-12">
<div class="row">
<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">
Add a Title to your Product
</label>
</div>
<div class="offset-0 offset-lg-2 col-12 col-lg-8">
<input type="text" class="form-control" id="title" />
</div>
</div>
</div>

<div class="col-12">
<hr class="border-success" />
</div>

<div class="col-12">
<div class="row">

</div>
</div>

<div class="col-12 col-lg-4 border-end border-success">
<div class="row">
<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">Select Buffet</label>
</div>
<div class="col-12">

<select class="form-select " id="clr">
<option value="0">Select Item</option>

<option value="1">Breakfirst</option>
<option value="1">Lunch</option>
<option value="1">Dinner</option>

</select>
</div>

<div class="col-12">
<div class="input-group mt-2 mb-2">
<input type="text" class="form-control" placeholder="Add new Colour" id="clr_in" />
<button class="btn btn-outline-primary" type="button" id="button-addon2">+ Add</button>
</div>
</div>
</div>
</div>

<div class="col-12 col-lg-4">
<div class="row">
<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">Add Product Quantity</label>
</div>
<div class="col-12">
<input type="number" class="form-control" value="0" min="0" id="qty" />
</div>
</div>
</div>

</div>
</div>

<div class="col-12">
<hr class="border-success" />
</div>

<div class="col-12">
<div class="row">

<div class="col-6 border-end border-success">
<div class="row">
<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">Cost Per Item</label>
</div>
<div class="offset-0 offset-lg-2 col-12 col-lg-8">
<div class="input-group mb-2 mt-2">
<span class="input-group-text">Rs.</span>
<input type="text" class="form-control" id="cost" />
<span class="input-group-text">.00</span>
</div>
</div>
</div>
</div>

<div class="col-6">
<div class="row">
<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">Approved Payment Methods</label>
</div>
<div class="col-12">
<div class="row">
<div class="offset-0 offset-lg-2 col-2 pm pm1"></div>
<div class="col-2 pm pm2"></div>
<div class="col-2 pm pm3"></div>
<div class="col-2 pm pm4"></div>
</div>
</div>
</div>
</div>

</div>
</div>

<div class="col-12">
<hr class="border-success" />
</div>

<div class="col-12">
<div class="row">
<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">Delivery Cost</label>
</div>
<div class="col-12 col-lg-6 border-end border-success">
<div class="row">
<div class="col-12 offset-lg-1 col-lg-3">
<label class="form-label">Delivery cost Within Colombo</label>
</div>
<div class="col-12 col-lg-8">
<div class="input-group mb-2 mt-2">
<span class="input-group-text">Rs.</span>
<input type="text" class="form-control" id="dwc" />
<span class="input-group-text">.00</span>
</div>
</div>
</div>
</div>
<div class="col-12 col-lg-6">
<div class="row">
<div class="col-12 offset-lg-1 col-lg-3">
<label class="form-label">Delivery cost out of Colombo</label>
</div>
<div class="col-12 col-lg-8">
<div class="input-group mb-2 mt-2">
<span class="input-group-text">Rs.</span>
<input type="text" class="form-control" id="doc" />
<span class="input-group-text">.00</span>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="col-12">
<hr class="border-success" />
</div>

<div class="col-12">
<div class="row">
<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">Food Description</label>
</div>
<div class="col-12">
<textarea cols="30" rows="15" class="form-control" id="desc"></textarea>
</div>
</div>
</div>

<div class="col-12">
<hr class="border-success" />
</div>

<div class="col-12">
<div class="row">
<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">Add Food product Images</label>
</div>
<div class="offset-lg-3 col-12 col-lg-6">
<div class="row">
<div class="col-4 border border-primary rounded">
<img src="resource/addproductimg.svg" class="img-fluid" style="height: 300px;" id="i0" />
</div>
<div class="col-4 border border-primary rounded">
<img src="resource/addproductimg.svg" class="img-fluid" style="height: 300px;" id="i1" />
</div>
<div class="col-4 border border-primary rounded">
<img src="resource/addproductimg.svg" class="img-fluid" style="height: 300px;" id="i2" />
</div>
</div>
</div>
<div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
<input type="file" class="d-none" id="imageuploader" multiple />
<label for="imageuploader" class="col-12 btn btn-primary" >Upload Images</label>
</div>
</div>
</div>

<div class="col-12">
<hr class="border-success" />
</div>

<div class="col-12">
<label class="form-label fw-bold" style="font-size: 20px;">Notice...</label><br />
<label class="form-label">
We are taking 3% of the product from price from every<br/>
product as a service charge.
</label>
</div>

<div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3 mb-3">
<button class="btn btn-success" >Save Product</button>
</div>

</div>
</div>

</div>
</div>


<!--  -->
      </div>
    </div>
  </div>
</div>

</div>
</div>
<!-- plants -->







<script src="bootstrap.bundle.js"></script>
<script src="script.js"></script>   
</body>
</html>