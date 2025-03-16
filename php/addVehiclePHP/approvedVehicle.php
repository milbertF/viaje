<?php
session_start();
include '../../php/dbConnection.php';

// Ensure the user is logged in
if (!isset($_SESSION['adminID'])) {
    header("Location: ../loginPage/index.php");
    exit();
}

// Get the vehicle_id from the POST request
$vehicleId = isset($_POST['vehicle_id']) ? intval($_POST['vehicle_id']) : 0;

if ($vehicleId > 0) {
    // Update the vehicle status to 'Approved'
    $query = "UPDATE rider_vehicles SET vehicle_status = 'Approved' WHERE vehicle_id = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("i", $vehicleId);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $_SESSION['successMessage'] = "Vehicle status updated to Approved.";
        } else {
            $_SESSION['errorMessage'] = "Failed to update vehicle status. Please try again.";
        }

        $stmt->close();
    } else {
        $_SESSION['errorMessage'] = "Database error: " . $conn->error;
    }
} else {
    $_SESSION['errorMessage'] = "Invalid vehicle ID.";
}

$conn->close();

// Redirect back to additionalVehicle.php
header("Location: ../../template/adminPanel/additionalVehicle.php");
exit();
