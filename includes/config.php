<?php 
	
	$host='localhost';
	$username='root';
	$pass='';
	$db='jomsewa';

	$link=mysqli_connect($host,$username,$pass,$db);

	if(!$link) die("Connection refused").mysql_connect_error();
 ?>