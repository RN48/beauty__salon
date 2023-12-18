<?php
$servername = "localhost"; // Server where the MySQL database is hosted
$username = "root"; // Username to connect to the database
$password = "root"; // Password to connect to the database
$dbname = "newsalon"; // Name of the database

try {
    // Create a new PDO instance for database connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception for better error handling
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If an exception (error) occurs during the connection attempt, handle it here
    die("Connection failed: " . $e->getMessage());
}
?>


