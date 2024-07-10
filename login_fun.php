<?php
include('config.php');
$username = $_GET['username'];
$password = $_GET['password'];
 $sql = "SELECT * FROM admin WHERE username = '$username' OR email = 'email'";
 $run = mysqli_query($conn,$sql);
 if(mysqli_num_rows($run) > 0){
    $pass = mysqli_fetch_all($run,MYSQLI_ASSOC);
    $pas = $pass[0]['password'];
    if($password == $pas){
        echo 1;
    }else{
        echo 2;
    }
 }else{
    echo 0;
 }
$result = mysqli_query($conn,$sql);
mysqli_close($conn);
?>
