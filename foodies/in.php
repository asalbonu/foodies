<?php
    require_once("config/db.php");
    if(isset($_POST['sub'])){
    $message=$_POST['message'];
    $email=$_POST['email'];
    $wName=$_POST['wName'];
    $Name=$_POST['Name'];
    $query="INSERT INTO contact(Name,wName,email,message) 
    VALUES('$Name', '$wName','$email','$message');";
    $result=mysqli_query($conn,$query);
     header("Location: index.php?id=2");
    }
?>