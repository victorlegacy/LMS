<?php 
    $user = $_GET['username'];
    session_start();
    $_SESSION['user'] = $user;
    header('Location:index.php');
?>