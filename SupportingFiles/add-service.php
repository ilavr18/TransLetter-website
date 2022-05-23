<?php

  //Подключение базы данных
  $link = new mysqli('localhost','root','','db_transletter');
  mysqli_set_charset($link, "utf8mb4");

  //Запись введенных пользователем данных
  $service = filter_var(trim($_POST['service']),FILTER_SANITIZE_STRING);
  if(mb_strlen($service)<5 || mb_strlen($service)>90){
    echo "Недопустимая длина услуги";
    exit;
  }

  $description = filter_var(trim($_POST['description']),FILTER_SANITIZE_STRING);

  $link->query("INSERT INTO `services` ( `service`, `description`) VALUES ('$service','$description')") ;

  $link->close();
  header('location: ../about.php');
?>