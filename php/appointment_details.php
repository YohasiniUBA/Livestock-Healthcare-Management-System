<?php
// Start session (if not started already)
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
		<p> <img src="<?php echo $image_path; ?>"></p>
        <?php endif; ?>
    </div>
    

</body>
</html>
