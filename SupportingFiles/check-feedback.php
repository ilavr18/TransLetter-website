<?php
  if(!isset($_COOKIE["name"])){
    echo "Чтобы отправить сообщение необходимо войти в аккаунт!";
    exit;
  }

  //Подключение базы данных
  $link = new mysqli('localhost','root','','db_transletter');
  mysqli_set_charset($link, "utf8mb4");

  if($_COOKIE["role"]==1) {
    $addressee = filter_var(trim($_POST['addressee']),FILTER_SANITIZE_STRING);
    $sender = "admin";
  } 
  else {
    $sender = $_COOKIE["name"];
  }

  $subject = filter_var(trim($_POST['subject']),FILTER_SANITIZE_STRING);
  if(mb_strlen($subject)<1){
  echo "Введите тему";
  exit;
  }

  $message = filter_var(trim($_POST['message']),FILTER_SANITIZE_STRING);
  if(mb_strlen($message)<1 ){
    echo "Введите сообщение";
    exit;
  }
  if(mb_strlen($message)<5 || mb_strlen($message)>500){
   echo "Недопустимая длина сообщения";
   exit;
  }

  if($_COOKIE["role"]==1){
    $link->query("INSERT INTO `feedback` ( `subject`, `message`, `sender`, `addressee`) VALUES ('$subject','$message', '$sender', '$addressee')");
    //$link->query("INSERT INTO `feedback` WHERE subject = '$subject' AND sender ='$addressee' (`answered`) VALUES ('1')");
    $link->query("UPDATE `feedback` SET `answered`='1' WHERE subject = '$subject' AND sender ='$addressee'");
  } else {
    $link->query("INSERT INTO `feedback` ( `subject`, `message`, `sender`) VALUES ('$subject','$message', '$sender')") ;
  }
  $link->close();
  header('location: ../index.php');
?>