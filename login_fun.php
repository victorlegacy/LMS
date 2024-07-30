<?php
include('config.php');

// Get data from request
$studID = mysqli_real_escape_string($conn, $_GET['studID']);
$password = mysqli_real_escape_string($conn, $_GET['password']);

// Query to fetch user data
$sql = "SELECT * FROM student WHERE studID = '$studID'";
$run = mysqli_query($conn, $sql);

if (mysqli_num_rows($run) > 0) {
    $user = mysqli_fetch_assoc($run);
    // Verify password
    if ($password == $user['password']) {
        echo 1; // Successful login
        session_start();
        $_SESSION['studID'] = $user['studID'];
        $_SESSION['id'] = $user['id'];
        $_SESSION['matric'] = $user['matric'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['firstName'] = $user['firstName'];
        $_SESSION['lastName'] = $user['lastName'];
    } else {
        echo 2; // Invalid password
    }
} else {
    echo 3; // User not found
}

// Close connection
mysqli_close($conn);
?>
