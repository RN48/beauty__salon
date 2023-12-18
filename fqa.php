<?php include 'header.php'; // Include the 'header.php' file for consistent headers across pages ?>

<div class="faq-container">
    <h2>Frequently Asked Questions</h2> <!-- Heading for the Frequently Asked Questions section -->

    <?php
    // Array of FAQ items
    $faqItems = array(
        "Q1. What services does the salon offer?",
        "A1. We offer a range of beauty services including hair styling, nail care, facials, and more.",
        "Q2. How do I book an appointment?",
        "A2. You can book an appointment through our online booking system or by contacting us directly.",
        "Q3. What are your opening hours?",
        "A3. Our opening hours vary, please check our 'Contact Us' page for the latest information.",
        // Add more FAQ items as needed
    );

    // Display FAQ items
    for ($i = 0; $i < count($faqItems); $i += 2) {
        echo "<div class='faq-item'>";
        echo "<p class='question formbold-form-label-2'>{$faqItems[$i]}</p>"; // Display the question
        echo "<p class='answer'>{$faqItems[$i + 1]}</p>"; // Display the answer
        echo "</div>";
    }
    ?>
</div>

