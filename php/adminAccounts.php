<?php
session_start();
include 'dbConnection.php';


ini_set('display_errors', 1);
error_reporting(E_ALL);


if (isset($_POST['submit'])) {

    if (isset($_POST['editAdminID']) && !empty($_POST['editAdminID'])) {

        $id = $_POST['editAdminID'];
        $email = $_POST['editEmail'];
        $firstname = $_POST['editFirstname'];
        $lastname = $_POST['editLastname'];
        $contact = $_POST['editContact'];
        $gender = $_POST['editGender'];
        $role = $_POST['editRole'];


        $imageUrl = handleImageUpload($_POST['existing_image'], $_FILES['image']);


        if ($imageUrl === $_POST['existing_image']) {

            $query = "UPDATE viaje_admin 
                      SET email = ?, firstname = ?, lastname = ?, contactNo = ?, gender = ?, role = ? 
                      WHERE adminID = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('ssssssi', $email, $firstname, $lastname, $contact, $gender, $role, $id);
        } else {

            $query = "UPDATE viaje_admin 
                      SET email = ?, firstname = ?, lastname = ?, contactNo = ?, gender = ?, role = ?, image = ? 
                      WHERE adminID = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('sssssssi', $email, $firstname, $lastname, $contact, $gender, $role, $imageUrl, $id);
        }
    } else {

        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $contact = $_POST['contact'];
        $gender = $_POST['gender'];
        $role = $_POST['role'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password !== $confirm_password) {
            $_SESSION['errorMessage'] = 'Passwords do not match!';
            header("Location: ../template/adminPanel/adminAccounts.php");
            exit;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $imageUrl = handleImageUpload('', $_FILES['image']);


        $query = "INSERT INTO viaje_admin (email, password, firstname, lastname, contactNo, gender, role, image)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssssss', $email, $hashedPassword, $firstname, $lastname, $contact, $gender, $role, $imageUrl);
    }

    if ($stmt->execute()) {
        $_SESSION['successMessage'] = 'Account successfully ' . (isset($id) ? 'updated' : 'added') . '!';
    } else {
        $_SESSION['errorMessage'] = 'Error: ' . $stmt->error;
    }

    header("Location: ../template/adminPanel/adminAccounts.php");
    exit;
}


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
