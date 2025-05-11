<?php
session_start();

require "connection.php";

?>
    <?php 
       if(isset($_SESSION["u"])){
           $email = $_SESSION["u"]["email"];

           $user_rs = Database::search("SELECT * FROM `users` WHERE email='" . $email . "' ");
           $details_data = $user_rs->fetch_assoc();
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MasterFood |  <?php echo $details_data["fname"]; ?> Profile</title>
    <link rel="stylesheet" href="bootstrap.css" /> 
       <link rel="icon" href="resource/download.webp"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="col-12 container-fluid">
        <div class="row">


        <div class=" col-12 mt-5 mb-3">
            <div class="row d-flex justify-content-center">
                <div class="col-11">
                    <div class="row d-flex flex-column">
                    
                        <div style="height: 200px;" class=" round">
                    </div>
                        
                        <div class="col-3 possition d-flex justify-content-center   " style="height: 200px;">
                        
                        <?php
                                $image_rs = Database::search("SELECT * FROM `profile_image` WHERE users_email ='" . $email . "'");
                                $image = $image_rs->fetch_assoc();
                                    if(empty($image["path"])){
                                        ?>
                                            
                                            
                                       
                                        <input type="file" class=" inputh d-none " id="profileAoimgc" accept="image/*" style="position: absolute;" />
                                        <label for="profileAoimgc" class="ps-5 bg-transparent  mt-5" onclick="changeImage();">
                                        <img src="resource/user.png"  class="  bg-white hidnpic" style="height: 150px;" id="viewImg" />
                                    </label>
                                       

                                 
                              

<?php
                                    }else{
                                        ?>
                                        <input type="file" class=" inputh d-none " id="profileAoimgc" accept="image/*" style="position: absolute;" />
                                        <label for="profileAoimgc" class="ps-5 bg-transparent mt-5" onclick="changeImage();">
                                        <img src="<?php echo $image['path']; ?>"  class="rounded-circle  bg-body hidnpic" style="height: 150px;" id="viewImg" />
                                    </label>
             
                                        

                                        <?php
                                    }
                                    ?>
<div class="text-center paddintopforuserdetails ps-3">
<span class="fw-bold  text-white"><?php echo $details_data['fname']; ?></span><br>
                                    <span class="fw-bold text-white-50"><?php echo $details_data['email']; ?></span>
                                  
</div>

<?php
                                    ?> 
                    </div>
                    <div class="col-12">
                    <div class="text-end offset-10">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">My Profile</li>
    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
    
  </ol>
</nav>
                     </div>
                    </div>
                    </div>
                </div>
                
            </div>
        </div>


   
        <!--  -->

      

        <div class="col-12 bg-primary roundq">
                <div class="row">

                    <div class="col-12 bg-body rounded mt-4 mb-4">
                        <div class="row g-2">

                            <div class=" offset-2 col-md-8  border">
                                <div class="p-3 py-5 " >

                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="fw-bold">Profile Settings</h4>
                                    </div>

                                    <div class="row mt-4 gap-2">

                        <div class="col-12">
                            <div class="row">
                            <div class="col-6">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" value="<?php echo $details_data['fname']; ?>" id="fname"/>
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" value="<?php echo $details_data['lname']; ?>" id="lname"/>
                                        </div>
                            </div>
                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Mobile</label>
                                            <input type="text" class="form-control" value="<?php echo $details_data['mobile']; ?>" id="mobile" />
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" readonly value="<?php echo $details_data['password']; ?>" disabled/>
                                                <span class="input-group-text bg-primary" id="basic-addon2">
                                                    <i class="bi bi-eye-slash-fill text-white"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Email</label>
                                            <input type="text" class="form-control" readonly value="<?php echo $details_data['email']; ?>" disabled/>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Registered Date</label>
                                            <input type="text" class="form-control" readonly value="<?php echo $details_data['joined_date']; ?>" disabled/>
                                        </div>

                       

                                          <?php 

$address_rs = Database::search("SELECT * FROM `users_has_adderss` INNER JOIN `city` ON 
`users_has_adderss`.city_id=city.id INNER JOIN `district` ON 
`city`.district_id1=district.id INNER JOIN `province` ON 
district.province_id=province.id WHERE `users_email`='" . $email . "'");

                                            $address_data = $address_rs->fetch_assoc();

                                        if(!empty($address_data["line_1"])){
                                            ?>

                                        <div class="col-12">
                                                <label class="form-label">Address Line 1</label>
                                                <input type="text" class="form-control" value="<?php echo $address_data["line_1"]; ?>" id="line1"/>
                                        </div>
                                            <?php
                                        }else{
                                            ?>
                                            <div class="col-12">
                                                <label class="form-label">Address Line 1</label>
                                                <input type="text" class="form-control" id="line1"/>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                       
                                       
                                            <?php


                                        if(!empty($address_data["line_2"])){
                                            ?>
                                            <div class="col-12">
                                                <label class="form-label">Address Line 2</label>
                                                <input type="text" class="form-control" value="<?php echo $address_data["line_2"]; ?>" id="line2"/>
                                            </div>
                                            <?php
                                        }else{
                                           ?>
                                             <div class="col-12">
                                                <label class="form-label">Address Line 2</label>
                                                <input type="text" class="form-control" id="line2"/>
                                            </div>                                              
                                           <?php
                                        }
                                        ?>
                                        
                                        

                                             <?php
                                        

                                        $province_rs = Database::search("SELECT * FROM `province`");
                                        $district_rs = Database::search("SELECT * FROM `district`");
                                        ?>

                                  <div class="col-12">
                                    <div class="row">
                                    <div class="col-6">
                                            <label class="form-label">Province</label>
                                            <select class="form-select" id="province">
                                                <option value="0">Select Province</option>
                                                <?php
                                                $province_num = $province_rs->num_rows;
                                                for ($x = 0; $x < $province_num; $x++) {
                                                    $province_data = $province_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $province_data["id"]; ?>" <?php
                                                     if (!empty($address_data["province_id"])) {

                                                        if ($province_data["id"] == $address_data["province_id"]) {
                                                          ?>selected<?php
                                                        }
                                                     }

                                                         ?>><?php echo $province_data["name"]; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                         <div class="col-6">
                                            <label class="form-label">District</label>
                                            <select class="form-select" id="district">
                                                <option value="0">Select District</option>
                                                <?php
                                                $district_num = $district_rs->num_rows;
                                                for ($x = 0; $x < $district_num; $x++) {
                                                    $district_data = $district_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $district_data["id"]; ?>" <?php
                                                       if (!empty($address_data["district_id"])) {
                                                            if ($district_data["id"] == $address_data["district_id"]) {
                                                   ?>selected<?php
                                        }
                                              }
                                                     ?>><?php echo $district_data["name"]; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                  </div>

                                     <div class="col-12" >
                                        <div class="row">
                                        <div class="col-6">
                                            <label class="form-label">City</label>
                                            <select class="form-select" id="city">
                                                <option value="0">Select City</option>
                                                <?php
                                                $city_rs = Database::search("SELECT * FROM `city`");
                                                $city_num = $city_rs->num_rows;
                                                for ($x = 0; $x < $city_num; $x++) {
                                                    $city_data = $city_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $city_data["id"]; ?>" <?php
                                                   if (!empty($address_data["city_id"])) {
                                                       if ($city_data["id"] == $address_data["city_id"]) {
                                                       ?>selected<?php
                                                           }
                                                       }
                                                   ?>><?php echo $city_data["name"]; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                          
                                            <?php
                                        if (!empty($address_data["postal_code"])) {
                                        ?>
                                            <div class="col-6">
                                                <label class="form-label">Postal-Code</label>
                                                <input type="text" class="form-control" value="<?php echo $address_data["postal_code"]; ?>" id="pcode"/>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-6">
                                                <label class="form-label">Postal-Code</label>
                                                <input type="text" class="form-control" id="pcode"/>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        </div>
                                     </div>
                             
<?php
        $gender_rs = Database::search("SELECT * FROM gender INNER JOIN users ON gender.id = users.gender_id WHERE email='" . $email . "';");
        $gender_data = $gender_rs->fetch_assoc();
?>

                                        <div class="col-12">
                                            <label class="form-label">Gender</label>
                                            <input type="text" class="form-control" readonly value="<?php echo $gender_data['gender_name']; ?>" disabled/>
                                        </div>

                                        <div class="col-12 d-grid mt-3 ">
                                            <button class="btn btn-primary " onclick="updateProfile();">Update My Profile</button>
                                        </div>

                                    </div>

                                </div>
                            </div>

                           

                        </div>
                    </div>

                </div>
            </div>


<!--  -->
<?php
       }else{
           echo ("Please Login First!!");
       }
       ?>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>
</html>