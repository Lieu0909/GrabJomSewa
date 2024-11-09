<?php
  session_start();
  include('includes/config.php');
  if(!isset($_SESSION['uid'])){
  header('Location:index.php');}
?>


  
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Checking Availbility | Select your location</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
        
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<body>


<!--Header--> 
<?php include('includes/header.php');?>
<!-- /Header --> 

<!--Page Header-->
<section class="page-header listing_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Checking Availability</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Checking Availability</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<!--Listing-->
<section class="listing-page">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="result-sorting-wrapper">
          <div class="sorting-count">
</div>

      <!--Checking-Availability-->
      
          <div class="widget_heading">
            <h5><center><i class="fa fa-filter" aria-hidden="true"></i> Check Availability </h5><center>
          </div>
          <div class="sidebar_filter">
            <form  method="post">
              <div class="form-group select">
              
            <labe1>Pick Up Point</labe1>
             <select class="form-control" name="from" id="from" required>
              <?php
                  
                    $select = "SELECT DISTINCT Route_from FROM location";
                    $run = mysqli_query($link, $select);

                    while($row = mysqli_fetch_array($run)){
                              $Route_from=$row['Route_from'];
                              echo '<option>'.$Route_from. '</option>';

                  }
            ?>
                </select>

              <div class="form-group select">
                <br>
                  <lable>If UMP AREA,PLEASE SELECT</lable>
                <select class="form-control" name="subfrom" id="subfrom">
                  <option value="" id="c0" name="UMP"></option>
                  <option value="KSU" id="c1" name="UMP">KSU</option>
                  <option value="KK1" id="c2" name="UMP">KK1</option>
                  <option value="KK2" id="c3" name="UMP">KK2</option>
                  <option value="KK3" id="c4" name="UMP">KK3</option>
                  <option value="KK4" id="c5" name="UMP">KK4</option>
                  <option value="Library" id="c8" name="UMP">Library</option>
                  <option value="Block W" id="c9" name="UMP">Block W</option>
                  <option value="Block X" id="c10" name="UMP">Block X</option>
                  <option value="Block Y" id="c11" name="UMP">Block Y</option>
                  <option value="Block Z" id="c12" name="UMP">Block Z</option>
                </select>
              </div>
              <div class="form-group select">
                 <label>Drop Off Point</label>
                <select class="form-control" name="to" id="to" required>
                    <?php
                  
                    $select = "SELECT DISTINCT Route_to FROM location";
                    $run = mysqli_query($link, $select);

                    while($row = mysqli_fetch_array($run)){
                              $Route_to=$row['Route_to'];
                              echo '<option>'.$Route_to. '</option>';

                  }
            ?>
                </select>
                <div class="form-group select"><br>
                  <label>If UMP AREA,PLEASE SELECT</label>
                <select class="form-control" name="subto" id="subto">
                  <option value="" id="f0" name="UMP1"></option>
                  <option value="KSU" id="f1" name="UMP1">KSU</option>
                  <option value="KK1" id="f2" name="UMP1">KK1</option>
                  <option value="KK2" id="f3" name="UMP1">KK2</option>
                  <option value="KK3" id="f4" name="UMP1">KK3</option>
                  <option value="KK4" id="f5" name="UMP1">KK4</option>
                  <option value="Library" id="f8" name="UMP1">Library</option>
                  <option value="Block W" id="f9" name="UMP1">Block W</option>
                  <option value="Block X" id="f10" name="UMP1">Block X</option>
                  <option value="Block Y" id="f11" name="UMP1">Block Y</option>
                  <option value="Block Z" id="f12" name="UMP1">Block Z</option>
                </select>
              </div>

             
                <div class="form-group">
                <input type="submit" class="btn btn-block"   value="Submit" name="submit"  <?php
              if(isset($_POST['submit']))
          {
              $pickup=$_POST['from'];
              $dropOff=$_POST['to'];
              if($pickup=="UMP AREA" && $dropOff=="UMP AREA"){
                    echo "<script>alert('No Route Provided!')</script>";
              }else{
                
                echo '<input type="submit" class="btn btn-primary" value="Active" formaction="Bchoosingcar.php">';
              }
                  }
                  ?> <i class="fa fa-search" aria-hidden="true"  ></i> </input>
              </div>
              
            </form>
          </div>
        </div>


<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>

</html>
