<?php
  session_start();
  include('includes/config.php');
  if(!isset($_SESSION['uid'])){
  header('Location:index.php');
  }

  $bookingid=$_GET['Booking_id'];
  $uid=$_SESSION['uid'];
  $sql="SELECT * FROM booking WHERE Customer_id='$uid' AND Booking_id='$bookingid'";
  $run_query=mysqli_query($link,$sql);
  $row=mysqli_fetch_array($run_query);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
  <title>JOMSewa</title>
</head>


<body style="margin:0; padding:0; min-width:100%; background-color:#ececec;">
<table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#ececec" style="margin:0; padding:0;">
<tbody>
  <tr>
  <td>

  <!-- OUTER WRAPPER OPEN -->
  <center>
  <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
  <tr>
  <td id="main-width" align="center" width="600" style="min-width:590px;" bgcolor="#ffffff">

  <!-- START OF MAIN CONTENT BLOCK -->
  <table width="600" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="padding:0; margin:0; ">
  <tbody>
  <tr>
    <td align="center" valign="top" bgcolor="#00a0ee" style="padding:0; margin:0; font-family:Avenir, Helvetica, Arial, sans-serif; font-size:30px; text-decoration:none; color:#ffffff;">
    <img src="assets/images/logo.png" width="600" height="90" style="display:block;" alt="logo" border="0"></td>
  </tr>
  <tr>
    <td valign="top" align="center" style="font-family:Avenir, 'Helvetica Neue', Helvetica, Arial, sans-serif; text-align:center; color:#000080; font-size:36px; line-height:48px; font-weight:200; letter-spacing: 0.02em; padding:34px 15px 0 15px;">Thanks for riding, <?php echo $_SESSION['uname']?></td>
  </tr>
  <tr>
   <td valign="top" align="center" style="font-family:Avenir, 'Helvetica Neue', Helvetica, Arial, sans-serif; text-align:center; color:#000080; font-size:25px; line-height:32px; font-weight:200; letter-spacing: 0.02em; padding:10px 55px 24px 55px;">We hope you enjoyed your ride.</td>
  </tr>
  </tbody>                 
  </table>

  <table width="100%">
  <tr>
    <th>Date:</th>
    <td><?php echo $row['Booking_date']; ?></td>
  </tr>
  <tr>
    <th>Pickup address:</th>
    <td><?php echo $row['Booking_pickup_point']; ?></td>
  </tr>
  <tr>
    <th>Destination address:</th>
    <td><?php echo $row['Booking_destination']; ?></td>
  </tr>
    <tr>
    <th>Booking Kilometer:</th>
    <td><?php echo $row['Booking_kilo']; ?>km</td>
  </tr>
  <tr>
    <th>Booking est time:</th>
    <td><?php echo $row['Booking_est_time']; ?></td>
  </tr>
  <tr>
    <th>Driver:</th>
    <td><?php echo $row['Driver_id']; ?></td>
  </tr>
  <tr>
    <th>Service:</th>
    <td><?php echo $row['Booking_service_type']; ?></td>
  </tr>
  <tr>
    <th>Total:</th>
    <td><?php echo $row['Booking_fees']; ?></td>
  </tr>
  <tr>
    <th>Earning point:</th>
    <td><?php echo $row['Earning_points']; ?></td>
  </tr>
  </table>
                    
  <table width="600" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="padding:0; margin:0; ">
  <tbody>
  <tr>
    <td valign="top" align="center" style="font-family:Avenir, 'Helvetica Neue', Helvetica, Arial, sans-serif; text-align:center; color:#151515; font-size:15px; line-height:21px; font-weight:200; letter-spacing: 0.02em; padding:38px 38px 50px 38px;">
    Invite your friends and family.<br>
    Get a free ride worth up to RM10 when you refer a friend to try JOMSewa. Share code:RGESMLS</td>
  </tr>
  </tbody>
  </table>
     <a href onclick="myFunction()" style="margin: 0 auto">Print PDF</a>
  <!-- END OF MAIN CONTENT BLOCK -->

  <script>
function myFunction() {
  window.print();
}

</script>
</body>
</html>