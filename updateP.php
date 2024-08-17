<?php 
    include('config.php');
    $course = $_GET['course'];
    session_start();
    $id = $_SESSION['id'];
    $prog = $_GET['progress'];
    $sql = "UPDATE activecourses SET progress = '$prog' WHERE course = '$course' AND student= '$id'";
    mysqli_query($conn,$sql);
?>