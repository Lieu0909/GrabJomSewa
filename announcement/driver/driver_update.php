<!DOCTYPE html>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Amita' rel='stylesheet'>
<title>Driver_Updatepage</title>
</head>
<style>
html { 
  background: url(../../assets/images/blue.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
body
{
	padding: 20px 50px 50px;
	height: 100%;
}
.btn
{
	float: right;
}
h1
{
	font-size: 40px;
	color: white;
	font-family: Amita;
	margin:auto;
}
.btnright
{
	float: right;
	padding: 10px 25px;
	border-radius: 10px;
}
</style>

<body>
<h1>Updated</h1>
<?php session_start();
    
	$link=mysqli_connect("localhost","root","","jomsewa");
		
	mysqli_select_db($link,"jomsewa") or die(mysqli_connect_error($link));
	
	$ann_id = $_SESSION['annid'];		
	$newtitle = $_POST['title'];
	$newdate = $_POST['date'];
	$newdriverid = $_POST['driverid'];
	$newcontent = $_POST['textarea'];
	$newimage = $_POST['image'];
		
	
	$update= "UPDATE announcement 
				SET Ann_title='$newtitle',
					Ann_date='$newdate',
					Ann_content='$newcontent',
					Ann_image='$newimage'
				WHERE Ann_id=$ann_id";
					
	$result= mysqli_query($link, $update);

	if ($result){
		echo ("<p style='color:white'>**Update is successfull.</p>");
		echo "<div width=100% style='background-color:white;'>";
		
		echo "<table cellpadding=20px border=1 width=100% style='background-color:white;'>";
		echo "<tr>";
		echo "<td>";
		echo "Title:";
		echo "</td>";
		echo "<td> ";
		echo $newtitle;
		echo "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>";
		echo "Date:";
		echo "</td>";
		echo "<td> ";
		echo $newdate;
		echo "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>";
		echo "Driver ID:";
		echo "</td>";
		echo "<td> ";
		echo $newdriverid;
		echo "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>";
		echo "Content:";
		echo "</td>";
		echo "<td> ";
		echo $newcontent;
		echo "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>";
		echo "Image:";
		echo "</td>";
		echo "<td> ";
		echo $newimage;
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		echo "</div>";		
	}
	else{
		echo "Error updating record: ".mysqli_error($link);
	}
	
	mysqli_close($link);
?>

<form action="driver_viewcompleteann.php" method="post">
<p><input type="submit" class="btnright" value="View All Announcement"></p>
</form>