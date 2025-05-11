<?php
require "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Food | Customer Register</title>
    <link rel="icon" href="resource/download.webp"/>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />
</head>
<body class="cutomerregisterinnerpic">
    <div class=" col-12 container-fluid bodycustomerregister">
        <div class=" row">

            <div class=" d-flex flex-column ">

            <div class=" col-12 d-flex flex-column justify-content-center align-items-center" >
<div class=" text-center text-black  mt-4  col-12 bg-body rounded">
    <h3><b>Customer Register</b></h3>
    <p>Please fill the information below to register as a customer</p>
  

</div>

          
            <div class=" col-8 col-lg-5 text-center">
         
            <div class=" d-none" id="msgdiv">
<div class="alert text-danger fw-bold " role="alert" style="height: 20px;" id="msg">

</div>
</div>

<div class="form-floating mb-3 mt-3">
  <input type="text" class="form-control rounded" id="fname" placeholder="name@example.com">
  <label for="fname">First Name</label>
</div>

<div class="form-floating mb-3">
<input type="text" class="form-control rounded" id="lname" placeholder="name@example.com">
  <label for="lname">Last Name</label>
</div>

   <div class="form-floating mb-3 ">
   <input type="text" class="form-control rounded" id="email" placeholder="name@example.com">
  <label for="email">Email</label>
</div>

<div class="form-floating mb-3 ">
<input type="text" class="form-control rounded" id="cemail" placeholder="name@example.com">
  <label for="cemail">Confirm Email Address</label>
</div>

<div class="form-floating mb-3">
<input type="password" class="form-control rounded" id="pw" placeholder="name@example.com">
  <label for="pw">Password</label>
</div>

<?php
$gender_rs = Database::search("SELECT * FROM `gender`");
$gender_num = $gender_rs->num_rows;
?>

<div class="form-floating mb-5 ">
<select name="" class="form-select" id="gender" placeholder="name@example.com">
  <option value="0">Gender</option>
<?php
for($g = 0 ; $g < $gender_num ; $g++){
  $gender_data = $gender_rs->fetch_assoc();
  ?>
<option value="<?php echo $gender_data["id"]; ?>"><?php echo $gender_data["gender_name"]; ?></option>
 
<?php
}
?>
  
</select>
  <label for="gender">Gender</label>
</div>



           </div>
<div class=" col-3 text-center mb-5">
    <button class="btn btn-light" onclick="customerRgi();">Create Account</button>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php" class="text-black">signin page</a></li>
    <li class="breadcrumb-item active" aria-current="page">signup page</li>
  </ol>
</nav>
            </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>
</html>