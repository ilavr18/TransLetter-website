<?php 
//Подключение базы данных
  $link = new mysqli('localhost','root','','db_transletter');
  mysqli_set_charset($link, "utf8mb4");

  $users=$_POST['usersRm'];

  foreach($users as $res){
    $query="DELETE FROM users WHERE login='$res'";
    $sql=mysqli_query($link, $query);
  }
  $link->close();
  header('location: ../users.php');
?>