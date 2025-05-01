<!-- Rider Application / Registration Form -->

<?php
session_start();
include_once "dbConnection.php";

function generateAutoID($table, $column, $conn)
{
    $year = date('Y');
    $count = 0;
    do {
        $randomDigits = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
        $generatedID = $year . $randomDigits;


        $query = "SELECT COUNT(*) FROM $table WHERE $column = ?";
        $stmt = $conn->prepare($query);
        if ($stmt) {
            $stmt->bind_param("s", $generatedID);
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();
            $stmt->close();
        }
    } while ($count > 0);

    return $generatedID;
}

$uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/static/images/uploads/';

if (!is_dir($uploadDir)) {
    if (!mkdir($uploadDir, 0755, true)) {
        die('Failed to create upload directory.');
    }
}

$licensePicturePath = null;
if (isset($_FILES['licensePicture']) && $_FILES['licensePicture']['error'] === UPLOAD_ERR_OK) {
    $licensePictureName = uniqid('license_', true) . '.' . pathinfo($_FILES['licensePicture']['name'], PATHINFO_EXTENSION);
    $licensePictureFullPath = $uploadDir . $licensePictureName;

    if (!move_uploaded_file($_FILES['licensePicture']['tmp_name'], $licensePictureFullPath)) {
        die('Failed to upload license picture. Ensure the upload directory exists and has write permissions.');
    }

    $licensePicturePath = '../static/images/uploads/' . $licensePictureName;
}

$facePicturePath = null;
if (isset($_FILES['facePicture']) && $_FILES['facePicture']['error'] === UPLOAD_ERR_OK) {
    $facePictureName = uniqid('face_', true) . '.' . pathinfo($_FILES['facePicture']['name'], PATHINFO_EXTENSION);
    $facePictureFullPath = $uploadDir . $facePictureName;
    if (move_uploaded_file($_FILES['facePicture']['tmp_name'], $facePictureFullPath)) {
        $facePicturePath = '../static/images/uploads/' . $facePictureName;
    } else {
        // Handle upload error
        die('Failed to upload face picture.');
    }
}

$email = $_POST['email'] ?? null;
$firstName = $_POST['firstName'] ?? null;
$lastName = $_POST['lastName'] ?? null;
$middleName = $_POST['middleName'] ?? null;
$extensionName = $_POST['extensionName'] ?? null;
$gender = $_POST['gender'] ?? null;
$contactNo = $_POST['contactNo'] ?? null;
$region = $_POST['region'] ?? null;
$province = $_POST['province'] ?? null;
$municipality = $_POST['municipality'] ?? null;
$barangay = $_POST['barangay'] ?? null;
$postalCode = $_POST['postalCode'] ?? null;
$street = $_POST['street'] ?? null;
$licenseNo = $_POST['licenseNo'] ?? null;
$vehicleType = $_POST['vehicleType'] ?? null;
$vehicleCapacity = $_POST['vehicleCapacity'] ?? null;
$vehiclePlateNo = $_POST['vehiclePlateNo'] ?? null;
$vehicleMake = $_POST['vehicleMake'] ?? null;
$vehicleModel = $_POST['vehicleModel'] ?? null;
$vehicleModelYear = $_POST['vehicleModelYear'] ?? null;
$vehicleColor = $_POST['vehicleColor'] ?? null;
$vehicleOwnership = $_POST['vehicleOwnership'] ?? null;
$status = $_POST['status'] ?? "Pending";
$vehicleStatus = $_POST['vehicleStatus'] ?? "Approved";
$riderID = generateAutoID("rider", "rider_id", $conn);
$addressID = generateAutoID("rider_addresses", "address_id", $conn);
$licenseID = generateAutoID("rider_licenses", "license_id", $conn);
$vehicleID = generateAutoID("rider_vehicles", "vehicle_id", $conn);

