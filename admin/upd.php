<?php
require_once("../config.php");
print_r($_FILES);
    if(isset($_POST['upd'])){
        $kk=$_POST['id'];
        $name=$_POST['name'];
        $surname = $_POST['surname'];
        $gender = $_POST['gender'];
        $position = $_POST['position'];
        $birthday = $_POST['bd'];
        $targetDir = "../assets/images/employer/";
        $image = time().'.jpg'; 
        $targetFile = $targetDir . $image;
       $k= move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile);
        $query = "UPDATE `employers` SET `name`='$name',`surname`='$surname',`gender`='$gender',`birthday`='$birthday',`position`='$position',`img`='$image' WHERE id=$kk";
        $result = mysqli_query($conn,$query);
        header("Location: index.php?page=2");
        }
        ?>