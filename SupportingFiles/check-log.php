<?php
  //Подключение базы данных
  $link = new mysqli('localhost','root','','db_transletter');
  mysqli_set_charset($link, "utf8mb4");


  //Проверка логина на совпадение
  $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
  $checkqry = "SELECT * from users WHERE login = '$login'";
  $checkresult = mysqli_query($link,$checkqry);
  if(mysqli_num_rows($checkresult) == 0)
  {
    echo "Пользователь не найден";
    exit;
  }

  $pass = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
  $result=$link->query("SELECT * FROM users WHERE login='$login' AND password='$pass'") ;
  $user=$result->fetch_assoc();
  if (count((array)$user)==0) {
    echo "Неверный пароль!";
    exit;
  }

  setcookie("role", $user['role'], time()+3600,"/");
  setcookie("name", $user['login'], time()+3600,"/");

  $link->close();
  header('location: ../index.php');
?>