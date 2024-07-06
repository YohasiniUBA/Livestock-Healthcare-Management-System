<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livestock Management - Farmer Menu</title>
    <style>
        body {
            background-color: #3a3a66;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
		font-family: 'Cascadia Code', monospace;
        }

        .frame-container {
            background-color: #B0E0E6;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            font-family: 'Cascadia Code', monospace;
        }

        .frame-container .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .frame-container .button {
            background-color: #3a3a66;
            color: #fff;
            padding: 10px 20px;
            margin: 10px;
            border: none;
            cursor: pointer;
    		font-family: 'Cascadia Code', monospace
    		font-size: 16px; 
		    width: 250px;
    		height: 30px;
		    border-radius: 20px;
		    display: block;
        }

        /* Remove underline from the <a> element within .button-container */
        .frame-container .button-container a {
            text-decoration: none;
		display: block;
        }
	  
        .button.call-button {
    		font-family: 'Cascadia Code', monospace;
    		font-size: 16px;
     		width: 250px;
		height: 50px;
	  }



    </style>
</head>
<body>
    <div class="frame-container">
        <h2>Farmer Menu</h2>
        <div class="button-container">
            <button class="button call-button" onclick="chooseVeterinarian()">Place Appointment through Call</button>
            <a class="button" href="../html/health_issue_form.php">Place Appointment through Form</a>
            <a class="button" href="../php/f_view_appointment.php">View Appointment</a>
            
            <?php
            session_start();
            if(isset($_SESSION['phone_number'])) {
                $phone_number = $_SESSION['phone_number'];
            ?>
            <a class="button" href="../php/f_view_vaccination_schedule.php?phno_farmer=<?php echo $phone_number; ?>">View Vaccine Information</a>
            <?php
            }
            ?>
        </div>
    </div>

    <script>
        function chooseVeterinarian() {
            // Provide a list of available veterinarians
            const veterinarianList = "Choose a Veterinarian:\n1. Dr. Selvarasu - Kottaikaadu, Triuppur\n2. Dr. Subramani - Veerakotai, Tiruppur\n3. Dr. Mariappan - Neyveli\n2. Dr. Loganadhan - Ooty";
            const choice = prompt(veterinarianList);

            if (choice === "1") {
                window.location.href = "tel:+123456789"; // Call Dr. John Doe
            } else if (choice === "2") {
                window.location.href = "tel:+987654321"; // Call Dr. Jane Smith
            } else {
                alert("Invalid choice. Please select a valid option.");
            }
        }

        function selectOption(option) {
            // You can add JavaScript logic here to handle the selected option
            alert(`You selected: ${option}`);
        }

        // Retrieve username from URL query parameter
    const urlParams = new URLSearchParams(window.location.search);
    const username = urlParams.get('phno_farmer');
    console.log('Phone number:', phno_farmer);

    </script>
</body>
</html>
