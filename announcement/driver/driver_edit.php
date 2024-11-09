<html>
<header>
<title>Driver_Editpage</title>
</header>
<style>
body
{
	padding: 0px 50px 50px;
	height: 100%;
	background-color: lightblue;
}
.btnright
{
	float: right;
	padding: 10px 25px;
	border-radius: 10px;
}
fieldset
{
	padding: 25px 50px 25px;
}
div
{
	padding: 15px 50px 25px;
}
h1
{
	font-size: 50px;
	font-family: Comic Sans MS;
}
</style>
<body>
<h1>Edit Announcement</h1>
<form action="driver_update.php" method="post">
<fieldset>
<legend>Edit your announcement</legend>



<?php  session_start();
		$_SESSION['annid']= $_GET['annid'];
		$link=mysqli_connect("localhost","root","","jomsewa");
		
		mysqli_select_db($link,"jomsewa") or die(mysqli_error($link));
		
		if(isset($_GET['annid'])){
			$title = $_GET['anntitle'];
			$date = $_GET['anndate'];
			$driverid = $_GET['driverid'];
			$content = $_GET['anncontent'];
			$annimg = $_GET['annimg'];
			}
			
		$ann_id = $_GET['annid'];
		

		echo "<table>";
		echo "<tr>";
		echo "<td>";
		echo "Title:";
		echo "</td>";
		echo "<td style='color:red'>";
		echo "<input name='title' value='$title'>";
		echo " **You can edit your title.</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>";
		echo "Date:";
		echo "</td>";
		echo "<td style='color:red'>";
		echo "<input name='date' value='$date'>";
		echo " **CHANGE the date to the current date when edit.</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>";
		echo "Driver ID:";
		echo "</td>";
		echo "<td style='color:red'>";
		echo "<input name='driverid' value='$driverid'>";
		echo " **Use your own Driver id.</td>";
		echo "</tr>";
		echo "</table>";
		echo "<br>";
		echo "<p  style='color:red'>**Edit your content here:</p>";
		echo "<div style='padding: 15px 50px 25px;'><textarea style='width:100%' name='textarea' rows='25' cols='50' >".$content."</textarea></div>";
		echo "<br>";
		echo "<img src='".$annimg."' alt='image'>";
		
		echo "<br>";
		echo "<p  style='color:red'>";
		echo "You can replace your image by insert new url here:";
		echo "<input type='text' value='".$annimg."' name='image'>";
		echo "</p>";
		echo "<br>";
	
		mysqli_close($link);
			
?>

<br><br><input type="submit" class="btnright" value="Done"/>

</fieldset>
</form>

<form action="driver_announcement_homepage.html">
	<input type="submit" name="back" value="Back" class="btnright" align="right"></p>
</form>

</body>
</html>