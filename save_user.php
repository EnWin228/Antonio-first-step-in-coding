<?php
if (isset($_SERVER['HTTP_REFERER']) != "http://site/reg.php") {
  http_response_code(403);
  exit();
}
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


if (empty($login) or empty($password) or empty($scrwrd))
{
  $_SESSION['error'] = "Fill out the fields";
  header("Location:reg.php");
  exit();
}

$login = htmlspecialchars($login);
$password = htmlspecialchars($password);

$hash = password_hash($password, PASSWORD_BCRYPT);
$scrwrd = md5($scrwrd."salt548974");
include ("bd.php");
$result = mysqli_query($db, "SELECT id FROM users WHERE login='$login'");
$myrow = mysqli_fetch_array($result);
if (!empty($myrow['id'])) {
  $_SESSION['error'] = "Login is already taken!";
  header("Location:reg.php");
  exit();
}

$result2 = mysqli_query ($db,"INSERT INTO users (login,hash,secword) VALUES('$login','$hash','$scrwrd')");

if ($result2=='TRUE')
{
  $_SESSION['success'] = "You entered!";
  header('Location:main.php');
}
  else {
    $_SESSION['error'] = "Error!";
    header("Location:reg.php");
    exit();
  }
  ?>
