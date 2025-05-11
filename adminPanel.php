<?php
require "connection.php";
session_start();
if(isset($_SESSION["au"])){


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Food | Admin Panal</title>
    <link rel="icon" href="resource/download.webp"/>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class=" col-12 container-fluid">
    <div class="row">


<!-- sliderbar -->

    <div class="offcanvas offcanvas-start show text-bg-dark " style="width: 200px;" tabindex="-1"  aria-labelledby="offcanvasDarkLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title fw-bold text-center" ><img src="resource/download.webp" height="100px"> &nbsp;&nbsp; orchidLanka</h5>
    <!-- <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvasDark" aria-label="Close"></button> -->
  </div>
  <div class="offcanvas-body">
<p> 
        <div  class="list-group">
<span>        <i class="bi bi-pie-chart-fill"></i> <a  class="text-decoration-none text-light"  href="#list-item-1">Dashboard</a></span>
      <a   class="text-decoration-none text-light" href="#list-item-2">
         <button type="button" class="btn btn-primary position-relative">
         Comments
  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
    99+
    <span class="visually-hidden">Unread Messages</span>
  </span>
</button></a>
      <a   class="text-decoration-none text-light" href="#list-item-3">Settings</a>
      <a  class="text-decoration-none text-light"  href="#list-item-4">Code</a>
      <a  class="text-decoration-none text-light"  href="#list-item-5">Database</a>
    </div>


</p>
<a class="text-decoration-none text-light" href="home.php">Home page</a><br/><br/>
<a class="text-decoration-none text-light" href="productAndUserManagement.php">Product and user management</a><br/><br/>
<a class="text-decoration-none text-light" href="index.php">Sign out</a>
  </div>

  
</div> 

<!-- sliderbar -->

 <div class="col-10">


            <div class="row">
              
<div class="input-group mb-3 offset-2 mt-3">
  <input type="text" class="form-control " placeholder="search here" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <span class="input-group-text bg-black text-white" id="basic-addon2">search</span> 

 </div>


 </div>
 </div>

 <!--  -->
 
<div class=" offset-2 col-10">
    <div class=" row">
        <div class="mb-2"><h5>Dashboard </h5></div>
    <div class="col-12">
    <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
    </p>
      <h4 id="list-item-1">Weekly Overview</h4>
      <h5 class=" offset-3">
Number of types sold/
Total number of types</h5>
      <p>

   
      <div class="container text-center">

<?php

$sells = 0;
$total_products = 0;
$presentage = 100;

$items_rs = Database::search("SELECT * FROM `items`");
$items_num = $items_rs->num_rows;
for($i=0; $i <$items_num; $i++){
    $items_data = $items_rs->fetch_assoc();
    ?>
<div class="col-10">
    <div class="row">
        <div class="col-3 text-end"><?php echo $items_data['name']; ?></div>
    
    <?php

    $total_product = 0;
    $buys = 0;
    $presentage = 100;

    $purchas_rs = Database::search("SELECT *
    FROM product
    INNER JOIN invoice ON product.pid = invoice.product_id
    INNER JOIN type_has_items ON product.type_has_items_id= type_has_items.id WHERE items_id='".$items_data['id']."'");
    if($items_data['id']==1){
        $buys = $purchas_rs->num_rows;
        $total_product_rs = Database::search("SELECT * FROM product INNER JOIN type_has_items ON product.type_has_items_id = type_has_items.id WHERE items_id = '1' ");
        $total_product = $total_product_rs->num_rows;

        $per = ($buys/$total_product) * $presentage
?>
   <div class=" col-7">
        <div class="progress">
        <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: <?php echo $per ?>%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

<?php
    }else if($items_data['id'] == 2){
        $buys = $purchas_rs->num_rows;
        $total_product_rs = Database::search("SELECT * FROM product INNER JOIN type_has_items ON product.type_has_items_id = type_has_items.id WHERE items_id = '2' ");
        $total_product = $total_product_rs->num_rows;

        $per = ($buys/$total_product) * $presentage
?>
   <div class=" col-7">
        <div class="progress">
        <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: <?php echo $per ?>%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

<?php
    }else if($items_data['id']==3){
        $buys = $purchas_rs->num_rows;
        $total_product_rs = Database::search("SELECT * FROM product INNER JOIN type_has_items ON product.type_has_items_id = type_has_items.id WHERE items_id = '3' ");
        $total_product = $total_product_rs->num_rows;

        $per = ($buys/$total_product) * $presentage
        ?>
           <div class=" col-7">
        <div class="progress">
        <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: <?php echo $per ?>%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

        <?php
    }else if($items_data['id']==4){
        $buys = $purchas_rs->num_rows;
        $total_product_rs = Database::search("SELECT * FROM product INNER JOIN type_has_items ON product.type_has_items_id = type_has_items.id WHERE items_id = '4' ");
        $total_product = $total_product_rs->num_rows;

        $per = ($buys/$total_product) * $presentage
        ?>
           <div class=" col-7">
        <div class="progress">
        <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: <?php echo $per ?>%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

        <?php
    }else if($items_data['id']==5){
        $buys = $purchas_rs->num_rows;
        $total_product_rs = Database::search("SELECT * FROM product INNER JOIN type_has_items ON product.type_has_items_id = type_has_items.id WHERE items_id = '5' ");
        $total_product = $total_product_rs->num_rows;

        $per = ($buys/$total_product) * $presentage
        ?>
           <div class=" col-7">
        <div class="progress">
        <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: <?php echo $per ?>%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

        <?php
    }else if($items_data['id']==6){
        $buys = $purchas_rs->num_rows;
        $total_product_rs = Database::search("SELECT * FROM product INNER JOIN type_has_items ON product.type_has_items_id = type_has_items.id WHERE items_id = '6' ");
        $total_product = $total_product_rs->num_rows;

        $per = ($buys/$total_product) * $presentage
        ?>
           <div class=" col-7">
        <div class="progress">
        <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: <?php echo $per ?>%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

        <?php
    }else if($items_data['id']==7){
        $buys = $purchas_rs->num_rows;
        $total_product_rs = Database::search("SELECT * FROM product INNER JOIN type_has_items ON product.type_has_items_id = type_has_items.id WHERE items_id = '7' ");
        $total_product = $total_product_rs->num_rows;

        $per = ($buys/$total_product) * $presentage
        ?>
           <div class=" col-7">
        <div class="progress">
        <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: <?php echo $per ?>%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

        <?php
    }
    ?>

     
</div>
</div>

    </div>
</div>
    <?PHP
}
?>


<?php

$today = date("Y-m-d");
$thismonth = date("m");
$thisyear = date("Y");

$a = 0;
$b = 0;
$c = 0;
$e = 0;
$f = 0;
$w = 0;

$invoice_rs = Database::search("SELECT * FROM `invoice`");
$invoice_num = $invoice_rs->num_rows;

for($x=0; $x < $invoice_num; $x++){
    $invoice_data = $invoice_rs->fetch_assoc();

    $f = $f + $invoice_data["qty"];

    $d = $invoice_data["date"];
    $splitDate = explode(" ", $d);
    $pdate = $splitDate[0];

    if($pdate == $today){
        $a = $a + $invoice_data["total"];
        $c = $c + $invoice_data["qty"];
    }

    $splitMonth = explode("-", $pdate); //separate date as year,month & date
    $pyear = $splitMonth[0]; //year
    $pmonth = $splitMonth[1]; //month
    $pday = $splitMonth[2];

    if ($pyear == $thisyear) {
        if ($pmonth == $thismonth) {
            $b = $b + $invoice_data["total"];
            $e = $e + $invoice_data["qty"];
        }
    }
    if ($pyear == $thisyear) {
        if ($pmonth == $thismonth) {
            if($pday == ($today)){
                $f = $f + $invoice_data["total"];
            $w = $w + $invoice_data["qty"];
            }
        }
    }

}


?>


     
<div class="card text-bg-dark mt-3 mb-3">
  <img src="resource/bluewavw.jpg" style="width:300px;" class="card-img" alt="...">
  <div class="card-img-overlay">
    <h5 class="card-title"> IN THIS MONTH...</h5>
    <p class="card-text">
    sold items = <?php echo $e; ?><br>
The owner = <?php echo $w; ?>
    </p>
<?php

$last_product_rs = Database::search("SELECT * FROM product ORDER BY datetime_addsd DESC LIMIT 1");
$last_product_data = $last_product_rs->fetch_assoc();
$last_date = $last_product_data['datetime_addsd'];
$start_date = new DateTime($last_date);

$tdate = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$tdate->setTimezone($tz);

$end_date = new DateTime($tdate->format("Y-m-d H:i:s"));

$difference = $end_date->diff($start_date);

?>

<p class="card-text"><small>Last update 
    <?php 
    echo $difference->format('%Y') . " Years " . $difference->format('%m') . " Months " .
    $difference->format('%d') . " Days " . $difference->format('%H') . " Hours " .
    $difference->format('%i') . " Minutes " . $difference->format('%s') . " Seconds ";
    ?>

ago <br/>
<?php echo $last_product_data["qty"]; ?> &nbsp; &nbsp;<?php echo $last_product_data["title"]; ?>  &nbsp;&nbsp;&nbsp; By : <?php echo $last_product_data["users_email"]; ?>
</small></p>

 
   

  </div>
</div>

  </div>

     
     
    </div>
  </div>
    </div>
</div>  

<div class="col-12">
    <div class="row g-1">
    <div class="offset-2 col-6 col-lg-2 px-1">
                                    <div class="row g-1">
                                        <div class="col-12 bg-warning text-black text-center rounded" style="height: 100px;">
                                            <br />
                                            <span class="fs-4 fw-bold">Daily Earnings</span>
                                            <br />

                                            <span class="fs-5">Rs. <?php echo $a; ?> .00</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-2 px-1">
                                    <div class="row g-1">
                                        <div class="col-12 bg-warning text-black text-center rounded" style="height: 100px;">
                                            <br />
                                            <span class="fs-4 fw-bold">Daily Sellings</span>
                                            <br />

                                            <span class="fs-5"> <?php echo $c; ?> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-2 px-1">
                                    <div class="row g-1">
                                        <div class="col-12 bg-primary text-black text-center rounded" style="height: 100px;">
                                            <br />
                                            <span class="fs-4 fw-bold">Monthly Earnings</span>
                                            <br />

                                            <span class="fs-5">Rs. <?php echo $b; ?> .00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-2 px-1">
                                    <div class="row g-1">
                                        <div class="col-12 bg-primary text-black text-center rounded" style="height: 100px;">
                                            <br />
                                            <span class="fs-4 fw-bold">Monthly Sellings</span>
                                            <br />

                                            <span class="fs-5"><?php echo $e; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-2 px-1">
                                    <div class="row g-1">
                                        <div class="col-12 bg-info text-black text-center rounded" style="height: 100px;">
                                            <br />
                                            <span class="fs-4 fw-bold">Total Sellings</span>
                                            <br />

                                            <span class="fs-5"><?php echo $f; ?></span>
                                        </div>
                                    </div>
                                </div>
    </div>
</div>


</div></div></div></div>


</div>
</div>
<!--  -->
<div class="col-12 text-center mt-5 mb-2">
    <h5>Different types of items for sale</h5>
</div>
<?php
$pot_rs = Database::search("SELECT * FROM product INNER JOIN type_has_items ON product.type_has_items_id = type_has_items.id WHERE items_id='1'");
$pot_total = $pot_rs->num_rows;

$orchid_mixes_rs = Database::search("SELECT * FROM product INNER JOIN type_has_items ON product.type_has_items_id = type_has_items.id WHERE items_id='2'");
$orchid_mixes_total = $orchid_mixes_rs->num_rows;

$fertilizers_rs = Database::search("SELECT * FROM product INNER JOIN type_has_items ON product.type_has_items_id = type_has_items.id WHERE items_id='3'");
$fertilizers_total = $fertilizers_rs->num_rows;

$potting_medias_rs = Database::search("SELECT * FROM product INNER JOIN type_has_items ON product.type_has_items_id = type_has_items.id WHERE items_id='4'");
$potting_medias_total = $potting_medias_rs->num_rows;

$pest_control_rs = Database::search("SELECT * FROM product INNER JOIN type_has_items ON product.type_has_items_id = type_has_items.id WHERE items_id='5'");
$pest_control_total = $pest_control_rs->num_rows;


$orchid_health_rs = Database::search("SELECT * FROM product INNER JOIN type_has_items ON product.type_has_items_id = type_has_items.id WHERE items_id='6'");
$orchid_health_total = $orchid_health_rs->num_rows;


$flower_plants_rs = Database::search("SELECT * FROM product INNER JOIN type_has_items ON product.type_has_items_id = type_has_items.id WHERE items_id='7'");
$flower_plants_total = $flower_plants_rs->num_rows;

?>
<div class="offset-3 col-9 ">
<canvas id="myChart" style="width:100%;max-width:700px"></canvas>

</div>
<div>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['pot', 'orchid_mixes', 'fertilizers', 'potting_medias', 'pest_control', 'orchid_health','flower_plants'],
      datasets: [{
        label: 'Total selling items',
        data: [<?php echo $pot_total; ?>, <?php echo $orchid_mixes_total; ?>, <?php echo $fertilizers_total; ?>, <?php echo $potting_medias_total; ?>, <?php echo $pest_control_total; ?>,<?php echo $orchid_health_total; ?>,<?php echo $flower_plants_total; ?>],
        borderWidth: 1,
        backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
        
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<!--  -->

<!--  -->
<div class="col-12 text-center mt-5 mb-2">
    <h5>Total Products</h5>
</div>
<?php
$pot_rsx = Database::search("SELECT SUM(qty) as q FROM product INNER JOIN type_has_items ON product.type_has_items_id = type_has_items.id WHERE items_id='1'");
$p=$pot_rsx->fetch_assoc();
$pot_totalx = $p["q"] ;

$orchid_mixes_rsx = Database::search("SELECT SUM(qty) as r FROM product INNER JOIN type_has_items ON product.type_has_items_id = type_has_items.id WHERE items_id='2'");
$r=$orchid_mixes_rsx->fetch_assoc();
$orchid_mixes_totalx = $r["r"];

$fertilizers_rsx = Database::search("SELECT SUM(qty) as s FROM product INNER JOIN type_has_items ON product.type_has_items_id = type_has_items.id WHERE items_id='3'");
$s=$fertilizers_rsx->fetch_assoc();
$fertilizers_totalx = $s["s"];

$potting_medias_rsx = Database::search("SELECT SUM(qty) as t FROM product INNER JOIN type_has_items ON product.type_has_items_id = type_has_items.id WHERE items_id='4'");
$t=$potting_medias_rsx->fetch_assoc();
$potting_medias_totalx = $t["t"];

$pest_control_rsx = Database::search("SELECT SUM(qty) as u FROM product INNER JOIN type_has_items ON product.type_has_items_id = type_has_items.id WHERE items_id='5'");
$u=$pest_control_rsx->fetch_assoc();
$pest_control_totalx = $u["u"];


$orchid_health_rsx = Database::search("SELECT SUM(qty) as v FROM product INNER JOIN type_has_items ON product.type_has_items_id = type_has_items.id WHERE items_id='6'");
$v=$orchid_health_rsx->fetch_assoc();
$orchid_health_totalx = $v["v"];


$flower_plants_rsx = Database::search("SELECT SUM(qty) as w FROM product INNER JOIN type_has_items ON product.type_has_items_id = type_has_items.id WHERE items_id='7'");
$w=$flower_plants_rsx->fetch_assoc();
$flower_plants_totalx = $w["w"];

?>
<div class="offset-3 col-9 ">
<canvas id="myChartx" style="width:100%;max-width:700px"></canvas>

</div>
<div>
  <canvas id="myChartx"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctxx = document.getElementById('myChartx');
 
  new Chart(ctxx, {
    type: 'bar',
    data: {
      labels: ['pot', 'orchid_mixes', 'fertilizers', 'potting_medias', 'pest_control', 'orchid_health','flower_plants'],
      datasets: [{
        label: 'qty',
        data: [<?php echo $pot_totalx; ?>, <?php echo $orchid_mixes_totalx; ?>, <?php echo $fertilizers_totalx; ?>, <?php echo $potting_medias_totalx; ?>, <?php echo $pest_control_totalx; ?>,<?php echo $orchid_health_totalx; ?>,<?php echo $flower_plants_totalx; ?>],
        borderWidth: 1,
        backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
        
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
          
        }
      }
    }
  });
</script>
<!--  -->



<!-- <script src="bootstrap.bundle.js"></script> -->
<script src="script.js"></script>
</body>
<?php 
}else{
  echo("Please signin as admin!!");
}
?>
</html>