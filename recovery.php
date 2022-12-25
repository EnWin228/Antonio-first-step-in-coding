<?php
    if (isset($_SERVER['HTTP_REFERER']) != "http://site/recover.php") {
        http_response_code(403);
        exit();
    }
    session_start();
    require_once 'bd.php';
    require_once 'messages.php';
    if (isset($_POST['login'])) {
      $login = $_POST['login'];
      if ($login == '') {
        unset($login);
      }
    }
    if (isset($_POST['password'])) {
      $password=$_POST['password'];
      if ($password =='') {
        unset($password);
      }
    }
    if (isset($_POST['scrwrd'])) {
      $scrwrd=$_POST['scrwrd'];
      if ($scrwrd =='') {
        unset($scrwrd);
      }
    }
    $login = trim($login);
    $password = trim($password);
    $login = stripslashes($login);
    $password = stripslashes($password);
    if (!(preg_match("#^[A-Za-z0-9\-_]+$#",$password)) or (!(preg_match("#^[A-Za-z0-9\-_]+$#",$login)))){
      $_SESSION['error'] = "Incorrect input!";
      header("Location:recover.php");
      exit();
    }

    if (empty($login) or empty($password) or empty($scrwrd))
    {
      $_SESSION['error'] = "Fill out the fields";
      header("Location:recover.php");
      exit();
    }

    $login = htmlspecialchars($login);
    $password = htmlspecialchars($password);
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $scrwrd = md5($scrwrd."salt548974");

        $check_scr = mysqli_query($db, "SELECT * FROM `users` WHERE `secword` = '$scrwrd' AND `login` = '$login'");
        if (mysqli_num_rows($check_scr) == 0) {
            $_SESSION['error'] = "Wrong secret word or login!";
            header('Location: recover.php');
            exit();
        }

        mysqli_query($db, "UPDATE `users` SET `hash` = '$hash' WHERE `secword` = '$scrwrd'");
        $db->close();
        $_SESSION['success'] = "Password restored!";
        header('Location: index.php');
?>
