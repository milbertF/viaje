<?php
session_start();
include 'dbConnection.php';


ini_set('display_errors', 1);
error_reporting(E_ALL);

$query = "SELECT id, first_name, last_name, mobile_number, self_description
            FROM users";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);


$successMessage = $_SESSION['successMessage'] ?? '';
$errorMessage = $_SESSION['errorMessage'] ?? '';

unset($_SESSION['successMessage']);
unset($_SESSION['errorMessage']);

$userRole = $_SESSION['role'] ?? '';
$profilePicture = $_SESSION['profile_picture'] ?? '../../static/images/default-profile.png';


$queryRider = "SELECT r.rider_id, r.first_name, r.last_name, r.middle_initial, r.name_extension, 
                 r.email_address, r.mobile_number, r.gender, r.status,
                 a.region, a.province, a.municipality, a.barangay, a.street, a.postal_code,
                 l.license_no, l.license_picture, l.face_picture,
                 v.vehicle_type, v.vehicle_plate_no, v.vehicle_make, v.vehicle_model, 
                 v.model_year, v.vehicle_color, v.vehicle_ownership
          FROM rider r
          LEFT JOIN rider_addresses a ON r.rider_id = a.rider_id
          LEFT JOIN rider_licenses l ON r.rider_id = l.rider_id
          LEFT JOIN rider_vehicles v ON r.rider_id = v.rider_id";

$resultRider = mysqli_query($conn, $queryRider);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}

$rider = mysqli_fetch_all($result, MYSQLI_ASSOC);
