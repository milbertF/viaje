<?php
include_once 'dbConnection.php';

if (!isset($_GET['id'])) {
    echo json_encode(['error' => 'No id provided']);
    exit;
}

$id = $_GET['id'];


error_log("Fetching details for id: $id");

$query = "
    SELECT 
        first_name, last_name, mobile_number, self_description
    FROM users
    WHERE id = ?";


error_log("Query: $query");

$stmt = $conn->prepare($query);
if ($stmt === false) {
    error_log("Error preparing statement: " . $conn->error);
    echo json_encode(['error' => 'Database query error']);
    exit;
}

$stmt->bind_param('s', $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(['error' => 'No records found']);
    exit;
}

$data = $result->fetch_assoc();
echo json_encode($data);


error_log("Fetched data: " . print_r($data, true));
