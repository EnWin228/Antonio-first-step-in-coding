<?php
    require_once 'messages.php';
    if (isset($_SESSION['id']['login'])) {
        header('Location: main.php');
        exit();
    }
    session_start();
    ?>
    <html>
    <div class="container">
    <head>
      <link rel="stylesheet" href="index.css" type="text/css"/>
      <title>Recovery</title>
    </head>
    <body>
    <h1>Страница восстановления</h1>
    <form action="recovery.php" method="post">
 <p>
   <hr>
   <label><b>Ваш логин:<br></label>
   <input name="login" type="text" size="15" maxlength="15">
   </p>
    <label><b>Ваше секретное слово:<br></label>
    <input name="scrwrd" type="password" size="15" maxlength="15">
    </p>
    <!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
    <p>

    <label>Ваш новый пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
    </p>

    <!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** -->

    <p>
    </form>
    <input type="submit" name="submit" class="regbt" value="Восстановить"><!--**** Кнопочка (type="submit") отправляет данные на страничку testreg.php ***** -->
  </div>
      <?php
    message();
    ?>

 <!--**** ссылка на регистрацию, ведь как-то же должны гости туда попадать ***** -->

    <?php
    // Проверяем, пусты ли переменные логина и id пользователя
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
    // Если пусты, то мы не выводим ссылку
    $_SESSION['error'] = "You enter this page as a guest";
    }
    else
    {
      $_SESSION['success'] = "You entered!";
      header('Location: main.php');
    }
    ?>
    </body>
    </html>
