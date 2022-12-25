<?php
    if (isset($_SERVER['HTTP_REFERER']) != "http://site/change.php") {
        http_response_code(403);
        exit();
    }
    session_start();
    require_once 'bd.php';
    require_once 'change.php';
    $login = $_SESSION['login'];
    $oldpassword = htmlspecialchars(trim($_POST['oldpass']));
    $newpassword = htmlspecialchars(trim($_POST['newpass']));

    if (!$oldpassword || !$newpassword) {
        $_SESSION['error'] = "Check the fields!";
        header('Location: change.php');
        exit();
    }
    else if ($newpassword == $oldpassword) {
        $_SESSION['error'] = "The old password is the same as the new one!";
        header('Location: change.php');
        exit();
    }

    $newpassword = password_hash($newpassword, PASSWORD_BCRYPT);

    $result = mysqli_query($db,"SELECT * FROM users WHERE login='$login'");
    if (password_verify($oldpassword, $result['hash'])) {
        if(mysqli_query($db, "UPDATE `users` SET `hash` = '$newpassword' WHERE `login` = '$login'")) {
            $db->close();
            $_SESSION['success'] = "Successfully edited!";
            header('Location: main.php');
            exit();
        }
        else {
            $_SESSION['error'] = "Critical Error..";
            header('Location: main.php');
            exit();
        }
    }
    else {
        $_SESSION['error'] = "Wrong old password!";
        header('Location: main.php');
    }
?>
