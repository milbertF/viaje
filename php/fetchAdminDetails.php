<?php

include 'dbConnection.php';

$adminID = isset($_GET['adminID']) ? intval($_GET['adminID']) : 0;

if ($adminID > 0) {
    $query = "SELECT * FROM viaje_admin WHERE adminID = $adminID";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $admin = mysqli_fetch_assoc($result);
        echo json_encode([
            'success' => true,
            'adminID' => $admin['adminID'],
            'email' => $admin['email'],
            'firstname' => $admin['firstname'],
            'lastname' => $admin['lastname'],
            'contactNo' => $admin['contactNo'],
            'gender' => $admin['gender'],
            'role' => $admin['role'],
            'image' => !empty($admin['image']) ? '../' . $admin['image'] : '../../static/images/logo/landscape-placeholder.svg', 
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Admin not found.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid Admin ID.']);
}
?>