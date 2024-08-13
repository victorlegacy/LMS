<?php
include('config.php');

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$matric = mysqli_real_escape_string($conn, $_POST['matric']);
$stud = mysqli_real_escape_string($conn, $_POST['stud']);
$level = mysqli_real_escape_string($conn, $_POST['level']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql_check = "SELECT * FROM student WHERE studID = '$stud' OR matric = '$matric'";
$run_check = mysqli_query($conn, $sql_check);

if (!$run_check) {
    die("Error executing query: " . mysqli_error($conn));
}

if (mysqli_num_rows($run_check) > 0) {
    echo 0;
} else {
 
    $sql_insert = "INSERT INTO student(firstName, lastName, email, studID, matric, level, password) VALUES('$fname', '$lname', '$email', '$stud', '$matric', '$level', '$password')";
    if (mysqli_query($conn, $sql_insert)) {
        echo 1;
    } else {
        die("Error inserting record: " . mysqli_error($conn));
    }
}

mysqli_close($conn);
?>
