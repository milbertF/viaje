<?php

include_once "../../php/accountVerification.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaje / Account Verification</title>
    <link rel="shortcut icon" href="../../static/images/logo/logoViaje.png" type="image/x-icon">
    <link rel="stylesheet" href="../../static/stylesheet/components/style.css">
    <link rel="stylesheet" href="../../static/stylesheet/css/accountVerification.css">
</head>







<body>
    <div class="whole">
        <!-- header -->
        <main-header user-role="<?= htmlspecialchars($userRole) ?>" profile-picture="<?= htmlspecialchars($_SESSION['profile_picture'] ? '../' . $_SESSION['profile_picture'] : '../../static/images/logo/landscape-placeholder.svg') ?>"></main-header>
        <div class="con">
            <!-- sidebar -->
            <main-sidemenu user-role="<?= htmlspecialchars($userRole) ?>"></main-sidemenu>



            <!-- container -->
            <div class="container">
                <!-- title -->
                <div class="titleTop">
                    <p>Account Verification</p>
                </div>
                <!-- wrapper-->
                <div class="wrap">

                    <div class="searchcon">
                        <svg class="icon" aria-hidden="true" viewBox="0 0 24 24">
                            <g>
                                <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
                            </g>
                        </svg>
                        <input type="text" name="searchAccountVerification" id="searchInput" placeholder="Search accounts" onkeyup="searchAccounts()">
                    </div>

                    <!-- content -->
                    <div class="content">






                        <div class="radioBtn">
                            <div class="rbtnCon">
                                <input type="radio" name="radioBtnVer" id="Pending" value="Pending" onclick="filterByStatus(this.value)" checked>
                                <label for="Pending">Pending</label>
                            </div>
                            <div class="rbtnCon">
                                <input type="radio" name="radioBtnVer" id="Approved" value="Approved" onclick="filterByStatus(this.value)">
                                <label for="Approved">Approved</label>
                            </div>
                            <div class="rbtnCon">
                                <input type="radio" name="radioBtnVer" id="Declined" value="Declined" onclick="filterByStatus(this.value)">
                                <label for="Declined">Declined</label>
                            </div>
                            <div class="rbtnCon">
                                <input type="radio" name="radioBtnVer" id="Suspended" value="Suspended" onclick="filterByStatus(this.value)">
                                <label for="Suspended">Suspended</label>
                            </div>
                            <div class="rbtnCon">
                                <input type="radio" name="radioBtnVer" id="Terminated" value="Terminated" onclick="filterByStatus(this.value)">
                                <label for="Terminated">Terminated</label>
                            </div>
                        </div>
                        <div class="zzz">
                            <div class="tools">
                                <i class="fa-solid fa-filter" onclick="toolToggle()">
                                    <div class="toolsFilterCon" id="toolsFilterCon" style="display: none;">
                                        <h4>Filter</h4>
                                        <div class="tf">
                                            <label for="personalTool">Personal Information</label>
                                            <input type="checkbox" name="toolFilter" id="personalTool" checked>
                                        </div>
                                        <div class="tf">
                                            <label for="addressTool">Address</label>
                                            <input type="checkbox" name="toolFilter" id="addressTool">
                                        </div>
                                        <div class="tf">
                                            <label for="vehicleTool">Vehicle Information</label>
                                            <input type="checkbox" name="toolFilter" id="vehicleTool">
                                        </div>
                                    </div>
                                </i>
                            </div>
                            <div class="tableCon2">
                                <table>
                                    <tr class="trheader">
                                        <td>Action</td>
                                        <td class="personalClass">License No.</td>
                                        <td class="personalClass">License Picture</td>
                                        <td class="personalClass">Face Picture</td>
                                        <td class="personalClass">Email</td>
                                        <td class="personalClass">First Name</td>
                                        <td class="personalClass">Last Name</td>
                                        <td class="personalClass">Middle Name</td>
                                        <td class="personalClass">Extension Name</td>
                                        <td class="personalClass">Gender</td>
                                        <td class="personalClass">Contact No.</td>
                                        <td class="AddressClass">Region</td>
                                        <td class="AddressClass">Province</td>
                                        <td class="AddressClass">Municipality</td>
                                        <td class="AddressClass">Barangay</td>
                                        <td class="AddressClass">Postal Code</td>
                                        <td class="AddressClass">Street</td>
                                        <td class="vehicleClass">Vehicle Type</td>
                                        <td class="vehicleClass">Vehicle Capacity</td>
                                        <td class="vehicleClass">Vehicle Plate No.</td>
                                        <td class="vehicleClass">Vehicle Make</td>
                                        <td class="vehicleClass">Vehicle Model</td>
                                        <td class="vehicleClass">Model Year</td>
                                        <td class="vehicleClass">Vehicle Color</td>
                                        <td class="vehicleClass">Vehicle Ownership</td>
                                        <td>Status</td>
                                    </tr>
                                    <?php if (!empty($rider)): ?>
                                        <?php foreach ($rider as $row): ?>
                                            <tr data-status="<?= htmlspecialchars($row['status']) ?>">
                                                <td>
                                                    <?php if ($row['status'] === 'Approved'): ?>
                                                        <button onclick="setSuspend(this)" data-id="<?= htmlspecialchars($row['rider_id']) ?>">Suspend</button>
                                                    <?php elseif ($row['status'] === 'Declined'): ?>
                                                        <button onclick="setDelete(this)" data-id="<?= htmlspecialchars($row['rider_id']) ?>">Delete</button>
                                                    <?php elseif ($row['status'] === 'Suspended'): ?>
                                                        <button onclick="setBackApproved(this)" data-id="<?= htmlspecialchars($row['rider_id']) ?>">Set Active</button>
                                                        <button onclick="setBTerminate(this)" data-id="<?= htmlspecialchars($row['rider_id']) ?>">Terminate</button>
                                                    <?php elseif ($row['status'] === 'Terminated'): ?>
                                                        <button onclick="setDelete(this)" data-id="<?= htmlspecialchars($row['rider_id']) ?>">Delete</button>
                                                    <?php else: ?>
                                                        <button onclick="openView(this)" data-id="<?= htmlspecialchars($row['rider_id']) ?>">View</button>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="personalClass"><?= htmlspecialchars($row['license_no']) ?></td>
                                                <td class="personalClass">
                                                    <img src="../<?= htmlspecialchars($row['license_picture']) ?>" alt="License Picture" style="width: 50px; height: auto;">
                                                </td>
                                                <td class="personalClass">
                                                    <img src="../<?= htmlspecialchars($row['face_picture']) ?>" alt="Face Picture" style="width: 50px; height: auto;">
                                                </td>
                                                <td class="personalClass"><?= htmlspecialchars($row['email_address']) ?></td>
                                                <td class="personalClass"><?= htmlspecialchars($row['first_name']) ?></td>
                                                <td class="personalClass"><?= htmlspecialchars($row['last_name']) ?></td>
                                                <td class="personalClass"><?= htmlspecialchars($row['middle_initial'] ?? 'N/A') ?></td>
                                                <td class="personalClass"><?= htmlspecialchars($row['name_extension'] ?? 'N/A') ?></td>
                                                <td class="personalClass"><?= htmlspecialchars($row['gender']) ?></td>
                                                <td class="personalClass"><?= htmlspecialchars($row['mobile_number']) ?></td>
                                                <td class="AddressClass"><?= htmlspecialchars($row['region']) ?></td>
                                                <td class="AddressClass"><?= htmlspecialchars($row['province']) ?></td>
                                                <td class="AddressClass"><?= htmlspecialchars($row['municipality']) ?></td>
                                                <td class="AddressClass"><?= htmlspecialchars($row['barangay']) ?></td>
                                                <td class="AddressClass"><?= htmlspecialchars($row['postal_code']) ?></td>
                                                <td class="AddressClass"><?= htmlspecialchars($row['street']) ?></td>
                                                <td class="vehicleClass"><?= htmlspecialchars($row['vehicle_type']) ?></td>
                                                <td class="vehicleClass"><?= htmlspecialchars($row['vehicle_capacity']) ?></td>
                                                <td class="vehicleClass"><?= htmlspecialchars($row['vehicle_plate_no']) ?></td>
                                                <td class="vehicleClass"><?= htmlspecialchars($row['vehicle_make']) ?></td>
                                                <td class="vehicleClass"><?= htmlspecialchars($row['vehicle_model']) ?></td>
                                                <td class="vehicleClass"><?= htmlspecialchars($row['model_year']) ?></td>
                                                <td class="vehicleClass"><?= htmlspecialchars($row['vehicle_color']) ?></td>
                                                <td class="vehicleClass"><?= htmlspecialchars($row['vehicle_ownership']) ?></td>
                                                <td><?= htmlspecialchars($row['status']) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="25">No records found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <p onclick="redirect('riderDetails.php')"></p>
                </div>
            </div>
        </div>
    </div>





    <!-- <div class="add-Account-Container" id="add-Account-Container" style="display: none;">
        <div class="close" onclick="closeAddAccounts()">
            <i class="fa fa-times"></i>
        </div>

        <div class="picview viewcon">
            <div class="picviewLicense">
                <img id="licenceplaceholder" src="../../static/images/logo/landscape-placeholder.svg" alt="License Picture">
            </div>
            <div class="picviewFace">
                <img id="faceplaceholder" src="../../static/images/logo/landscape-placeholder.svg" alt="Face Picture">
            </div>
        </div>
        <div class="infoview viewcon">
            <div class="infoform">
                <h3>Personal Information</h3>
                <div class="inpPart">
                    <label>Email Address</label>
                    <div class="input">
                        <input type="email" name="email" readonly>
                    </div>
                </div>
                <div class="inpPart">
                    <label>First Name</label>
                    <div class="input">
                        <input type="text" name="firstName" readonly>
                    </div>
                </div>
                <div class="inpPart">
                    <label>Last Name</label>
                    <div class="input">
                        <input type="text" name="lastName" readonly>
                    </div>
                </div>
                <div class="inpPart">
                    <label>Middle Name</label>
                    <div class="input">
                        <input type="text" name="middleName" readonly>
                    </div>
                </div>
                <div class="inpPart">
                    <label>Extension Name</label>
                    <div class="input">
                        <input type="text" name="extensionName" readonly>
                    </div>
                </div>
                <div class="inpPart">
                    <label>Gender</label>
                    <div class="input">
                        <input type="text" name="gender" readonly>
                    </div>
                </div>
                <div class="inpPart">
                    <label>Contact No.</label>
                    <div class="input">
                        <input type="text" name="contactNo" readonly>
                    </div>
                </div>

                <h3>Address</h3>
                <div class="inpPart">
                    <label>Region</label>
                    <div class="input">
                        <input type="text" name="region" readonly>
                    </div>
                </div>
                <div class="inpPart">
                    <label>Province</label>
                    <div class="input">
                        <input type="text" name="province" readonly>
                    </div>
                </div>
                <div class="inpPart">
                    <label>Municipality</label>
                    <div class="input">
                        <input type="text" name="municipality" readonly>
                    </div>
                </div>
                <div class="inpPart">
                    <label>Barangay</label>
                    <div class="input">
                        <input type="text" name="barangay" readonly>
                    </div>
                </div>
                <div class="inpPart">
                    <label>Postal Code</label>
                    <div class="input">
                        <input type="text" name="postalCode" readonly>
                    </div>
                </div>
                <div class="inpPart">
                    <label>Street</label>
                    <div class="input">
                        <input type="text" name="street" readonly>
                    </div>
                </div>

                <h3>Vehicle Information</h3>
                <div class="inpPart">
                    <label>Vehicle Type</label>
                    <div class="input">
                        <input type="text" name="vehicleType" readonly>
                    </div>
                </div>
                <div class="inpPart">
                    <label>Vehicle Plate No.</label>
                    <div class="input">
                        <input type="text" name="vehiclePlateNo" readonly>
                    </div>
                </div>
                <div class="inpPart">
                    <label>Vehicle Make</label>
                    <div class="input">
                        <input type="text" name="vehicleMake" readonly>
                    </div>
                </div>
                <div class="inpPart">
                    <label>Vehicle Model</label>
                    <div class="input">
                        <input type="text" name="vehicleModel" readonly>
                    </div>
                </div>
                <div class="inpPart">
                    <label>Model Year</label>
                    <div class="input">
                        <input type="text" name="vehicleModelYear" readonly>
                    </div>
                </div>
                <div class="inpPart">
                    <label>Vehicle Color</label>
                    <div class="input">
                        <input type="text" name="vehicleColor" readonly>
                    </div>
                </div>
                <div class="inpPart">
                    <label>Vehicle Ownership</label>
                    <div class="input">
                        <input type="text" name="vehicleOwnership" readonly>
                    </div>
                </div>
            </div>
            <div class="btnVerify">
                <button onclick="openSetPassword(document.getElementById('add-Account-Container').getAttribute('data-rider-id'))">Approve</button>


                <button onclick="setDecline(this)" data-id="<?= htmlspecialchars($row['rider_id']) ?>">Decline</button>
            </div>
        </div>
        <div class="setPassword" id="setPassword" style="display: none;">
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



    </div> -->


    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            filterByStatus("Pending");
        });

        function filterByStatus(status) {

            const rows = document.querySelectorAll("tr[data-status]");

            rows.forEach(row => {

                if (row.getAttribute("data-status") === status) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }
    </script>














    <script src="../../static/javascript/header.js"></script>
    <script src="../../static/javascript/sidebar.js"></script>
    <script src="../../static/javascript/script.js"></script>
    <script src="../../static/javascript/accountVerification.js"></script>


    <script>
        function setSuspend(button) {
            const riderId = button.getAttribute('data-id');
            updateStatus(riderId, 'Suspended');
        }

        function setBackApproved(button) {
            const riderId = button.getAttribute('data-id');
            updateStatus(riderId, 'Approved');
        }

        function setBTerminate(button) {
            const riderId = button.getAttribute('data-id');
            updateStatus(riderId, 'Terminated');
        }

        function setDelete(button) {
            const riderId = button.getAttribute('data-id');
            if (confirm('Are you sure you want to delete this rider?')) {
                deleteRider(riderId);
            }
        }

        function updateStatus(riderId, status) {
            fetch('../../php/riderStatusHandler.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        action: 'updateStatus',
                        rider_id: riderId,
                        status
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Status updated successfully!');
                        location.reload();
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function deleteRider(riderId) {
            fetch('../../php/riderStatusHandler.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        action: 'deleteRider',
                        rider_id: riderId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Rider deleted successfully!');
                        location.reload();
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function setDecline(button) {
            const riderId = button.getAttribute('data-id');

            // Confirm action
            if (!confirm("Are you sure you want to decline this rider?")) {
                return;
            }

            // Send status update to backend
            fetch('../../php/riderStatusHandler.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        action: 'updateStatus',
                        rider_id: riderId,
                        status: 'Declined',
                    }),
                })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        alert('Rider has been declined.');
                        location.reload(); // Reload to update the view
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch((error) => {
                    console.error('Error declining rider:', error);
                    alert('Failed to decline rider. Please try again.');
                });
        }
    </script>

    <script>
        function filterTable() {
            // Define the filters and their corresponding class names
            const filters = [{
                    checkbox: document.getElementById('personalTool'),
                    className: 'personalClass'
                },
                {
                    checkbox: document.getElementById('addressTool'),
                    className: 'AddressClass'
                },
                {
                    checkbox: document.getElementById('vehicleTool'),
                    className: 'vehicleClass'
                }
            ];

            // Select all headers (first row)
            const headers = document.querySelector('.trheader').children;

            // Select all rows in the body
            const rows = document.querySelectorAll('table tr:not(.trheader)');

            // Loop through headers to toggle visibility
            for (let i = 0; i < headers.length; i++) {
                const header = headers[i];
                const headerClass = header.className;

                // Determine if the column should be shown or hidden
                const shouldShow = filters.some(filter =>
                    headerClass.includes(filter.className) && filter.checkbox.checked
                );

                // Always show "Action" and "Status"
                if (header.textContent.trim() === "Action" || header.textContent.trim() === "Status") {
                    header.classList.remove('hidden');
                    rows.forEach(row => row.children[i].classList.remove('hidden'));
                } else {
                    // Toggle visibility for both headers and body cells
                    header.classList.toggle('hidden', !shouldShow);
                    rows.forEach(row => row.children[i].classList.toggle('hidden', !shouldShow));
                }
            }
        }

        // Add event listeners to checkboxes
        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', filterTable);
        });

        // Initialize visibility on page load
        document.addEventListener('DOMContentLoaded', filterTable);
    </script>


    <script>
        function toolToggle() {
            const toolsFilterCon = document.getElementById('toolsFilterCon');

            if (toolsFilterCon.style.display === "none") {
                toolsFilterCon.style.display = "block";
            } else {
                toolsFilterCon.style.display = "none";
            }
        }
    </script>

</body>

</html>