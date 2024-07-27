<?php 
  $host = "localhost";
  $user = "root";
  $password='';
  $database = "users1";
  $conn = mysqli_connect($host,$user,$password,$database);
  if (mysqli_connect_errno()) {
    echo "Ошибка подкл: " . $conn -> connect_error; 
  }
?>