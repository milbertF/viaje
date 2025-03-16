<?php
include 'dbConnection.php';
session_start();

// Initialize variables
$error = '';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Check if inputs are not empty
    if (!empty($email) && !empty($password)) {
        // Prepare and execute SQL query to fetch rider details
        $stmt = $conn->prepare("SELECT * FROM rider WHERE email_address = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if rider exists
        if ($result->num_rows === 1) {
            $rider = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $rider['password'])) {
                // Set session variables
                $_SESSION['rider_id'] = $rider['rider_id'];
                $_SESSION['email_address'] = $rider['email_address'];

                // Redirect to rider dashboard or desired page
                header("Location: ../template/fillupForm/addVehicleForm.php");
                exit();
            } else {
                $_SESSION['errorMessage'] = "Invalid login credentials.";
            }
        } else {
            $_SESSION['errorMessage'] = "Invalid login credentials.";
        }
    } else {
        $_SESSION['errorMessage'] = "Invalid login credentials.";
    }

    header("Location: ../template/fillupForm/addVehicleLogin.php");
    exit;
}

// Close the database connection
$conn->close();
