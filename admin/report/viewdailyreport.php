<!doctype>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
</head>
<header>
<title>ViewDailyReport</title>
</header>

<style>
html{ 
	background: url(reportimg/reportdaily.jpg) no-repeat center center fixed; 
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}

ul{
	list-style-type: none;
	margin: 0;
	padding: 25px;
	overflow: hidden;
	background-color: rgba(51, 51, 51, 0.9);
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
}
li{
	float: left;
}
li a{
	display: block;
	color: white;
	text-align: center;
	padding: 15px 40px;
	text-decoration: none;
	font-size: 20px;
}
li a:hover:not(.active){
	color: rgb(102, 153, 153);
}

body{
	padding: 100px 50px 50px;
}

h1{
	font-size:4vw;
	font-family:Sofia;
	text-decoration: none;
	color: black;
	text-align: left;
}

.btn{
	background-color: rgb(89, 89, 89));
	color: black;
	font-size: 15px;
	border-radius: 12px;
	padding: 10px 20px;
	font-family: Georgia, serif;
	float: right;
	position: bottom right;
}
.btn:hover{
	background-color: rgb(89, 89, 89);
	color: white;
}

table.report{
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	border-collapse: collapse;
	width: 100%;
	font-size: 20px;
}
table.report td, table.report th{
	border: 1px solid #ddd;
	padding: 8px;
}
table.report tbody:nth-child(even){background-color: #f2f2f2;}
table.report tbody:hover {background-color: #ddd;}
table.report th{
	padding-top: 12px;
	padding-bottom: 12px;
	text-align: left;
	background-color: #4CAF50;
	color: white;
}
table.report tbody{
	overflow:auto;
}

p.a{
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 18px;
}

table.b{
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 20px;
	padding-top: 25px;
}
</style>

<body>
<h1>Daily Report</h1>

<?php 
		$link=mysqli_connect("localhost","root","","jomsewa");
		
		mysqli_select_db($link,"jomsewa") or die(mysqli_error($link));
		
		$date = $_POST['date'];
		$data = "SELECT booking.Booking_date,
						booking.Driver_id,
						driver.Driver_name,
						booking.Booking_service_type,
						vehicle.Vehicle_plate,
						vehicle.Vehicle_model FROM booking
							
				INNER JOIN driver ON booking.Driver_id=driver.Driver_id
				INNER JOIN vehicle ON booking.Vehicle_id=vehicle.Vehicle_id
				
				WHERE CAST(Booking_date AS Date)='$date'
				ORDER BY Driver_id";
				
		$result= mysqli_query($link,$data);
		
		if( ! mysqli_num_rows($result) ){
				
				echo "<p style='font-size:25px;'><b>There is no data in this day.</b></p>";
		}
		
		else{
		echo "<p class='a'>";
		echo "<b>Date: ";
		echo "<input readonly name='date' value='$date'></b>";
		echo "</p>";

		echo "<table class='report' id='search' style='background-color:white;'>";
		echo "<tr >";
		echo "<th>Date</th>";
		echo "<th>Driver id</th>";
		echo "<th>Driver name</th>";
		echo "<th>Vehicle number plate</th>";
		echo "<th>Vehicle model</th>";
		echo "<th>Booked services</th>";
		echo "</tr>";
		
		
		while($row=mysqli_fetch_assoc($result))
		{
			echo "\t<tbody><tr><td>".$row['Booking_date']."</td>
					<td>".$row['Driver_id']."</td>
					<td>".$row['Driver_name']."</td>
					<td>".$row['Vehicle_plate']."</td>
					<td>".$row['Vehicle_model']."</td>
					<td>".$row['Booking_service_type']."</td></tr>
					
					</tr></tbody>\n";
			
		}
		
	echo "</table>";
		
		$sql = "SELECT COUNT(Booking_id) AS Number_of_customer FROM booking WHERE CAST(Booking_date AS Date)='$date'";
		$res = mysqli_query($link, $sql);
		echo "<br><table class='b'>";
		echo "<tr><td><b>Number of customer of the day: ";
		$count = mysqli_fetch_array($res);
		echo "".$count['Number_of_customer']."</b></td></tr>";
		
		$sql2 = "SELECT SUM(Booking_fees) AS Daily_income FROM booking WHERE CAST(Booking_date AS Date)='$date'";
		$rs = mysqli_query($link, $sql2);
		echo "<tr><td><b>Daily income for the day: RM ";
		$count2 = mysqli_fetch_array($rs);
		echo "".$count2['Daily_income']."</b></td></tr>";
		echo "</table>";
		
		}
		mysqli_close($link);
			
?>


<ul>
 <li><a href="#home" style="width:20%">Home</a></li>
  <li><a href="monitor.html" style="width:20%">Maintenance Record</a></li>
  <li><a href="dstatus.php" style="width:20%">Approval</a></li>
  <li><a href="../announcement/admin/admin_announcement_homepage.html" style="width:20%">Announcements</a></li>
  <li><a href="report_homepage.html" style="width:20%">Report</a></li>
</ul>

<form action="daily.html">
<br>
<input type="submit" value="Back" name="back" class="btn"/>
</form>

</body>
</html>