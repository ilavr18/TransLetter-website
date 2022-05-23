<?php

  //Подключение базы данных
  $link = new mysqli('localhost','root','','db_transletter');
  mysqli_set_charset($link, "utf8mb4");

  $services=$_POST['servicesRm'];

  foreach($services as $res){
    $query="DELETE FROM services WHERE service='$res'";
    $sql=mysqli_query($link, $query);
  }

  $link->close();
  header('location: ../about.php');
?>