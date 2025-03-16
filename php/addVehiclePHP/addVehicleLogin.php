<?php
session_start();
include '../dbConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['RiderEmail']);
    $passwordInput = trim($_POST['RiderPassword']);

    if (!empty($email) && !empty($passwordInput)) {
        $stmt = $conn->prepare("SELECT rider_id, first_name, last_name, password FROM rider WHERE email_address = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($passwordInput, $user['password'])) {
            // Save user details to the session
            $_SESSION['rider_id'] = $user['rider_id'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];

            // Redirect to the addVehicleForm.php
            header('Location: ../../template/fillupForm/addVehicleForm.php');
            exit();
        } else {
            $_SESSION['errorMessage'] = 'Invalid email or password.';
            header('Location: ../../template/fillupForm/addVehicleLogin.php');
            exit();
        }
    } else {
        $_SESSION['errorMessage'] = 'Please fill in all required fields.';
        header('Location: ../../template/fillupForm/addVehicleLogin.php');
        exit();
    }
} else {
    $_SESSION['errorMessage'] = 'Invalid request method.';
    header('Location: ../../template/fillupForm/addVehicleLogin.php');
    exit();
}
