<?php
// Start session
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

// Get username and password from form
$phone_number_input = $_POST['phno_farmer']; 
$password_input = $_POST['password'];

// Prepare SQL statement to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM farmer WHERE phno_farmer=?");
$stmt->bind_param("s", $phone_number_input);
$stmt->execute();
$result = $stmt->get_result();

// Check if phone number exists
if ($result->num_rows > 0) {
    // Phone number exists, fetch associated row
    $row = $result->fetch_assoc();
    // Verify password
    if ($password_input === $row['password']) {
        // Password is correct, set session variables
        $_SESSION['phone_number'] = $phone_number_input;
        // Redirect to next page (replace 'FarmerMenuFrame.html' with your desired page)
        header("Location: ../php/FarmerMenuFrame.php?phno_farmer=$phone_number_input");
        echo("$phone_number_input");
        exit();
    } else {
        // Password is incorrect
        echo "Incorrect password. Please try again.";
    }
} else {
    // Phone number doesn't exist
    echo "Phone number does not exist. Please try again.";
}

// Close prepared statement and database connection
$stmt->close();
$conn->close();
?>
