<?php
include_once "../../php/accountManager.php";

if (!isset($_SESSION['adminID'])) {
    header("Location: ../loginPage/index.php");
    exit();
}

ini_set('display_errors', 1);
error_reporting(E_ALL);

$query = "SELECT * FROM `viaje_admin`";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}


$successMessage = $_SESSION['successMessage'] ?? null;
$errorMessage = $_SESSION['errorMessage'] ?? null;


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
    <title>Viaje / Account Manager</title>
    <link rel="shortcut icon" href="../../static/images/logo/logoViaje.png" type="image/x-icon">
    <link rel="stylesheet" href="../../static/stylesheet/components/style.css">
    <link rel="stylesheet" href="../../static/stylesheet/css/accountManager.css">
</head>

<body>
    <div class="whole">

        <?php if ($successMessage): ?>
            <div class="modals success-message" role="dialog">
                <p><?php echo htmlspecialchars($successMessage); ?></p>
            </div>
        <?php endif; ?>

        <?php if ($errorMessage): ?>
            <div class="modals error-message" role="dialog">
                <p><?php echo htmlspecialchars($errorMessage); ?></p>
            </div>
        <?php endif; ?>

        <!-- header -->
        <main-header user-role="<?= htmlspecialchars($userRole) ?>" profile-picture="<?= htmlspecialchars($_SESSION['profile_picture'] ? '../' . $_SESSION['profile_picture'] : '../../static/images/logo/landscape-placeholder.svg') ?>"></main-header>
        <div class="con">
            <!-- sidebar -->
            <main-sidemenu user-role="<?= htmlspecialchars($userRole) ?>"></main-sidemenu>



            <!-- container -->
            <div class="container">
                <!-- title -->
                <div class="titleTop">
                    <p>Account Manager</p>
                </div>
                <!-- wrapper-->
                <div class="wrap">

                    <div class="searchcon">
                        <svg class="icon" aria-hidden="true" viewBox="0 0 24 24">
                            <g>
                                <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
                            </g>
                        </svg>
                        <input type="text" id="searchInput" placeholder="Search accounts" onkeyup="searchAccounts()">
                    </div>

                    <!-- content -->
                    <div class="content">






                        <div class="radioBtn">
                            <div class="rbtnCon">
                                <input type="radio" name="radioBtnMan" id="UsersManager" checked>
                                <label for="UsersManager">Users</label>
                            </div>
                            <div class="rbtnCon">
                                <input type="radio" name="radioBtnMan" id="RiderManager">
                                <label for="RiderManager">Riders</label>
                            </div>
                        </div>

                        <div class="tableCon active" id="tableConUser">
                            <table>
                                <tr class="trheader">
                                    <td>Action</td>
                                    <td>First Name</td>
                                    <td>Last Name</td>
                                    <td>Mobile Number</td>
                                    <td>Self Description</td>
                                </tr>
                                <?php if (!empty($users)): ?>
                                    <?php foreach ($users as $row): ?>
                                        <tr>
                                            <td>
                                                <button onclick="openEditUser(this)" data-id="<?= htmlspecialchars($row['id']) ?>">Edit</button>
                                            </td>
                                            <td><?= htmlspecialchars($row['first_name']) ?></td>
                                            <td><?= htmlspecialchars($row['last_name']) ?></td>
                                            <td><?= htmlspecialchars($row['mobile_number']) ?></td>
                                            <td><?= htmlspecialchars($row['self_description'], 0) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5">No records found.</td>
                                    </tr>
                                <?php endif; ?>
                            </table>
                        </div>

                        <div class="tableCon" id="tableConRider" style="display: none;">
                            <table>
                                <tr class="trheader">
                                    <td>Action</td>
                                    <td>License no.</td>
                                    <td>License Picture</td>
                                    <td>Face Picture</td>
                                    <td>Email</td>
                                    <td>First Name</td>
                                    <td>Last Name</td>
                                    <td>Middle Name</td>
                                    <td>Extention Name</td>
                                    <td>Gender</td>
                                    <td>Contact No.</td>
                                    <td>Region</td>
                                    <td>Province</td>
                                    <td>Municipality</td>
                                    <td>Barangay</td>
                                    <td>Postal Code</td>
                                    <td>Street</td>
                                    <td>Vehicle Type</td>
                                    <td>Vehicle Plate no.</td>
                                    <td>Vehicle Make</td>
                                    <td>Vehicle Model</td>
                                    <td>Model Year</td>
                                    <td>Vehicle Color</td>
                                    <td>Vehicle Ownership</td>
                                </tr>
                                <?php if (!empty($resultRider)): ?>
                                    <?php foreach ($resultRider as $row): ?>
                                        <tr>
                                            <td>
                                                <button onclick="openEditRider(this)" data-rider_id="<?= ($row['rider_id']) ?>">Edit</button>
                                            </td>
                                            <td><?= htmlspecialchars($row['license_no']) ?></td>
                                            <td>
                                                <img src="../<?= htmlspecialchars($row['license_picture']) ?>" alt="License Picture" style="width: 50px; height: auto;">
                                            </td>
                                            <td>
                                                <img src="../<?= htmlspecialchars($row['face_picture']) ?>" alt="Face Picture" style="width: 50px; height: auto;">
                                            </td>
                                            <td><?= htmlspecialchars($row['email_address']) ?></td>
                                            <td><?= htmlspecialchars($row['first_name']) ?></td>
                                            <td><?= htmlspecialchars($row['last_name']) ?></td>
                                            <td><?= htmlspecialchars($row['middle_initial'] ?? 'N/A') ?></td>
                                            <td><?= htmlspecialchars($row['name_extension'] ?? 'N/A') ?></td>
                                            <td><?= htmlspecialchars($row['gender']) ?></td>
                                            <td><?= htmlspecialchars($row['mobile_number']) ?></td>
                                            <td><?= htmlspecialchars($row['region']) ?></td>
                                            <td><?= htmlspecialchars($row['province']) ?></td>
                                            <td><?= htmlspecialchars($row['municipality']) ?></td>
                                            <td><?= htmlspecialchars($row['barangay']) ?></td>
                                            <td><?= htmlspecialchars($row['postal_code']) ?></td>
                                            <td><?= htmlspecialchars($row['street']) ?></td>
                                            <td><?= htmlspecialchars($row['vehicle_type']) ?></td>
                                            <td><?= htmlspecialchars($row['vehicle_plate_no']) ?></td>
                                            <td><?= htmlspecialchars($row['vehicle_make']) ?></td>
                                            <td><?= htmlspecialchars($row['vehicle_model']) ?></td>
                                            <td><?= htmlspecialchars($row['model_year']) ?></td>
                                            <td><?= htmlspecialchars($row['vehicle_color']) ?></td>
                                            <td><?= htmlspecialchars($row['vehicle_ownership']) ?></td>
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
            </div>
        </div>





        <div class="add-Account-Container" id="add-Account-Container" style="display: none;">
            <div class="close" onclick="closeAddAccounts()">
                <i class="fa fa-times"></i>
            </div>

            <div class="wrapManage" id="wrapManageRider">
                <div></div>
                <form class="formEditRider" action="">
                    <div class="formCon">
                        <h3>Personal Information</h3>
                        <div class="inpPart">
                            <label>Email Address</label>
                            <div class="input">
                                <input type="email" name="email_address_rider">
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>First Name</label>
                            <div class="input">
                                <input type="text" name="first_name_rider">
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Last Name</label>
                            <div class="input">
                                <input type="text" name="last_name_rider">
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Middle Name</label>
                            <div class="input">
                                <input type="text" name="middle_initial_rider">
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Extention Name</label>
                            <div class="input">
                                <input type="text" name="name_extension_rider" list="extention">
                                <datalist id="extention">
                                    <option value="jr."></option>
                                    <option value="sr."></option>
                                    <option value="III"></option>
                                </datalist>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Gender</label>
                            <div class="input">
                                <select name="gender_rider">
                                    <option disabled selected style="display: none;"></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Contact No.</label>
                            <div class="input">
                                <input type="number" name="mobile_number_rider">
                            </div>
                        </div>
                    </div>
                    <div class="formCon">
                        <h3>Address</h3>
                        <div class="inpPart">
                            <label>Region</label>
                            <div class="input">
                                <select name="region" id="region" name="region_rider">
                                    <option value="" hidden>* Select Region</option>
                                </select>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Province</label>
                            <div class="input">
                                <select name="province" id="province" disabled name="province_rider">
                                    <option value="" hidden>* Select Province</option>
                                </select>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Municipality</label>
                            <div class="input">
                                <select name="municipality" id="municipality" disabled name="municipality_rider">
                                    <option value="" hidden>* Select Municipality</option>
                                </select>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Barangay</label>
                            <div class="input">
                                <select name="barangay" id="barangay" disabled name="barangay_rider">
                                    <option value="" hidden>* Select Barangay</option>
                                </select>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Postal Code</label>
                            <div class="input">
                                <input type="number" name="postal_code_rider">
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Street</label>
                            <div class="input">
                                <input type="text" name="street_rider">
                            </div>
                        </div>
                    </div>
                    <div class="formCon">
                        <h3>Verification</h3>
                        <div class="inpPart">
                            <label>Licence no.</label>
                            <div class="input">
                                <input type="text" name="license_no">
                            </div>
                        </div>


                        <input type="hidden" name="license_picture_rider" id="editExistingImage">
                        <div class="inpPart">
                            <label for="">License Picture</label>
                            <div class="imageUpload">
                                <img id="licenceplaceholder" src="../../static/images/logo/landscape-placeholder.svg" alt="">
                                <label for="piclicence"></label>
                                <div class="input">
                                    <input type="hidden" name="license_picture_rider" id="piclicence" value="<?= htmlspecialchars($imagePath) ?>">
                                </div>
                            </div>
                        </div>


                        <input type="hidden" name="existing_image" id="editExistingImage">
                        <div class="inpPart">
                            <label for="">Face Picture</label>
                            <div class="imageUpload">
                                <img id="faceplaceholder" src="../../static/images/logo/landscape-placeholder.svg" alt="">
                                <label for="picface"></label>
                                <div class="input">
                                    <input type="file" name="face_picture_rider" id="picface" accept="image/*" onchange="previewImageAdd2(event)">
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="formCon">
                        <h3>Vehicle Information</h3>
                        <div class="inpPart">
                            <label>Vehicle Type</label>
                            <div class="input">
                                <select name="vehicle_type_rider">
                                    <option disabled selected style="display: none;"></option>
                                    <option value="Car">Car</option>
                                    <option value="Motorcycle">Motorcycle</option>
                                    <option value="Tricycle">Tricycle</option>
                                    <option value="Auto Rickshaw (tuktuk)">Auto Rickshaw (tuktuk)</option>
                                </select>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Vehicle Plate No.</label>
                            <div class="input">
                                <input type="text" name="vehicle_plate_no_rider">
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Vehicle Make</label>
                            <div class="input">
                                <input type="text" name="vehicle_make_rider">
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Vehicle Model</label>
                            <div class="input">
                                <input type="text" name="vehicle_model_rider">
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Model Year</label>
                            <div class="input">
                                <select name="model_year_rider" id="yearSelect">
                                    <option disabled selected style="display: none;"></option>
                                    <option disabled>Model Year</option>
                                </select>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Vehicle Color</label>
                            <div class="input">
                                <input type="text" name="vehicle_color_rider">
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Vehicle Ownership</label>
                            <div class="input">
                                <select name="vehicle_ownership_rider">
                                    <option disabled selected style="display: none;"></option>
                                    <option value="Owned">Owned</option>
                                    <option value="Borrowed / Rented">Borrowed / Rented</option>
                                    <option value="Second Hand">Second Hand</option>
                                    <option value="Repossessed">Repossessed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="btnManager">
                        <button>Reset</button>
                        <button>Commit</button>
                    </div>
                </form>

                <div></div>
            </div>


            <div class="wrapManage" id="wrapManageUser">
                <div class="formCon formConUser">
                    <form class="form" action="../../php/update_user.php" method="POST">
                        <h3>User Information</h3>
                        <input type="hidden" name="id" value="">
                        <div class="inpPart">
                            <label>First Name</label>
                            <div class="input">
                                <input type="text" name="first_name">
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Last Name</label>
                            <div class="input">
                                <input type="text" name="last_name">
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Mobile Number</label>
                            <div class="input">
                                <input type="number" name="mobile_number">
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Self Description</label>
                            <div class="input">
                                <input type="text" name="self_description">
                            </div>
                        </div>
                        <div class="btnUserManage">
                            <button type="reset">Reset</button>
                            <button type="submit">Commit</button>
                        </div>
                    </form>

                </div>
            </div>




        </div>
    </div>


    <script src="../../static/javascript/header.js"></script>
    <script src="../../static/javascript/sidebar.js"></script>
    <script src="../../static/javascript/script.js"></script>


    <!-- Preview image uploaded -->
    <script>
        function previewImageAdd1(event) {
            const input = event.target;
            const reader = new FileReader();
            reader.onload = function() {
                const img = document.getElementById('licenceplaceholder');
                img.src = reader.result;
            };
            reader.readAsDataURL(input.files[0]);
        }

        function previewImageAdd2(event) {
            const input = event.target;
            const reader = new FileReader();
            reader.onload = function() {
                const img = document.getElementById('faceplaceholder');
                img.src = reader.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>

    <script>
        const UsersManager = document.getElementById('UsersManager');
        const RiderManager = document.getElementById('RiderManager');
        const tableConUser = document.getElementById('tableConUser');
        const tableConRider = document.getElementById('tableConRider');

        function toggleTables() {
            if (UsersManager.checked) {
                tableConUser.style.display = 'block';
                tableConRider.style.display = 'none';
            } else if (RiderManager.checked) {
                tableConUser.style.display = 'none';
                tableConRider.style.display = 'block';
            }
        }

        // Attach event listeners to the radio buttons
        UsersManager.addEventListener('change', toggleTables);
        RiderManager.addEventListener('change', toggleTables);

        // Initial call to ensure the correct table is displayed on load
        toggleTables();
    </script>




    <script>
        function openEditUser(button) {
            const id = button.getAttribute('data-id');
            console.log("ID passed to openEditUser:", id);

            const viewContainer = document.getElementById("add-Account-Container");
            viewContainer.style.display = "flex";

            // Clear existing inputs
            const inputs = viewContainer.querySelectorAll("input");
            inputs.forEach((input) => (input.value = ""));

            // Fetch user data
            fetch(`../../php/fetch_users_details.php?id=${id}`)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then((data) => {
                    console.log("Data fetched from server:", data);

                    // Populate input fields
                    document.querySelector("[name='id']").value = id;
                    document.querySelector("[name='first_name']").value = data.first_name ?? "";
                    document.querySelector("[name='last_name']").value = data.last_name ?? "";
                    document.querySelector("[name='mobile_number']").value = data.mobile_number ?? "";
                    document.querySelector("[name='self_description']").value = data.self_description ?? "";
                })
                .catch((error) => {
                    console.error("Error fetching user details:", error);
                });


            const add = document.getElementById("add-Account-Container");
            const wrapManageRider = document.getElementById("wrapManageRider");
            const wrapManageUser = document.getElementById("wrapManageUser");
            add.style.display = "flex";
            wrapManageRider.style.display = "none";
            wrapManageUser.style.display = "flex";
        }
    </script>

    <script>
        function openEditRider(button) {
            const id = button.getAttribute("data-rider_id");
            console.log("ID passed to openEditRider:", id);

            const viewContainer = document.getElementById("add-Account-Container");
            viewContainer.style.display = "flex";

            // Clear existing inputs
            const inputs = viewContainer.querySelectorAll("input");
            inputs.forEach(input => (input.value = ""));

            // Fetch user data
            fetch(`../../php/fetch_edit_rider.php?rider_id=${id}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log("Fetched Data:", data);
                    if (data.error) {
                        console.error("Error from server:", data.error);
                        alert(data.error);
                        return;
                    }

                    // Populate fields safely
                    const safeSetValue = (selector, value) => {
                        const element = document.querySelector(selector);
                        if (element) {
                            element.value = value ?? "";
                        } else {
                            console.error(`Element not found for selector: ${selector}`);
                        }
                    };
                    safeSetValue("[name='email_address_rider']", data.email_address || "");
                    safeSetValue("[name='first_name_rider']", data.first_name || "");
                    safeSetValue("[name='last_name_rider']", data.last_name || "");
                    safeSetValue("[name='middle_initial_rider']", data.middle_initial || "");
                    safeSetValue("[name='name_extension_rider']", data.name_extension || "");
                    safeSetValue("[name='gender_rider']", data.gender || "");
                    safeSetValue("[name='mobile_number_rider']", data.mobile_number || "");

                    safeSetValue("[name='region_rider']", data.region || "");
                    safeSetValue("[name='province_rider']", data.province || "");
                    safeSetValue("[name='municipality_rider']", data.municipality || "");
                    safeSetValue("[name='barangay_rider']", data.barangay || "");
                    safeSetValue("[name='postal_code_rider']", data.postal_code || "");
                    safeSetValue("[name='street_rider']", data.street || "");

                    safeSetValue("[name='license_no']", data.license_no || "");
                    safeSetValue("[name='license_picture_rider']", data.license_picture || "");
                    safeSetValue("[name='face_picture_rider']", data.face_picture || "");

                    safeSetValue("[name='vehicle_type_rider']", data.vehicle_type || "");
                    safeSetValue("[name='vehicle_plate_no_rider']", data.vehicle_plate_no || "");
                    safeSetValue("[name='vehicle_make_rider']", data.vehicle_make || "");
                    safeSetValue("[name='vehicle_model_rider']", data.vehicle_model || "");
                    safeSetValue("[name='model_year_rider']", data.model_year || "");
                    safeSetValue("[name='vehicle_color_rider']", data.vehicle_color || "");
                    safeSetValue("[name='vehicle_ownership_rider']", data.vehicle_ownership || "");
                })
                .catch(error => {
                    console.error("Error fetching user details:", error);
                    alert(`An error occurred: ${error.message}`);
                });

            const add = document.getElementById("add-Account-Container");
            const wrapManageRider = document.getElementById("wrapManageRider");
            const wrapManageUser = document.getElementById("wrapManageUser");
            add.style.display = "flex";
            wrapManageRider.style.display = "flex";
            wrapManageUser.style.display = "none";
        }
    </script>

    <script>
        document.querySelector(".btnManager button[type='reset']").addEventListener('click', () => {
            const inputs = document.querySelectorAll("input, select");
            inputs.forEach(input => input.value = "");
            document.querySelector("#licenceplaceholder").src = "../../static/images/logo/landscape-placeholder.svg";
            document.querySelector("#faceplaceholder").src = "../../static/images/logo/landscape-placeholder.svg";
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const regionSelect = document.getElementById("region");
            const provinceSelect = document.getElementById("province");
            const municipalitySelect = document.getElementById("municipality");
            const barangaySelect = document.getElementById("barangay");

            const fetchData = (url) => {
                return fetch(url).then((response) => response.json());
            };

            const populateSelect = (selectElement, data, valueKey, textKey) => {
                selectElement.innerHTML = '<option value="" hidden>Select</option>';
                data.forEach((item) => {
                    const option = document.createElement("option");
                    option.value = item[textKey]; // Use name as the value
                    option.dataset.code = item[valueKey]; // Store code as a data attribute
                    option.textContent = item[textKey]; // Display name in dropdown
                    selectElement.appendChild(option);
                });
            };

            fetchData("../../static/json/region.json").then((data) => {
                populateSelect(regionSelect, data, "region_code", "region_name");
            });

            regionSelect.addEventListener("change", function() {
                const regionCode = this.options[this.selectedIndex].dataset.code;
                provinceSelect.innerHTML = '<option value="" hidden>Select Province *</option>';
                municipalitySelect.innerHTML = '<option value="" hidden>Select Municipality *</option>';
                barangaySelect.innerHTML = '<option value="" hidden>Select Barangay *</option>';
                provinceSelect.disabled = !regionCode;
                municipalitySelect.disabled = true;
                barangaySelect.disabled = true;

                if (regionCode) {
                    fetchData("../../static/json/provinces.json").then((data) => {
                        const filteredProvinces = data.filter((province) => province.region_code === regionCode);
                        populateSelect(provinceSelect, filteredProvinces, "province_code", "province_name");
                    });
                }
            });

            provinceSelect.addEventListener("change", function() {
                const provinceCode = this.options[this.selectedIndex].dataset.code;
                municipalitySelect.innerHTML = '<option value="" hidden>Select Municipality *</option>';
                barangaySelect.innerHTML = '<option value="" hidden>Select Barangay *</option>';
                municipalitySelect.disabled = !provinceCode;
                barangaySelect.disabled = true;

                if (provinceCode) {
                    fetchData("../../static/json/cities.json").then((data) => {
                        const filteredCities = data.filter((city) => city.province_code === provinceCode);
                        populateSelect(municipalitySelect, filteredCities, "city_code", "city_name");
                    });
                }
            });

            municipalitySelect.addEventListener("change", function() {
                const cityCode = this.options[this.selectedIndex].dataset.code;
                barangaySelect.innerHTML = '<option value="" hidden>Select Barangay *</option>';
                barangaySelect.disabled = !cityCode;

                if (cityCode) {
                    fetchData("../../static/json/barangays.json").then((data) => {
                        const filteredBarangays = data.filter((brgy) => brgy.city_code === cityCode);
                        populateSelect(barangaySelect, filteredBarangays, "brgy_code", "brgy_name");
                    });
                }
            });
        });
    </script>


</body>

</html>