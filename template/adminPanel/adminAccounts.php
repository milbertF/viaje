<?php
session_start();
include '../../php/dbConnection.php';

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


$successMessage = isset($_SESSION['successMessage']) ? $_SESSION['successMessage'] : '';
$errorMessage = isset($_SESSION['errorMessage']) ? $_SESSION['errorMessage'] : '';


unset($_SESSION['successMessage']);
unset($_SESSION['errorMessage']);


$userRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';
$profilePicture = isset($_SESSION['profile_picture']) ? '../' . $_SESSION['profile_picture'] : '../../static/images/logo/landscape-placeholder.svg';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaje / Admin Accounts</title>
    <link rel="shortcut icon" href="../../static/images/logo/logoViaje.png" type="image/x-icon">
    <link rel="stylesheet" href="../../static/stylesheet/components/style.css">
    <link rel="stylesheet" href="../../static/stylesheet/css/adminAccounts.css">
</head>

<body>
    <div class="whole">
        <!-- Show success or error message -->
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
                    <p>Admin Accounts</p>
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
                    <div class="content contentTable">





                        <div class="addBtn buttontop">
                            <button onclick="openAddAccounts()">Add Account</button>
                        </div>
                        <div class="radioBtn">
                            <div class="rbtnCon">
                                <input type="radio" name="radioBtn" id="allBtn" checked onclick="filterTable('all')">
                                <label for="allBtn">All</label>
                            </div>
                            <div class="rbtnCon">
                                <input type="radio" name="radioBtn" id="superAdminBtn" onclick="filterTable('Super Admin')">
                                <label for="superAdminBtn">Super Admin</label>
                            </div>
                            <div class="rbtnCon">
                                <input type="radio" name="radioBtn" id="adminBtn" onclick="filterTable('Admin')">
                                <label for="adminBtn">Admin</label>
                            </div>
                        </div>

                        <div class="tableCon">
                            <table>
                                <tr class="trheader">
                                    <td>Picture</td>
                                    <td>Email</td>
                                    <td>First Name</td>
                                    <td>Last Name</td>
                                    <td>Contact No.</td>
                                    <td>Gender</td>
                                    <td>Role</td>
                                    <td>Action</td>
                                </tr>

                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td>
                                            <img src="<?php echo file_exists('../' . $row['image']) && !empty($row['image'])
                                                            ? htmlspecialchars('../' . $row['image'])
                                                            : '../../static/images/logo/landscape-placeholder.svg'; ?>"
                                                alt="Profile Picture">
                                        </td>
                                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                                        <td><?php echo htmlspecialchars($row['firstname']); ?></td>
                                        <td><?php echo htmlspecialchars($row['lastname']); ?></td>
                                        <td><?php echo htmlspecialchars($row['contactNo']); ?></td>
                                        <td><?php echo htmlspecialchars($row['gender']); ?></td>
                                        <td><?php echo htmlspecialchars($row['role']); ?></td>
                                        <td>
                                            <button onclick="openEditAccounts(<?php echo htmlspecialchars($row['adminID']); ?>)">Edit</button>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </table>
                            <div class="norecord" id="norecord" style="display: none;">
                                <p>No Records Found</p>
                            </div>
                        </div>






                    </div>
                </div>
            </div>
        </div>





        <div class="add-Account-Container" id="add-Account-Container" style="display: none;">
            <div class="addform">
                <div class="addTitle">
                    <h3>Add Account</h3>
                    <i class="fa fa-times" onclick="closeAddAccounts()"></i>
                </div>
                <form class="form" action="../../php/adminAccounts.php" method="POST" enctype="multipart/form-data">

                    <div class="picture-edit">
                        <div class="img-editAccount">
                            <img id="uploadedImageAdd" src="../../static/images/logo/landscape-placeholder.svg" alt="">
                            <label for="uploadInputAdd"></label>
                        </div>
                        <div class="choose-edit">
                            <input type="file" id="uploadInputAdd" name="image" accept="image/*" onchange="previewImageAdd(event)">
                        </div>
                    </div>

                    <div class="inpPart">
                        <label for="Email">Email</label>
                        <div class="input">
                            <input type="email" id="Email" name="email" required>
                        </div>
                    </div>

                    <div class="inpPart">
                        <label for="firstname">First Name</label>
                        <div class="input">
                            <input type="text" id="firstname" name="firstname" required>
                        </div>
                    </div>

                    <div class="inpPart">
                        <label for="lastname">Last Name</label>
                        <div class="input">
                            <input type="text" id="lastname" name="lastname" required>
                        </div>
                    </div>

                    <div class="inpPart">
                        <label for="Contact">Contact No.</label>
                        <div class="input">
                            <input type="number" id="Contact" name="contact" required>
                        </div>
                    </div>

                    <div class="inpPart">
                        <label for="Gender">Gender</label>
                        <div class="input">
                            <select name="gender" id="Gender" required>
                                <option value="" disabled selected style="display: none;"></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="inpPart">
                        <label for="Password">Password</label>
                        <div class="input">
                            <input type="password" id="Password" name="password" required>
                        </div>
                    </div>

                    <div class="inpPart">
                        <label for="Confirm">Confirm Password</label>
                        <div class="input">
                            <input type="password" id="Confirm" name="confirm_password" required>
                        </div>
                    </div>

                    <div class="inpPart">
                        <label for="Role">Role</label>
                        <div class="input">
                            <select name="role" id="Role" required>
                                <option value="" disabled selected style="display: none;"></option>
                                <option value="Super Admin">Super Admin</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                    </div>

                    <div class="inpPartBtn">
                        <button type="submit" name="submit">Commit</button>
                        <button type="reset">Reset</button>
                    </div>

                </form>

            </div>
        </div>



        <div class="add-Account-Container" id="edit-Account-Container" style="display: none;">
            <div class="addform">
                <div class="addTitle">
                    <h3>Edit Account</h3>
                    <i class="fa fa-times" onclick="closeEditAccounts()"></i>
                </div>
                <form class="form" action="../../php/adminAccounts.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="editAdminID" id="editAdminID">
                    <input type="hidden" name="existing_image" id="editExistingImage">


                    <div class="picture-edit">
                        <div class="img-editAccount">
                            <img id="editUploadedImage" src="../../static/images/logo/landscape-placeholder.svg" alt="Admin Image">
                            <label for="editUploadInput"></label>
                        </div>
                        <div class="choose-edit">
                            <input type="hidden" name="existing_image" id="editExistingImage" value="<?= htmlspecialchars($imagePath) ?>">
                            <input type="file" id="editUploadInput" name="image" accept="image/*" onchange="previewImageEdit(event)" value="<?= htmlspecialchars($image) ?>">
                        </div>
                    </div>

                    <div class="inpPart">
                        <label for="editEmail">Email</label>
                        <div class="input">
                            <input type="email" name="editEmail" id="editEmail" value="<?= htmlspecialchars($email) ?>" required>
                        </div>
                    </div>

                    <div class="inpPart">
                        <label for="editFirstname">First Name</label>
                        <div class="input">
                            <input type="text" name="editFirstname" id="editFirstname" value="<?= htmlspecialchars($firstname) ?>" required>
                        </div>
                    </div>

                    <div class="inpPart">
                        <label for="editLastname">Last Name</label>
                        <div class="input">
                            <input type="text" name="editLastname" id="editLastname" value="<?= htmlspecialchars($lastname) ?>" required>
                        </div>
                    </div>

                    <div class="inpPart">
                        <label for="editContact">Contact No.</label>
                        <div class="input">
                            <input type="number" name="editContact" id="editContact" value="<?= htmlspecialchars($contact) ?>" required>
                        </div>
                    </div>

                    <div class="inpPart">
                        <label for="editGender">Gender</label>
                        <div class="input">
                            <select name="editGender" id="editGender" value="<?= htmlspecialchars($gender) ?>" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="inpPart">
                        <label for="editRole">Role</label>
                        <div class="input">
                            <select name="editRole" id="editRole" value="<?= htmlspecialchars($role) ?>" required>
                                <option value="" disabled selected>Select Role</option>
                                <option value="Super Admin">Super Admin</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                    </div>

                    <div class="inpPartBtn">
                        <button type="submit" name="submit">Update</button>
                        <button type="reset">Reset</button>
                    </div>
                </form>

            </div>
        </div>



    </div>



    <script src="../../static/javascript/header.js"></script>
    <script src="../../static/javascript/sidebar.js"></script>
    <script src="../../static/javascript/script.js"></script>
    <script>
        // Function to search accounts based on user input
        function searchAccounts() {
            const input = document.getElementById("searchInput");
            const filter = input.value.toLowerCase();
            const table = document.querySelector(".tableCon table");
            const rows = table.getElementsByTagName("tr");

            // Get the current role filter
            const allBtn = document.getElementById("allBtn");
            const superAdminBtn = document.getElementById("superAdminBtn");
            const adminBtn = document.getElementById("adminBtn");

            let roleFilter = "all";
            if (superAdminBtn.checked) {
                roleFilter = "Super Admin";
            } else if (adminBtn.checked) {
                roleFilter = "Admin";
            }

            let noRecordsFound = true; // Flag to track if any record matches

            // Skip the header row (first row)
            for (let i = 1; i < rows.length; i++) {
                const row = rows[i];
                const cells = row.getElementsByTagName("td");
                const roleCell = cells[6]; // Column index for "Role"

                let match = false;

                // Check if the role matches the filter (or no role filter is applied)
                if (roleCell && (roleFilter === "all" || roleCell.textContent.trim() === roleFilter)) {
                    // Check each cell in the row for the search query
                    for (let j = 0; j < cells.length; j++) {
                        const cell = cells[j];
                        if (cell) {
                            const cellText = cell.textContent || cell.innerText;
                            if (cellText.toLowerCase().includes(filter)) {
                                match = true;
                                break;
                            }
                        }
                    }
                }

                // Show or hide the row based on the match
                if (match) {
                    row.style.display = "";
                    noRecordsFound = false; // At least one record matches
                } else {
                    row.style.display = "none";
                }
            }

            // Show or hide the "No records found" message
            const norecord = document.getElementById('norecord');
            if (noRecordsFound) {
                norecord.style.display = 'flex'; // Show the 'No records found' message
            } else {
                norecord.style.display = 'none'; // Hide the 'No records found' message
            }
        }

        // Function to filter accounts based on the selected role filter
        function filterAccounts() {
            const allBtn = document.getElementById("allBtn");
            const superAdminBtn = document.getElementById("superAdminBtn");
            const adminBtn = document.getElementById("adminBtn");
            const table = document.querySelector(".tableCon table");
            const rows = table.getElementsByTagName("tr");

            // Determine which button is selected
            let roleFilter = "all";
            if (superAdminBtn.checked) {
                roleFilter = "Super Admin";
            } else if (adminBtn.checked) {
                roleFilter = "Admin";
            }

            let noRecordsFound = true; // Flag to track if any record matches

            // Loop through the table rows (skip the header row at index 0)
            for (let i = 1; i < rows.length; i++) {
                const row = rows[i];
                const roleCell = row.getElementsByTagName("td")[6]; // Column index for "Role"

                if (roleCell) {
                    const roleText = roleCell.textContent || roleCell.innerText;

                    // Show or hide rows based on the selected role filter
                    if (roleFilter === "all" || roleText === roleFilter) {
                        rows[i].style.display = ""; // Show row
                        noRecordsFound = false; // At least one record matches
                    } else {
                        rows[i].style.display = "none"; // Hide row
                    }
                }
            }

            // Show or hide the "No records found" message
            const norecord = document.getElementById('norecord');
            if (noRecordsFound) {
                norecord.style.display = 'flex'; // Show the 'No records found' message
            } else {
                norecord.style.display = 'none'; // Hide the 'No records found' message
            }

            // Call search to reapply the search filter after changing the role filter
            searchAccounts();
        }

        // Add event listeners for role radio buttons and search input
        document.getElementById("allBtn").addEventListener("change", filterAccounts);
        document.getElementById("superAdminBtn").addEventListener("change", filterAccounts);
        document.getElementById("adminBtn").addEventListener("change", filterAccounts);

        // Event listener for the search input field
        document.getElementById("searchInput").addEventListener("input", searchAccounts);
    </script>










    <script>
        function previewImageAdd(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('uploadedImageAdd');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function openEditAccounts(adminID) {
            const editContainer = document.getElementById('edit-Account-Container');
            editContainer.style.display = 'flex';

            console.log(`Fetching details for adminID: ${adminID}`);

            fetch(`../../php/fetchAdminDetails.php?adminID=${adminID}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Response from server:', data);

                    if (data.success) {
                        // Populate the form fields
                        document.getElementById('editAdminID').value = data.adminID;
                        document.getElementById('editEmail').value = data.email;
                        document.getElementById('editFirstname').value = data.firstname;
                        document.getElementById('editLastname').value = data.lastname;
                        document.getElementById('editContact').value = data.contactNo;

                        // Handle role
                        const roleSelect = document.getElementById('editRole');
                        if (roleSelect) {
                            roleSelect.value = data.role || "";
                        } else {
                            console.error("Role select element not found.");
                        }


                        const genderSelect = document.getElementById('editGender');
                        if (genderSelect) {
                            genderSelect.value = data.gender || "";
                        } else {
                            console.error("Gender select element not found.");
                        }


                        const imgPreview = document.getElementById('editUploadedImage');
                        if (imgPreview) {
                            imgPreview.src = data.image && data.image.trim() !== "" ?
                                data.image :
                                '../../static/images/logo/landscape-placeholder.svg';
                        } else {
                            console.error("Image preview element not found.");
                        }
                    } else {
                        alert(`Failed to fetch user details: ${data.message}`);
                    }
                })
                .catch(error => {
                    console.error("Error fetching user details:", error);
                    alert("An error occurred while fetching user details.");
                });
        }


        function previewImageEdit(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('editUploadedImage');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>



</body>

</html>