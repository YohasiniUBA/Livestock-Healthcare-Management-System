<?php
// Start session (if not started already)
session_start();

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

// Get ph_no from session
$ph_no = $_SESSION['phone_number'];

// Retrieve appointment information based on ph_no
$sql = "SELECT status, doctor_appointed, date, time, immediate_remedy FROM appointment WHERE ph_no = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $ph_no);
$stmt->execute();
$result = $stmt->get_result();

// Fetch appointment details into an associative array
$appointments = array();
while ($row = $result->fetch_assoc()) {
    $appointments[] = $row;
}

// Close the prepared statement and database connection
$stmt->close();
$conn->close();

// Return appointment details in JSON format
echo json_encode($appointments);
?>
