<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'users1';
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) { 
    die('Ошибка подключениякБД:'. $conn->connect_error);
}
?>