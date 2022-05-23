<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width">
    <title>О нас - TransLatter</title>
    <link rel="shortcut icon" href="Images/favicon.ico">
    <style>
      body {
      background: #ffffff url(Images/background.png); /* Цвет фона и путь к файлу */
      color: #000000; /* Цвет текста */
      }
    </style>
    <link href="Styles/style-users.css" rel="stylesheet" type="text/css" />
  </head>

  <body>

    <div class="container">
      <header class="header">

        <div class="left-header">
          <a class="logo" href="index.php" title="Store">
            <img src="Images/logo.jpg" width="214" height="49" alt="Лого">
          </a>
          <div class="line"></div>
        </div>

        <div class="center-header">
          <a class="about" href="about.php">
            О НАС
          </a>
          <a class="contact" href="contact.php">
            КОНТАКТЫ
          </a>
          <?php 
            if(isset($_COOKIE["name"]) && $_COOKIE["role"]==1):
          ?>
          <a class="users" href="users.php">
            ПОЛЬЗОВАТЕЛИ
          </a>
          <?php endif; ?>
          <?php 
            if(isset($_COOKIE["name"]) && $_COOKIE["role"]==0):
          ?>
          <a class="users" href="shopCart.php">
            КОРЗИНА
          </a>
          <?php endif; ?>
        </div>

        <div class="right-header">
          <?php 
            if(!isset($_COOKIE["name"])):
          ?>
          <a class="login" href="login.php">
            LOGIN
          </a>
          <?php else:?>
            <a class="profile" href="login.php">
            ПРОФИЛЬ
            </a>
          <?php endif; ?>
          <a class="registration" href="registration.php">
            REGISTRATION
          </a>
        </div>
      </header>

      <div class="main">  
        <div class="main-left">
          
        </div>

        <div class="main-right">
          
          <?php
            //Выбираем БД
            $link = mysqli_connect("localhost", "root", "") or die ("<h2>MySQL connect error!</h2>");
            //Выводим заголовок таблицы
            mysqli_select_db($link, "db_transletter");
            //Устанавливаем кодировку
            mysqli_set_charset($link, "utf8mb4");
          ?>
          <table class="table" align="center" width=950px height=425px>
            <tr>
              <th>id</th>
              <th colspan="2">Логин</th>
              <th colspan="2">Имя пользователя</th>
              <th colspan="2">Выбрать</th>
            </tr>
          <?php
            //получаем данные из таблицы БД
            $result = mysqli_query($link, "SELECT * FROM users");
            //выводим результат
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)):
          ?>
        <form action="SupportingFiles/check-remove.php" method="post">
          <tr>
            <td><?=$row["id"];?></td>
            <td colspan="2"><?=$row["login"];?></td>
            <td colspan="2"><?=$row["name"];?></td>
          <?php if($row["role"]!=1):?>
            <td><input type="checkbox" name="usersRm[]" value=<?=$row["login"];?>></td>
          <?php else:?>
            <td><button class="button-del" type="submit" href="index.php">Удалить выбранных</button></td>
          <?php endif; ?>
          </tr>
          <?php endwhile;?>
          </table>
      </form>
        </div>

      </div>

      <footer>
        <div class="footer-cont">Footer
        </div>
      </footer>

    </div>

  </body>
  
</html>