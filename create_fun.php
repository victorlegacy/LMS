<?php
include('config.php');

$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$role = mysqli_real_escape_string($conn, $_POST['role']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql_check = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
$run_check = mysqli_query($conn, $sql_check);

if (!$run_check) {
    die("Error executing query: " . mysqli_error($conn));
}

if (mysqli_num_rows($run_check) > 0) {
    echo 0;
} else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql_insert = "INSERT INTO users(username, email, phone, role, password) VALUES('$username', '$email', '$phone', '$role', '$hashed_password')";
    if (mysqli_query($conn, $sql_insert)) {
        echo 1;
    } else {
        die("Error inserting record: " . mysqli_error($conn));
    }
}

mysqli_close($conn);
?>
