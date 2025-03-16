<?php
session_start();
include 'dbConnection.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

$sql = "SELECT vehicle, startingPrice, additionalPassenger, `fareRate/KM` FROM viaje_farerate";
$result = $conn->query($sql);

$fareRates = [];
while ($row = $result->fetch_assoc()) {
    $fareRates[$row['vehicle']] = $row;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vehicle = $_POST['vehicle'];
    $startingPrice = $_POST['startingPrice'] === '0' ? null : $_POST['startingPrice'];
    $additionalPassenger = $_POST['additionalPassenger'] === '0' ? null : $_POST['additionalPassenger'];
    $fareRateKM = $_POST['fareRateKM'] === '0' ? null : $_POST['fareRateKM'];

    if (empty($vehicle)) {
        die('Vehicle type is required');
    }

    $sql = "UPDATE viaje_farerate SET startingPrice=?, additionalPassenger=?, `fareRate/KM`=? WHERE vehicle=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ddds", $startingPrice, $additionalPassenger, $fareRateKM, $vehicle);

    if ($stmt->execute()) {
        $_SESSION['successMessage'] = "Fare Rate Successfully Updated";
        header("Location: ../template/adminPanel/fareRate.php");
        exit();
    } else {
        die("Error updating fare rates: " . $stmt->error);
    }
}


// Close the connection
$conn->close();
