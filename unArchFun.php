<?php 
    include('config.php');
    session_start();
    $course = $_GET['course'];
    $id = $_SESSION['id'];
    $sql = "INSERT INTO activecourses(student,course) VALUES('$id','$course')";
    $run  = mysqli_query($conn,$sql);
    if($run){
        $del = "DELETE FROM archivecourses WHERE course = '$course' AND student = '$id'";
        mysqli_query($conn,$del);
    }
?>