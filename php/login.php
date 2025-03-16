<?php
session_start();
include_once "dbConnection.php"; // Assuming you have a database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $conn->prepare("SELECT * FROM viaje_admin WHERE email = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Check if the password is correct (assuming password is stored hashed)
        if (password_verify($password, $user['password'])) {
            // Store user info in session
            $_SESSION['loggedIn'] = true;
            $_SESSION['profile_picture'] = $user['image'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['adminID'] = $user['adminID'];

            header("Location: ../template/adminPanel/dashboard.php");
            exit;
        } else {
            $_SESSION['errorMessage'] = "Invalid login credentials.";
        }
    } else {
        $_SESSION['errorMessage'] = "Invalid login credentials.";
    }

    // Redirect back to login page with error message
    header("Location: ../template/loginPage/index.php");
    exit;
}
