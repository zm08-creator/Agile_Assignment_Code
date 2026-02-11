<?php
session_start();

// Auto-redirect if already logged in
if (isset($_SESSION['user_id'])) {
    $role = $_SESSION['role'] ?? 'user';
    header("Location: MakeAppt1.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Matters - Welcome</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="welcome-container">
        <h1>🌟 Welcome to Health Matters</h1>
        <p>Your trusted platform for medical appointments and healthcare management.</p>
        
        <div class="countdown" id="countdown">Redirecting in <span id="timer">5</span> seconds...</div>
        
        <a href="Login.php" class="login-btn" id="loginBtn">Go to Login →</a>
    </div>

    <script>
        let timeLeft = 5;
        const timer = document.getElementById('timer');
        const loginBtn = document.getElementById('loginBtn');

        const countdown = setInterval(() => {
            timeLeft--;
            timer.textContent = timeLeft;
            
            if (timeLeft <= 0) {
                clearInterval(countdown);
                window.location.href = 'Login.php';
            }
        }, 1000);

        loginBtn.addEventListener('click', () => {
            clearInterval(countdown);
            window.location.href = 'Login.php';
        });
    </script>
</body>
</html>
