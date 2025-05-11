<?php 
require "connection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Food | Advance search</title>
    <link rel="icon" href="resource/download.webp"/>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

<link rel="icon" href="resource/logo.svg" />
</head>
<body class="" style="background-color:#e5e5e5;">

<div class="container-fluid">
    <div class="row"> 
        <?php  include "header.php"; ?> 
 <div class="col-12 bg-body mb-2">
  
 </div> 

 <div class="col-12 bg-body mb-2">
    <div class="row">
        <div class=" offset-lg-4 col-12 col-lg-4">
            <div class="row">
                <div class="col-2 ">
                    <div class=" mt-2 mb-2 logo" style="height: 80px;"></div>
                    
                </div>
                <div class=" col-10 text-center">
                        <p class=" fs-1 text-black-50 fw-bold mt-3 pt-2">Advance Search</p>
                    </div>
            </div>
        </div>
    </div>
 </div>
 <!-- search -->
 <div class=" offset-lg-2 col-12 col-lg-8 bg-body rounded mb-2">
    <div class="row">

    <div class=" offset-lg-1 col-12 col-lg-10">
        <div class="row">
            <div class=" col-12 col-lg-10 mt-2 mb-1">
                <input type="text" class="form-control" placeholder="type Keyword to search..." id="search" />

            </div>

            <div class=" col-12 col-lg-2 mb-1 mt-2 d-grid">
                <button class="btn btn-primary" onclick="advanceSearch(0);" >Search</button>
            </div>


            <div class=" col-12">
                <hr class="border border-3  border-secondary bg-secondary"/>
            </div>
        </div>
    </div>

    <div class=" offset-lg-1 col-12 col-lg-10">
        <div class="row">

        <div class="col-12">
            <div class="row">

            <div class=" col-12 col-lg-4 mb-2">
               
                <select class="form-select"  onchange="loarditems();" id="category">
                    <option value="0">Select Category</option>
                   
 <?php 
                $category_rs = Database::search("SELECT * FROM `category`");
            for($x=0; $x < $category_rs->num_rows; $x++){
                $category_data = $category_rs->fetch_assoc();

?>
 <option value="<?php echo $category_data['id']; ?>"> <?php echo $category_data['name']; ?>  </option>
<?php
            }
                ?>                    
                </select>
            </div>

            <div class=" col-12 col-lg-4 mb-2">
                <select class="form-select" id="items" onchange="loardtypes();">
                    <option value="0">Select items</option>
                    <?php 
                   $items_rs = Database::search("SELECT * FROM `items`");
                   for($i=0; $i < $items_rs->num_rows; $i++){
                    $items_data = $items_rs->fetch_assoc();
                    ?>
<option value="<?php echo $items_data['id']; ?>"><?php echo $items_data['name']; ?> </option>
                    <?php
                   }
                    ?>
                
                     
                </select>
            </div>

            <div class=" col-12 col-lg-4 mb-2">
                <select class="form-select" id="type" >
                    <option value="0">Select item type</option>
                   <?php 
                   $type_rs = Database::search("SELECT * FROM `type`");
                   for($t=0; $t < $type_rs->num_rows; $t++){
$type_data = $type_rs->fetch_assoc();
?>
  <option value="<?php echo $type_data['id']; ?>"> <?php echo $type_data['name']; ?> </option>
<?php
                   }
                   ?>
                   
                
                </select>
            </div>


            <div class=" col-12 col-lg-6 mb-2">
                <select class="form-select" id="color" >
                    <?php 
                    $colour_rs = Database::search("SELECT * FROM `colour`");
                    ?>
                    <option value="0">Select Colour</option>
                  <?php 
                  for($c=0; $c < $colour_rs->num_rows; $c++){
$colour_data = $colour_rs->fetch_assoc();
?>
 <option value="<?php echo $colour_data["id"]; ?>"><?php echo $colour_data['name']; ?></option>
<?php
                  }
                  ?>
                       
                       
                </select>
            </div>

            <div class=" col-12 col-lg-6 mb-2">
            <input type="text" class="form-control" placeholder="Price From" id="pf"/>
            </div>

            <div class=" col-12 col-lg-6 mb-2">
            <input type="text" class="form-control" placeholder="Price To" id="pt"/>
            </div>



            </div>
        </div>
        </div>
    </div>
    </div>
 </div>

  <!-- search -->

  <div class=" offset-lg-2 col-lg-8 bg-body rounded mb-2">
    <div class="row">
        <div class=" offset-8 col-4 mt-2 mb-2">
            <select class="form-select border border-start-0 border-top-0 border-end-0 border-primary shadow-none"  id="sortby">
                <option value="0">SORT BY</option>
                <option value="1">PRICE HIGH TO LOW</option>
                <option value="2">PRICE LOW TO HIGH</option>
                <option value="3">QUANTITY HIGH TO LOW</option>
                <option value="4">QUANTITY LOW TO HIGH</option>
                
            </select>
        </div>
    </div>
  </div>
  
<div class="offset-lg-2 col-2 col-lg-8 bg-body rounded mb-2">
    <div class="row">
        <div class="offset-lg-1 col-12 col-lg-10 text-center">
            <div class=" row" id="view_area">
                <div class="offset-5 col-2 mt-5">
                    <span class="fw-bold text-black-50"><i class="bi bi-search" style="font-size: 100px;"></i></span>
                </div>
                <div class=" offset-3 col-6 mt-3 mb-5">
                    <span class="h1 text-black-50 fw-bold">No Items Searched Yet....</span>
                </div>
            </div>
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