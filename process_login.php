<?php
session_start(); // Start the session

include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user-entered username or email and password from the POST data
    $entered_username_or_email = $_POST["username_or_email"];
    $entered_password = $_POST["password"];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = :username OR email = :email");
    $stmt->bindParam(':username', $entered_username_or_email);
    $stmt->bindParam(':email', $entered_username_or_email);
    $stmt->execute();

    // Fetch the result as an associative array
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Verify the entered password with the stored hashed password
        if (password_verify($entered_password, $user['password'])) {
            // Set session variables for the authenticated user
            $_SESSION["user_id"] = $user['id'];
            $_SESSION["username"] = $user['username'];

            // Redirect to the home page or any other page after successful login
            header("Location: index.php");
            exit();
        } else {
            echo "The password is incorrect"; // Display an error message for incorrect password
        }
    } else {
        echo "Invalid username or email"; // Display an error message for invalid username or email
    }
}

$conn = null; // Close the database connection
?>
