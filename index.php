<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Бюро переводов TransLatter</title>
    <link rel="shortcut icon" href="Images/favicon.ico">
    <style>
      body {
      background: #ffffff url(Images/background.png); /* Цвет фона и путь к файлу */
      color: #000000; /* Цвет текста */
      }
    </style>
    <!-- Подключаем CSS слайдера -->
    <link rel="stylesheet" href="Styles/simple-adaptive-slider.css">
    <!-- Подключаем JS слайдера -->
    <script defer src="Scripts/simple-adaptive-slider.js"></script> 
    <link href="Styles/style-index.css" rel="stylesheet" type="text/css" />
    <script defer src="Scripts/script-index.js"></script> 
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
          text-left
        </div>
        <div class="main-right">
  
          <div class="slider">
            <div class="slider__wrapper">
              <div class="slider__items">
                <div class="slider__item">
                  <!-- Контент 1 слайда -->
                  <img class="img-fluid" src="Images/Двери.jpg" alt="..." width="1000" height="400" loading="lazy">
                </div>
                <div class="slider__item">
                 <!-- Контент 2 слайда -->
                 <img class="img-fluid" src="Images/Офис.jpg" alt="..." width="1000" height="400" loading="lazy">
                </div>
                <div class="slider__item">
                  <!-- Контент 3 слайда -->
                  <img class="img-fluid" src="Images/Кабинет.jpg" alt="..." width="1000" height="400" loading="lazy">
                </div>
                <div class="slider__item">
                 <!-- Контент 4 слайда -->
                 <img class="img-fluid" src="Images/Клиент.jpg" alt="..." width="1000" height="400" loading="lazy">
                </div>
              </div>
            </div>
            <!-- Стрелки для перехода к предыдущему и следующему слайду -->
            <a class="slider__control slider__control_prev" href="#" role="button" data-slide="prev"></a>
            <a class="slider__control slider__control_next" href="#" role="button" data-slide="next"></a>
          </div>
          
        </div>

      </div>

      <footer>
        <div class="footer-cont">Footer
        </div>
      </footer>

    </div>

  </body>
  
</html>