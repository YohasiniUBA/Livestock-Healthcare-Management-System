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
$livestock_type = $_POST['livestock-type'];
$breed = $_POST['breed'];
$gender = $_POST['gender'];
$problem = $_POST['problem'];
$criticality = $_POST['criticality'];
$doctor_appointed_full = $_POST['doctor'];

// Extract the text after '- ' from the doctor appointment input
$doctor_appointed_parts = explode('- ', $doctor_appointed_full);
$doctor_appointed = end($doctor_appointed_parts);

$ph_no = $_SESSION['phone_number'];
// Get the farmer's address and name based on their phone number
$get_farmer_info_sql = "SELECT addr_farmer, name_farmer FROM farmer WHERE phno_farmer = ?";
$get_farmer_info_stmt = $conn->prepare($get_farmer_info_sql);
$get_farmer_info_stmt->bind_param("s", $ph_no);
$get_farmer_info_stmt->execute();
$get_farmer_info_stmt->bind_result($addr_farmer, $name_farmer);
$get_farmer_info_stmt->fetch();
$get_farmer_info_stmt->close();


// Set default values for the remaining columns
$status = "";
$date = ""; // Add logic to set the date based on your requirements
// Get doctor appointment information

$immediate_remedy = "";
$medication = "";

$targetDirectory = "uploads/";
$targetFile = $targetDirectory . basename($_FILES["image"]["name"]);

// Your previous code

if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
    // File uploaded successfully, insert data into the database
    // Insert data into the database
    $sql = "INSERT INTO appointment (ph_no, name_farmer, type, addr_farmer, problem, criticality, status, date, doctor_appointed, breed, gender, immediate_remedy, medication, image_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssss", $ph_no, $name_farmer, $livestock_type, $addr_farmer, $problem, $criticality, $status, $date, $doctor_appointed, $breed,  $gender, $immediate_remedy, $medication, $targetFile);

    if ($stmt->execute()) {
        // Appointment booked successfully
        echo "Appointment booked!";
        header("refresh:3;url=../html/FarmerMenuFrame.html");
    } else {
        // Appointment booking failed
        echo "Error during appointment booking. Please try again.";
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Error: Failed to upload the file.";
}
