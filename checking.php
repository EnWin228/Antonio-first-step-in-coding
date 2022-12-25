<?php

if (isset($_SERVER['HTTP_REFERER']) != "http://site/index.php") {
  http_response_code(403);
  exit();
}
session_start();
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

if (empty($login) or empty($password)){
  $_SESSION['error'] = "Fill out the fields";
  header("Location:index.php");
  exit();
}

$login = trim($login);
$password = trim($password);
$login = stripslashes($login);
$password = stripslashes($password);
$login = htmlspecialchars($login);
$password = htmlspecialchars($password);
$hash = password_hash($password, PASSWORD_BCRYPT);

include ("bd.php");

$result = mysqli_query($db,"SELECT * FROM users WHERE login='$login'");
$myrow = mysqli_fetch_array($result);
if (empty($myrow['login']))
{
  $_SESSION['error'] = "Incorrect login or password!";
  header("Location:index.php");
  exit();
}
else {
  if (password_verify($password,$myrow['hash'])) {

    $_SESSION['login']=$myrow['login'];
    $_SESSION['id']=$myrow['id'];
    header('Location:main.php');
  }
  else {
    $_SESSION['error'] = "Failed to enter!";
    header("Location:index.php");
    exit();
  }
}
?>
