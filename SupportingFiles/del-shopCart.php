<?php

  //Подключение базы данных
  $link = new mysqli('localhost','root','','db_transletter');
  mysqli_set_charset($link, "utf8mb4");

  $services=$_POST['servicesRm'];

  $nam = $_COOKIE["name"];

  foreach($services as $res){
    $query="DELETE FROM shopcart WHERE service='$res' AND login = '$nam'";
    $sql=mysqli_query($link, $query);
  }

  $link->close();
  header('location: ../shopCart.php');

?>