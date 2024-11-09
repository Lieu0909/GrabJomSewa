<?php
session_start();
  include('includes/config.php');
  if(!isset($_SESSION['uid'])){
  header('Location:index.php');
  }

   if(isset($_POST['submit'])){
      $driverid = $_POST['Did'];
      $from= $_POST['from'];
      $to= $_POST['to'];
      $service=$_POST['service'];
      $fees=$_POST['fees'];
      $distance=$_POST['distance'];
      $points=$_POST['points'];
      $time=$_POST['time'];
      $others=$_POST['others'];
      $status='Booked';
      $uid=$_SESSION['uid'];
      $Vid=$_POST['Vid'];
$link = mysqli_connect("localhost","root","","jomsewa") or die(mysqli_connect_error());


$sql = "INSERT INTO booking(Booking_pickup_point,Booking_destination,Booking_fees,Booking_service_type,Booking_est_time,Booking_status,Booking_kilo,Earning_points,Driver_id,Customer_id,Other_Service,Vehicle_id) VALUES ('$from','$to','$fees','$service','$time','$status','$distance','$points','$driverid','$uid','$others','$Vid')";
$result = mysqli_query($link,$sql);

if($result){
  echo "Inserted successfully";
}
else{
  die(mysqli_connect_error());
}

$query = "UPDATE status SET Status='BUSY' WHERE  Driver_id='$driverid'";

if (mysqli_query($link, $query)) {
    echo "<br>Record updated successfully";
} else {
    echo "<br>Error updating record: " . mysqli_error($link);
}
     }

if(isset($_POST['cancel'])){
      $Bid=$_POST['Bookingid'];
      $uid=$_SESSION['uid'];
      $driverid=$_POST['id'];
$link = mysqli_connect("localhost","root","","jomsewa") or die(mysqli_connect_error());

$sql = "UPDATE status SET Status='ON' WHERE  Driver_id='$driverid'";
$result = mysqli_query($link,$sql);
$query="UPDATE booking SET Booking_status='Cancelled' WHERE  Booking_id='$Bid'";
$result1 = mysqli_query($link,$query);
if($result && $result1){
  echo "<script>alert('Cancelled');</script>";
  header('Location:Bavailability.php');
}
else{
  die(mysqli_connect_error());
}

     }


if(isset($_POST['pay'])){
    $uid=$_SESSION['uid'];
    $Bid=$_POST['Bookingid'];
    $pay='Paid';

                    $link = mysqli_connect("localhost","root","","jomsewa");
                    mysqli_select_db($link,"jomsewa") or die(mysqli_error($link));
                    $select = "UPDATE booking SET Booking_status='$pay' WHERE Customer_id='$uid' AND Booking_id='$Bid'"; 
                   if (mysqli_query($link, $select)) {
                              echo "<br>Record updated successfully";
                              header('Location:Bpay.php');
                   } else {
                              echo "<br>Error updating record: " . mysqli_error($link);
                    }
 
     }


mysqli_close($link);
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
        <h1>Booking Info</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Booking Info</li>
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
   <div class="header">Booking Info</div>
 <form method="POST">
 
   <?php 
      $others=$_POST['others'];
                    $link = mysqli_connect("localhost","root","","jomsewa");
                    mysqli_select_db($link,"jomsewa") or die(mysqli_error($link));
                    $select = "SELECT b.Customer_id,b.Booking_id,b.Booking_date,b.Booking_pickup_point,b.Booking_destination,b.Booking_fees,b.Booking_est_time,b.Booking_status,b.Booking_kilo,d.Driver_id,d.Driver_name FROM booking b INNER JOIN driver d ON b.Driver_id=d.Driver_id WHERE Customer_id='$uid'";
                    $run = mysqli_query($link, $select);
                    while($row = mysqli_fetch_array($run)){
                              
                              $Bid=$row['Booking_id'];
                              $Bdate=$row['Booking_date'];
                              $from=$row['Booking_pickup_point'];
                              $to=$row['Booking_destination'];
                              $fees=$row['Booking_fees'];
                              $time=$row['Booking_est_time'];
                              $status=$row['Booking_status'];
                              $kilo=$row['Booking_kilo'];
                              $Cid=$row['Customer_id'];
                              $Did=$row['Driver_id'];
                              $Dname=$row['Driver_name'];

                  }
?>

   <table cellspacing="0" border="0" align="center">
      <tr>
        <td colsapan="3"><strong>Booking Info</td></strong>
     </tr>
    <tr>
          <td>Booking Id  :<input type="text" name="Bookingid" value="<?php echo $Bid;?>" readonly></input></td>
          <td>Customer Id :<?php echo $Cid;?></td>
          <td>Booking Date  :<?php echo $Bdate;?></td>
    </tr>
    <tr>
          <td>Driver Id :<input type="text" name="id" value="<?php echo $Did;?>" readonly></td>
          <td>Driver Name :<?php echo $Dname;?></td>
          <td>Other  :<?php echo $others ;?></td>
    </tr>
     <tr>
          <td>From  :<?php echo $from ;?></td>
          <td>To  :<?php echo $to ;?></td>
          <td>Estimating time :<?php echo $time ;?></td>
    </tr>
     <tr>
          <td>Fees  :<?php echo $fees ;?></td>
          <td>Distance  :<?php echo $kilo ;?></td>
          <td>Status  :<?php echo $status ;?></td>
    </tr> 
    <tr >
          
          <td colspan="3">Earning Points :<?php echo $points;?></td>
    </tr>
   </table>

   <input type="submit" class="btn btn-block" value="Pay" name="pay">
   <input type="submit" class="btn btn-block" value="Cancel" name="cancel">

   
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
