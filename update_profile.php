<?php
// Basic validation: Check if new_username, new_email, and new_password are not empty
if (!empty($_POST['new_username']) && !empty($_POST['new_email']) && !empty($_POST['new_password'])) {
    // Hash the new password using password_hash() for better security
    $hashedNewPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    // Prepare SQL statement to update user information in the database
    $updateStmt = $conn->prepare("UPDATE users SET username = :new_username, email = :new_email, password = :new_password WHERE id = :user_id");
    
    // Bind parameters to the prepared statement
    $updateStmt->bindParam(':new_username', $_POST['new_username']);
    $updateStmt->bindParam(':new_email', $_POST['new_email']);
    $updateStmt->bindParam(':new_password', $hashedNewPassword);
    $updateStmt->bindParam(':user_id', $user_id);

    try {
        // Execute the prepared statement to update user information
        $updateStmt->execute();
        
        // Update the session with the new username
        $_SESSION['username'] = $_POST['new_username'];
        
        // Redirect to the index page
        header('Location: index.php');
    } catch (PDOException $e) {
        // Handle any errors that occur during the database update
        echo "Error: " . $e->getMessage();
    }
} else {
    // Display an error message if any of the required fields are empty
    echo "Please fill in all fields.";
}
?>
