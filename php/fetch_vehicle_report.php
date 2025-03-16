<?php
include 'dbConnection.php';

// Log received data for debugging
file_put_contents("debug_log.txt", "GET Data: " . json_encode($_GET) . PHP_EOL, FILE_APPEND);


// Check if 'month' is set and valid
if (!isset($_GET['month']) || !is_numeric($_GET['month'])) {
    echo json_encode([
        "error" => "Month not provided or invalid",
        "received" => $_GET
    ]);
    exit();
}

$month = intval($_GET['month']); // Convert to integer
$vehicleTypes = ['Car', 'Tricycle', 'Tuktuk', 'Motorcycle'];
$vehicleCounts = [];

// Fetch vehicle counts
foreach ($vehicleTypes as $type) {
    $query = "SELECT COUNT(*) as count FROM viaje_report WHERE type_of_vehicle = ? AND MONTH(date) = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $type, $month);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        $data = $result->fetch_assoc();
        $vehicleCounts[$type] = $data['count'] ?? 0;
    } else {
        $vehicleCounts[$type] = 0;
    }
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($vehicleCounts);
exit();
