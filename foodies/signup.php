<?php
session_start();
$conn = mysqli_connect('localhost','root','', 'users1');
  if(isset($_POST["name"]) && !empty($_POST['name'])  && isset($_POST["pass"]) && !empty($_POST["pass"])){
  $name=$_POST['name'];
  $pass = $_POST['pass'];
  $username=$_POST['username'];
  $surname = $_POST['surname'];
  $email=$_POST["email"];
  $r=mysqli_query($conn,"SELECT * FROM users WHERE nickname = '$name'");
  $error_message = "";
    if(mysqli_num_rows($r)){
      $err = "<h6>Такой логин уже существует!</h6>";
    }
    else{
      if($pass == $_POST['cp']){
    $email=$_POST["email"];
    $_SESSION['name']=$_POST['name'];
  $r= mysqli_query($conn,"INSERT INTO `users`(`name`,`surname`,`nickname`,`pass`, `email`) VALUES ('$username','$surname','$name','$pass','$email')");
       header("Location: index.php");
      }
      else{
        $err = "<h6>Неверное подтверждение пароля!</h6>";
      }
    }
  }
  ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Foodies - Restaurant Category Responsive Web Template - Home : W3Layouts</title>
    <!-- google-fonts -->
    <link href="//fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">
    <!-- //google-fonts -->
    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>

<body>
    <!--header-->
    <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg stroke px-0">
                <h1>
                    <a class="navbar-brand" href="index.php">
                        <i class="fa fa-cutlery" aria-hidden="true"></i> Foodies
                    </a>
                </h1>
                <!-- if logo is image enable this   
    <a class="navbar-brand" href="#index.html">
        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
    </a> -->
                <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mx-lg-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="menu.php">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact Us</a>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link" href="employers.php">Employers</a>
                        </li>-->
                    </ul>
                </div>
                <?php
                if(isset($_GET['de'])){
                    unset($_SESSION['name']);
                }
                if(isset($_SESSION['name'])){
                ?>
                <div>
                    <ul class="navbar-nav mx-lg-auto">
                    <li class="nav-item">
                            <h5><?=$_SESSION['name']?></h5>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?de=1" style="color: red">Go out</a>
                        </li>
                    </ul>

                </div>
                <?php }
                else{ ?>
                <div>
                    <ul class="navbar-nav mx-lg-auto">
                    <li class="nav-item">
                            <a class="nav-link" href="login.php" style="color: red">Login</a>
                        </li>
                    </ul>

                </div>
                <?php 
                }
                ?>
                <!-- search button -->
                <div class="search-right">
                    <a href="#search" title="search"><span class="fa fa-search" aria-hidden="true"></span></a>
                    <!-- search popup -->
                    <div id="search" class="pop-overlay">
                        <div class="popup">
                            <h4 class="search-pop-text-w3 text-white text-center mb-4">Search Here Your Favourite Food
                            </h4>
                            <form action="search.php" method="GET" class="search-box">
                                <div class="input-search"> <span class="fa fa-search mr-2"
                                        aria-hidden="true"></span><input type="search" placeholder="Enter Keyword"
                                        name="search" required="required" autofocus="">
                                </div>
                                <button type="submit" class="btn button-style">Search</button>
                            </form>
                        </div>
                        <a class="close" href="#close">×</a>
                    </div>
                    <!-- //search popup -->
                </div>
                <!-- //search button -->
                <!-- toggle switch for light and dark theme -->
                <div class="cont-ser-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </nav>
        </div>
    </header>
    <!-- //inner banner -->
    <!-- contact -->
    <section class="w3l-contact-info-main" id="contact">
        <div class="contact-sec py-5">
            <div class="container py-md-4 py-3">
                <div class="contact-w3pvt-form">
                    <h3 class="title-big mb-5">Sign up</h3>
                    <form method="post" class="w3layouts-contact-fm" action="signup.php">
                        <div class="row main-cont-sec">
                            <div class="col-md-6 left-cont-contact">
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
                                    <label for="w3lName">Nickname</label>
                                    <?php  
                                        if(isset($_POST['name']) && !empty($_POST['name'])){
                                        ?>
                                        <input type="text"  name="name" value="<?=$_POST['name']?>"><br>
                                        <?php  
                                    }
                                    else{
                                        ?>
                                        <input type="text" id="username" name="name" required><br>
                                        <?php 
                                        } ?>
                                        <?php  
                                        if (!empty($err)) { 
                                        if($err == "<h6>Такой логин уже существует!</h6>") echo "$err";
                                    }
                                        ?>
                                </div>
                                <div class="form-group">
                                    <label for="w3lName">Password</label>
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
                                    <input type="password" id="cp" name="cp" value="<?=$_POST['cp']?>"><br>
                                    <?php  
                                }
                                else{
                                    ?>
                                    <input type="password" id="cp" name="cp" required><br>
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
                                <br><br>
                                <button type="submit" name="sub" class="btn btn-outline-success" style="width: 150px;">Sign up</button>
                                <a href="login.php" class="btn btn-outline-info" style="width: 150px;">Login</a>
                            </div>
                            
                        </div>
                           
                    
                    </form>
                </div>
            </div>
        </div>
    </section>
   
    <!-- //section divide border style -->
 <?php require_once("parties/footer.php");