<?php
include('config.php');
$username = $_GET['username'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$level = $_GET['level'];
$password = $_GET['password'];
$sq = "SELECT * FROM admin WHERE username = '$username' OR email = 'email'";
 $run = mysqli_query($conn,$sq);
 if(mysqli_num_rows($run) > 0){
    echo 0;
 }else{
 $sql = "INSERT INTO admin(username,email,phone,level,password) VALUES('$username','$email','$phone','$level','$password')";
$result = mysqli_query($conn,$sql);
echo 1;
mysqli_close($conn);

 }  
?>
