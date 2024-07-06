<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: #3a3a66;
            font-family: Arial, sans-serif;
            color: #1E90FF;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 400px;
            padding: 20px;
            background-color: #87CEEB;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        h2 {
            text-align: center;
            color: #3a3a66;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        select, input {
            width: 90%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #B0E0E6;
            border-radius: 5px;
        }

        .button-container {
            margin-top: 20px;
            text-align: center;
        }

        button {
            background-color: #1E90FF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Livestock Healthcare Management</h2>
        <h2>Livestock Details</h2>
        <form action="../php/health_issue_form.php" method="post" enctype="multipart/form-data">
            <label for="livestock-type">Livestock Type</label>
            <select id="livestock-type" name="livestock-type">
                <option value="Cow">Cow</option>
                <option value="Bull">Bull</option>
                <option value="Buffalo">Buffalo</option>
                <option value="Oxen">Oxen</option>
                <option value="Sheep">Sheep</option>
                <option value="Goat">Goat</option>
                <option value="Pig">Pig</option>
                <option value="Hen">Hen</option>
                <option value="Cock">Cock</option>
                <option value="Duck">Duck</option>
                <!-- Add more livestock options here -->
            </select>

            <label for="breed">Breed</label>
            <input type="text" id="breed" name="breed" placeholder="Enter livestock breed">

		    <label for="gender">Gender</label>
            <input type="text" id="gender" name="gender" placeholder="Enter livestock gender">

           <!-- <label for="count">Count</label>
            <input type="number" id="count" name="count" min="1" value="1"> -->

            <label for="problem">Problem</label>
            <input type="text" id="problem" name="problem" placeholder="Enter livestock problem">

            <label for="criticality">Criticality</label>
            <select id="criticality" name="criticality">
                <option value="Normal">Normal</option>
                <option value="Emergency">Emergency</option>
                <option value="Regular checkup">Regular checkup</option>
                <!-- Add more category options here -->
            </select>

            <label for="image">Image</label>
    		<input type="file" id="image" name="image">
<label for="doctor">Select doctor:</label>
<select id="doctor" name="doctor">
<!-- PHP code to populate select options -->
<?php
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

// Query to retrieve veterinarian data
$sql = "SELECT place, name_vet FROM vetenarian";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<p>Number of rows: " . $result->num_rows . "</p>"; // Debugging statement

    while ($row = $result->fetch_assoc()) {
        echo "<p>Place: " . $row['place'] . ", Name: " . $row['name_vet'] . "</p>"; // Debugging statement

        echo "<option value='" . $row['place'] . " - " . $row['name_vet'] . "'>" . $row['place'] . " - " . $row['name_vet'] . "</option>";
    }
} else {
    echo "<option value=''>No doctors available</option>";
}

$conn->close();
?>
<!-- End of PHP code -->

</select>


            <div class="button-container">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

</body>
</html>