<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Вход - TransLetter</title>
    <link rel="shortcut icon" href="Images/favicon.ico">
    <style>
      body {
      background: #ffffff url(Images/background.png); /* Цвет фона и путь к файлу */
      color: #000000; /* Цвет текста */
      }
    </style>
    <link href="Styles/style-login.css" rel="stylesheet" type="text/css" />
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
    </div>

    <?php
     if (!isset($_COOKIE["name"])):
    ?>
      <div class="logg">
        <h3>Вход</h3>
        <form action="SupportingFiles/check-log.php" method="post">
          <div class="logg__inner">
            <input type="text" name="login" id="login" placeholder="Login">
            <input type="password" name="password" id="password" placeholder="Пароль"><br>
            <button class="button-end" type="submit" href="index.php">Войти</button>
          </div>
        </form>
      </div>
    <?php else:?>
      <p>Приветствуем <?=$_COOKIE['name']?>. Чтобы выйти нажмите <a href="SupportingFiles/exit.php">здесь</a> </p>
      <div class="haveTOmove"><a class="card" href="Basket.php">Корзина</a></div>
      <div class="haveTOmove"><a class="card" href="Connection.php">Обратная связь</a></div>
    <?php endif; ?>

  </body>

</html>
