
<header>
   <div class="default-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2">
          <div class="logo"> <a href="index.php"><img src="assets/images/logo.png" alt="image" height="50" width="200"/></a> </div>
        </div>

        <div class="col-sm-9 col-md-10">
          <div class="header_info"> 


<?php
  if(!isset($_SESSION['uid'])){
 ?>    
            <div class="login_btn"> <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a> </div>
<?php }
else{ 
echo "Hi ";
echo $_SESSION['uname'];
echo "<br>Welcome To JOMSewa";
 } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">
          <ul>
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> 
            <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
<?php
  if(isset($_SESSION['uid'])){
?>    
                <li><a href="myprofile.php">Profile Settings</a></li>
                <li><a href="updatePassword.php">Update Password</a></li>
                <li><a href="myBooking.php">My Booking</a></li>
                <li><a href="myPoints.php">My Points</a></li>
                <li><a href="logout.php">Sign Out</a></li>
<?php } else { ?>
                <li>
                <a href="#loginform"  data-toggle="modal" data-dismiss="modal">Profile Settings</a></li>
                <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Update Password</a></li>
                <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">My Booking</a></li>
                <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">My Points</a></li>
                <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Sign Out</a></li>
<?php } ?>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="Bavailability.php">Booking </a>
          <li><a href="announcement/customer/customer_announcement_homepage.html">Announcements</a></li>
          <li><a href="#contact">Contact Us</a></li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end --> 
  
</header>