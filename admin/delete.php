<?php
        include('config.php');
        $id = $_GET['course'];
        $sql = "DELETE FROM course WHERE id = '$id'";
        $run = mysqli_query($conn,$sql);
   ?>
       