$riderStmt = $conn->prepare("
    INSERT INTO rider (rider_id, first_name, last_name, middle_initial, name_extension, email_address, mobile_number, gender, status) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
");
if ($riderStmt === false) {
    die("Error preparing statement: " . $conn->error);
}
$riderStmt->bind_param(
    "sssssssss",
    $riderID,
    $firstName,
    $lastName,
    $middleName,
    $extensionName,
    $email,
    $contactNo,
    $gender,
    $status
);

if (!$riderStmt->execute()) {
    $_SESSION['errorMessage'] = "Error inserting into riders: " . $riderStmt->error;
    header("Location: ../template/fillupForm/userfillup.php");
    exit;
}
$riderStmt->close();

$addressStmt = $conn->prepare("
    INSERT INTO rider_addresses (address_id, rider_id, region, province, municipality, barangay, street, postal_code) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)
");
if ($addressStmt === false) {
    $_SESSION['errorMessage'] = "Error preparing statement: " . $conn->error;
    header("Location: ../template/fillupForm/userfillup.php");
    exit;
}
$addressStmt->bind_param(
    "sissssss",
    $addressID,
    $riderID,
    $region,
    $province,
    $municipality,
    $barangay,
    $street,
    $postalCode
);

if (!$addressStmt->execute()) {
    $_SESSION['errorMessage'] = "Error inserting into rider_addresses: " . $addressStmt->error;
    header("Location: ../template/fillupForm/userfillup.php");
    exit;
}
$addressStmt->close();

$licenseStmt = $conn->prepare("
    INSERT INTO rider_licenses (license_id, rider_id, license_no, license_picture, face_picture) 
    VALUES (?, ?, ?, ?, ?)
");
if ($licenseStmt === false) {
    $_SESSION['errorMessage'] = "Error preparing statement: " . $conn->error;
    header("Location: ../template/fillupForm/userfillup.php");
    exit;
}
$licenseStmt->bind_param(
    "sisss",
    $licenseID,
    $riderID,
    $licenseNo,
    $licensePicturePath,
    $facePicturePath
);

if (!$licenseStmt->execute()) {
    $_SESSION['errorMessage'] = "Error inserting into rider_licenses: " . $licenseStmt->error;
    header("Location: ../template/fillupForm/userfillup.php");
    exit;
}
$licenseStmt->close();

$vehicleStmt = $conn->prepare("
    INSERT INTO rider_vehicles (vehicle_id, rider_id, vehicle_type, vehicle_capacity, vehicle_plate_no, vehicle_make, vehicle_model, model_year, vehicle_color, vehicle_ownership, vehicle_status) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");
if ($vehicleStmt === false) {
    $_SESSION['errorMessage'] = "Error preparing statement: " . $conn->error;
    header("Location: ../template/fillupForm/userfillup.php");
    exit;
}
$vehicleStmt->bind_param(
    "sisssssssss",
    $vehicleID,
    $riderID,
    $vehicleType,
    $vehicleCapacity,
    $vehiclePlateNo,
    $vehicleMake,
    $vehicleModel,
    $vehicleModelYear,
    $vehicleColor,
    $vehicleOwnership,
    $vehicleStatus
);

if (!$vehicleStmt->execute()) {
    $_SESSION['errorMessage'] = "Error inserting into rider_vehicles: " . $vehicleStmt->error;
    header("Location: ../template/fillupForm/userfillup.php");
    exit;
}
$vehicleStmt->close();

$vehicleImagesDir = $_SERVER['DOCUMENT_ROOT'] . '/static/images/vehicleImages/';

if (!is_dir($vehicleImagesDir)) {
    if (!mkdir($vehicleImagesDir, 0755, true)) {
        die('Failed to create vehicle images directory.');
    }
}

function uploadVehicleImage($file, $type, $vehicleID)
{
    global $vehicleImagesDir;
    if (isset($file) && $file['error'] === UPLOAD_ERR_OK) {
        $randomPart = uniqid();
        $newFilename = $type . '_' . $vehicleID . '_' . $randomPart . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
        $fullPath = $vehicleImagesDir . $newFilename;
        if (move_uploaded_file($file['tmp_name'], $fullPath)) {
            return '../static/images/vehicleImages/' . $newFilename;
        } else {
            die('Failed to upload ' . $type . ' picture.');
        }
    }
    return null;
}

$frontViewPath = uploadVehicleImage($_FILES['frontViewImage'], 'frontview', $vehicleID);
$sideViewPath = uploadVehicleImage($_FILES['SideViewImage'], 'sideview', $vehicleID);
$backViewPath = uploadVehicleImage($_FILES['BackViewImage'], 'backview', $vehicleID);

$vehicleImageStmt = $conn->prepare("
    INSERT INTO vehicle_images (vehicle_id, rider_id, frontview_image, sideview_image, backview_image) 
    VALUES (?, ?, ?, ?, ?)
");
if ($vehicleImageStmt === false) {
    die("Error preparing vehicle_images statement: " . $conn->error);
}

$vehicleImageStmt->bind_param(
    "issss",
    $vehicleID,
    $riderID,
    $frontViewPath,
    $sideViewPath,
    $backViewPath
);

if (!$vehicleImageStmt->execute()) {
    die("Error inserting into vehicle_images: " . $vehicleImageStmt->error);
}
$vehicleImageStmt->close();



header("Location: ../template/fillupForm/success.php");
exit;

$conn->close();
