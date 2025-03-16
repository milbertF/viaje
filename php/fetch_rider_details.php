<?php
include_once 'dbConnection.php';

if (!isset($_GET['rider_id'])) {
    echo json_encode(['error' => 'No rider_id provided']);
    exit;
}

$rider_id = $_GET['rider_id'];


error_log("Fetching details for rider_id: $rider_id");

$query = "
    SELECT 
        r.first_name, r.last_name, r.middle_initial, r.name_extension, r.email_address, 
        r.mobile_number, r.gender, r.status,
        a.region, a.province, a.municipality, a.barangay, a.street, a.postal_code,
        l.license_no, l.license_picture, l.face_picture,
        v.vehicle_type, v.vehicle_plate_no, v.vehicle_make, v.vehicle_model, v.model_year, v.vehicle_color, v.vehicle_ownership
    FROM rider r
    LEFT JOIN rider_addresses a ON r.rider_id = a.rider_id
    LEFT JOIN rider_licenses l ON r.rider_id = l.rider_id
    LEFT JOIN rider_vehicles v ON r.rider_id = v.rider_id
    WHERE r.rider_id = ?";


error_log("Query: $query");

$stmt = $conn->prepare($query);
if ($stmt === false) {
    error_log("Error preparing statement: " . $conn->error);
    echo json_encode(['error' => 'Database query error']);
    exit;
}

$stmt->bind_param('s', $rider_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(['error' => 'No records found']);
    exit;
}

$data = $result->fetch_assoc();
echo json_encode($data);


error_log("Fetched data: " . print_r($data, true));
?>
