<?php

  //Подключение базы данных
  $link = new mysqli('localhost','root','','db_transletter');
  mysqli_set_charset($link, "utf8mb4");

  //Запись введенных пользователем данных
  $name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);

  //Проверка логина на совпадение
  $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
  $checkqry = "SELECT * from users WHERE login = '$login'";
  $checkresult = mysqli_query($link,$checkqry);
  if(mysqli_num_rows($checkresult) > 0)
  {
    echo "Логин занят";
    exit;
  }

  //Проверка email на совпадение
  $email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
  $checkqry = "SELECT * from users WHERE email = '$email'";
  $checkresult = mysqli_query($link,$checkqry);
  if(mysqli_num_rows($checkresult) > 0)
  {
    echo "Элекротнная почта уже зарегестрирована";
    exit;
  }

  $password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
  $confirmpass = filter_var(trim($_POST['confirmpass']),FILTER_SANITIZE_STRING);


  //Проверка валидности электронной почты
  if (filter_var($email, FILTER_VALIDATE_EMAIL) != true)
  {
    echo "Некорректный адрес электронной почты";
    exit;
  }
  else if (mb_strlen($login)<5 || mb_strlen($login)>90)
  {
    echo "Недопустимая длина логина";
    exit;
  }
  else if (mb_strlen($name)<1 || mb_strlen($name)>50)
  {
    echo "Недопустимая длина имени";
    exit;
  }
  else if (mb_strlen($password)<2)
  {
    echo "Недопустимая длина пароля(не менее 2 символов)";
    exit;
  }
  else if (mb_strlen($password) != mb_strlen($confirmpass))
  {
    echo "Пароли не совпадают";
    exit;
  }

  $datex=date("Y-m-d");
  echo $datex;

  $link->query("INSERT INTO `users` ( `name`, `login`, `email`, `password`, `date` ) VALUES ('$name','$login', '$email', '$password', '$datex')") ;

  $link->close();
  header('location: ../index.php');
?>