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

<body class="bg-black indexbackground ">

                
  <div class="col-12 container-fluid vh-80 d-flex justify-content-center">
    <div class="row align-content-center">
    
    <div class="col-12">
    <div class="row">
        <div class="col-7 hd " >
            <div class="row">
           

            </div>
        </div>
        <div class="col-5 bg-grey " >
            <div class="row">
                
<div class="col-12  d2 ">
    <div class=" row">



<div class=" bg-transparent rounded col-12 b1 border border-dark border-opacity-25">
    <div class=" row g-2">

    <div class=" col-6 text-center">
        <p class="p-3 "><h4><b> Master Food | Login</b></h4></p>
        
    </div>
<?php

$email = "";
$password = "";

if (isset($_COOKIE["email"])) {
    $email = $_COOKIE["email"];
}

if (isset($_COOKIE["password"])) {
    $password = $_COOKIE["password"];
}

?>

   
<div><span class=" offset-1 text-danger" id="msg2"></span></div>
    <div class="offset-1 col-10 pt-3">
        <label class=" form-label">email</label>
        <input type="email" class="form-control border border-top-0" placeholder="enter your email here" id="emails" value="<?php echo $email; ?>"/>
    </div>
    <div class=" offset-1 col-10">
        <label class=" form-label">password</label>
        <input type="password" class="form-control border border-top-0" placeholder="enter your password here" id="pws" value="<?php echo $password; ?>"/>
    </div>
    <div class="offset-1 pt-3 pb-3 col-11 ">
        <button class="btn btn-light text-dark " onclick="loginbtn();">&nbsp;&nbsp;&nbsp;&nbsp;login&nbsp;&nbsp;&nbsp;&nbsp;</button>
    </div>
    <div class=" col-11 text-end t2index p-3  text-decoration-none">
        <a onclick="forgotPassword();" style="cursor:pointer" class="text-decoration-none t2index">forgot password</a>
    </div>
    <div class=" col-11 text-end p-3 pb-5  t2index">
        <a href="customerRegister.php" class="  t2index text-decoration-none ">Don't have an account</a>
    </div>
    </div>
</div>  

    </div>
</div>

            </div>
        </div>
    </div>
</div>
            <!--fogotpw modal -->

            <div class="modal" tabindex="-1" id="forgotPasswordModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Reset Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">

                                <div class="col-6">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="npi"/>
                                        <button class="btn btn-outline-secondary" type="button" id="npb" onclick="showPassword1();"><i id="e1" class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Re-type Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="rnp"/>
                                        <button class="btn btn-outline-secondary" type="button" id="rnpb" onclick="showPassword2();"><i id="e2" class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Verification Code</label>
                                    <input type="text" class="form-control" id="vc"/>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="resetpw();">Reset Password</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--fogotpw modal -->
    </div>
  </div>
  <script src="bootstrap.bundle.js"></script>
<script src="script.js"></script>
</body>

</html>