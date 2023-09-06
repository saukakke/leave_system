<?php
    session_start();
    $_SESSION['user'] = $_GET['id'];
    unset($_SESSION['user']);
    $_SESSION['user'] = null;
    session_destroy();
    header("Location: index.html");
?>