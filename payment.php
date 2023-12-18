<?php include 'header.php'; // Include the 'header.php' file for consistent headers across pages ?>

<div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
        <h2>Payment Details</h2> <!-- Heading for the payment details form -->
        <div class="container">
            <!-- Container for the form -->
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="formbold-form">
                <!-- Payment details form with POST method, submitting to the current PHP script -->

                <label for="cardNumber" class="formbold-form-label">Card Number</label>
                <input type="text" id="cardNumber" name="cardNumber" placeholder="card number" class="formbold-form-input" value="<?php echo isset($_POST['cardNumber']) ? $_POST['cardNumber'] : ''; ?>">
                <div id="cardNumberError" class="form-text error"><?php echo isset($_SESSION['errors']['cardNumberError']) ? $_SESSION['errors']['cardNumberError'] : ''; ?></div>

                <label for="expirationDate" class="formbold-form-label">Expiration Date</label>
                <input type="text" id="expirationDate" name="expirationDate" placeholder="MM/YYYY" class="formbold-form-input" value="<?php echo isset($_POST['expirationDate']) ? $_POST['expirationDate'] : ''; ?>">
                <div id="expirationDateError" class="form-text error"><?php echo isset($_SESSION['errors']['expirationDateError']) ? $_SESSION['errors']['expirationDateError'] : ''; ?></div>

                <label for="cvv" class="formbold-form-label">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="cvv" class="formbold-form-input" value="<?php echo isset($_POST['cvv']) ? $_POST['cvv'] : ''; ?>">
                <div id="cvvError" class="form-text error"><?php echo isset($_SESSION['errors']['cvvError']) ? $_SESSION['errors']['cvvError'] : ''; ?></div>

                <button type="submit" name="submit" class="formbold-btn">Checkout</button>
                <!-- Submit button for the payment details form -->

            </form>
        </div>
    </div>
</div>

<?php
// Check if a session is not already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'db.php';  // Include your database connection file

$errors = [
    'cardNumberError' => '',
    'expirationDateError' => '',
    'cvvError' => '',
];

if (isset($_POST['submit'])) {
    // Reset errors in the session
    $_SESSION['errors'] = [];

    $cardNumber = $_POST['cardNumber'];
    $expirationDate = $_POST['expirationDate'];
    $cvv = $_POST['cvv'];

    // Check if a valid database connection is established
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (empty($cardNumber)) {
        $_SESSION['errors']['cardNumberError'] = 'Please enter your card number';
    } elseif (!is_numeric($cardNumber) || strlen($cardNumber) != 16) {
        $_SESSION['errors']['cardNumberError'] = 'Please enter a valid 16-digit card number';
    }

    if (empty($expirationDate)) {
        $_SESSION['errors']['expirationDateError'] = 'Please enter your expiration date';
    } elseif (!preg_match('/^\d{2}\/\d{4}$/', $expirationDate)) {
        $_SESSION['errors']['expirationDateError'] = 'Please enter a valid expiration date (MM/YYYY)';
    }

    if (empty($cvv)) {
        $_SESSION['errors']['cvvError'] = 'Please enter your CVV';
    } elseif (!is_numeric($cvv) || strlen($cvv) != 3) {
        $_SESSION['errors']['cvvError'] = 'Please enter a valid 3-digit CVV';
    }

    // If there are no errors, proceed with database insertion
    if (empty($_SESSION['errors'])) {
        // Prepare the SQL statement with placeholders
        $sql = "INSERT INTO payment (cardNumber, expirationDate, cvv) VALUES (:cardNumber, :expirationDate, :cvv)";
        
        // Prepare the PDO statement
        $stmt = $conn->prepare($sql);
        
        // Bind parameters
        $stmt->bindParam(':cardNumber', $cardNumber);
        $stmt->bindParam(':expirationDate', $expirationDate);
        $stmt->bindParam(':cvv', $cvv);
        
        // Execute the statement
        if ($stmt->execute()) {
            // Additional logic for successful payment
            
            // For example, you can set a thank you message
            $thankYouMessage = 'Thank you for your payment!';
            
            // Store the thank you message in the session
            $_SESSION['thankYouMessage'] = $thankYouMessage;
            
            // Redirect to a thank you page with a success message
            header('Location: thank-you.php');
            exit();
        } else {
            echo 'Error:' . $stmt->errorInfo()[2]; // Display the PDO error message
        }
    }
    // Close the database connection (Note: No need to destroy the session here)
    $conn = null; // Close the PDO connection
}
?>