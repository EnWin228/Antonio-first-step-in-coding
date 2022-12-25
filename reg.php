<?php
    ini_set("session.cookie_lifetime", 60 * 2);
    session_start();
    require_once 'messages.php';
    $s_name = session_name();
    if(isset($_COOKIE[$s_name])) setcookie($s_name, $_COOKIE[$s_name], time() + 60 * 2, '/' );
    else {
        session_destroy();
        header('Location: reg.php');
        exit();
    }
    if(isset($_SESSION['id']['login'])) {
        header('Location: main.php');
        exit();
    }
?>
<html>
<div class="container">
    <head>
    <link rel="stylesheet" href="reg.css" type="text/css"/>
    <title>Регистрация</title>
    </head>
    <body>
    <h1>Регистрация</h1>
    <p>Пожалуйста, заполните эту форму, чтобы создать аккаунт</p>
    <hr>
    <form action="save_user.php" method="post">

<p>
    <label><b>Ваш логин:</label>
    <input name="login" type="text">
</p>

<p>
    <label>Ваш пароль:</label>
    <input name="password" type="password">
</p>

<p>
    <label>Ваше секретное слово:</label>
    <input name="scrwrd" type="password">
</p>

<p>
    <input type="submit" name="submit" class="regbt" value="Зарегистрироваться">
</p>

</div>
<?php
message();
?>
  </form>
</body>
</html>
