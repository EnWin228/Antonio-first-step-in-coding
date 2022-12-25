<?php
    //session_start();
    function message() {
        if (isset($_SESSION['error'])) {
            echo '<p class="error_message"> ' . $_SESSION['error'] . '</p>';
            unset($_SESSION['error']);
        }
        else if (isset($_SESSION['success'])) {
            echo '<p class="success_message"> ' . $_SESSION['success'] . '</p>';
            unset($_SESSION['success']);
        }
        else if (isset($_SESSION['expire'])) {
            echo '<p class="error_message"> ' . $_SESSION['expire'] . '</p>';
        }
    }
?>
