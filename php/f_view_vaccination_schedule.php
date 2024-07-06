<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h1>Vaccine Information</h1>
    <?php
// Retrieve phone number from URL query parameter
$phone_number = $_GET['phno_farmer'];


        // Establish database connection (replace with your credentials)
        $servername = "localhost";
        $username = "root";
        $password = "Yoha@)04";
        $dbname = "app";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
// Prepare SQL statement
$stmt = $conn->prepare("SELECT v.vaccine_name, v.type, v.disease, v.time_of_vaccination, v.dosage
                        FROM vaccines AS v
                        JOIN appointment AS a ON v.type = a.type
                        WHERE a.ph_no = ?");
$stmt->bind_param("s", $phone_number);
$stmt->execute();
$result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            // Display table header
            echo "<table><tr><th>Vaccine Name</th><th>Type</th><th>Disease</th><th>Time of Vaccination</th><th>Dosage</th></tr>";
            
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["vaccine_name"] . "</td><td>" . $row["type"] . "</td><td>" . $row["disease"] . "</td><td>" . $row["time_of_vaccination"] . "</td><td>" . $row["dosage"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        
        // Close database connection
        $conn->close();
    ?>
</body>
</html>