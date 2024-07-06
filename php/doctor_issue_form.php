<?php
// Start session (if not started already)
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all form fields are set
    if (isset($_POST['farmer-name'], $_POST['mobile-no'], $_POST['address'], $_POST['livestock-type'], $_POST['breed'], $_POST['gender'], $_POST['problem'], $_POST['criticality'])) {
        // Extract form data
        $farmerName = $_POST['farmer-name'];
        $mobileNo = $_POST['mobile-no'];
        $address = $_POST['address'];
        $livestockType = $_POST['livestock-type'];
        $breed = $_POST['breed'];
        $gender = $_POST['gender'];
        $problem = $_POST['problem'];
        $criticality = $_POST['criticality'];

        // Database connection
        $servername = "localhost";
        $username_db = "root"; // Replace with your MySQL username
        $password_db = "Yoha@)04"; // Replace with your MySQL password
        $dbname = "app"; // Replace with your MySQL database name

        // Create connection
        $conn = new mysqli($servername, $username_db, $password_db, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind SQL statement
        $stmt = $conn->prepare("INSERT INTO appointment (ph_no, name_farmer, type, addr_farmer, problem, criticality, status, date, doctor_appointed, breed, gender, immediate_remedy) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $status = ""; // Define how you're getting the status
        $doctorAppointed = $_SESSION['username'];
        $date = date("Y-m-d");
        $immediateRemedy = ""; // Define how you're getting the immediate remedy
        $stmt->bind_param("ssssssssssss", $mobileNo, $farmerName, $livestockType, $address, $problem, $criticality, $status, $date, $doctorAppointed, $breed, $gender, $immediateRemedy);

        // Execute SQL statement
        if ($stmt->execute() === TRUE) {
            echo "Livestock details inserted successfully.";
        } else {
            echo "Error inserting livestock details: " . $conn->error;
        }

        // Close prepared statement and database connection
        $stmt->close();
        $conn->close();
    } else {
        echo "All form fields are required.";
    }
} else {
    echo "Form submission method not allowed.";
}
?>
