<?php
session_start();
include '../../php/addVehiclePHP/additionalVehicle.php';

if (!isset($_SESSION['adminID'])) {
    header("Location: ../loginPage/index.php");
    exit();
}


$userRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';
$profilePicture = isset($_SESSION['profile_picture']) ? $_SESSION['profile_picture'] : '../../static/images/default-profile.png';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaje / Add Vehicle</title>
    <link rel="shortcut icon" href="../../static/images/logo/logoViaje.png" type="image/x-icon">
    <link rel="stylesheet" href="../../static/stylesheet/components/style.css">
    <link rel="stylesheet" href="../../static/stylesheet/css/dashboard.css">
</head>

<body>
    <div class="whole">
        <!-- header -->
        <main-header user-role="<?= htmlspecialchars($userRole) ?>" profile-picture="<?= htmlspecialchars($_SESSION['profile_picture'] ? '../' . $_SESSION['profile_picture'] : '../../static/images/logo/landscape-placeholder.svg') ?>"></main-header>
        <div class="con">
            <!-- sidebar -->
            <main-sidemenu class="sidebar" user-role="<?= htmlspecialchars($userRole) ?>"></main-sidemenu>
            <!-- container -->
            <div class="container">
                <!-- title -->
                <div class="titleTop">
                    <p>Additional Vehicle</p>
                </div>
                <!-- wrapper-->
                <div class="wrap">
                    <!-- content -->
                    <div class="searchcon">
                        <svg class="icon" aria-hidden="true" viewBox="0 0 24 24">
                            <g>
                                <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
                            </g>
                        </svg>
                        <input type="text" id="searchInput" placeholder="Search accounts" onkeyup="searchAddVehicle()">
                    </div>

                    <!-- content -->
                    <div class="content">

                        <div class="tableCon">
                            <table>
                                <tr class="trheader">
                                    <td>View</td>
                                    <td>Rider</td>
                                    <td>Vehicle Type</td>
                                    <td>Vehicle Plate No.</td>
                                    <td>Vehicle Make</td>
                                    <td>Vehicle Model</td>
                                    <td>Model Year</td>
                                    <td>Vehicle Color</td>
                                    <td>Vehicle Ownership</td>
                                </tr>
                                <?php foreach ($vehicles as $vehicle): ?>
                                    <tr>
                                        <td>
                                            <button onclick="redirectToDetails(<?= htmlspecialchars($vehicle['vehicle_id']); ?>)">View</button>
                                        </td>
                                        <td><?= htmlspecialchars($vehicle['rider_id']); ?></td>
                                        <td><?= htmlspecialchars($vehicle['vehicle_type']); ?></td>
                                        <td><?= htmlspecialchars($vehicle['vehicle_plate_no']); ?></td>
                                        <td><?= htmlspecialchars($vehicle['vehicle_make']); ?></td>
                                        <td><?= htmlspecialchars($vehicle['vehicle_model']); ?></td>
                                        <td><?= htmlspecialchars($vehicle['model_year']); ?></td>
                                        <td><?= htmlspecialchars($vehicle['vehicle_color']); ?></td>
                                        <td><?= htmlspecialchars($vehicle['vehicle_ownership']); ?></td>
                                    </tr>
                                <?php endforeach; ?>

                                <?php if (empty($vehicles)): ?>
                                    <tr>
                                        <td colspan="9">No pending vehicles found.</td>
                                    </tr>
                                <?php endif; ?>
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
    <script>
        // Function to search and filter table rows
        function searchAddVehicle() {
            const input = document.getElementById("searchInput");
            const filter = input.value.toLowerCase();
            const table = document.querySelector(".tableCon table");
            const rows = table.getElementsByTagName("tr");

            // Loop through all table rows, skipping the header
            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName("td");
                let rowContainsFilter = false;

                // Check each cell in the row
                for (let j = 0; j < cells.length; j++) {
                    const cellText = cells[j].textContent || cells[j].innerText;
                    if (cellText.toLowerCase().indexOf(filter) > -1) {
                        rowContainsFilter = true;
                        break;
                    }
                }

                // Show or hide the row based on the search filter
                rows[i].style.display = rowContainsFilter ? "" : "none";
            }
        }
    </script>

    <script>
        function redirectToDetails(vehicleId) {
            // Redirect to vehicleDetails.php with the vehicle_id as a query parameter
            window.location.href = `vehicleDetails.php?vehicle_id=${vehicleId}`;
        }
    </script>

</body>

</html>