<?php
session_start();

$apptDate = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $apptDate = $_POST["appt_date"] ?? "";
    $_SESSION["apptDate"] = $apptDate;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Health Matters - Choose Appointment</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container">
    <h1>Health Matters</h1>

    <form method="post" action="MakeAppt3.php">
        <div class="form-group">
            <label for="appt_date">Preferred appointment date:</label>
            <input
                type="date"
                id="appt_date"
                name="appt_date"
                required
                min="<?= date('Y-m-d') ?>"
                value="<?= htmlspecialchars($apptDate) ?>"
            >
        </div>

        <div class="form-actions">
            <button type="submit">Confirm</button>
        </div>
    </form>
</div>
</body>
</html>
