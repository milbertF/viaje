<?php
include 'dbConnection.php';
session_start();

// Set response header to JSON
header('Content-Type: application/json');

// Read the raw input data
$data = json_decode(file_get_contents('php://input'), true);

// Check for action and process accordingly
if (isset($data['action'])) {
    $action = $data['action'];
    $riderId = $data['rider_id'] ?? null;

    if (!$riderId) {
        echo json_encode(['success' => false, 'message' => 'Rider ID is required.']);
        exit();
    }

    if ($action === 'updateStatus' && isset($data['status'])) {
        $status = $data['status'];
        $query = "UPDATE rider SET status = ? WHERE rider_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('si', $status, $riderId);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => $stmt->error]);
        }
        $stmt->close();
    } elseif ($action === 'deleteRider') {
        $query = "DELETE FROM rider WHERE rider_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $riderId);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid action.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No action specified.']);
}
$conn->close();
