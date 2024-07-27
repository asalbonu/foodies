<?php
require_once("../../../config.php");
if(isset($_POST['save'])){
  $name=$_POST['name'];
  $surname=$_POST['surname'];
  $bd=$_POST['bd'];
  $gender=$_POST['gender'];
  $position=$_POST['position'];
  $targetDir = "../../../assets/images/employer/";
  $image = time().'.jpg'; 
  $targetFile = $targetDir . $image;
 $k= move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile);
  $query="INSERT INTO employers(name,surname,birthday,gender,position,img) 
  VALUES('$name','$surname','$bd','$gender','$position','$image');";
  $result=mysqli_query($conn,$query);
  header("Location: ../../index.php?page=2");
}
?>