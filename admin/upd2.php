<?php
require_once("../config.php");
    if(isset($_POST['upd'])){
        $kk=$_POST['id'];
        $name=$_POST['name'];
        $surname = $_POST['surname'];
        $nickname = $_POST['nickname'];
        $pass = $_POST['pass'];
        $targetDir = "../assets/images/employer/";
        $image = time().'.jpg'; 
        $targetFile = $targetDir . $image;
       $k= move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile);
        $query = "UPDATE `users` SET `name`='$name',`surname`='$surname',`nickname`='$nickname',`pass`='$pass',`image`='$image' WHERE user_id=$kk";
        $result = mysqli_query($conn,$query);
        header("Location: index.php");
        }
        ?>