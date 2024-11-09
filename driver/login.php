<?php
if(isset($_POST['dlogin']))
{
$email=mysqli_real_escape_string($link,$_POST['email']);
$password=md5($_POST['password']);
$link = mysqli_connect("localhost","root","","jomsewa");
                    mysqli_select_db($link,"jomsewa") or die(mysqli_error($link));
$sql ="SELECT * FROM driver WHERE Driver_email='$email' and Driver_password='$password'";

$result= mysqli_query($link,$sql);

$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
        $row=mysqli_fetch_array($result);
        $_SESSION['did']=$row['Driver_id'];
        $_SESSION['dname']=$row['Driver_name'];
 
        echo "<script type='text/javascript'> document.location.href = 'dhomepage.php'; </script>";
}else{
  
  echo "<script>alert('Invalid Details');</script>";

}
}
?>

<div class="modal fade" id="Dloginform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Login</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="login_wrap">
            <div class="col-md-12 col-sm-6">
              <form method="post">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Email*">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password*">
                </div>
                <div class="form-group checkbox">
                  <input type="checkbox" id="remember">
               
                </div>
                <div class="form-group">
                  <input type="submit" name="dlogin" value="Login" class="btn btn-block">
                </div>
              </form>
            </div>
           
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Don't have an account? <a href="#Dsignupform" data-toggle="modal" data-dismiss="modal">Signup Here</a></p>
        <p><a href="#Dforgotpassword" data-toggle="modal" data-dismiss="modal">Forgot Password ?</a></p>
      </div>
    </div>
  </div>
</div>
