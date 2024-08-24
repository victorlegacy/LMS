<?php
        include('config.php');
        $id = $_GET['course'];
        $sql = "DELETE FROM courses WHERE id = '$id'";
        $run = mysqli_query($conn,$sql);
   ?>
       