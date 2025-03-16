<?php
include "../../php/riderDetailsFetch.php";


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
                    <p>Rider Details of </strong> <?= htmlspecialchars($rider['rider_id'] ?? 'N/A') ?></p>
                </div>
                <!-- wrapper-->
                <div class="wrap2">
                    <div class="content2">
                        <div class="btnBack">
                            <button onclick="redirect('accountVerification.php')">Back</button>
                        </div>
                        <p class="psee" id="psee" onclick="seePicture()">Show Picture</p>
                        <div class="picsforverification" id="picsforverification">
                            <div class="picCon">
                                <div class="pics2 picslicense" onclick="openPreviewL()">
                                    <img src="../<?= htmlspecialchars($rider['license_picture']) ?>" alt="License Picture">
                                    <p>License Picture</p>
                                </div>
                                <div class="pics2 picsface" onclick="openPreviewF()">
                                    <img src="../<?= htmlspecialchars($rider['face_picture']) ?>" alt="Face Picture">
                                    <p>Face Picture</p>
                                </div>
                            </div>
                            <p class="lisp"></strong> <?= htmlspecialchars($rider['license_no'] ?? 'N/A') ?></p>
                        </div>
                        <div class="parDetails detp">
                            <h3>Personal Information</h3>
                            <div class="ext">
                                <p>Email Address:</p>
                                <p></strong> <?= htmlspecialchars($rider['email_address'] ?? 'N/A') ?></p>
                            </div>
                            <div class="ext">
                                <p>First Name:</p>
                                <p><?= htmlspecialchars($rider['first_name']) ?></p>
                            </div>
                            <div class="ext">
                                <p>Last Name:</p>
                                <p><?= htmlspecialchars($rider['last_name']) ?></p>
                            </div>
                            <div class="ext">
                                <p>Middle Name:</p>
                                <p><?= htmlspecialchars($rider['middle_initial'] ?? 'N/A') ?></p>
                            </div>
                            <div class="ext">
                                <p>Extension Name:</p>
                                <p><?= htmlspecialchars($rider['name_extension'] ?? 'N/A') ?></p>
                            </div>
                            <div class="ext">
                                <p>Gender:</p>
                                <p><?= htmlspecialchars($rider['gender']) ?></p>
                            </div>
                            <div class="ext">
                                <p>Contact No.:</p>
                                <p><?= htmlspecialchars($rider['mobile_number']) ?></p>
                            </div>
                        </div>
                        <div class="parDetails detp">
                            <h3>Address</h3>
                            <div class="ext">
                                <p>Region</p>
                                <p></strong> <?= htmlspecialchars($rider['region'] ?? 'N/A') ?></p>
                            </div>
                            <div class="ext">
                                <p>Province</p>
                                <p></strong> <?= htmlspecialchars($rider['province'] ?? 'N/A') ?></p>
                            </div>
                            <div class="ext">
                                <p>Municipality</p>
                                <p></strong> <?= htmlspecialchars($rider['municipality'] ?? 'N/A') ?></p>
                            </div>
                            <div class="ext">
                                <p>Barangay</p>
                                <p></strong> <?= htmlspecialchars($rider['barangay'] ?? 'N/A') ?></p>
                            </div>
                            <div class="ext">
                                <p>Postal Code</p>
                                <p></strong> <?= htmlspecialchars($rider['postal_code'] ?? 'N/A') ?></p>
                            </div>
                            <div class="ext">
                                <p>Street</p>
                                <p></strong> <?= htmlspecialchars($rider['street'] ?? 'N/A') ?></p>
                            </div>
                        </div>
                        <div class="parDetails">
                            <h3>Vehicle Information</h3>
                            <div class="partv">
                                <div class="vehicleDetails detp">
                                    <div class="ext">
                                        <p>Vehicle Type</p>
                                        <p></strong> <?= htmlspecialchars($rider['vehicle_type'] ?? 'N/A') ?></p>
                                    </div>
                                    <div class="ext">
                                        <p>Vehicle Plate No.</p>
                                        <p></strong> <?= htmlspecialchars($rider['vehicle_plate_no'] ?? 'N/A') ?></p>
                                    </div>
                                    <div class="ext">
                                        <p>Vehicle Make</p>
                                        <p></strong> <?= htmlspecialchars($rider['vehicle_make'] ?? 'N/A') ?></p>
                                    </div>
                                    <div class="ext">
                                        <p>Vehicle Model</p>
                                        <p></strong> <?= htmlspecialchars($rider['vehicle_model'] ?? 'N/A') ?></p>
                                    </div>
                                    <div class="ext">
                                        <p>Model Year</p>
                                        <p></strong> <?= htmlspecialchars($rider['model_year'] ?? 'N/A') ?></p>
                                    </div>
                                    <div class="ext">
                                        <p>Vehicle Color</p>
                                        <p></strong> <?= htmlspecialchars($rider['vehicle_color'] ?? 'N/A') ?></p>
                                    </div>
                                    <div class="ext">
                                        <p>Vehicle Ownership</p>
                                        <p></strong> <?= htmlspecialchars($rider['vehicle_ownership'] ?? 'N/A') ?></p>
                                    </div>
                                    <p class="svi" onclick="openSVI()">show Vehicle Images</p>
                                </div>
                                <div class="bar"></div>
                            </div>
                        </div>
                        <div class="btnRD">
                            <button onclick="openSetPassword2(document.getElementById('add-Account-Container').getAttribute('data-rider-id'))">Approve</button>


                            <button onclick="setDecline(this)" data-id="<?= htmlspecialchars($row['rider_id']) ?>">Decline</button>

                        </div>


                    </div>

                </div>

            </div>
        </div>

        <div class="setPassword" id="setPassword" style="display: flex;">
            <div class="setPasswordBox">
                <h1>Set Password for Rider</h1>
                <div class="inpPart">
                    <label>Generated Password</label>
                    <div class="input">
                        <input type="password" name="generatedPassword" required>
                    </div>
                    <label>Confirm Password</label>
                    <div class="input">
                        <input type="password" name="confirmPassword" required>
                    </div>
                </div>
                <div class="inpPart">
                    <label>
                        <input type="checkbox" id="showPasswordCheckbox" onclick="toggleAllPasswords()"> Show Password
                    </label>
                </div>
                <div class="setPassBtn">
                    <button onclick="closeSetPassword()">Cancel</button>
                    <button onclick="confirmPassword()">Confirm</button>


                    <div id="loadingIndicator" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1000; justify-content: center; align-items: center;">
                        <div style="background: white; padding: 20px; border-radius: 10px; text-align: center; position: relative;">
                            <button onclick="hideLoading()" style="position: absolute; top: 10px; right: 10px; background: none; border: none; font-size: 18px; cursor: pointer;">&times;</button>
                            <div class="spinner" id="loadingSpinner" style="margin-bottom: 10px;">
                                <div style="width: 30px; height: 30px; border: 4px solid #ccc; border-top: 4px solid #4CAF50; border-radius: 50%; animation: spin 1s linear infinite;"></div>
                            </div>
                            <p id="loadingMessage" style="font-size: 16px; color: #333;">Processing, please wait...</p>
                        </div>
                    </div>

                    <style>
                        @keyframes spin {
                            0% {
                                transform: rotate(0deg);
                            }

                            100% {
                                transform: rotate(360deg);
                            }
                        }
                    </style>


                </div>
            </div>
        </div>


        <div class="showVehicleImage" id="showVehicleImage">
            <div class="tith3">
                <h3>Vehicle Images</h3>
                <div class="close" onclick="closeSVI()">
                    <i class="fa fa-times"></i>
                </div>
            </div>

            <div class="conVImages">
                <div class="conv">
                    <p>Front View</p>
                    <div class="IV">
                        <img src="../<?= htmlspecialchars($rider['frontview_image']) ?>" alt="">
                    </div>
                </div>
                <div class="conv">
                    <p>Side View</p>
                    <div class="IV">
                        <img src="../<?= htmlspecialchars($rider['sideview_image']) ?>" alt="">
                    </div>
                </div>
                <div class="conv">
                    <p>Back View</p>
                    <div class="IV">
                        <img src="../<?= htmlspecialchars($rider['backview_image']) ?>" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="previewPic" onclick="closePreview()" id="previewPicL">
            <img src="../<?= htmlspecialchars($rider['license_picture']) ?>" alt="License Picture">
        </div>
        <div class="previewPic" onclick="closePreview()" id="previewPicF">
            <img src="../<?= htmlspecialchars($rider['face_picture']) ?>" alt="Face Picture">
        </div>

    </div>


    <script src="../../static/javascript/header.js"></script>
    <script src="../../static/javascript/sidebar.js"></script>
    <script src="../../static/javascript/script.js"></script>
    <script src="../../static/javascript/accountVerification.js"></script>

    <script>
        function seePicture() {
            const picsforverification = document.getElementById('picsforverification');
            const psee = document.getElementById('psee');

            if (picsforverification.style.height === '17rem') {
                picsforverification.style.height = '0rem';
                psee.textContent = "Show Pictures";
            } else {
                picsforverification.style.height = '17rem';
                psee.textContent = "Hide Pictures";
            }
        }
    </script>

    <script>
        function openPreviewL() {
            const previewPicL = document.getElementById('previewPicL');
            previewPicL.style.display = 'flex';
        }

        function openPreviewF() {
            const previewPicF = document.getElementById('previewPicF');
            previewPicF.style.display = 'flex';
        }

        function closePreview() {
            const previewPicL = document.getElementById('previewPicL');
            const previewPicF = document.getElementById('previewPicF');
            previewPicL.style.display = 'none';
            previewPicF.style.display = 'none';
        }
    </script>

    <script>
        function closeSVI() {
            const showVehicleImage = document.getElementById('showVehicleImage');
            showVehicleImage.style.display = 'none';
        }

        function openSVI() {
            const showVehicleImage = document.getElementById('showVehicleImage');
            showVehicleImage.style.display = 'flex';
        }
    </script>

</body>

</html>