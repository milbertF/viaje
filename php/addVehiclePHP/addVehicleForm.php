<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../../php/dbConnection.php';

if (!$conn) {
    die("Database connection failed: " . $conn->connect_error);
}

// if (!isset($_SESSION['rider_id'])) {
//     header('Location: ../../template/fillupForm/addVehicleLogin.php');
//     exit();
// }

// Get rider details from the session
$firstName = $_SESSION['first_name'];
$lastName = $_SESSION['last_name'];
$riderId = $_SESSION['rider_id'];

// Function to generate a unique vehicle ID
function generateUniqueVehicleId($conn)
{
    $year = date('Y'); // Get the current year
    do {
        $randomNumber = rand(100000, 999999); // Generate a random 6-digit number
        $vehicleId = $year . $randomNumber; // Combine year and random number

        // Check if the vehicle_id already exists in the database
        $sql = "SELECT COUNT(*) as count FROM rider_vehicles WHERE vehicle_id = ?";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("SQL prepare error in generateUniqueVehicleId: " . $conn->error);
        }

        $stmt->bind_param("s", $vehicleId); // Use "s" if vehicle_id is VARCHAR
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $count = $row['count']; // Get the count value
        $stmt->close();
    } while ($count > 0); // Repeat until a unique ID is found
    return $vehicleId;
}

// Function to upload and save vehicle image
function uploadVehicleImage($file, $type, $vehicleID)
{
    $vehicleImagesDir = $_SERVER['DOCUMENT_ROOT'] . '/static/images/vehicleImages/';
    if (!is_dir($vehicleImagesDir)) {
        mkdir($vehicleImagesDir, 0755, true);
    }
    if ($file['error'] === UPLOAD_ERR_OK) {
        $imageFileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $randomPart = uniqid(); // Generate a unique ID to append to the filename
        $newFilename = $type . '_' . $vehicleID . '_' . $randomPart . '.' . $imageFileType;
        $fullPath = $vehicleImagesDir . $newFilename;
        if (move_uploaded_file($file['tmp_name'], $fullPath)) {
            return '../static/images/vehicleImages/' . $newFilename; // Return relative path for database storage
        } else {
            die('Failed to upload ' . $type . ' picture.');
        }
    }
    return null;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vehicleType = trim($_POST['addvehicleType'] ?? '');
    $vehiclePlateNo = trim($_POST['addvehiclePlateNo'] ?? '');
    $vehicleMake = trim($_POST['addvehicleMake'] ?? '');
    $vehicleModel = trim($_POST['addvehicleModel'] ?? '');
    $vehicleModelYear = trim($_POST['addvehicleModelYear'] ?? '');
    $vehicleColor = trim($_POST['addvehicleColor'] ?? '');
    $vehicleOwnership = trim($_POST['addvehicleOwnership'] ?? '');
    $vehicleStatus = trim($_POST['addvehicleStatus'] ?? '');

    if (
        !empty($vehicleType) && !empty($vehiclePlateNo) && !empty($vehicleMake) && !empty($vehicleModel) &&
        !empty($vehicleModelYear) && !empty($vehicleColor) && !empty($vehicleOwnership) && !empty($vehicleStatus)
    ) {
        $vehicleId = generateUniqueVehicleId($conn); // Generate a unique vehicle ID
        $frontViewPath = uploadVehicleImage($_FILES['frontViewImage'], 'frontview', $vehicleId);
        $sideViewPath = uploadVehicleImage($_FILES['SideViewImage'], 'sideview', $vehicleId);
        $backViewPath = uploadVehicleImage($_FILES['BackViewImage'], 'backview', $vehicleId);

        $sql = "INSERT INTO rider_vehicles (vehicle_id, rider_id, vehicle_type, vehicle_plate_no, vehicle_make, vehicle_model, model_year, vehicle_color, vehicle_ownership, vehicle_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("SQL prepare error in main query: " . $conn->error);
        }
        $stmt->bind_param("isssssssss", $vehicleId, $riderId, $vehicleType, $vehiclePlateNo, $vehicleMake, $vehicleModel, $vehicleModelYear, $vehicleColor, $vehicleOwnership, $vehicleStatus);
        if ($stmt->execute() && $frontViewPath && $sideViewPath && $backViewPath) {
            $sqlImages = "INSERT INTO vehicle_images (vehicle_id, rider_id, frontview_image, sideview_image, backview_image) VALUES (?, ?, ?, ?, ?)";
            $stmtImages = $conn->prepare($sqlImages);
            if (!$stmtImages) {
                die("SQL prepare error in image insertion: " . $conn->error);
            }
            $stmtImages->bind_param("issss", $vehicleId, $riderId, $frontViewPath, $sideViewPath, $backViewPath);
            if ($stmtImages->execute()) {
                echo "<script>alert('Vehicle and images added successfully!');</script>";
                header('Location: ../../template/fillupForm/success.php');
                exit;
            } else {
                echo "<script>alert('Error adding vehicle images: " . $stmtImages->error . "');</script>";
            }
            $stmtImages->close();
        } else {
            echo "<script>alert('Error adding vehicle: " . $stmt->error . "');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Please fill in all required fields.');</script>";
    }
}
