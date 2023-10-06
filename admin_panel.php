<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
    session_start();

    // Check if the user is logged in
    if (isset($_SESSION['user'])) {
        $username = $_SESSION['user'];
        echo "<h2>Welcome $username</h2>";
        echo '<form action="admin_logout.php" method="POST">';
        echo '<button type="submit">Logout</button>';
        echo '</form>';

        // Display the table of booking requests
        displayBookingRequests();

        // Display the user registration form
        displayUserRegistrationForm();
    } else {
        // If the user is not logged in, redirect to the login page
        header('Location: admin_login.html');
        exit;
    }

    // Function to display booking requests
    function displayBookingRequests() {
        $appointmentsFile = 'appointments.txt';

        if (file_exists($appointmentsFile)) {
            $appointments = file($appointmentsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            if (!empty($appointments)) {
                echo '<h3>Booking Requests</h3>';
                echo '<table>';
                echo '<tr><th>Patient ID</th><th>Appointment Date</th><th>Time Blocks</th><th>Appointment Reason</th><th>Submission Date</th></tr>';

                foreach ($appointments as $appointment) {
                    $data = explode(',', $appointment);
                    if (count($data) === 5) {
                        list($patientId, $date, $timeBlocks, $reason, $submissionDate) = $data;
                        echo "<tr><td>$patientId</td><td>$date</td><td>$timeBlocks</td><td>$reason</td><td>$submissionDate</td></tr>";
                    }
                }

                echo '</table>';
            } else {
                echo '<p>No booking requests found.</p>';
            }
        } else {
            echo '<p>Appointments file not found.</p>';
        }
    }

    // Function to display the user registration form
    function displayUserRegistrationForm() {
        echo '<h3>User Registration</h3>';
        echo '<form action="register_user.php" method="POST">';
        echo '<label for="newUsername">New Username:</label>';
        echo '<input type="text" id="newUsername" name="newUsername" required><br>';
        echo '<label for="newPassword">New Password:</label>';
        echo '<input type="password" id="newPassword" name="newPassword" required><br>';
        echo '<button type="submit">Register User</button>';
        echo '</form>';
    }
    ?>
</body>
</html>
