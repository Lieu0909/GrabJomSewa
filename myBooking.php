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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>JOMSewa</title>
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
     
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<!-- Google-Font-->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->  
</head>
<body>
        
<!--Header-->
<?php include('includes/header.php');?>
<!--Page Header-->
<!-- /Header --> 

<!--Page Header-->
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>My Booking</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>My Booking</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<?php
  $uid=$_SESSION['uid'];
  $sql="SELECT * FROM customer WHERE Customer_id='$uid'";
  $run_query=mysqli_query($link,$sql);
  $row=mysqli_fetch_array($run_query);
 ?>

<section class="user_profile inner_pages">
  <div class="container">
    <div class="user_profile_info gray-bg padding_4x4_40">
      <div class="upload_user_logo"> <img src="assets/images/<?php echo $row['Customer_img']; ?>" alt="image">
      </div>

      <div class="dealer_info">
        <h5><?php echo $row['Customer_name']; ?> </h5>
        <p><?php echo $row['Customer_email']; ?></p>
        <p><?php echo $row['Customer_address']; ?><br>
            <?php echo $row['Customer_zip']; ?>&nbsp;<?php echo $row['Customer_city']; ?><br>
            <?php echo $row['Customer_state']; ?></p>
      </div>
    </div>
  </div>
</section>
    <div class="row">
      <div class="col-md-2 col-sm-2">
       <?php include('includes/sidebar.php');?>
   
      <div class="col-md-10 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase underline">My Bookings </h5>
          <div class="my_vehicles_list">
            <ul class="vehicle_listing">

<?php
  $uid=$_SESSION['uid'];
  $sql="SELECT * FROM booking WHERE Customer_id='$uid'";
  $run_query=mysqli_query($link,$sql);
 ?>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">DATE</th>
      <th scope="col">BOOKINGID</th>
      <th scope="col">FROM</th>
      <th scope="col">TO</th>
      <th scope="col">STATUS</th>
      <th scope="col">PRICE</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <?php while ($rec=mysqli_fetch_array($run_query)) { ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $rec['Booking_date']; ?></th>
      <td><?php echo $rec['Booking_id']; ?></td>
      <td><?php echo $rec['Booking_pickup_point']; ?></td>
      <td><?php echo $rec['Booking_destination']; ?></td>
      <td><?php echo $rec['Booking_status']; ?></td>
      <td><?php echo $rec['Booking_fees']; ?></td>
      <td><a href="receipt.php?Booking_id=<?php echo $rec['Booking_id'];?>" class="">View Detail <span><i class="fa fa-angle-right"></i></span></a></td>
    </tr>
  </tbody>
  <?php } ?>
</table>

           
             
         
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/my-vehicles--> 


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
</html>