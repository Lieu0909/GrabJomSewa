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
tr:hover{
	background-color: #ddd;
}
tr:nth-child(odd){
	background-color: #f5f5f5;
}
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: green;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 12px;
  padding: 14px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
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
        <h1>My Maintenance Records</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="dhomepage.php">Home</a></li>
        <li>My Maintenance Records</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<script>
function home(){
	window.location.href="home.php";
}
</script>
<body>
<h1><center>Maintenance Records</center></h1> 
<table>
	<th>Maintenance ID</th>
	<th>Maintenance date</th>
	<th>Maintenance company</th>
	<th>Maintenance service</th>
	<th>Vehicle ID</th>
	<th>Driver ID</th>
<?php 
	$link=mysqli_connect("localhost","root","","jomsewa");
	
	mysqli_select_db($link,"jomsewa") or die(mysqli_error($link));
	
	$select = "SELECT * FROM maintenance";
	
	$row = mysqli_query($link,$select);
	
	while ($array = mysqli_fetch_array($row)){
		echo "<tr><td>".$array['Main_id']."</td>
					<td>".$array['Main_date']."</td>
					<td>".$array['Main_company']."</td>
					<td>".$array['Main_service']."</td>
					<td>".$array['Vehicle_id']."</td>
					<td>".$array['Driver_id']."</td></tr>";
	}
	
	mysqli_close($link);
?>
</table>
<br><br><br>
<button class="button" onclick="home()"><span>Return to homepage</span></button> 
</body>
</html>