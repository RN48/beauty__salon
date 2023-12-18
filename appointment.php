<?php include 'header.php'; // Include the 'header.php' file for consistent headers across pages ?>

<div class="formbold-main-wrapper">

    <div class="formbold-form-wrapper">

        <h2>Appointment</h2> <!-- Heading for the appointment form -->

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Check if the form is submitted via POST

            // Retrieve selected services from the previous page
            $selectedServices = $_POST['selected_services'];

            // Display a form to collect user information
            echo '<form method="POST" action="payment.php">';
            echo '  <input type="hidden" name="selected_services" value="' . implode(',', $selectedServices) . '">';

            echo '  <label for="name" class="formbold-form-label">Name:</label>';
            echo '  <input type="text" name="name" class="formbold-form-input" required><br>';

            echo '  <label for="email" class="formbold-form-label">Email:</label>';
            echo '  <input type="email" name="email" class="formbold-form-input" required><br>';

            echo '  <label for="phone" class="formbold-form-label">Phone:</label>';
            echo '  <input type="text" name="phone" class="formbold-form-input" required><br>';

            echo '  <label for="date_time" class="formbold-form-label">Date and Time:</label>';
            echo '  <input type="datetime-local" name="date_time" class="formbold-form-input" required><br>';

            echo '  <button type="submit" class="formbold-btn">Proceed to Payment</button>';
            echo '</form>';

        } else {
            // Redirect to services page if accessed directly without selecting services
            header('Location: services.php');
            exit();
        }
        ?>
    </div> <!-- End of .formbold-form-wrapper -->
</div> <!-- End of .formbold-main-wrapper -->

</body>

</html>

