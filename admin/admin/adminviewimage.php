<html>
<style>
input
{
	float:right;
	padding: 20px 30px;
	border-radius: 20px;
	background-color: slateblue;
	color: white;
}
</style>
<body>
<?php	session_start();
		$_SESSION['id']= $_GET['id'];
		$id = $_GET['id'];
		$link=mysqli_connect("localhost","root","","jomsewa");
		
		mysqli_select_db($link,"jomsewa") or die(mysqli_error($link));
		
		if(isset($_GET['id'])){
		$image = $_GET['image'];
		}
		echo "<br><center><img src='../../assets/images/".$image."' alt='image'></center>";
		
		mysqli_close($link);
			
?>
<br><br>
<form action="admin_viewannouncement.php" method="post">
<br><br><input type="submit" value="Back">
</form>

</body>

</html>