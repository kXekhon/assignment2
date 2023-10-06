<?php
// Include the database connection file
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate and sanitize user input
    $patientId = strtoupper($_POST["pid"]);
    $date = $_POST["date"];
    $selectedTimes = isset($_POST["time"]) ? implode(", ", $_POST["time"]) : "";
    $reason = $_POST["reason"];

    // Server-side validation
    $errors = [];

    // Validate patient ID format using regular expression
    if (!preg_match("/^[A-Z]{2}\d*[A-Z]{1}$/", $patientId)) {
        $errors["pid"] = "Invalid patient ID format.";
    }

    // Validate date format and ensure it's not in the past
    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $date) || strtotime($date) < strtotime(date("Y-m-d"))) {
        $errors["date"] = "Invalid date or date is in the past.";
    }

    // Validate at least one time block is selected
    if (empty($_POST["time"])) {
        $errors["time"] = "Please select at least one time block.";
    }

    // Validate appointment reason is selected
    if (empty($reason)) {
        $errors["reason"] = "Please select an appointment reason.";
    }

    // If there are no errors, proceed with data processing
    if (empty($errors)) {
        // Append data to the CSV file
        $csvData = [
            $patientId,
            $date,
            $selectedTimes,
            $reason,
            date("Y-m-d H:i:s") // Submission date and time
        ];

        // Open the CSV file for appending
        $csvFile = fopen("appointments.txt", "a");

        // Check if the file was opened successfully
        if ($csvFile !== false) {
            // Write data to the CSV file
            fputcsv($csvFile, $csvData);

            // Close the CSV file
            fclose($csvFile);

            // Display a success message and redirect to the home page
            echo "Appointment booked successfully! We will contact you soon.";
            echo '<a href="home.html">Back to Home</a>';
        } else {
            // Display an error message if the file couldn't be opened
            echo "Error: Could not open the appointments file for writing.";
        }
    } else {
        // Display validation errors and redirect back to the form
        echo "<h2>Form validation errors:</h2>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        echo '<a href="booking-form.html">Back to Booking Form</a>';
    }
} else {
    // Handle non-POST requests or direct access to this script
    echo "Invalid request.";
}

// Close the database connection
mysqli_close($con);
?>
