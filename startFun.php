<?php 
    include('config.php');
    session_start();
    $course = $_GET['course'];
    $id = $_SESSION['id'];
    $sql = "INSERT INTO activecourses(student,course) VALUES('$id','$course')";
    $run  = mysqli_query($conn,$sql);
?>