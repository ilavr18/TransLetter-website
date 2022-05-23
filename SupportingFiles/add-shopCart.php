<?php
  //Подключение базы данных
  $link = new mysqli('localhost','root','','db_transletter');
  mysqli_set_charset($link, "utf8mb4");

  $login = $_COOKIE["name"];
  
  $service= $_POST["serv"];

  $checkqry = "SELECT * from shopcart WHERE login = '$login' AND service = '$service'";
  $checkresult = mysqli_query($link,$checkqry);
  if(mysqli_num_rows($checkresult) > 0)
  {
    echo "Товар уже добавлен в корзину";
    exit;
  }

  $link->query("INSERT INTO `shopcart` ( `service`, `login`) VALUES ('$service','$login')");
    
  $link->close();
  header('location: ../about.php');
?>