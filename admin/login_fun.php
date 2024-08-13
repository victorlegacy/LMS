<?php
include('config.php');

// Get data from request
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Query to fetch user data
$sql = "SELECT * FROM admin WHERE username = '$username'";
$run = mysqli_query($conn, $sql);

if (mysqli_num_rows($run) > 0) {
    $user = mysqli_fetch_assoc($run);
    // Verify password
    if ($password == $user['password']) {
        echo 1; // Successful login
        session_start();
        $_SESSION['username'] = $user['username'];
        $_SESSION['level'] = $user['level'];
    } else {
        echo 2; // Invalid password
    }
} else {
    echo 3; // User not found
}

// Close connection
mysqli_close($conn);
?>
