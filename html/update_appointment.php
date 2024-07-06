<?php
// Start session (if not started already)
session_start();

$appointmentID = $_GET['id'] ?? '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all form fields are set
    if (isset( $_POST['diseaseDiagnosed'], $_POST['treatment'], $_POST['medicine'], $_POST['status'])) {
        // Extract form data
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
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Appointment Status</title>
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

        .status-form {
            background: #b8d5f2; /* Blue shade background */
            border-radius: 10px;
            margin: 20px;
            padding: 20px;
        }

        .form-label {
            font-weight: bold;
            display: block; /* Place labels on a new line */
            margin-bottom: 5px; /* Add some space between labels and input fields */
        }

        .form-input {
            width: 100%; /* Full width input fields */
            max-width: 300px; /* Limit maximum width */
            padding: 10px;
            margin-bottom: 10px; /* Add space below input fields */
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-select {
            width: 100%; /* Full width select box */
            max-width: 300px; /* Limit maximum width */
            padding: 10px;
            margin-bottom: 10px; /* Add space below select box */
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .submit-button-container {
            text-align: center;
        }

        .submit-button {
            background: #0072c6;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s;
            font-size: 16px;
        }

        .submit-button:hover {
            background: #003f7f;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">Livestock Healthcare Management</div>
        <div class="profile-logo">Profile</div>
    </header>

    <div class="status-form">
        <h2>Update Appointment Status</h2>
        <form id="statusForm" action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $appointmentID; ?>" method="post">
            <label class="form-label" for="diseaseDiagnosed">Disease Diagnosed:</label>
            <input class="form-input" type="text" id="diseaseDiagnosed" name="diseaseDiagnosed" required>

            <label class="form-label" for="treatment">Treatment:</label>
            <input class="form-input" type="text" id="treatment" name="treatment" required>

            <label class="form-label" for="medicine">Medicine:</label>
            <input class="form-input" type="text" id="medicine" name="medicine" required>

            <label class="form-label" for="status">Status:</label>
            <select class="form-select" id="status" name="status" required>
                <option value="Keep Track">Keep Track</option>
                <option value="Case Closed">Case Closed</option>
            </select>

            <div class="submit-button-container">
                <button class="submit-button" type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>


