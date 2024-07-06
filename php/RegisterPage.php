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

// Get form inputs
$phone_number = $_POST['phno_farmer'];
echo "Received phone number: " . $phone_number . "<br>";
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$name = $_POST['name_farmer'];
$address = $_POST['addr_farmer'];

// Validate inputs (you can add more validation as needed)
if (empty($phone_number) || empty($password) || empty($confirm_password) || empty($name) || empty($address)) {
    echo "All fields are required. Please fill in all the fields.";
    exit();
}

// Check if passwords match
if ($password !== $confirm_password) {
    echo "Passwords do not match. Please try again.";
    exit();
}

// Insert data into the database
$sql = "INSERT INTO farmer (phno_farmer, password, name_farmer, addr_farmer) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $phone_number, $password, $name, $address);

if ($stmt->execute()) {
    // Registration successful
    echo "Registration successful. Redirecting to FarmerMenuFrame.html...";
    
    // Redirect to the FarmerMenuFrame.html page after a short delay (you can adjust the delay)
    header("refresh:3;url=../html/FarmerMenuFrame.html");
}  else {
    // Registration failed
    echo "Error during registration. Please try again.";
}

// Close the prepared statement and database connection
$stmt->close();
$conn->close();
?>
