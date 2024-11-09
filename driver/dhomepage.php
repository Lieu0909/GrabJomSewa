<?php
  session_start();
  include('../includes/config.php');
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>JOMSewa</title>
<!--Bootstrap -->
<link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="../assets/css/style.css" type="text/css">
<link rel="stylesheet" href="../assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="../assets/css/owl.transitions.css" type="text/css">
<link href="../assets/css/slick.css" rel="stylesheet">
<link href="../assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="../assets/css/font-awesome.min.css" rel="stylesheet">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="../assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="../assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
</head>
<body>

<!--Header-->
<?php include('dheader.php');?>
<!-- /Header -->

      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="dhomepage.php">Home</a></li>
          <li class="dropdown dropdown-slide">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">My Account<span class="tf-ion-ios-arrow-down"></span></a>
              <ul class="dropdown-menu">
          <li><a href="myprofile.php">Profile Settings</a></li>
          <li><a href="updatePassword.php">Update Password</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-slide">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false"> My Status<span class="tf-ion-ios-arrow-down"></span></a>
              <ul class="dropdown-menu">
          <li><a href="createStatus.php">Create New Status</a></li>
          <li><a href="updateStatus.php">Update Status</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-slide">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false"> My Services<span class="tf-ion-ios-arrow-down"></span></a>
              <ul class="dropdown-menu">
          <li><a href="createServices.php">Create New Services</a></li>
          <li><a href="updateSservices.php">Update Services</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-slide">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false"> My Report<span class="tf-ion-ios-arrow-down"></span></a>
              <ul class="dropdown-menu">
          <li><a href="dailyincome.php">Daily Income</a></li>
          <li><a href="monthlyincome.php">Monthly Income</a></li>
          <li><a href="yearlyincome.php">Yearly Income</a></li>
              </ul>
            </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end --> 
  
</header>

<!-- Banners -->
<section id="banner" class="banner-section">
  <div class="container">
    <div class="div_zindex">
      <div class="row">
        <div class="col-md-5 col-md-push-7">
          <div class="banner_content">
            <h1>Why Should You Use JOMSewa</h1>
            <p>Enjoy the certainty of fixed fares, insurance coverage and quality drivers with every ride. </p>
            <a href="#" class="btn">Read More <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Banners --> 



 <!--Login-Form -->
<?php include('login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('forgotpassword.php');?>
<!--/Forgot-password-Form --> 

<!-- Scripts --> 
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script> 
<script src="../assets/js/interface.js"></script> 

<!--bootstrap-slider-JS--> 
<script src="../assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="../assets/js/slick.min.js"></script> 
<script src="../assets/js/owl.carousel.min.js"></script>

</body>
</html>