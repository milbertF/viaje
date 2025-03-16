<?php
include_once 'dbConnection.php';

if (!isset($_GET['rider_id'])) {
    echo json_encode(['error' => 'No id provided']);
    exit;
}

$rider_id = $_GET['rider_id'];
error_log("Fetching details for rider_id: $rider_id");

// Corrected SQL query (space before WHERE)
$queryRider = "SELECT r.rider_id, r.first_name, r.last_name, r.middle_initial, r.name_extension, 
                 r.email_address, r.mobile_number, r.gender, r.status,
                 a.region, a.province, a.municipality, a.barangay, a.street, a.postal_code,
                 l.license_no, l.license_picture, l.face_picture,
                 v.vehicle_type, v.vehicle_plate_no, v.vehicle_make, v.vehicle_model, 
                 v.model_year, v.vehicle_color, v.vehicle_ownership
          FROM rider r
          LEFT JOIN rider_addresses a ON r.rider_id = a.rider_id
          LEFT JOIN rider_licenses l ON r.rider_id = l.rider_id
          LEFT JOIN rider_vehicles v ON r.rider_id = v.rider_id
          WHERE r.rider_id = ?";

error_log("Query: $queryRider");

$stmt = $conn->prepare($queryRider);
if ($stmt === false) {
    error_log("Error preparing statement: " . $conn->error);
    echo json_encode(['error' => 'Database query error']);
    exit;
}

// Bind and execute statement
$stmt->bind_param('s', $rider_id);
$stmt->execute();
$resultRider = $stmt->get_result();

if ($resultRider->num_rows === 0) {
    echo json_encode(['error' => 'No records found for rider_id: ' . $rider_id]);
    exit;
}

// Fetch and return data
$dataRider = $resultRider->fetch_assoc();
echo json_encode($dataRider);

error_log("Fetched data: " . print_r($dataRider, true));


function handleImageUpload($existingImage, $imageFile)
{

    if (isset($imageFile) && $imageFile['error'] === 0 && !empty($imageFile['tmp_name'])) {
        $imageName = uniqid() . "_" . basename($imageFile['name']);
        $imageTmpName = $imageFile['tmp_name'];
        $imagePath = "../static/images/adminImages/" . $imageName;


        if (move_uploaded_file($imageTmpName, $imagePath)) {
            return $imagePath;
        }
    }


    return $existingImage;
}
