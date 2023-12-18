<?php
// Check if the user is logged in
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$greeting_message = isset($_SESSION['username']) ? "Hello, " . $_SESSION['username'] : "";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Website Homepage HTML and CSS | CodingNepal</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header class="header">
      <nav class="navbar">
        <h2 class="logo"><a href="#">Lavender</a></h2> <!-- Logo with the name "Lavender" -->
        <input type="checkbox" id="menu-toggle" /> <!-- Checkbox for menu toggle -->
        <label for="menu-toggle" id="hamburger-btn">
          <!-- Hamburger icon for mobile navigation -->
          <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
            <path d="M3 12h18M3 6h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
          </svg>
        </label>
        <ul class="links">
          <!-- Navigation links -->
          <li><a href="index.php">Home</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="appointment.php">Appointment</a></li>
          <li><a href="profile.php">Profile</a></li>
          <li><a href="fqa.php">FQA</a></li>
        </ul>
        <!-- Greeting and Logout button -->
        <div class="buttons">
          <span class="greeting"><?php echo $greeting_message; ?></span>
          <?php if (isset($_SESSION['username'])): ?>
            <a href="logout.php" class="logout">Logout</a>
          <?php else: ?>
            <a href="login.php" class="signin">Log In</a>
            <a href="signup.php" class="signup">Sign Up</a>
          <?php endif; ?>
        </div>
      </nav>
    </header>

