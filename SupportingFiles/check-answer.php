<?php
  //Подключение базы данных
  $link = new mysqli('localhost','root','','db_transletter');
  mysqli_set_charset($link, "utf8mb4");

  $sender = "admin";
  

  $subject=$_POST["subj"];
  $addressee=$_POST["adr"];

  $message = filter_var(trim($_POST['message']),FILTER_SANITIZE_STRING);
  if(mb_strlen($message)<1 ){
    echo "Введите сообщение";
    exit;
  }
  if(mb_strlen($message)<5 || mb_strlen($message)>500){
   echo "Недопустимая длина сообщения";
   exit;
  }

  $link->query("INSERT INTO `feedback` ( `subject`, `message`, `sender`, `addressee`) VALUES ('$subject','$message', '$sender', '$addressee')");
  $link->query("UPDATE `feedback` SET `answered`='1' WHERE subject = '$subject' AND sender ='$addressee'");
    
  $link->close();
  header('location: ../index.php');
?>