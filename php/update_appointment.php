<?php
// Start session (if not started already)
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all form fields are set
    if (isset($_POST['appointmentID'], $_POST['diseaseDiagnosed'], $_POST['treatment'], $_POST['medicine'], $_POST['status'])) {
        // Extract form data
        $appointmentID = $_POST['appointmentID'];
        $diseaseDiagnosed = $_POST['diseaseDiagnosed'];
        $treatment = $_POST['treatment'];
        $medicine = $_POST['medicine'];
        $status = $_POST['status'];

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
        $stmt = $conn->prepare("UPDATE appointment SET problem=?, treatment=?, medication=?, status=? WHERE id_app=?");
        $stmt->bind_param("ssssi", $diseaseDiagnosed, $treatment, $medicine, $status, $appointmentID);

        // Execute SQL statement
        if ($stmt->execute() === TRUE) {
            echo "Appointment status updated successfully.";
        } else {
            echo "Error updating appointment status: " . $conn->error;
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
