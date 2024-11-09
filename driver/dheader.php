<header>
   <div class="default-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2">
          <div class="logo"> <a href="dhomepage.php"><img src="../assets/images/logo.png" alt="image" height="50" width="200"/></a> </div>
        </div>

        <div class="col-sm-9 col-md-10">
          <div class="header_info"> 

<?php
  if(!isset($_SESSION['did'])){
 ?>    
            <div class="login_btn"> <a href="#Dloginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Driver Login / Register</a> </div>
<?php }
else{ 
echo "Hi ";
echo $_SESSION['dname'];
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
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="dhomepage.php">Home</a></li>
          <li class="dropdown dropdown-slide">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">My Account<span class="tf-ion-ios-arrow-down"></span></a>
              <ul class="dropdown-menu">
          <li><a href="myprofile.php">Profile Settings</a></li>
          <li><a href="updatepassword.php">Update Password</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-slide">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false"> My Status<span class="tf-ion-ios-arrow-down"></span></a>
              <ul class="dropdown-menu">
          <li><a href="createstatus.php">Create New Status</a></li>
          <li><a href="updatestatus.php">Update Status</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-slide">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false"> My Services<span class="tf-ion-ios-arrow-down"></span></a>
              <ul class="dropdown-menu">
          <li><a href="createservices.php">Create New Services</a></li>
          <li><a href="updateservices.php">Update Services</a></li>
              </ul>
            </li>
            <li><a href="home.php">Vehicle</a></li>
            <li><a href="report.php">Report</a></li>
            <li><a href="viewrating.php">My Rating</a></li>
			<li><a href="../announcement/driver/driver_announcement_homepage.html">Announcement</a></li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end --> 
  
</header>