<?php
session_start();
$conn = mysqli_connect('localhost','root','', 'users1');
  if(isset($_POST["name"]) && !empty($_POST['name'])  && isset($_POST["pass"]) && !empty($_POST["pass"])){
  $name=$_POST['name'];
  $pass = $_POST['pass'];
  $username=$_POST['username'];
  $surname = $_POST['surname'];
  $email=$_POST["email"];
  $img=$_POST['img'];
  $r=mysqli_query($conn,"SELECT * FROM users WHERE nickname = '$name'");
  $error_message = "";
    if(mysqli_num_rows($r)){
      $err = "<h6>Такой логин уже существует!</h6>";
    }
    else{
      if($pass == $_POST['cp']){
    $email=$_POST["email"];
    $_SESSION['name']=$_POST['name'];
    $targetDir = "../assets/images/employer/";
        $image = time().'.jpg'; 
        $targetFile = $targetDir . $image;
       $k= move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile);
  $r= mysqli_query($conn,"INSERT INTO `users`(`name`,`surname`,`nickname`,`pass`, `email`,image) VALUES ('$username','$surname','$name','$pass','$email','$image')");
  $query = "SELECT * FROM users WHERE nickname = '$name' AND pass = '$pass' ";
$ss=mysqli_query($conn,$query);
  $a=mysqli_fetch_assoc($ss);
  $_SESSION['uid']=$a['user_id'];
  header("Location: index.php");
      }
      else{
        $err = "<h6>Неверное подтверждение пароля!</h6>";
      }
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
    <b>Register</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <form action="register.php" method="post"  enctype="multipart/form-data">
      <div class="form-group">
                                    <label for="w3lName">Username</label>
                                    <?php
                                    if(isset($err)) {
                                    ?>
                                    <input class="form-control" type="text" name="username" value="<?=$username?>"
                                        required="">
                                        <?php 
                                    }
                                    else{ ?>
                                        <input class="form-control" type="text" name="username" placeholder=""
                                        required="">
                                        <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="w3lName">Surname</label>
                                    <?php
                                    if(isset($err)) {
                                    ?>
                                    <input class="form-control" type="text" name="surname" value="<?=$surname?>"
                                        required="">
                                        <?php 
                                    }
                                    else{ ?>
                                        <input class="form-control" type="text" name="surname" placeholder=""
                                        required="">
                                        <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="w3lName">Email</label>
                                    <?php
                                    if(isset($err)) {
                                    ?>
                                    <input class="form-control" type="email" name="email" value="<?=$email?>"
                                        required="">
                                        <?php 
                                    }
                                    else{ ?>
                                        <input class="form-control" type="email" name="email" placeholder=""
                                        required="">
                                        <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="w3lName">Image</label>
                                    <?php
                                    if(isset($err)) {
                                    ?>
                                    <input class="form-control" type="file" name="img" value="<?=$img?>"
                                        required="">
                                        <?php 
                                    }
                                    else{ ?>
                                        <input class="form-control" type="file" name="img" placeholder=""
                                        required="">
                                        <?php } ?>
                                </div>
                                <label for="w3lName">Nickname</label>
                                <div class="form-group">
                                    
                                    <?php  
                                        if(isset($_POST['name']) && !empty($_POST['name'])){
                                        ?>
                                        <input class="form-control" type="text"  name="name" value="<?=$_POST['name']?>">
                                        <?php  
                                    }
                                    else{
                                        ?>
                                        <input class="form-control" id="username" name="name" required>
                                        <?php 
                                        } ?>
                                        <?php  
                                        if (!empty($err)) { 
                                        if($err == "<h6>Такой логин уже существует!</h6>") echo "$err";
                                    }
                                        ?>
                                </div>
                                <label for="w3lName">Password</label>
                                <div class="form-group">
                                    
                                    <?php
                                    if(isset($err)) {
                                    ?>
                                    <input class="form-control" type="password" name="pass" value="<?=$pass?>"
                                        required="">
                                        <?php 
                                    }
                                    else{ ?>
                                        <input class="form-control" type="password" name="pass" placeholder=""
                                        required="">
                                        <?php } ?>
                                   
                                </div>
                                <div class="form-group">
                                    <label for="w3lName">C pass</label>
                                    <?php  
                                    if(isset($_POST['cp']) && !empty($_POST['cp'])){
                                    ?>
                                    <input class="form-control" type="password" id="cp" name="cp" value="<?=$_POST['cp']?>">
                                    <?php  
                                }
                                else{
                                    ?>
                                    <input class="form-control" type="password" id="cp" name="cp" required>
                                    <?php 
                                    } ?>
                                    <?php  
                                    if (!empty($err)) { 
                                    if($err == "<h6>Неверное подтверждение пароля!</h6>") echo "$err";
                                }
                                    ?><br>
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
            <button type="submit" name="sub" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-0">
        <a href="login.php" class="text-center">Log in</a>
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
