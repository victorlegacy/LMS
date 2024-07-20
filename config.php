<?php
$hostName = "localhost";
$dbuser = "root";
$dbPassword = "";
$dbName = "LMC";
$conn = mysqli_connect($hostName,$dbuser,$dbPassword ,$dbName);
if (!$conn){
    die("somthing went wrong;");
}

?>