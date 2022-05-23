<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Контакты - TransLatter</title>
    <link rel="shortcut icon" href="Images/favicon.ico">
    <style>
      body {
      background: #ffffff url(Images/background.png); /* Цвет фона и путь к файлу */
      color: #000000; /* Цвет текста */
      }
    </style>
    <link href="Styles/style-contact.css" rel="stylesheet" type="text/css" />
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
        <form id="contact" action="SupportingFiles/check-feedback.php" method="post" name="contact">
          <?php
          if(!isset($_COOKIE["name"]) || $_COOKIE["role"]==0):
          ?>
          <div id="inline">
          <h2 class="txt1">Есть вопрос?</h2>
          <input id="name" class="txt" name="subject" type="name" placeholder="Тема">
          <textarea id="msg" class="txtarea" name="message" placeholder="Ваше сообщение:"></textarea>
          <button type="submit" href="index.php" id="send">Отправить</button>
          <!-- 
          <h2 class="txt1">Есть вопрос?</h2>
          <input id="name" class="txt" name="addressee" type="name" placeholder="Адресат">
          <input id="name" class="txt" name="subject" type="name" placeholder="Тема">
          <textarea id="msg" class="txtarea" name="message" placeholder="Ваше сообщение:"></textarea>
          <button type="submit" href="index.php" id="send">Отправить</button> -->
          </div>
          <?php endif; ?>
        </form>

        
          <?php
            //Выбираем БД
            $link = mysqli_connect("localhost", "root", "") or die ("<h2>MySQL connect error!</h2>");
            //Выводим заголовок таблицы
            mysqli_select_db($link, "db_transletter");
            //Устанавливаем кодировку
            mysqli_set_charset($link, "utf8mb4");
          ?>
          <?php if(isset($_COOKIE["name"]) && $_COOKIE["role"]==0):?>
            <div id="inline2">
            <?php
              //получаем данные из таблицы БД
              $log=$_COOKIE["name"];
              $resultQst = mysqli_query($link, "SELECT * FROM feedback WHERE sender='$log'");
              $resultAns = mysqli_query($link, "SELECT * FROM feedback WHERE addressee='$log'");
              //выводим результат
              while($rowAns = mysqli_fetch_array($resultAns, MYSQLI_ASSOC) AND $rowQst = mysqli_fetch_array($resultQst, MYSQLI_ASSOC)):
            ?>
              <div class="Ans">
                <h2 class="txt2">Вопрос</h2>
                Тема: <?=$rowQst["subject"];?><br>
                Сообщение: <?=$rowQst["message"];?><br>
                <h2 class="txt2">Ответ</h2>
                <?=$rowAns["message"];?><br>
              </div>
            <?php endwhile;?> 
            </div>
          <?php elseif(isset($_COOKIE["name"]) && $_COOKIE["role"]==1):?>
            <div id="inline3">
            <?php
              //получаем данные из таблицы БД
              $resultQst = mysqli_query($link, "SELECT * FROM feedback WHERE sender!='admin' AND answered!='1'");
              //выводим результат
              while($rowQst = mysqli_fetch_array($resultQst, MYSQLI_ASSOC)):
            ?>
              <form id="contact" action="SupportingFiles/check-answer.php" method="post" name="contact">
                <?php
                  echo '<input name="subj" value="'.$rowQst["subject"].'" style="display: none">';
                  echo '<input name="adr" value="'.$rowQst["sender"].'" style="display: none">';
                ?>
                <div class="Ans">
                   <div class="answer-button"> 
                    <h2 class="txt2">Вопрос      
                     <button type="submit" href="index.php" id="send2">Ответить</button></h2>
                   </div> 
                  Пользователь: <?=$rowQst["sender"];?><br>
                  Тема: <?=$rowQst["subject"];?><br>
                  Сообщение: <?=$rowQst["message"];?><br>
                  <textarea id="msg" class="txtarea2" name="message" placeholder="Ваш ответ:"></textarea> 
                </div>
               </form> 
            <?php endwhile;?> 
            </div>
          <?php endif; ?>
        

        </div>

        <div class="main-right">
          <div class="contact-text">
            <span class="Contact-mainText">
              <font size="6" face="monospace">Контакты Москва</font>
            </span>
            <div class="Just-contacts">
              <div class="contact-left">
                 <img src="Images/destination.jpg" align="middle"/>
              </div>
              <div class="contact-right">
                <img src="Images/phone.jpg" align="middle"/>
              </div>
            </div>
            <div class="Just-contacts2">
                <div class="contact-left">
                  <img src="Images/mail.jpg" align="middle"/>
                </div>
                <div class="contact-right">
                  <img src="Images/time.jpg" align="middle"/>
                </div>
            </div>
          </div>
          <div class="Proezd">
            <span class="Contact-mainText">
              <font size="6" face="monospace">Схема проезда</font>
            </span>
            <div class="map"><div class="map2"><script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A0e701f813822fd17a90b6a52cf6c55a95d82a4a2a2c2c4c5c0caa33be432c930&amp;width=921&amp;height=546&amp;lang=ru_RU&amp;scroll=true"></script></div></div>
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