<?php
if (isset($_SERVER['HTTP_REFERER']) != "http://site/main.php") {
  http_response_code(403);
  exit();
}
  session_start();
  require_once 'messages.php';

?>
<html>
<head>
  <link rel="stylesheet" href="main.css" type="text/css"/>
</head>
<div class="wrapper">

  <div class="top">

  </div>

  <ul class="navigation">
    <li><a href="main.php" title="Home">Home</a></li>
    <li><a href="logout.php" title="Log out">Log out</a></li>
    <div class="clear"></div>
  </ul>

  <div class="footer">
      <form action="changing.php" method="post">
          <p>
          <hr>
          <label><b>Ваш старый пароль:<br></label>
          <input name="oldpass" type="password" size="15" maxlength="15">
          <label><b>Ваш новый пароль:<br></label>
          <input name="newpass" type="password" size="15" maxlength="15">

          <p>
              <input type="submit" name="submit" class="regbt" value="Изменить пароль">
          </p>
      </form>
  </div>

    <p>  <?php
    message();
    ?></p>
  </div>
</html>
