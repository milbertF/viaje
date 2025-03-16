<?php
session_start();
include '../../php/dbConnection.php';

if (!isset($_SESSION['adminID'])) {
    header("Location: ../loginPage/index.php");
    exit();
}

ini_set('display_errors', 1);
error_reporting(E_ALL);

$query = "SELECT * FROM `viaje_report` ORDER BY `date` DESC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}

$successMessage = isset($_SESSION['successMessage']) ? $_SESSION['successMessage'] : '';
$errorMessage = isset($_SESSION['errorMessage']) ? $_SESSION['errorMessage'] : '';

unset($_SESSION['successMessage']);
unset($_SESSION['errorMessage']);

$userRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';
$profilePicture = isset($_SESSION['profile_picture']) ? $_SESSION['profile_picture'] : '../../static/images/default-profile.png';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaje / Report</title>
    <link rel="shortcut icon" href="../../static/images/logo/logoViaje.png" type="image/x-icon">
    <link rel="stylesheet" href="../../static/stylesheet/components/style.css">
    <link rel="stylesheet" href="../../static/stylesheet/css/dashboard.css">
</head>

<body>
    <div class="whole">
        <main-header user-role="<?= htmlspecialchars($userRole) ?>" profile-picture="<?= htmlspecialchars($_SESSION['profile_picture'] ? '../' . $_SESSION['profile_picture'] : '../../static/images/logo/landscape-placeholder.svg') ?>"></main-header>
        <div class="con">
            <main-sidemenu class="sidebar" user-role="<?= htmlspecialchars($userRole) ?>"></main-sidemenu>
            <div class="container">
                <div class="titleTop">
                    <p>Report</p>
                </div>
                <div class="wrap">
                    <div class="searchcon">
                        <svg class="icon" aria-hidden="true" viewBox="0 0 24 24">
                            <g>
                                <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
                            </g>
                        </svg>
                        <input type="text" id="searchInput" placeholder="Search accounts" onkeyup="searchAccounts()">
                    </div>
                    <div class="content">
                        <div class="tableCon">
                            <table>
                                <tr class="trheader">
                                    <td>Report ID</td>
                                    <td>Date</td>
                                    <td>Type of Report</td>
                                    <td>Reported By</td>
                                    <td>Reported Rider</td>
                                    <td>Destination From</td>
                                    <td>Destination to</td>
                                    <td>Feedback</td>
                                    <td>Type of Vehicle</td>
                                    <td>Action</td>
                                </tr>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($row['report_id']) ?></td>
                                        <td><?= date('M j, Y / g:i A', strtotime($row['date'])) ?></td>
                                        <td><?= htmlspecialchars($row['type_of_report']) ?></td>
                                        <td><?= htmlspecialchars($row['reported_by']) ?></td>
                                        <td><?= htmlspecialchars($row['reported_rider']) ?></td>
                                        <td><?= htmlspecialchars($row['destination_from']) ?></td>
                                        <td><?= htmlspecialchars($row['destination_to']) ?></td>
                                        <td><?= htmlspecialchars($row['feedback']) ?></td>
                                        <td><?= htmlspecialchars($row['type_of_vehicle']) ?></td>
                                        <td>
                                            <button>Set to Suspension</button>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../static/javascript/header.js"></script>
    <script src="../../static/javascript/sidebar.js"></script>
    <script src="../../static/javascript/script.js"></script>
</body>

</html>