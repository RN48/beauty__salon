<?php include 'header.php'; ?>

<div class="thank-you-container">
    <?php
    // Include your database connection file
    include 'db.php';

    // Retrieve the thank you message from the URL or set a default message
    $thankYouMessage = isset($_GET['message']) ? urldecode($_GET['message']) : 'Thank you!';

    // Display the thank you message
    echo '<h2>' . $thankYouMessage . '</h2>';
    ?>

    <?php
    // Redirect to the home page after a delay (e.g., 3 seconds)
    header('refresh:3;url=index.php');
    ?>
</div>

