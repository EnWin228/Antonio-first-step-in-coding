<?php
  if (isset($_SERVER['HTTP_REFERER']) != "http://site/testreg.php" || isset($_SERVER['HTTP_REFERER']) != "http://site/save_user.php"
    || isset($_SERVER['HTTP_REFERER']) != "http://site/change_pass.php" || isset($_SERVER['HTTP_REFERER']) != "http://site/recovery.php") {
   http_response_code(403);
      exit();
}
    $db = mysqli_connect ("localhost","root","mypass","testing");
    ?>
