<?php
  session_start();
  include('includes/config.php');
  if(!isset($_SESSION['uid'])){
  header('Location:index.php');
  }
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Responsive Table</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">


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
        <h1>Driver Availability</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Driver Availability</li>
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
     
        <div class="result-sorting-wrapper">
          
      <!--Driver Table-->
        <div class="table-users">
   <div class="header">Info</div>
 <form method="POST">
  
<div class="header">Drivers Selection</div>
   <table cellspacing="0">
     <tr>
         <th>Driver ID</th>
         <th>Driver Name</th>
         <th>Driver Arriving Time</th>
         <th>From</th>
         <th>To</th>
         <th></th>
      </tr>
      <?php
      $service=$_POST['service'];
      $fees=$_POST['fees'];
      $distance=$_POST['distance'];
      $points=$_POST['points'];


      
                    $link = mysqli_connect("localhost","root","","jomsewa");
                    mysqli_select_db($link,"jomsewa") or die(mysqli_error($link));
                   // $select = "SELECT d.Driver_id,d.Driver_name// FROM driver d INNER JOIN status s ON d.Driver_id=v.Driver_id WHERE s.pickUp_Point ='$pick'";
                   // $select = "SELECT driver. Driver_id , Driver_name, Estimate_Time, Vehicle_plate, Vehicle_model, Vehicle_color FROM driver INNER JOIN status ON status.Driver_id = driver.Driver_id INNER JOIN vehicle ON  driver.Driver_id = vehicle.Driver_id";
                    $select = "SELECT d.Driver_id , d.Driver_name, s.Estimate_Time FROM driver d INNER JOIN status s ON s.Driver_id = d.Driver_id WHERE s.Status='ON' ORDER BY s.Estimate_Time ";

                    $run = mysqli_query($link, $select);
                    while($row = mysqli_fetch_array($run)){
                      $pick = $_POST['from'];
                      echo"<tr><td>".$row['Driver_id']."</td>
                              <td>".$row['Driver_name']."</td>
                              <td>".$row['Estimate_Time']." MIN</td>
                              <td>".$_POST['from']."</td>
                              <td>".$_POST['to']." </td>

                       <td><a href='BdriverInfo.php?Driverid=".$row['Driver_id']."&From=".$_POST['from']."&To=".$_POST['to']."&service=".$service."&fees=".$fees."&distance=".$distance."&points=".$points."&time=".$row['Estimate_Time']."'>Select</a></td>"."</tr>";
                      
}

  ?>


   </table>
   <center><input class="btn btn-block" type="button" name="back"  value="Back" onclick="window.location.href = 'Bavailability.php';"></center>
  
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
</form>
</html>
