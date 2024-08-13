<?php
$hostName = "localhost";
$dbuser = "root";
$dbPassword = "";
$dbName = "lms";
$conn = mysqli_connect($hostName,$dbuser,$dbPassword ,$dbName);
if (!$conn){
    die("somthing went wrong;");
}

?>