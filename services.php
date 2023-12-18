<?php include 'header.php'; ?>

  <section class="services-container">
    <form method="POST" action="appointment.php">
      <div class="row">
            <?php
            // Database connection details
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "newsalon";

            // Create a new MySQLi connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query to retrieve services from the database
            $sql = "SELECT * FROM services";
            
            // Execute the query and get the result
            $result = $conn->query($sql);

            // Loop through the result set and display each service
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-lg-4 col-md-6">';
                echo '  <article class="card-item mb-5">';
                echo '    <div class="card-image text-center">';
                echo '      <a >';
                echo '        <img style="height:300px;"  src="' . $row['image'] . '" alt="post-image" class="img-fluid rounded-5">';
                echo '      </a>';
                echo '    </div>';
                echo '    <div class="card-body text-center my-3">';
                echo '      <h3 class="">';
                echo '        <a  class="text-primary">' . $row['title'] . '</a>';
                echo '      </h3>';
                echo '      <p>' . $row['description'] . '</p>';
                echo '      <p class="text-success">Price: ' . $row['price'] . ' SAR</p>';
                echo '      <input type="checkbox" name="selected_services[]" value="' . $row['id'] . '"> Select';
                echo '    </div>';
                echo '  </article>';
                echo '</div>';
            }

            // Close the database connection
            $conn->close();
            ?>
        </div>

        <button type="submit" class="services-btn" > Booking a Appointment</button>
    </form>
  </section>
</body>
</html>

