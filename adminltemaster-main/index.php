<?php
    session_start();
    if(isset($_SESSION['login']) && $_SESSION['login'] === true){
        header("Location: dashboard.php");
    }else{
        header("Location: login.php");
    }
    exit();
?>
