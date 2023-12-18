<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the user is not logged in
    header('Location: login.php');
    exit();
}

include 'db.php'; // Include your database connection file

$user_id = $_SESSION['user_id']; // Retrieve user ID from the session
$username = $_SESSION['username']; // Retrieve username from the session

// Fetch user information from the database
$stmt = $conn->prepare("SELECT * FROM users WHERE id = :user_id");
$stmt->bindParam(':user_id', $user_id);

if ($stmt->execute()) {
    $user = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch user details as an associative array
} else {
    // Handle the error, for example, print the error message
    echo "Error fetching user information: " . implode(", ", $stmt->errorInfo());
    exit(); // Stop execution
}

// Check if the form is submitted for updating user information
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'update_profile.php'; // Include the code for updating user profile
}

// Check if the user clicked the "Logout" link
if (isset($_GET['logout'])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page or any other page after logout
    header('Location: login.php');
    exit();
}
?>

<?php include 'header.php'; ?>

<div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
        <h2 class="formbold-form-label-2">User Profile</h2>
        <!-- Display current user information -->
        <p>Username: <?php echo $user['username']; ?></p>
        <p>Email: <?php echo $user['email']; ?></p>

        <!-- Form for updating user information -->
        <form method="POST" action="profile.php" class="formbold-form">
            <label for="new_username" class="formbold-form-label">New Username:</label>
            <input type="text" name="new_username" class="formbold-form-input" required>

            <label for="new_email" class="formbold-form-label">New Email:</label>
            <input type="email" name="new_email" class="formbold-form-input" required>

            <label for="new_password" class="formbold-form-label">New Password:</label>
            <input type="password" name="new_password" class="formbold-form-input" required>

            <button type="submit" class="formbold-btn">Update Information</button>
        </form>
    </div>
</div>
</body>
</html>


