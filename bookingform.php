<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .form-row {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .form-row label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-row input[type="text"],
        .form-row input[type="date"],
        .form-row select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .form-row button {
            background-color: #FFD400;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-row button:hover {
            background-color: #FFC000;
        }

        .advice {
            background-color: #FFD400;
            padding: 10px;
            border-radius: 5px;
            font-style: italic;
        }
    </style>
    <script>
        function calculateChecksum(patientId) {
            const digits = patientId.match(/\d+/g);
            const sumOfDigits = digits.reduce((sum, num) => sum + parseInt(num), 0);
            const calculatedChecksum = sumOfDigits % 26;
            return String.fromCharCode(calculatedChecksum + 65);
        }

        function validatePatientId(input) {
            const patientId = input.value.toUpperCase();
            const pattern = /^[A-Z]{2}\d+[A-Z]{1}$/;

            if (pattern.test(patientId)) {
                const checksumLetter = patientId.charAt(patientId.length - 1); // Get the last letter
                const expectedChecksum = String.fromCharCode((patientId.charCodeAt(2) + parseInt(patientId.substr(3, patientId.length - 4))) % 26 + 65);

                if (checksumLetter === expectedChecksum) {
                    input.setCustomValidity("");
                } else {
                    input.setCustomValidity("Invalid checksum letter 0000.");
                }
            } else {
                input.setCustomValidity("Invalid patient ID format.");
            }
        }
    </script>
</head>
<body>
<header>
    <!-- Navigation link back to the main page -->
</header>
<main style="text-align: center;">
<section id="booking-form">
    <h2>Book an Appointment</h2>
    <form action="booking.php" method="POST">
        <!-- Patient ID Field -->
        <div class="form-row">
            <label for="pid">Patient ID:</label>
            <input type="text" id="pid" name="pid" required >
        </div>
        <!-- Date Field -->
        <div class="form-row">
            <label for="date">Select Date:</label>
            <input type="date" id="date" name="date" min="2023-08-19" required>
        </div>
        <!-- Time Blocks (Pill Group) -->
        <div class="form-row">
            <label>Select Available Time Blocks:</label>
            <div class="pill-group">
                <label><input type="checkbox" name="time[]" value="9am-12pm"> 9am - 12pm</label>
                <label><input type="checkbox" name="time[]" value="12pm-3pm"> 12pm - 3pm</label>
                <label><input type="checkbox" name="time[]" value="3pm-6pm"> 3pm - 6pm</label>
            </div>
        </div>
        <!-- Appointment Reason Dropdown -->
        <div class="form-row">
            <label for="reason">Appointment Reason:</label>
            <select id="reason" name="reason" required>
                <option value="" disabled selected>Please Select</option>
                <option value="childhood-vaccination">Childhood Vaccination Shots</option>
                <option value="influenza">Influenza Shot</option>
                <option value="covid-booster">Covid Booster Shot</option>
                <option value="blood-test">Blood Test</option>
            </select>
        </div>
        <!-- Advice Area -->
        <div class="form-row advice">
            <!-- Advice text will be displayed here based on the selected reason -->
        </div>
        <!-- Submit Button -->
        <div class="form-row">
            <button type="submit">Submit</button>
        </div>
    </form>
</section>
</main>
<footer>
    <!-- Footer content remains the same -->
</footer>
<script>
    const reasonDropdown = document.getElementById("reason");
    const adviceArea = document.querySelector(".advice"); // Use querySelector to select by class

    reasonDropdown.addEventListener("change", function () {
        const selectedReason = reasonDropdown.value;
        let adviceText = "";

        switch (selectedReason) {
            case "childhood-vaccination":
                adviceText = "Please remember to bring any vaccination records you have.";
                break;
            case "blood-test":
                adviceText = "Please avoid eating for at least 8 hours before your blood test appointment.";
                break;
            case "covid-booster":
                adviceText = "Advice that everyone should arrange to have their third shot as soon as possible and adults over the age of 30 should have their fourth shot to protect against new variant strains.";
                break;
            default:
                adviceText = "";
        }

        adviceArea.textContent = adviceText;
    });
</script>
</body>
</html>
