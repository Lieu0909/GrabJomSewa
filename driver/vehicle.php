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
table{
	width:100%;
	border-collapse: collapse;
}

td{
	padding:15px;
	text-align: center;
}
tr:hover{
	background-color: #ddd;
}
tr:nth-child(odd){
	background-color: #f5f5f5;
}
a:link, a:visited {
  background-color: green;
  color: white;
  padding: 15px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
background-color: red;
}
body{

	font-family: Comic Sans MS;
}

    </style>
</head>


<body>
<?php SESSION_start();
	$link=mysqli_connect("localhost","root","","jomsewa");
	if(!$link)
	{
		die("Could not connect to database: ".mysqli_connect_error());
	}

	//echo"Connected to database";
	
/* 	$sql= "CREATE DATABASE vehicle";
		
	mysqli_query($link,$sql); */
	
	mysqli_select_db($link, "jomsewa") or die(mysqli_error($link));
	
/* 	$table = "CREATE TABLE vehicle(
	Vehicle_id INT AUTO_INCREMENT,
	Vehicle_model VARCHAR (50),
	Vehicle_color VARCHAR (15),
	Vehicle_plate VARCHAR (30),
	Vehicle_seats INT,
	Driver_id INT,
	PRIMARY KEY(Vehicle_id),
	FOREIGN KEY(Driver_id) REFERENCES driver(Driver_id)
	)";
	 */
	
/* 	if (!mysqli_query($link,$table))
	{
		echo ("Error: ". mysqli_error($link));
	}
	 */
	$driverid = $_POST["driverID"];
	$model = $_POST["model"];
	$color = $_POST["color"];
	$pn = $_POST["plate"];
	$seats = $_POST["seats"];
	$data = "INSERT INTO vehicle(Vehicle_model,Vehicle_color,Vehicle_plate,Vehicle_seats,Driver_id)VALUES('$model','$color','$pn','$seats','$driverid')";
	
	
	if (mysqli_query($link,$data))
	{
		
		echo "The information of your new vehicle has been stored in database.";
		echo "<br><br>";
		echo "<table>";
		echo "<th>Vehicle ID</th>";
		echo "<th>Vehicle Model</th>";
		echo "<th>Vehicle Color</th>";
		echo "<th>Plate Number</th>";
		echo "<th>Seats</th>";
		echo "<th>Driver ID</th>";
		echo "<th></th>";
		$select = "SELECT * FROM vehicle WHERE Vehicle_plate='$pn'";
	
		$row = mysqli_query($link,$select);
	
		while ($array = mysqli_fetch_array($row)){
		echo "<tr><td>".$array['Vehicle_id']."</td>
					<td>".$array['Vehicle_model']."</td>
					<td>".$array['Vehicle_color']."</td>
					<td>".$array['Vehicle_plate']."</td>
					<td>".$array['Vehicle_seats']."</td>
					<td>".$array['Driver_id']."</td>
					<td><a href='insertmain.php?Driverid=".$array['Driver_id']."&Vehicleid=".$array['Vehicle_id']."'>Next</a></td></tr>";
		}
				echo "</table>";
	//echo "<center><a href='insertmain.php?Driverid=".$array['Driver_id']."&Vehicleid=".$array['Vehicle_id']."'>Next</a></center>";



		
	}
	else
	{
		echo ("Error: ". mysqli_error($link));
	}

	mysqli_close($link);
?>
</body>
</html>