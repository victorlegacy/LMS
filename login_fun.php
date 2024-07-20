<?php
include('config.php');

// Get data from request
$username = mysqli_real_escape_string($conn, $_GET['username']);
$password = mysqli_real_escape_string($conn, $_GET['password']);

// Query to fetch user data
$sql = "SELECT * FROM admin WHERE username = '$username' OR email = '$username'";
$run = mysqli_query($conn, $sql);

if (mysqli_num_rows($run) > 0) {
    $user = mysqli_fetch_assoc($run);
    // Verify password
    if (password_verify($password, $user['password'])) {
        echo 1; // Successful login
    } else {
        echo 2; // Invalid password
    }
} else {
    echo 0; // User not found
}

// Close connection
mysqli_close($conn);
?>
