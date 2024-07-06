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
            width: 800px;
            padding: 20px;
            background-color: #87CEEB;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        h2 {
            text-align: center;
            color: #3a3a66;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #1E90FF;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
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

        <table>
            <tr>
            	<th>Appointment Id</th>
                <th>Date</th>
                <th>Type</th>
                <th>Breed</th>
                <th>Gender</th>
                <th>Disease</th>
                <th>Treatment</th>
                <th>Medicine</th>
            </tr>
            
        </table>

        <div class="button-container">
            <button onclick="goBack()">Back</button>
            <button onclick="goToMainMenu()">Go to Main Menu</button>
        </div>
    </div>

    <script>
        function goBack() {
            // Redirect to select_one_livestock.html
            window.location.href = "select_one_livestock.html";
        }

        function goToMainMenu() {
            // Redirect to FarmerMainFrame.html
            window.location.href = "FarmerMenuFrame.php";
        }
    </script>
</body>
</html>

<?php
// Step 1: Establish a database connection
$servername = "localhost"; // Assuming your MySQL server is running on localhost
$username = "root"; // Your MySQL username
$password = "Yoha@)04"; // Your MySQL password
$database = "app"; // Your MySQL database name

// Create connection
$connection = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Check if phone number is submitted
if(isset($_GET['phone_number'])) {
    $phone_number = $_GET['phone_number'];

    // Step 3: Query to fetch appointments based on phone number
    $query = "SELECT * FROM appointment WHERE ph_no = '$phone_number'";
    $result = mysqli_query($connection, $query);

    // Check if any appointments are found
    if(mysqli_num_rows($result) > 0) {
        // Fetch appointment details and populate table
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['id_app']."</td>";
            echo "<td>".$row['date']."</td>";
            echo "<td>".$row['type']."</td>";
            echo "<td>".$row['breed']."</td>";
            echo "<td>".$row['gender']."</td>";
            echo "<td>".$row['problem']."</td>";
            echo "<td>".$row['treatment']."</td>";
            echo "<td>".$row['medication']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No appointments found for the provided phone number.</td></tr>";
    }
}
?>

