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
    <link href="Styles/style-about.css" rel="stylesheet" type="text/css" />
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
          <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" ></script>
          <script type="text/javascript" src="https://comet-server.ru/CometServerApi.js" ></script>
          <script type="text/javascript" src="https://comet-server.ru/doc/html_chat.js" ></script>
          <link rel="stylesheet" type="text/css" href="https://comet-server.ru/doc/html_chat.css"></link>
 
          <!-- Осталось настроить сам чат и запустить, для этого пишем небольшой скрипт. -->
          <div id="html-chat"></div>
          <style>
          /* Здесь настроим css стили для чата*/
          .holder-html-chat{ border: 1px solid #ccc;margin-left:10px;margin-top: 10px;padding:10px;background-color: rgb(249, 255, 218);width: 300px;}
          .html-chat-history{ max-width: 600px; overflow: auto;max-height: 900px; border: 1px solid #ccc;padding: 5px;}
          .html-chat-js-name{ margin-top:10px; }
          .html-chat-js-input{ max-width: 300px;max-height: 100px;width: 600px;margin-top:10px; }
          .html-chat-js-button-holder{ margin-bottom: 0px;margin-top: 10px; }
          .html-chat-js-button-holder input{ width: 220px; }
          .html-chat-js-answer{ float:right; }
          .html-chat-js-answer a{ color: #777;font-size: 12px; font-family: cursive;}
          .html-chat-js-answer a:hover{ color: #338;font-size: 12px; font-family: cursive;}
          .html-chat-msg{ margin: 0px; }
          </style>
           
          <script>
           
          /**
          */
          $(document).ready(function()
          {
          // Запуск api комет сервера
          CometServer().start({dev_id: 15 }) // Идентификатор разработчика на comet-server.ru
 
          // Запуск чата. Передаём ему элемент в котором надо создать окно чата.
          htmljs_Chat_Init( $("#html-chat") )
          });
          </script>
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
              <th>Название услуги</th>
              <th colspan="2">Описание услуги</th>
          <?php if(isset($_COOKIE["name"])):?>
              <th colspan="2">Выбрать</th>
          <?php endif; ?>
            </tr>
          <?php
            //получаем данные из таблицы БД
            $result = mysqli_query($link, "SELECT * FROM services");
            //выводим результат
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)):
          ?>
          <form method="post">
          <tr>
            <?php
                  echo '<input name="serv" value="'.$row["service"].'" style="display: none">';
            ?>
            <td><?=$row["service"];?></td>
            <td colspan="2"><?=$row["description"];?></td>
            <?php if(isset($_COOKIE["name"]) && $_COOKIE["role"]==1):?>
            <td><input type="checkbox" name="servicesRm[]" value=<?=$row["service"];?>></td>
            <?php else:?>
              <td><button class="buttonAdd" formaction="SupportingFiles/add-shopCart.php" type="submit" href="index.php">Добавить</button></td>
            <?php endif; ?>
          </tr>
          <?php endwhile;?>
          <?php 
            if(!isset($_COOKIE["name"]) || $_COOKIE["role"]==0):
          ?>
          </table>
          <?php else:?>
          <tr>
              <td><input type="text" class="input1" name="service" id="service" placeholder="услуга"></td>
              <td><input type="text" class="input2" name="description" id="description" placeholder="описание услуги"></td>
              <td><button class="buttonAdd" formaction="SupportingFiles/add-service.php" type="submit" href="index.php">Добавить</button></td>
              <td><button class="button-del" formaction="SupportingFiles/del-services.php" type="submit" href="index.php">Удалить</button></td>
          </tr>
          </form>
          </table>
          <?php endif; ?>
          <div class="contact-text">
            <span class="Contact-mainText">
              <font size="6" face="monospace">Поделиться сайтом</font>
            </span>
            <div class="Just-contacts">
              <script src="https://yastatic.net/share2/share.js"></script>
              <div class="ya-share2" data-curtain data-size="l" data-services="vkontakte,facebook,odnoklassniki,telegram,twitter,whatsapp"></div>
            </div>
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