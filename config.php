<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'users1';
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) { 
    die('Ошибка подключенияк'. $conn->connect_error);
}
?>