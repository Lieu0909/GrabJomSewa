<!DOCTYPE html>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Amita' rel='stylesheet'>
</head>
<header>
<title>Driver_Announcement</title>
</header>
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
	margin:auto;
	padding: 10px 50px 100px;
}
h1
{
	font-size: 40px;
	color: white;
	font-family: Amita;
	margin:auto;
}
a:link, a:visited
{
  background-color: slateblue;
  color: white;
  padding: 8px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius:10px;
}

a:hover, a:active 
{
	background-color: yellow;
}


.btnright
{
	float: right;
	padding: 10px 25px;
	border-radius: 10px;
}
table
{
	width: 95%;
	border-collapse: collapse;
	table-layout: fixed;
	margin:auto;
	background-color:white;
	
}

tr:nth-child(even){background-color: #f2f2f2}
tr:hover {background-color: #ddd;}

.fixed_header thead th
{
	background-color:Dodgerblue;
	padding:15px;
}

.fixed_header tbody{
  display:block;
  width: 100%;
  overflow: auto;
  height: 60vh;
}

.fixed_header thead tr {
   display:block;
}

.fixed_header th{
  padding: 10px;
  text-align: left;
  width: 200px;
  font-family:Comic Sans MS;
  font-size:15px;
}
.fixed_header td {
  padding: 6px;
  text-align: left;
  width: 200px;
  font-family:Comic Sans MS;
  font-size:15px;
}
</style>

<body>

<h1>Announcement</h1>

<p style="color:red">*You can choose an announcement to edit based on your own "Driver id".</p>
<p style="color:red">**You also can click the button in the "Announcement image" column to view the image.</p>
<table class="fixed_header">
<thead>
<tr><th>Announcement id</th><th>Title</th><th>Date</th><th>Announcement content</th><th>Announcement image</th><th>Driver id</th><th> </th></tr>
</thead>
<tbody>
<?php 
		$link=mysqli_connect("localhost","root","","jomsewa");
		
		mysqli_select_db($link,"jomsewa") or die(mysqli_error($link));

		$data = "SELECT * FROM announcement";
		$result= mysqli_query($link,$data);
		
		while($row=mysqli_fetch_array($result)){
		
			echo "\t<tr><td>".$row['Ann_id']."</td>
					<td>".$row['Ann_title']."</td>
					<td>".$row['Ann_date']."</td>
					<td>".$row['Ann_content']."</td>
					<td><a href='driverviewimage.php?id=".$row['Ann_id']."&image=".$row['Ann_image']."'>".$row['Ann_image']."</a></td>
					<td>".$row['Driver_id']."</td>
					<td><a href='driver_edit.php?annid=".$row['Ann_id']."&anntitle=".$row['Ann_title']."&anndate=".$row['Ann_date'].
					"&driverid=".$row['Driver_id']."&anncontent=".$row['Ann_content']."&annimg=".$row['Ann_image']."'>Edit</a></td></tr>\n";
		}
		
		mysqli_close($link);
			
?>
</tbody>
</table>
<br>
<form action="driver_announcement_homepage.html">
<input type="submit" value="Back" class="btnright"/>
</form>

</body>
</html>