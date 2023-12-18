<?php
include 'db.php'; // Assuming this file contains your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve user input from the POST data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Basic validation
    if (empty($username) || empty($email) || empty($phone) || empty($password)) {
        // Display an error message if any of the required fields is empty
        echo "Please fill in all fields.";
    } else {
        // Hash the password using password_hash() for better security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert user into the database
        $stmt = $conn->prepare("INSERT INTO users (username, email, phone, password) VALUES (:username, :email, :phone, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':password', $hashedPassword);

        try {
            // Execute the prepared statement to insert user data into the database
            $stmt->execute();

            // Start a new session or resume the existing session
            session_start();

            // Store the username in the session
            $_SESSION['username'] = $username;

            // Redirect to a success page or the index page
            header("Location: index.php");
            exit();
        } catch (PDOException $e) {
            // Display an error message if an exception occurs during database insertion
            echo "Error: " . $e->getMessage();
        }
    }
}
?>

