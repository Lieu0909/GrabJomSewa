<?php
  session_start();
  if(!isset($_SESSION['did'])){
  header('Location:dhomepage.php');
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
<link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="../assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="../assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="../assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="../assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="../assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="../assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
    <link rel="stylesheet" id="switcher-css" type="text/css" href="../assets/switcher/css/switcher.css" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="../assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
    <link rel="alternate stylesheet" type="text/css" href="../assets/switcher/css/orange.css" title="orange" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="../ssets/switcher/css/blue.css" title="blue" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="../assets/switcher/css/pink.css" title="pink" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="../assets/switcher/css/green.css" title="green" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="../assets/switcher/css/purple.css" title="purple" media="all" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="../assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="../assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
 <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}



    </style>
</head>
<body>

<!--Header-->
<?php include('dheader.php');?>
<!-- /Header -->

<!--Page Header-->
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>My Report</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="dhomepage.php">Home</a></li>
        <li>My Report</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header-->

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- body -->
		<?php 
    $did=$_SESSION['did'];
    $link = mysqli_connect("localhost","root","","jomsewa");
    mysqli_select_db($link,"jomsewa") or die(mysqli_error($link));
		$query = mysqli_query($link,"SELECT * FROM booking");
		$count = mysqli_num_rows($query);
		?>

        <form action="" method="post">
		<table style="width:100%" id="myTable">
		
			
			<tr>
				<td align="center"><b>Booking ID</td>
				<td align="center"><b>Booking Date</td>
				<td align="center"><b>Booking Fees</td>
        <td align="center"><b>Driver ID</td>
			</tr>

			<?php 
      $link = mysqli_connect("localhost","root","","jomsewa");
      mysqli_select_db($link,"jomsewa") or die(mysqli_error($link));
			$result = mysqli_query($link,"SELECT * FROM booking");
			while ($row = mysqli_fetch_array($result)):?>
			<tr>
        <td align="center"><?php echo $row['Booking_id'];?></td>
        <td align="center"><?php echo $row['Booking_date'];?></td>
        <td align="center"><?php echo $row['Booking_fees'];?></td>
				<td align="center"><?php echo $row['Driver_id'];?></td>
				
			</tr>
			<?php endwhile;?>
			
		</table>	
		</form>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

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