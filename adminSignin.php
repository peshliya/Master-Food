<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin SignIn | Master Food</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/download.webp"/>
</head>
<body class="bg-white indexbackground ">
<body style="background-color: #74EBD5;background-image: linear-gradient(90deg,#c0c0c0 0%,#9FACE6 100%) ;">

<div class=" container-fluid justify-content-center " style="margin-top: 100px;">
<div class=" row align-content-center">

<div class="col-12">
     <div class=" row">

   
     <div class="col-12">
        <p class="text-center title1">Hi, Welcome To eShop Admins</p>
     </div>
    </div>
</div>

<div class=" col-8 p-5">
    <div class="row">
        <div class="col-6 d-none d-lg-block background"></div>

        <div class=" col-12 col-lg-6 d-block">
            <div class="row g-3">
<div class=" col-12">
    <p class="title2"><b> <h5>Sign In to your Account</h5></b></p>
</div>
<div class=" col-12">
    <label class="form-label"><b>Email</b></label>
    <input type="email" class="form-control" placeholder="ex : peshliya123@gmail.com" id="e"/>
</div>
<div class=" col-12 col-lg-6 d-grid">
    <button class="btn btn-primary" onclick="adminVerification();">Send verification code</button>
</div>
<div class=" col-12 col-lg-6 d-grid">
    <button class="btn btn-danger" onclick="index();">Back to Customer Log In</button>
</div>
            </div>
        </div>
    </div>
</div>
<!--  -->

<div class="modal" tabindex="-1" id="verificationModel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Admin Verification</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label class="form-label">Enter Your Verification Code</label>
        <input type="text" class="form-control" id="vcode"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="verify();">Verify</button>
      </div>
    </div>
  </div>
</div>

<!--  -->


<div class="col-12 fixed-bottom text-center">
                <p class="text-center">&copy; 2023 MasterFood.lk || All Right Reserved</p>
                <p class="fw-bold">Deisgned By :MasterFood;</p>
            </div>
</div>
   
</div>
    

<script src="bootstrap.bundle.js"></script>
<script src="script.js"></script>
</body>
</html>