<?php
session_start();

$apptTime = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $apptTime = $_POST["time_slot"] ?? "";
    $_SESSION["apptTime"] = $apptTime;

    // Redirect to next step
    header("Location: MakeAppt4.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Health Matters - Choose Time</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container">
    <h1>Health Matters</h1>

    <form method="post" action="">
        <div class="form-group">
            <label>Choose your preferred time slot:</label>

            <label class="time-slot">
                <input type="radio" name="time_slot" value="09:00" required>
                9:00 AM - 10:00 AM
            </label>

            <label class="time-slot">
                <input type="radio" name="time_slot" value="10:00">
                10:00 AM - 11:00 AM
            </label>

            <label class="time-slot">
                <input type="radio" name="time_slot" value="11:00">
                11:00 AM - 12:00 PM
            </label>

            <label class="time-slot">
                <input type="radio" name="time_slot" value="14:00">
                2:00 PM - 3:00 PM
            </label>

            <label class="time-slot">
                <input type="radio" name="time_slot" value="15:00">
                3:00 PM - 4:00 PM
            </label>

            <label class="time-slot">
                <input type="radio" name="time_slot" value="16:00">
                4:00 PM - 5:00 PM
            </label>
        </div>

        <div class="form-actions">
            <button type="submit">Book Appointment</button>
        </div>
    </form>
</div>
</body>
</html>
