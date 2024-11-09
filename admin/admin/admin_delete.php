<html>
<header>
<title>Admin_Delete</title>
</header>
<head>
<link href='https://fonts.googleapis.com/css?family=Amita' rel='stylesheet'>
</head>
<style>
html { 
  background: url(../../assets/images/adminannbackground.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
body
{
	padding: 20px 100px 50px;
	height: 100%;
}
.btn
{
	float:right;
	border-radius:10px;
	padding: 10px 25px;
}
div
{
	padding: 25px 100px 25px;
}
h1
{
	font-size: 50px;
	font-family: Amita;
}
</style>

<h1>Delete Announcement</h1>
<body>
<?php 
		
		$link=mysqli_connect("localhost","root","","jomsewa");
		
		mysqli_select_db($link,"jomsewa") or die(mysqli_error($link));
	
		$id= $_GET['annid'];
		
		$delete= "DELETE FROM announcement 
					WHERE Ann_id=$id";
					
		$result= mysqli_query($link, $delete);

		if ($result){
		echo ("<div style=\"color: red;\">**Deleted successfully</div>");
		echo ("<div style=\"color: red;\"><br>Click 'Done' button to view the new data table.</div>");
		}
		
		else{
		die("<div style=\"color: red;\">Failed to delete data.</div>");
		}
	
	mysqli_close($link);
			
?>
<br>
<form action="admin_viewannouncement.php" method="post">
<br><br><input type="submit" class="btn" value="Done"/>
</form>
</body>
</html>