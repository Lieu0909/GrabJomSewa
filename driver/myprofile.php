<?php
  session_start();
  if(!isset($_SESSION['did'])){
  header('Location:dhomepage.php');
  }
  else{
      if(isset($_POST['submitform']))
      {
        $did=$_SESSION['did'];
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
        $link = mysqli_connect("localhost","root","","jomsewa");
        mysqli_select_db($link,"jomsewa") or die(mysqli_error($link));
        $query="UPDATE driver SET Driver_img='$image' WHERE Driver_id='$did'";
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
        $age=$_POST['age'];
        $race=$_POST['race'];
        $dob=$_POST['dob'];
        $address=$_POST['address'];
        $city=$_POST['city'];
        $zip=$_POST['zip'];
        $state=$_POST['state'];
        $email=$_POST['email'];
        $did=$_SESSION['did'];
        $link = mysqli_connect("localhost","root","","jomsewa");
        mysqli_select_db($link,"jomsewa") or die(mysqli_error($link));
        $sql="UPDATE driver SET Driver_name='$name', Driver_email='$email', Driver_contact='$mobile', Driver_age='$age', Driver_race='$race', Driver_dob='$dob', Driver_address='$address', Driver_city='$city', Driver_zip='$zip' , Driver_state='$state' WHERE Driver_id='$did'";
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
<link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="../assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="../assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="../assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="../assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="../assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="../assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
    <link rel="stylesheet" id="switcher-css" type="text/css" href="../assets/switcher/css/switcher.css" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="../assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
    <link rel="alternate stylesheet" type="text/css" href="../assets/switcher/css/orange.css" title="orange" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="../ssets/switcher/css/blue.css" title="blue" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="../assets/switcher/css/pink.css" title="pink" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="../assets/switcher/css/green.css" title="green" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="../assets/switcher/css/purple.css" title="purple" media="all" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="../assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="../assets/images/favicon-icon/favicon.png">
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
<?php include('dheader.php');?>
<!-- /Header -->

<!--Page Header-->
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>My Profile</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="dpage.php">Home</a></li>
        <li>Profile</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<?php
  $did=$_SESSION['did'];
  $link = mysqli_connect("localhost","root","","jomsewa");
  mysqli_select_db($link,"jomsewa") or die(mysqli_error($link));
  $sql="SELECT * FROM driver WHERE Driver_id='$did'";
  $run_query=mysqli_query($link,$sql);
  $row=mysqli_fetch_array($run_query);
 ?>

<section class="user_profile inner_pages">
  <div class="container">
    <div class="user_profile_info gray-bg padding_10x10_40">
      <div class="upload_user_logo"> <img src="../assets/images/<?php echo $row['Driver_img']; ?>" alt="image">
      </div>

      <div class="dealer_info">
        <h5><?php echo $row['Driver_name']; ?> </h5>
        <p><?php echo $row['Driver_email']; ?></p>
          <p><?php echo $row['Driver_age']; ?><br>
            <p><?php echo $row['Driver_race']; ?><br>
        <p><?php echo $row['Driver_dob']; ?><br>
        <p><?php echo $row['Driver_address']; ?><br>
            <?php echo $row['Driver_zip']; ?>&nbsp;
            <?php echo $row['Driver_city']; ?><br>
            <?php echo $row['Driver_state']; ?></p>
        <form action="" method="post" enctype="multipart/form-data">  
        Change Profile Picture<input type="file" name="uploadfile">
        <button type="submit" name="submitform">Upload</button>
        </form>
      </div>

    </div>
  
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <?php include('sidebar.php');?>
      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase underline">General Settings</h5>
          <form  method="post">
            <div class="form-group">
              <label class="control-label">Full Name</label>
              <input class="form-control white_bg" name="fullname" value="<?php echo $row['Driver_name']; ?>" id="fullname" type="text"  required>
            </div>
            <div class="form-group">
              <label class="control-label">Email Address</label>
              <input class="form-control white_bg" value="<?php echo $row['Driver_email']; ?>" name="email" id="email" type="email" required>
            </div>
            <div class="form-group">
              <label class="control-label">Phone Number</label>
              <input class="form-control white_bg" name="mobilenumber" value="<?php echo $row['Driver_contact']; ?>" id="mobilenumber" type="text" required>
            </div>
            <div class="form-group">
              <label class="control-label">Age</label>
              <input class="form-control white_bg" id="age" name="age" value="<?php echo $row['Driver_age']; ?>" type="text">
            </div>
            <div class="form-group">
              <label class="control-label">Race</label>
              <input class="form-control white_bg" id="race" name="race" value="<?php echo $row['Driver_race']; ?>" type="text">
            </div>
            <div class="form-group">
              <label class="control-label">Date of Birth&nbsp;(dd/mm/yyyy)</label>
              <input class="form-control white_bg" value="<?php echo $row['Driver_dob']; ?>" name="dob" placeholder="dd/mm/yyyy" id="birth-date" type="date" >
            </div>
            <div class="form-group">
              <label class="control-label">Your Address</label>
              <textarea class="form-control white_bg" name="address" rows="4" ><?php echo $row['Driver_address']; ?></textarea>
            </div>
            <div class="form-group">
              <label class="control-label">City</label>
              <input class="form-control white_bg" id="city" name="city" value="<?php echo $row['Driver_city']; ?>" type="text">
            </div>
            <div class="form-group">
              <label class="control-label">Zip Code</label>
              <input class="form-control white_bg"  id="zip" name="zip" value="<?php echo $row['Driver_zip']; ?>" type="text">
            </div>
            <div class="form-group">
              <label class="control-label">State</label>
              <input class="form-control white_bg"  id="state" name="state" value="<?php echo $row['Driver_state']; ?>" type="text">
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
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script> 
<script src="../assets/js/interface.js"></script> 

<!--bootstrap-slider-JS--> 
<script src="../assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="../assets/js/slick.min.js"></script> 
<script src="../assets/js/owl.carousel.min.js"></script>

</body>
</html>