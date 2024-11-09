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
<title>Checking Availbility | Find your Car</title>
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
        <h1>Find Car</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Find Car</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>


<!-- /Printing Output--> 
<div class="sidebar_widget"  align="center">
<div class="widget_heading" align="center">
<h5><i class="fa fa-car" aria-hidden="true"></i> Information</h5>
<div class="recent_addedcars">
  
  
</div>
</div>

<!--Listing-->
<section class="listing-page">
  <div class="container">
    <div class="row">
        <div class="result-sorting-wrapper">
          <div class="sorting-count">
          </div>

          <!--Checking-Availability-->
          <div class="widget_heading">
            <h5><center><i class="fa fa-filter" aria-hidden="true"></i> Find your Car </h5><center>
          </div>
          <div class="sidebar_filter">
            <form method="post" action="BdisplayFees.php">
              <table>
  <?php
  $pickup=$_POST["from"];
    $dropOff=$_POST["to"];
    $subfrom=$_POST["subfrom"];
    $subto=$_POST["subto"];
                    $link = mysqli_connect("localhost","root","","jomsewa");
                    mysqli_select_db($link,"jomsewa") or die(mysqli_error($link));
                    $select = "SELECT Route_ID FROM location WHERE Route_from='$pickup' AND Route_to='$dropOff'";
                    $run = mysqli_query($link, $select);
                    while($row = mysqli_fetch_array($run)){
                        $Route_ID=$row['Route_ID'];

                    }
                    
  ?>
    <tr>
      <th>ID</th>
      <th>FROM</th>
      <th>TO</th>
    </tr>
    <tr>
      <td><input type="text" name="Route_ID" value="<?php echo $Route_ID;?>"readonly></input></td>
      <td><input type="text" name="from" value="<?php echo $_POST["from"].$subfrom;?>"readonly></input></td>
      <td ><input type="text" name="to" value="<?php echo $_POST["to"]. $subto;?>"  readonly></input></td>
    </tr>
    
  </table>
           
              <div class="form-group select">
                <select class="form-control" name="seater" required>
                  <option >Seater</option>
                  <option value="Student Taxi(1-4)" id="s1">Student Taxi(1-4)</option>
                  <option value="Student Taxi(6-7)" id="s2">Student Taxi(6-7)</option>
                </select>
              </div>

              <div class="form-group select">
                <select class="form-control" name="service" required>
                  <option >Service Provided</option>
                  <option value="Grab Go(Fixed Fare)" id="grabGo">Grab Go(Fixed Fare)</option>
                  <option value="Grab Share(More Cheaper)" id="grabShare">Grab Share(More Cheaper)</option>
                </select>
                 
               

              <div class="form-group">
                <input type="submit" class="btn btn-block" value="Submit"><i class="fa fa-search" aria-hidden="true"></i>
            </form>
          </div>
        </div>

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
