<?php
// Start session
session_start();

// Check if the username session variable is set
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: LoginPageF.html");
    exit();
}

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

// Get the username from the session
$username = $_SESSION['username'];

// Prepare SQL statement to retrieve appointment details based on the username
$stmt = $conn->prepare("SELECT id_app, name_farmer, addr_farmer FROM appointment WHERE doctor_appointed = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Close prepared statement
$stmt->close();

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List</title>
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

        .back-button {
            background: #0072c6;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s;
            font-size: 16px;
        }

        .back-button:hover {
            background: #003f7f;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #005ca8;
        }

        th {
            background: #005ca8;
            color: #fff;
        }

        tr:nth-child(even) {
            background: #b8d5f2;
        }

        .view-details-button {
            background: #0072c6;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
            font-size: 14px;
        }

        .view-details-button:hover {
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
        <h2>New Appointment List</h2>
        <!-- Table to display new appointment list -->
        <table id="appointment-table">
            <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>Farmer Name</th>
                    <th>Address</th>
                    <th>View Details</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody id="appointment-details-body">
                <?php
                // Loop through the retrieved appointment details and populate the table rows
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id_app'] . "</td>";
                    echo "<td>" . $row['name_farmer'] . "</td>";
                    echo "<td>" . $row['addr_farmer'] . "</td>";
                    echo "<td><button class='view-details-button' onclick='viewDetails(" . $row['id_app'] . ")'>View</button></td>";
                    echo "<td><button class='view-details-button' onclick='updateDetails(" . $row['id_app'] . ")'>Update</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="button-container">
        <button class="back-button" onclick="goBack()">Back</button>
    </div>

    <script>
        // JavaScript function to go back to the previous page
        function goBack() {
            window.history.back();
        }

        // JavaScript function to view appointment details
        function viewDetails(id) {
            // Redirect to the appointment details page with the appointment ID
            window.location.href = "appointment_details.php?id=" + id;
        }

        // JavaScript function to update appointment details
        function updateDetails(id) {
            window.location.href = "../html/update_appointment.php?id=" + id;
        }
    </script>
</body>
</html>
