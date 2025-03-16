<?php
include_once 'dbConnection.php';
session_start(); // Start the session

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mobile_number = $_POST['mobile_number'];
    $self_description = $_POST['self_description'];

    // Validate data
    if (empty($id) || empty($first_name) || empty($last_name) || empty($mobile_number)) {
        $_SESSION['errorMessage'] = 'All fields are required';
        header("Location: ../template/adminPanel/accountManager.php");
        exit;
    }

    // Prepare the update query
    $query = "
        UPDATE users
        SET first_name = ?, last_name = ?, mobile_number = ?, self_description = ?
        WHERE id = ?
    ";

    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        error_log("Error preparing statement: " . $conn->error);
        $_SESSION['errorMessage'] = 'Database error';
        header("Location: ../template/adminPanel/accountManager.php");
        exit;
    }

    $stmt->bind_param('ssssi', $first_name, $last_name, $mobile_number, $self_description, $id);

    if ($stmt->execute()) {
        $_SESSION['successMessage'] = 'User Updated Successfully.';
        header("Location: ../template/adminPanel/accountManager.php");
        exit;
    } else {
        error_log("Error executing query: " . $stmt->error);
        $_SESSION['errorMessage'] = 'Update failed';
        header("Location: ../template/adminPanel/accountManager.php");
        exit;
    }

    $stmt->close();
    $conn->close();
}
