<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Регистрация - TransLatter</title>
    <link rel="shortcut icon" href="Images/favicon.ico">
    <style>
      body {
      background: #ffffff url(Images/background.png); /* Цвет фона и путь к файлу */
      color: #000000; /* Цвет текста */
      }
    </style>
    <link href="Styles/style-registration.css" rel="stylesheet" type="text/css" />
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
    
    <div class="regist">
      <h3>Регистарция</h3>
      <form action="SupportingFiles/check-reg.php" method="post">
        <div class="regist__inner">
            <input type="text" name="name" id="name" placeholder="ФИО">
            <input type="text" name="login" id="login" placeholder="Login">
            <input type="email" name="email" id="email" placeholder="E-mail">
            <input type="password" name="password" id="password" placeholder="Пароль">
            <input type="password" name="confirmpass" id="confirmpass" placeholder="Подтверждение пароля"><br>
            <button class="button-end" type="submit" href="index.php">Завершить регистрацию</button>
        </div>
        </form>
    </div>
    
  </body>

</html>
