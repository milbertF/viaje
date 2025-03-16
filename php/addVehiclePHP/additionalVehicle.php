<?php
include '../../php/dbConnection.php';

// Ensure the database connection is established
if (!$conn) {
    die("Database connection failed: " . $conn->connect_error);
}

// Fetch vehicles with `Pending` status
$query = "SELECT * FROM rider_vehicles WHERE vehicle_status = 'Pending'";
$result = $conn->query($query);

if (!$result) {
    die("Query failed: " . $conn->error);
}

// Prepare data to be displayed in the table
$vehicles = [];
while ($row = $result->fetch_assoc()) {
    $vehicles[] = $row;
}

$conn->close();
