<?php
session_start();

$error = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $role = $_POST["role"] ?? "";
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    if ($role === "" || $username === "" || $password === "") {
        $error = "Please select a role and enter username and password.";
    } else {
        // Store data in session (for now – no database yet)
        $_SESSION["role"] = $role;
        $_SESSION["username"] = $username;

        // Redirect after successful login
        header("Location: MakeAppt1.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Health Matters</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="login-container">
    <h2>Login</h2>

    <?php if ($error): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="role">Select Role</label>
        <select id="role" name="role" required>
            <option value="">-- Choose Role --</option>
            <option value="practitioner">Practitioner</option>
            <option value="referring_manager">Referring Manager</option>
            <option value="patient">Patient</option>
            <option value="admin">Admin</option>
        </select>

        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
