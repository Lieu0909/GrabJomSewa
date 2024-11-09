<?php
  session_start();
  include('includes/config.php');
  if(!isset($_SESSION['uid'])){
  header('Location:index.php');
  }
  else{
      if(isset($_POST['submitform']))
      {
        $uid=$_SESSION['uid'];
        $dir="assets/images/";
        $image=$_FILES['uploadfile']['name'];
        $temp_name=$_FILES['uploadfile']['tmp_name'];

      if($image!="")
      {
        if(file_exists($dir.$image))
        {
          $image= time().'_'.$image;
        }

        $fdir= $dir.$image;
        move_uploaded_file($temp_name, $fdir);
      }

        $query="UPDATE customer SET Customer_img='$image' WHERE Customer_id='$uid'";
        $result = mysqli_query($link,$query);
        if($result){
            echo "<script>alert('Profile picture update successfull.');</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again');</script>";
        }


      }

      if(isset($_POST['updateprofile']))
      {
        $name=$_POST['fullname'];
        $mobile=$_POST['mobilenumber'];
        $dob=$_POST['dob'];
        $address=$_POST['address'];
        $city=$_POST['city'];
        $zip=$_POST['zip'];
        $state=$_POST['state'];
        $email=$_POST['email'];
        $uid=$_SESSION['uid'];
        $sql="UPDATE customer SET Customer_name='$name',Customer_email='$email',Customer_contact='$mobile',Customer_dob='$dob',Customer_address='$address',Customer_city='$city',Customer_zip='$zip' ,Customer_state='$state' WHERE Customer_id='$uid'";
        $result = mysqli_query($link,$sql);
        if($result){
            echo "<script>alert('Update successfull.');</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again');</script>";
        }
     }
  }
 ?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>JOMSewa</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
 <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>
</head>
<body>
       
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 

<!--Page Header-->
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>My Profile</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Profile</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<?php
  $uid=$_SESSION['uid'];
  $sql="SELECT * FROM customer WHERE Customer_id='$uid'";
  $run_query=mysqli_query($link,$sql);
  $row=mysqli_fetch_array($run_query);
 ?>

<section class="user_profile inner_pages">
  <div class="container">
    <div class="user_profile_info gray-bg padding_4x4_40">
      <div class="upload_user_logo"> <img src="assets/images/<?php echo $row['Customer_img']; ?>" alt="image">
      </div>

      <div class="dealer_info">
        <h5><?php echo $row['Customer_name']; ?> </h5>
        <p><?php echo $row['Customer_email']; ?></p>
        <p><?php echo $row['Customer_address']; ?><br>
            <?php echo $row['Customer_zip']; ?>&nbsp;<?php echo $row['Customer_city']; ?><br>
            <?php echo $row['Customer_state']; ?></p>
        <form action="" method="post" enctype="multipart/form-data">  
        Change Profile Picture<input type="file" name="uploadfile">
        <button type="submit" name="submitform">Upload</button>
        </form>
      </div>

    </div>
  
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <?php include('includes/sidebar.php');?>
      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase underline">Genral Settings</h5>
          <form  method="post">
            <div class="form-group">
              <label class="control-label">Full Name</label>
              <input class="form-control white_bg" name="fullname" value="<?php echo $row['Customer_name']; ?>" id="fullname" type="text"  required>
            </div>
            <div class="form-group">
              <label class="control-label">Email Address</label>
              <input class="form-control white_bg" value="<?php echo $row['Customer_email']; ?>" name="email" id="email" type="email" required>
            </div>
            <div class="form-group">
              <label class="control-label">Phone Number</label>
              <input class="form-control white_bg" name="mobilenumber" value="<?php echo $row['Customer_contact']; ?>" id="mobilenumber" type="text" required>
            </div>
            <div class="form-group">
              <label class="control-label">Date of Birth&nbsp;(dd/mm/yyyy)</label>
              <input class="form-control white_bg" value="<?php echo $row['Customer_dob']; ?>" name="dob" placeholder="dd/mm/yyyy" id="birth-date" type="date" >
            </div>
            <div class="form-group">
              <label class="control-label">Your Address</label>
              <textarea class="form-control white_bg" name="address" rows="4" ><?php echo $row['Customer_address']; ?></textarea>
            </div>
            <div class="form-group">
              <label class="control-label">City</label>
              <input class="form-control white_bg" id="city" name="city" value="<?php echo $row['Customer_city']; ?>" type="text">
            </div>
            <div class="form-group">
              <label class="control-label">Zip Code</label>
              <input class="form-control white_bg"  id="zip" name="zip" value="<?php echo $row['Customer_zip']; ?>" type="text">
            </div>
            <div class="form-group">
              <label class="control-label">State</label>
              <input class="form-control white_bg"  id="state" name="state" value="<?php echo $row['Customer_state']; ?>" type="text">
            </div>
    
           
            <div class="form-group">
              <button type="submit" name="updateprofile" class="btn">Save Changes <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/Profile-setting--> 
 

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 

<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>