<?php
session_start();
include "../../php/addVehiclePHP/vehicleDetails.php";

// if (!isset($_SESSION['adminID'])) {
//     die("Session adminID not set. Please log in again.");
// }

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

$userRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';
$profilePicture = isset($_SESSION['profile_picture']) ? $_SESSION['profile_picture'] : '../../static/images/default-profile.png';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaje / Dashboard</title>
    <link rel="shortcut icon" href="../../static/images/logo/logoViaje.png" type="image/x-icon">
    <link rel="stylesheet" href="../../static/stylesheet/components/style.css">
    <link rel="stylesheet" href="../../static/stylesheet/css/dashboard.css">
    <link rel="stylesheet" href="../../static/stylesheet/css/riderDetails.css">
    <link rel="stylesheet" href="../../static/stylesheet/css/vehicleDetails.css">
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
                    <p>Vehicle Details</p>
                </div>
                <!-- wrapper-->
                <div class="wrap">
                    <div class="content">
                        <div class="btnBack">
                            <button onclick="redirect('additionalVehicle.php')">Back</button>
                        </div>
                        <div class="shows">
                            <p class="psee" id="psee">Show Rider </strong> <?= htmlspecialchars($vehicleDetails['rider_id'] ?? 'N/A') ?> </p>
                            <p class="psee" id="pshowp" onclick="pshowpic()">Show Pictures</p>
                        </div>

                        <div class="parDetails detp">
                            <h3>Vehicle Information (ID: <strong><?= htmlspecialchars($vehicleDetails['vehicle_id'] ?? 'N/A') ?></strong>)</h3>
                            <div class="ext">
                                <p>Vehicle Type:</p>
                                <p><?= htmlspecialchars($vehicleDetails['vehicle_type'] ?? 'N/A') ?></p>
                            </div>
                            <div class="ext">
                                <p>Vehicle Plate No.:</p>
                                <p><?= htmlspecialchars($vehicleDetails['vehicle_plate_no'] ?? 'N/A') ?></p>
                            </div>
                            <div class="ext">
                                <p>Vehicle Make:</p>
                                <p><?= htmlspecialchars($vehicleDetails['vehicle_make'] ?? 'N/A') ?></p>
                            </div>
                            <div class="ext">
                                <p>Vehicle Model:</p>
                                <p><?= htmlspecialchars($vehicleDetails['vehicle_model'] ?? 'N/A') ?></p>
                            </div>
                            <div class="ext">
                                <p>Model Year:</p>
                                <p><?= htmlspecialchars($vehicleDetails['model_year'] ?? 'N/A') ?></p>
                            </div>
                            <div class="ext">
                                <p>Vehicle Color:</p>
                                <p><?= htmlspecialchars($vehicleDetails['vehicle_color'] ?? 'N/A') ?></p>
                            </div>
                            <div class="ext">
                                <p>Vehicle Ownership:</p>
                                <p><?= htmlspecialchars($vehicleDetails['vehicle_ownership'] ?? 'N/A') ?></p>
                            </div>
                        </div>

                        <div class="btnApproved">
                            <form action="../../php/addVehiclePHP/approvedVehicle.php" method="POST">
                                <input type="hidden" name="vehicle_id" value="<?= htmlspecialchars($vehicleDetails['vehicle_id']) ?>">
                                <button type="submit" onclick="return confirm('Are you sure you want to approve this vehicle?')">Approve</button>
                            </form>
                        </div>



                    </div>
                </div>
            </div>
        </div>

        <div class="showVehicleImage" id="showVehicleImage">
            <div class="tith3">
                <h3>Vehicle Images</h3>
                <div class="close" onclick="closepic()">
                    <i class="fa fa-times"></i>
                </div>
            </div>

            <div class="conVImages">
                <div class="conv">
                    <p>Front View</p>
                    <div class="IV">
                        <img src="../<?= htmlspecialchars($vehicleDetails['frontview_image']) ?>" alt="">
                    </div>
                </div>
                <div class="conv">
                    <p>Side View</p>
                    <div class="IV">
                        <img src="../<?= htmlspecialchars($vehicleDetails['sideview_image']) ?>" alt="">
                    </div>
                </div>
                <div class="conv">
                    <p>Back View</p>
                    <div class="IV">
                        <img src="../<?= htmlspecialchars($vehicleDetails['backview_image']) ?>" alt="">
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="overlay-Picture" id="overlay-Picture">
            <div class="sscc">
                <h3>Vehicle Pictures</h3>
                <div class="close" onclick="closepic()">
                    <i class="fa fa-times"></i>
                </div>
                <div class="concolp">
                    <img src="../../static/images/adminImages/674c3e84efda6_ridel.png" alt="">
                    <img src="../../static/images/adminImages/674c3ec0016ad_yuna still my love.jpg" alt="">
                    <img src="../../static/images/adminImages/67506abb8f766_afd498b0-def3-4671-a05c-06623943cebd.jpeg" alt="">
                    <img src="../../static/images/adminImages/678bbd5f98b57_Untitled60_20240706210923 (1).png" alt="">
                    <img src="../../static/images/adminImages/6794aa0165f69_good-morning.png" alt="">
                    <img src="../../static/images/adminImages/tabs.png" alt="">
                </div>
            </div>

        </div> -->

    </div>


    <script src="../../static/javascript/header.js"></script>
    <script src="../../static/javascript/sidebar.js"></script>
    <script src="../../static/javascript/script.js"></script>

    <script>
        function seePicture() {
            const picsforverification = document.getElementById('picsforverification');
            const psee = document.getElementById('psee');

            if (picsforverification.style.height === '15rem') {
                picsforverification.style.height = '0rem';
                psee.textContent = "Show Pictures";
            } else {
                picsforverification.style.height = '15rem';
                psee.textContent = "Hide Pictures";
            }
        }
    </script>

    <script>
        function pshowpic() {
            const overlay = document.getElementById('showVehicleImage');

            overlay.style.display = 'flex';
        }

        function closepic() {
            const overlay = document.getElementById('showVehicleImage');

            overlay.style.display = 'none';
        }
    </script>
</body>

</html>