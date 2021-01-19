<?php 
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: index.php');
    }
    session_destroy();
    unset($_SESSION);
    header('Location: login.php');
?>