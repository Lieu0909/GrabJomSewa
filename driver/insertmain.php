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

.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 15px;
  width: 160px;
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
body{

	font-family: Comic Sans MS;
}
    </style>
</head>

<body>
<?php
$link=mysqli_connect("localhost","root","","jomsewa"); 
if (!$link) 
{ 
echo "Failed to connect to database: " . mysqli_connect_error(); 
}
mysqli_select_db($link,"jomsewa") or die(mysqli_error($link));
?>
<h3>Please fill in your maintenance details in the form below.</h3>
<form action="insert.php" method="post">
	<fieldset>
		<legend>Vehicle Maintenance Information:</legend>
		<table cellpadding="10">
		<tr>
			<td><?php 

			echo "Driver ID: ";
			echo "</td>";
			echo "<td>";
			echo "Vehicle ID: ";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			if(isset($_GET['Driverid'])){
			$driverid = $_GET['Driverid'];
			$vehicleid = $_GET['Vehicleid'];}
			echo "<input name='Did' value='$driverid' >";
			echo "</td>";
			echo "<td>";
			echo "<input name='Vid' value='$vehicleid' >";
			echo "</td>";			

			?>
		</tr>
		<tr>
			<td>Maintenance Date:</td>
			<td>Maintenance Company:</td>
		</tr>
		<tr>
			<td><input type="date" name="date" ></td>
			<td><input type="text" name="company" placeholder="*Full Company Name*"></td>
		</tr>
		<tr>
			<td colspan="2">Maintenance Service:</td>
		</tr>
		<tr>
			<td colspan="2"><select name="service">
					<option value="Brake Fluid" selected>Brake Fluid</option>
					<option value="Transmission">Transmission</option>
					<option value="Radiator">Radiator</option>
					<option value="Batteries">Batteries</option>
					<option value="Tune-up">Tune-up</option>
				</select>
			</td>
		</tr>
		</table>
		<br>
		<div><button class="button" type="submit" value="Submit" "><span>Submit</span></button></div>
	</fieldset>
</form>



<br>



</body>
</html>