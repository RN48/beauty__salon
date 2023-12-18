<?php
session_start(); // Start the session

if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the user is not logged in
    header('Location: login.php');
    exit();
}

// Display user profile information here
echo "Welcome, " . $_SESSION['username'] . "!";
?>

