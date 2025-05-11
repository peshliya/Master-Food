<?php 

require "connection.php";
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Food</title>
    <link rel="icon" href="resource/download.webp"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body style="background-color:#e5e5e5;">
<div class="container-fluid body2">
        <div class="row">
    <div class="col-12 mb-5">
        <div class="row mt-1 mb-1">

      
<!--  -->
<!--  -->
<nav class="navbar  fixed-top position-absolute">
  <div class="container-fluid ">
    <a class="navbar-brand" href="#">
      <?php
      if(isset($_SESSION["u"])){
        $data = $_SESSION["u"];
        ?>
    <span class="offset-lg-1 "><b>&nbsp;welcome &nbsp;&nbsp;<b><?php echo $data["fname"]; ?></b>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</b></span>
    <span class="signout" onclick="signout()">Sign out</span>&nbsp;|&nbsp;<span class="signout"> Help and contact</span>

        <?php
      }else{
        ?>
        <a href="index.php" class="text-decoration-none fw-bold">Sign in or Register</a>
        <?php
      }
      ?>

    </a>
    <button class="navbar-toggler border-4 " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class=""><img src="resource/logo6.webp" width="50px"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img src="resource/logo6.webp" width="50px">masterfood</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="advanceSearch.php">advance search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="watchlist.php">Watchlist <img src="resource/heart icon.jpg" style="width: 20px;"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php">cart <img src="resource/cartico.svg" style="width: 20px;"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="purchasedHistory.php">History of Order</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              User 
            </a>
            <ul class="dropdown-menu">
               
              <li><a class="dropdown-item" href="userProfile.php">My profile</a></li>
              <li><a class="dropdown-item" href="sellerProductViewPage.php">My selling items </a></li>
              <li><a class="dropdown-item" href="#">My favourite items</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="adminSignin.php">Admin Panel  </a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>
<!--  -->
<!--  -->




</div>
</div>

</div>
</div>




               

<!-- <script src="bootstrap.bundle.js"></script> -->
    <script src="script.js"></script>
</body>

</html>
        