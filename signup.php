<?php include 'header.php'; ?>

    <div class="formbold-form-wrapper signup">
    <!-- Signup form heading -->
    <h2 class="formbold-form-label-2-signup">Sign Up</h2>
        <!-- Form to process signup -->
        <form method="POST" action="process_signup.php">
    <!-- Username input field -->
    <label for="username" class="formbold-form-label signup">Username:</label>
    <input type="text" name="username" class="formbold-form-input signup" required>

    <!-- Email input field -->
    <label for="email" class="formbold-form-label signup">Email:</label>
    <input type="email" name="email" class="formbold-form-input signup" required>

    <!-- Phone input field -->
    <label for="phone" class="formbold-form-label signup">Phone:</label>
    <input type="text" name="phone" class="formbold-form-input signup" required>

    <!-- Password input field -->
    <label for="password" class="formbold-form-label signup">Password:</label>
    <input type="password" name="password" class="formbold-form-input signup" required>

    <!-- Signup button -->
    <button type="submit" class="formbold-btn signup">Sign Up</button>
</div>
    </form>
</body>
</html>

