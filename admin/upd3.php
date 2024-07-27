<?php
require_once("../config.php");
    if(isset($_POST['upd'])){
        $kk=$_POST['id'];
        $name=$_POST['name'];
        $price=$_POST['price'];
        $desc=$_POST['desc'];
        $category=$_POST['category'];
        $targetDir = "../foodies/assets/images/";
          $image = time().'.jpg'; 
          $targetFile = $targetDir . $image;
         $k= move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile);
        $query = "UPDATE `products` SET `name`='$name',`price`='$price',`descr`='$desc',`category`='$category',`img`='$image' WHERE `id`=$kk";
        $result = mysqli_query($conn,$query);
        header("Location: index.php?page=4");
        }
        ?>