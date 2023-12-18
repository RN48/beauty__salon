<?php include 'header.php'; // Include the 'header.php' file for consistent headers across pages ?>

<div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
        <h2 class="formbold-form-label-2">Login</h2> <!-- Heading for the login form -->

        <form method="POST" action="process_login.php" class="formbold-form">
            <!-- Login form with POST method, submitting to 'process_login.php' -->

            <label for="username_or_email" class="formbold-form-label">Username or Email:</label>
            <input type="text" name="username_or_email" class="formbold-form-input" required>
            <!-- Input field for username or email -->

            <label for="password" class="formbold-form-label">Password:</label>
            <input type="password" name="password" class="formbold-form-input" required>
            <!-- Input field for password -->

            <button type="submit" class="formbold-btn">Login</button>
            <!-- Submit button for the login form -->
        </form>
    </div>
</div>
</body>
</html>

