<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'users1';
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) { 
    die('Ошибка подключения к БД: '. $conn->connect_error);
}

$query="SELECT * FROM products;";
$result=mysqli_query($conn,$query);
?>
<table class="table">
<thead class="thead-dark">
    <tr>
    <th>№</th>
    <th>Изображения</th>
      <th>Имя</th>
      <th>Цена</th>
      <th>Категория</th>
      <th>Описание</th>
      <th>Delete</th>
      <th>Update</th>
    </tr>
    </thead>
  <tbody>
   <?php
   $k=0;
       while($a = mysqli_fetch_array($result)){
        $k++;
         echo "<tr>";
         echo "<td> $k </td>";
         echo "<td><img src='../foodies/assets/images/$a[5]' class='img-responsive' width=100></td>";
         echo "<td> $a[1] </td>";
         echo "<td> $a[2] </td>";
         echo "<td> $a[4] </td>";
         echo "<td> $a[3] </td>";
         echo "<td><a href='pages/employers/delete1.php?id=$a[0]' class ='btn btn-danger'>Удалить</a></td>";
         echo "<td><a href='form4.php?id=$a[0]' class ='btn btn-danger' style = 'background-color: green'>Изменить</a></td>";
         echo "</tr>";
      }
   ?>
  </tbody>
</table>