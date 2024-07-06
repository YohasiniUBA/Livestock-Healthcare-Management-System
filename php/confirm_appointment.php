<?php
session_start();

// Check if the appointment ID is provided in the URL query string
if(isset($_GET['id'])) {
    // Get the appointment ID from the URL
    $appointment_id = $_GET['id'];

    // Database connection
    $servername = "localhost";
    $username_db = "root"; // Replace with your MySQL username
    $password_db = "Yoha@)04"; // Replace with your MySQL password
    $dbname = "app";   // Replace with your MySQL database name

    // Create connection
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to retrieve appointment details
    $stmt = $conn->prepare("SELECT * FROM appointment WHERE id_app = ?");
    $stmt->bind_param("i", $appointment_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the appointment with the provided ID exists
    if($result->num_rows > 0) {
        // Fetch appointment details
        $row = $result->fetch_assoc();
        $farmer_name = $row['name_farmer'];
        $address = $row['addr_farmer'];
        $livestock_type = $row['type'];
        $breed = $row['breed'];
        $gender = $row['gender'];
        $problem = $row['problem'];
        $criticality = $row['criticality'];
        $image_path = $row['image_path'];
        // You can fetch other appointment details similarly

        // Close prepared statement and database connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Appointment not found.";
    }
} else {
    echo "Appointment ID not provided.";
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted date, time, and immediate remedy
    $date = $_POST['date'];
    $time = $_POST['time'];
    $immediate_remedy = $_POST['immediate_remedy'];

    // Database connection (you may already have a connection above, you can reuse it)
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to update appointment details with date, time, and immediate remedy
    $stmt = $conn->prepare("UPDATE appointment SET date=?, time=?, immediate_remedy=? WHERE id_app = ?");
    $stmt->bind_param("sssi", $date, $time, $immediate_remedy, $appointment_id);

    // Execute the update statement
    if ($stmt->execute()) {
        echo "Appointment details updated successfully.";
    } else {
        echo "Error updating appointment details: " . $conn->error;
    }

    // Close prepared statement and database connection
    $stmt->close();
    $conn->close();

    // Optional: Redirect to another page after successful update
    // header("Location: doctor_options.html");
    // exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Details</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #f0f5ff;
        }
        
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #005ca8;
            color: #fff;
            padding: 20px 0;
        }
        
        header .logo {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            flex: 1;
        }
        
        header .profile-logo {
            font-size: 16px;
        }
        
        .appointment-details {
            background: #b8d5f2; /* Blue shade background */
            border-radius: 10px;
            margin: 20px;
            padding: 20px;
        }
        
        .button-container {
            text-align: center;
            margin: 20px;
        }
        
        .confirm-button {
            padding: 15px 30px; /* Increased button size */
            background: #0072c6;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s;
            font-size: 20px; /* Increased font size */
        }
        
        .confirm-button:hover {
            background: #003f7f;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">Livestock Healthcare Management</div>
        <div class="profile-logo">Profile</div>
    </header>
    
    <div class="appointment-details">
        <h2>Appointment Details</h2>
        <p>Appointment ID: <?php echo $appointment_id; ?></p>
        <p>Name of Farmer: <?php echo $farmer_name; ?></p>
        <p>Address: <?php echo $address; ?></p>
        <p>Livestock Type: <?php echo $livestock_type; ?></p>
        <p>Breed: <?php echo $breed; ?></p>
        <p>Gender: <?php echo $gender; ?></p>
        <p>Problem: <?php echo $problem; ?></p>
        <p>Criticality: <?php echo $criticality; ?></p>
        <!-- Add other appointment details as needed -->

        <!-- Display image if available -->
        <?php if(!empty($image_path)): ?>
            <p>Image:</p>
            <p><img src="<?php echo $image_path; ?>"></p>
        <?php endif; ?>
    </div>

    <!-- Form for capturing date, time, and immediate remedy -->
    <form method="post" action="">
        <p>Date: <input type="date" name="date"></p>
        <p>Time: <input type="time" name="time"></p>
        <p>Immediate Remedy: <textarea name="immediate_remedy"></textarea></p>
        
        <!-- Button to submit the form -->
        <div class="button-container">
            <button class="confirm-button" type="submit" id="confirmButton">Confirm</button>
        </div>
    </form>

    <!-- JavaScript code for confirmation message -->
    <script>
        document.getElementById('confirmButton').addEventListener('click', function() {
            // Calculate the center of the screen
            const centerX = (screen.width - 400) / 2;
            const centerY = (screen.height - 200) / 2;

            // Open a new window at the center with the confirmation message and "OK" button
            const confirmationWindow = window.open('', '', `width=400,height=200,left=${centerX},top=${centerY}`);
            confirmationWindow.document.write(`
                <html>
                <head>
                    <style>
                        body {
                            margin: 0;
                            padding: 0;
                            background: #f0f5ff;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            height: 100vh;
                        }
                        .confirmation-box {
                            background: #b8d5f2;
                            border-radius: 10px;
                            padding: 20px;
                            text-align: center;
                        }
                        .ok-button {
                            background: #0072c6;
                            color: #fff;
                            padding: 15px 30px;
                            border: none;
                            border-radius: 10px;
                            cursor: pointer;
                            transition: background 0.3s;
                            font-size: 16px;
                        }
                        .ok-button:hover {
                            background: #003f7f;
                        }
                    </style>
                </head>
                <body>
                    <div class="confirmation-box">
                        <h2>Appointment confirmed!</h2>
                        <button class="ok-button" id="okButton">OK</button>
                    </div>
                </body>
                </html>
            `);

            // Add a click event listener to the "OK" button in the new window
            confirmationWindow.document.getElementById('okButton').addEventListener('click', function() {
                confirmationWindow.close(); // Close the new window
                // Redirect to the doctor_options page
                window.location.href = "../html/doctor_options.html";
            });
        });
    </script>
</body>
</html>
