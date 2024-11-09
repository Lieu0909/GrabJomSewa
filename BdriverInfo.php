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
<title>Driver Info</title>
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
        <h1>Driver Info</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Driver Info</li>
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
   <div class="header">Drivers Info</div>
 <form method="POST" action="Bcancel.php">
 <?php
  
      ?>
 
   <?php
   if(isset($_GET['Driverid'])){
      $driverid = $_GET['Driverid'];
      $pick= $_GET['From'];
      $drop= $_GET['To'];
      $service=$_GET['service'];
      $fees=$_GET['fees'];
      $distance=$_GET['distance'];
      $points=$_GET['points'];
      $time=$_GET['time'];
    }    

    
                    $link = mysqli_connect("localhost","root","","jomsewa");
                    mysqli_select_db($link,"jomsewa") or die(mysqli_error($link));
                    $select = "SELECT d.Driver_name,v.Vehicle_id,v.Vehicle_plate,v.Vehicle_model,v.Vehicle_color FROM driver d INNER JOIN vehicle v ON v.Driver_id = d.Driver_id WHERE d.Driver_id='$driverid'";
                    $run = mysqli_query($link, $select);
                    while($row = mysqli_fetch_array($run)){
                              $name=$row['Driver_name'];
                              $Vid=$row['Vehicle_id'];
                              $plate=$row['Vehicle_plate'];
                              $model=$row['Vehicle_model'];
                              $color=$row['Vehicle_color'];

                  }

  


?>

   <table cellspacing="0">
    
    <tr>
        <th>Driver ID</th>
        <td><input type="text" name="Did" value="<?php echo $driverid;?>"readonly></input></td>
     </tr>
     <tr>
        <th>Driver Name</th>
        <td><input type="text" name="Dname" value="<?php echo $name;?>"readonly></input></td>
     </tr>
     <tr>
         <th>Vehicle ID</th>
         <td><input type="text" name="Vid" value="<?php echo $Vid;?>"readonly></input></td>
     </tr>
     <tr>
         <th>Vehicle Plate No</th>
         <td><input type="text" name="Vplate" value="<?php echo $plate;?>"readonly></input></td>
     </tr>
     <tr>
         <th>Vehicle Type</th>
         <td><input type="text" name="Vmodel" value="<?php echo $model;?>"readonly></input></td>
     </tr>
     <tr>
         <th>Vehicle Color</th>
         <td><input type="text" name="Vcolor" value="<?php echo $color;?>"readonly></input></td>
     </tr>
     <tr>
        <th>Estimate Time</th>
        <td><input type="text" name="time" value="<?php echo $time;?>MIN"readonly></input></td>
     </tr>
     <tr>
         <th>From</th>
          <td><input type="text" name="from" value="<?php echo $pick ;?>"readonly></input></td>
    </tr>
     <tr> 
          <th>To</th>
          <td><input type="text" name="to" value="<?php echo $drop;?>"readonly></input></td>
    </tr>
    <tr>
        <th>Service</th>
        <td><input type="text" name="service" value="<?php echo $service;?>"readonly></input><br><br>
        <select class="form-control" name="others" id="to" required>
                    <?php
                  
                    $select = "SELECT DISTINCT Other_services FROM services WHERE Driver_id='$driverid'";
                    $run = mysqli_query($link, $select);

                    while($row = mysqli_fetch_array($run)){
                              $services=$row['Other_services'];
                              echo '<option>'.$services. '</option>';

                  }
            ?>
                </select></td>
        
     </tr>

     <tr>
        <th>Distance</th>
        <td><input type="text" name="distance" value="<?php echo $distance;?>"readonly></input></td>
     </tr>
     <tr>
        <th>Fees</th>
        <td><input type="text" name="fees" value="<?php echo $fees;?>"readonly></input></td>
     </tr>
     <tr>
        <th>Earning Points</th>
        <td><input type="text" name="points" value="<?php echo $points;?>"readonly></input></td>
     </tr>
     
   </table>
  
   <input type="submit" class="btn btn-block" value="Book" name="submit">
   
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

<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</form>
</html>
