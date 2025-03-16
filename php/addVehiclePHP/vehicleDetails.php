<?php
include '../../php/dbConnection.php';

if (!$conn) {
    die("Database connection failed: " . $conn->connect_error);
}

// Get the `vehicle_id` from the URL
$vehicleId = isset($_GET['vehicle_id']) ? intval($_GET['vehicle_id']) : 0;

if ($vehicleId > 0) {
    // Fetch the details for the specific vehicle along with images
    $query = "SELECT rv.*, vi.frontview_image, vi.sideview_image, vi.backview_image 
              FROM rider_vehicles rv
              LEFT JOIN vehicle_images vi ON rv.vehicle_id = vi.vehicle_id
              WHERE rv.vehicle_id = ? AND rv.vehicle_status = 'Pending'";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("Query preparation failed: " . $conn->error);
    }
    $stmt->bind_param("i", $vehicleId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $vehicleDetails = $result->fetch_assoc(); // Fetch the row as an associative array
    } else {
        die("No pending vehicle found for the given ID.");
    }
    $stmt->close();
} else {
    die("Invalid vehicle ID.");
}

$conn->close();
