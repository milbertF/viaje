<?php
include 'dbConnection.php';
session_start();

// Redirect to login if the user is not logged in
if (!isset($_SESSION['adminID'])) {
    header("Location: ../loginPage/index.php");
    exit();
}

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Prepare and execute the query to fetch rider details
$query = "
    SELECT 
        r.rider_id, 
        r.first_name, 
        r.last_name, 
        r.middle_initial, 
        r.name_extension, 
        r.email_address, 
        r.mobile_number, 
        r.gender, 
        r.status,
        a.region, 
        a.province, 
        a.municipality, 
        a.barangay, 
        a.street, 
        a.postal_code,
        l.license_no, 
        l.license_picture, 
        l.face_picture,
        v.vehicle_type, 
        v.vehicle_plate_no, 
        v.vehicle_make, 
        v.vehicle_model, 
        v.model_year, 
        v.vehicle_color, 
        v.vehicle_ownership,
        f.frontview_image,
        f.sideview_image,
        f.backview_image
    FROM rider r
    LEFT JOIN rider_addresses a ON r.rider_id = a.rider_id
    LEFT JOIN rider_licenses l ON r.rider_id = l.rider_id
    LEFT JOIN rider_vehicles v ON r.rider_id = v.rider_id
    LEFT JOIN vehicle_images f ON r.rider_id = f.rider_id
    WHERE r.rider_id = ?
";

// Use prepared statements for better security
if ($stmt = mysqli_prepare($conn, $query)) {
    // Bind parameters
    $riderID = $_GET['rider_id'] ?? null; // Assuming `rider_id` is passed as a query parameter
    mysqli_stmt_bind_param($stmt, 'i', $riderID);

    // Execute the query
    mysqli_stmt_execute($stmt);

    // Fetch results
    $result = mysqli_stmt_get_result($stmt);
    if ($result) {
        $rider = mysqli_fetch_assoc($result); // Fetch a single rider's details
    } else {
        die("Query Failed: " . mysqli_error($conn));
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    die("Query Preparation Failed: " . mysqli_error($conn));
}

// Handle session messages for success or error
$successMessage = $_SESSION['successMessage'] ?? '';
$errorMessage = $_SESSION['errorMessage'] ?? '';

unset($_SESSION['successMessage']);
unset($_SESSION['errorMessage']);

// Define user role and profile picture
$userRole = $_SESSION['role'] ?? '';
$profilePicture = $_SESSION['profile_picture'] ?? '../../static/images/default-profile.png';
