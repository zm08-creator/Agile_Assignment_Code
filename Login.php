<?php
session_start();
require_once "config/db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $role = $_POST["role"] ?? "";
    $username = trim($_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if ($role === "" || $username === "" || $password === "") {
        $error = "Please select a role and enter username and password.";
    } else {

        // Check user in database
        $stmt = $conn->prepare("SELECT id, password_hash FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {

            $stmt->bind_result($id, $password_hash);
            $stmt->fetch();

            if (password_verify($password, $password_hash)) {

                // Role check for demo purposes
                if (
                    ($username === "patient" && $role === "patient") ||
                    ($username === "professional" && $role === "practitioner") ||
                    ($username === "admin" && $role === "admin")
                ) {

                    $_SESSION["user_id"] = $id;
                    $_SESSION["username"] = $username;
                    $_SESSION["role"] = $role;

                    header("Location: MakeAppt1.php");
                    exit;

                } else {
                    $error = "Selected role does not match user.";
                }

            } else {
                $error = "Invalid password.";
            }

        } else {
            $error = "User not found.";
        }

        $stmt->close();
    }
}
?>