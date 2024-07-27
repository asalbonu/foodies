<?php 
session_start();
require_once("../config.php");
if(isset($_POST['sub'])){
    $name = $_POST['nickname'];
    $pass = $_POST['pass'];
    $query2 = "SELECT * FROM users WHERE nickname='$name'";
    $result = mysqli_query($conn,$query2);
    $query = "SELECT * FROM users WHERE nickname = '$name' AND pass = '$pass' ";
    $result2 = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==0){
        $err="There is no user with this nickname";
    }
    else if(mysqli_num_rows($result2)==0){
        $err= "Incorrect password";
    }
    else{
        $a=mysqli_fetch_assoc($result2);
        $_SESSION['name']= $name;
        $_SESSION['uid']=$a['user_id'];
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Log in</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <form action="login.php" method="post">
      <label for="w3lName">Nickname</label>
        <div class="input-group mb-3">
                                    <?php
                                    if(isset($err)) {
                                    ?>
                                    <input class="form-control" type="text" name="nickname" value="<?=$name?>"
                                        required="">
                                        <?php 
                                    }
                                    else{ ?>
                                        <input class="form-control" type="text" name="nickname" placeholder="Enter nickname"
                                        required="">
                                        <?php } ?>
        </div>
        <label for="w3lName">Password</label>
        <div class="input-group mb-3">
                                    <?php
                                    if(isset($err)) {
                                    ?>
                                    <input class="form-control" type="password" name="pass" value="<?=$name?>"
                                        required="">
                                        <?php 
                                    }
                                    else{ ?>
                                        <input class="form-control" type="password" name="pass" placeholder="Enter password"
                                        required="">
                                        <?php } ?>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="ch">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <?php
                                if(isset($err) && $err=="Incorrect password") {
                                ?>
                                <h5 style="color: red;">Incorrect password</h5>
                                <?php } 
                                else if(isset($err) && $err=="There is no user with this nickname"){
                                ?>
                                <h5 style="color: red;">There is no user with this nickname</h5>
                                <?php
                                }
                                ?>
                                <br><br>          
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="sub" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
