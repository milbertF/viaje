<?php
session_start();
include '../../php/dbConnection.php';

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
$profilePicture = isset($_SESSION['profile_picture']) ? $_SESSION['profile_picture'] : '../../static/images/default-profile.png';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rider Fillup Form</title>
    <link rel="shortcut icon" href="../../static/images/logo/logoViaje.png" type="image/x-icon">
    <link rel="stylesheet" href="../../static/stylesheet/components/style.css">
    <link rel="stylesheet" href="../../static/stylesheet/css/userfillupcopy.css">
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

        <div class="userfillupCon">

            <div class="greetings">
                <h1>BE A VIAJE<br>RIDER NOW!</h1>
                <p>Vene ya y queda un Viaje Rider de Zamboanga</p>
            </div>

            <div class="mainconWrap">
                <div class="conoffaq">
                    <div class="sconFAQ">
                        <div class="ssfaq">
                            <div class="titfaq">
                                <p>Quilaya queda un Viaje Driver</p>
                            </div>
                            <div class="steps">
                                <div class="priss">
                                    <p>Step 1</p>
                                </div>
                                <div class="parss">
                                    <p>Visita el <a href="">Viaje.com/apply</a> para aplica queda Viaje Rider.</p>
                                    <p><i>Visit Viaje.com/apply to apply as a Viaje Rider.</i></p>
                                </div>
                            </div>

                            <div class="steps">
                                <div class="priss">
                                    <p>Step 2</p>
                                </div>
                                <div class="parss">
                                    <p>Completa con el aplicacion form y sumite. Asegura le con el Terminos y condiciones bunamente.</p>
                                    <p><i>Complete the application form and submit it. Be sure to read the Terms and Conditions carefully.</i></p>
                                </div>
                            </div>

                            <div class="steps">
                                <div class="priss">
                                    <p>Step 3</p>
                                </div>
                                <div class="parss">
                                    <p>Espera con el notificacion correo por el stado del aplicacion, si aprobado o rechazado.</p>
                                    <p><i>Wait for an email notification regarding the status of your application, whether it is approved or declined.</i></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lconlic">
                        <div class="lllic">
                            <div class="phh">
                                <p>
                                    Si poner vos otros el Lisensya, asegura cay el litrato ay cortaw na iguales grandor del lisensya.
                                    (Kopya el ejemplar abaho). El maga detalye debe klaro y puede leer para evita conel tardas proses
                                    del verificacion na lisensya.
                                </p>
                                <span>
                                    <i>
                                        When uploading your driver's license, please ensure that the image is cropped to the exact size of the license. (as shown in the example below)
                                        The details must be clear and fully readable to avoid any delays in the verification process.
                                        Blurry or improperly cropped images may result in application rejection.
                                    </i>

                                </span>
                            </div>
                            <div class="kk">
                                <img src="../../static/images/logo/cropped license.png" alt="">
                            </div>
                            <div class="phh">
                                <p>
                                    Necesita tambien vos otros pone kompleto informacion del vehiculo junto conel klaro mismo litrato
                                    del vehiculo que ta incluir el delentero, costaw y el atras. Debe el maga litrato na buen illuminado
                                    y apropiadamente encuadrar para asegura kunel suave proceso del verificacion. Paltar y no claro
                                    sumisuon puede resultar na retrasar o denegacion de aplicacion
                                </p>
                                <span>
                                    <i>
                                        you must also provide complete vehicle information along with clear images of your vehicle, including front, side,
                                        and back views. These images should be well-lit and properly framed to ensure a smooth verification process.
                                        Incomplete or unclear submissions may result in delays or rejection of your application.
                                    </i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="FAQ">
                        <div class="faqwwd" id="faqwwd">
                            <h3>Frequently Asked Questions (FAQs) – ViaJe</h3>

                            <div class="det" onclick="viewFAQ()">
                                <h4>1. Cosa el ViaJe? |<i>What is ViaJe?</i></h4>
                                <p id="detp">ViaJe is a mobile application designed to provide a safe, convenient, and efficient ride-booking service
                                    for commuters. It connects passengers with registered riders, offering real-time booking,
                                    automated notifications, and safety features like a distress button.
                                </p>
                            </div>

                            <div class="det" onclick="viewFAQ2()">
                                <h4>2. Quilaya iyo aplica como un Viaje Rider? | <i>How do I apply as a ViaJe Rider?</i></h4>
                                <p id="detp2">To apply, visit the ViaJe website and fill out the rider registration form. You will need to submit
                                    required documents, undergo screening processes including driving skills assessment, background verification,
                                    and vehicle inspection before getting approved.
                                </p>
                            </div>

                            <div class="det" onclick="viewFAQ3()">
                                <h4>3. Quilaya ta calcula pamasahe na Viaje? | <i>How are fares calculated in ViaJe?</i></h4>
                                <p id="detp3">ViaJe calculates fares based on distance traveled, base fare, and additional charges, if applicable.
                                    Before confirming a booking, passengers will receive an estimated fare, ensuring transparency in pricing.
                                </p>
                            </div>

                            <div class="det" onclick="viewFAQ4()">
                                <h4>4. Quilaya tan gana el Distress Button? | <i>How does the distress button work?</i></h4>
                                <p id="detp4">The distress button is a safety feature that allows passengers to alert their registered guardian
                                    or emergency contacts in case of danger. When activated, it sends a notification with the user’s live
                                    location and ride details.
                                </p>
                            </div>

                            <div class="det" onclick="viewFAQ5()">
                                <h4>5. Chene ba customer support available? | <i>Is there customer support available?</i></h4>
                                <p id="detp5">Yes, ViaJe offers customer support for both riders and passengers. You can contact
                                    vaije.customer.support@gmail.com for any concerns related to bookings, payments, or general inquiries.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <form action="../../php/userfillup.php" method="POST" enctype="multipart/form-data" class="form">
                    <div class="formCon">
                        <h3>Personal Information</h3>
                        <div class="inpPart">
                            <label>Email Address <span>*</span></label>
                            <div class="input">
                                <input type="email" name="email" required>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>First Name <span>*</span></label>
                            <div class="input">
                                <input type="text" name="firstName" required>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Last Name <span>*</span></label>
                            <div class="input">
                                <input type="text" name="lastName" required>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Middle Name</label>
                            <div class="input">
                                <input type="text" name="middleName">
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Extension Name</label>
                            <div class="input">
                                <input type="text" name="extensionName" list="extension">
                                <datalist id="extension">
                                    <option value="jr."></option>
                                    <option value="sr."></option>
                                    <option value="III"></option>
                                </datalist>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Gender <span>*</span></label>
                            <div class="input">
                                <select name="gender" required>
                                    <option disabled selected style="display: none;"></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Contact No. <span>*</span></label>
                            <div class="input">
                                <input type="number" name="contactNo" required>
                            </div>
                        </div>
                    </div>
                    <div class="formCon">
                        <h3>Address</h3>
                        <div class="inpPart">
                            <label>Region <span>*</span></label>
                            <div class="input">
                                <select id="region" name="region" required>
                                    <option value="" hidden>Select Region *</option>
                                </select>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Province <span>*</span></label>
                            <div class="input">
                                <select id="province" name="province" required>
                                    <option value="" hidden>Select Province *</option>
                                </select>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Municipality <span>*</span></label>
                            <div class="input">
                                <select id="municipality" name="municipality" required>
                                    <option value="" hidden>Select Municipality *</option>
                                </select>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Barangay <span>*</span></label>
                            <div class="input">
                                <select id="barangay" name="barangay" required>
                                    <option value="" hidden>Select Barangay *</option>
                                </select>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Postal Code <span>*</span></label>
                            <div class="input">
                                <input type="number" name="postalCode" required>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Street <span>*</span></label>
                            <div class="input">
                                <input type="text" name="street" required>
                            </div>
                        </div>
                    </div>
                    <div class="formCon">
                        <h3>Verification</h3>
                        <div class="inpPart">
                            <label>License No. <span>*</span></label>
                            <div class="input">
                                <input type="text" name="licenseNo" required>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label for="piclicence">License Picture <span>*</span></label>
                            <div class="imageUpload">
                                <img id="licenceplaceholder" src="../../static/images/logo/landscape-placeholder.svg" alt="">
                                <label for="piclicence"></label>
                                <div class="input">
                                    <input type="file" name="licensePicture" id="piclicence" accept="image/*" onchange="previewImageAdd1(event)" required>
                                </div>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label for="picface">Face Picture <span>*</span></label>
                            <div class="imageUpload">
                                <img id="faceplaceholder" src="../../static/images/logo/landscape-placeholder.svg" alt="">
                                <label for="picface"></label>
                                <div class="input">
                                    <input type="file" name="facePicture" id="picface" accept="image/*" onchange="previewImageAdd2(event)" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="formCon">
                        <h3>Vehicle Information</h3>
                        <div class="inpPart">
                            <label>Vehicle Type <span>*</span></label>
                            <div class="input">
                                <select name="vehicleType" required>
                                    <option disabled selected style="display: none;"></option>
                                    <option value="Car">Car</option>
                                    <option value="Motorcycle">Motorcycle</option>
                                    <option value="Tricycle">Tricycle</option>
                                    <option value="Auto Rickshaw (tuktuk)">Auto Rickshaw (tuktuk)</option>
                                </select>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Vehicle Plate No. <span>*</span></label>
                            <div class="input">
                                <input type="text" name="vehiclePlateNo" required>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Vehicle Make <span>*</span></label>
                            <div class="input">
                                <input type="text" name="vehicleMake" required>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Vehicle Model <span>*</span></label>
                            <div class="input">
                                <input type="text" name="vehicleModel" required>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Model Year <span>*</span></label>
                            <div class="input">
                                <select name="vehicleModelYear" id="yearSelect" required>
                                    <option disabled selected style="display: none;"></option>
                                    <option disabled>Model Year</option>
                                </select>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Vehicle Color <span>*</span></label>
                            <div class="input">
                                <input type="text" name="vehicleColor" required>
                            </div>
                        </div>
                        <div class="inpPart">
                            <label>Vehicle Ownership <span>*</span></label>
                            <div class="input">
                                <select name="vehicleOwnership" required>
                                    <option disabled selected style="display: none;"></option>
                                    <option value="Owned">Owned</option>
                                    <option value="Borrowed / Rented">Borrowed / Rented</option>
                                    <option value="Second Hand">Second Hand</option>
                                    <option value="New">New</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="status" value="Pending">
                        <input type="hidden" name="vehicleStatus" value="Approved">
                    </div>
                    <div class="formCon">
                        <h3>Vehicle Images</h3>
                        <p>Please upload three(3) photos of your vehicle. Including Frontview, Sideview, and Backview.</p>
                        <div class="imgV">
                            <label for="frontViewImage">Front View <span>*</span></label>
                            <input type="file" name="frontViewImage" id="frontViewImage" accept="image/*" required>
                        </div>
                        <div class="imgV">
                            <label for="SideViewImage">Side View <span>*</span></label>
                            <input type="file" name="SideViewImage" id="SideViewImage" accept="image/*" required>
                        </div>
                        <div class="imgV">
                            <label for="BackViewImage">Back View <span>*</span></label>
                            <input type="file" name="BackViewImage" id="BackViewImage" accept="image/*" required>
                        </div>
                    </div>
                    <!-- <div></div> -->
                    <div class="tbtb">
                        <div class="terms">
                            <input type="checkbox" name="terms" id="checkbox" required>
                            <p>I agree to ViaJe’s Terms and Conditions, policies, and guidelines as I apply to become a ViaJe Rider. By checking this box, I confirm that all information provided is true and accurate. I understand that any false or misleading details may result in the rejection of my application or suspension/removal of my access. I acknowledge that ViaJe reserves the right to verify my information at any time.</p>
                        </div>
                        <div class="btn">
                            <button id="submitBtn" type="submit" disabled>Submit</button>
                            <p>Please check the Terms and Conditions first</p>
                        </div>
                    </div>
                </form>
            </div>



            <div></div>

        </div>

    </div>

    <script src="../../static/javascript/header.js"></script>
    <script src="../../static/javascript/sidebar.js"></script>
    <script src="../../static/javascript/script.js"></script>
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

    <!-- year select -->
    <script>
        const currentYear = new Date().getFullYear(); // Gets the current year
        const startYear = currentYear - 20; // Set start year to 20 years less than the current year
        const yearSelect = document.getElementById('yearSelect');

        for (let year = currentYear; year >= startYear; year--) {
            const option = document.createElement('option');
            option.value = year;
            option.text = year;
            yearSelect.appendChild(option);
        }
    </script>


    <!-- password input -->
    <script>
        const checkbox = document.getElementById('checkbox');
        const submitBtn = document.getElementById('submitBtn');

        checkbox.addEventListener('change', function() {
            submitBtn.disabled = !this.checked;
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const licenseInput = document.getElementById("piclicence");
            const licencePlaceholder = document.getElementById("licenceplaceholder");
            const submitButton = document.getElementById("submitBtn");

            // Array of multiple license template images
            const templateImages = [
                "../../static/images/compareLicense/basis.jpeg/", // Template 1  
                "../../static/images/compareLicense/basis2.jpeg/", // Template 2
                "../../static/images/compareLicense/basis3.jpeg/" // Template 3
            ];

            // Load all templates into Image objects
            const templateImgs = templateImages.map(src => {
                const img = new Image();
                img.src = src;
                return img;
            });

            licenseInput.addEventListener("change", function(event) {
                const file = event.target.files[0];

                if (!file) return;

                const validExtensions = ["image/jpeg", "image/jpg", "image/png"];
                const maxSize = 5 * 1024 * 1024; // 5MB

                // Validate file type
                if (!validExtensions.includes(file.type)) {
                    alert("Please upload a valid image file (JPG, JPEG, PNG).");
                    licenseInput.value = "";
                    licencePlaceholder.src = "../../static/images/logo/landscape-placeholder.svg"; // Reset placeholder
                    return;
                }

                // Validate file size
                if (file.size > maxSize) {
                    alert("The file is too large. Maximum allowed size is 5MB.");
                    licenseInput.value = "";
                    licencePlaceholder.src = "../../static/images/logo/landscape-placeholder.svg"; // Reset placeholder
                    return;
                }

                // Preview uploaded image
                const reader = new FileReader();
                reader.onload = function(e) {
                    licencePlaceholder.src = e.target.result; // Show uploaded image

                    const uploadedImg = new Image();
                    uploadedImg.src = e.target.result;

                    uploadedImg.onload = function() {
                        checkImageAgainstTemplates(uploadedImg, templateImgs);
                    };
                };
                reader.readAsDataURL(file);
            });

            function checkImageAgainstTemplates(uploadedImg, templates) {
                let isMatch = false;

                templates.forEach(templateImg => {
                    const similarity = compareImages(uploadedImg, templateImg);
                    if (similarity >= 50) { // Accept if similarity is 50% or above
                        isMatch = true;
                    }
                });

                if (isMatch) {
                    alert("The license picture has been successfully verified!");
                    submitButton.disabled = false;
                } else {
                    alert("The uploaded license picture does not match the expected format.");
                    licenseInput.value = "";
                    licencePlaceholder.src = "../../static/images/logo/landscape-placeholder.svg"; // Reset placeholder
                    submitButton.disabled = true;
                }
            }

            function compareImages(img1, img2) {
                const canvas = document.createElement("canvas");
                const ctx = canvas.getContext("2d");

                const width = Math.min(img1.width, img2.width);
                const height = Math.min(img1.height, img2.height);
                canvas.width = width;
                canvas.height = height;

                ctx.drawImage(img1, 0, 0, width, height);
                const data1 = ctx.getImageData(0, 0, width, height).data;

                ctx.clearRect(0, 0, width, height);
                ctx.drawImage(img2, 0, 0, width, height);
                const data2 = ctx.getImageData(0, 0, width, height).data;

                let diff = 0;
                for (let i = 0; i < data1.length; i += 4) {
                    if (
                        Math.abs(data1[i] - data2[i]) > 50 ||
                        Math.abs(data1[i + 1] - data2[i + 1]) > 50 ||
                        Math.abs(data1[i + 2] - data2[i + 2]) > 50
                    ) {
                        diff++;
                    }
                }

                return 100 - (diff / (width * height)) * 100; // Return similarity percentage
            }
        });
    </script>


    <script>
        const detp = document.getElementById('detp');
        const detp2 = document.getElementById('detp2');
        const detp3 = document.getElementById('detp3');
        const detp4 = document.getElementById('detp4');
        const detp5 = document.getElementById('detp5');

        function viewFAQ() {
            if (detp.style.height === '6rem') {
                detp.style.height = '0rem';
                detp.style.paddingBlock = '0rem';
            } else {
                detp.style.height = '6rem';
                detp.style.paddingBlock = '1rem';

                detp2.style.height = '0rem';
                detp3.style.height = '0rem';
                detp4.style.height = '0rem';
                detp5.style.height = '0rem';

                detp2.style.paddingBlock = '0rem';
                detp3.style.paddingBlock = '0rem';
                detp4.style.paddingBlock = '0rem';
                detp5.style.paddingBlock = '0rem';
            }
        }

        function viewFAQ2() {
            if (detp2.style.height === '6rem') {
                detp2.style.height = '0rem';
                detp2.style.paddingBlock = '0rem';
            } else {
                detp2.style.height = '6rem';
                detp2.style.paddingBlock = '1rem';

                detp.style.height = '0rem';
                detp3.style.height = '0rem';
                detp4.style.height = '0rem';
                detp5.style.height = '0rem';

                detp.style.paddingBlock = '0rem';
                detp3.style.paddingBlock = '0rem';
                detp4.style.paddingBlock = '0rem';
                detp5.style.paddingBlock = '0rem';
            }
        }

        function viewFAQ3() {
            if (detp3.style.height === '6rem') {
                detp3.style.height = '0rem';
                detp3.style.paddingBlock = '0rem';
            } else {
                detp3.style.height = '6rem';
                detp3.style.paddingBlock = '1rem';

                detp2.style.height = '0rem';
                detp.style.height = '0rem';
                detp4.style.height = '0rem';
                detp5.style.height = '0rem';

                detp2.style.paddingBlock = '0rem';
                detp.style.paddingBlock = '0rem';
                detp4.style.paddingBlock = '0rem';
                detp5.style.paddingBlock = '0rem';
            }
        }

        function viewFAQ4() {
            if (detp4.style.height === '6rem') {
                detp4.style.height = '0rem';
                detp4.style.paddingBlock = '0rem';
            } else {
                detp4.style.height = '6rem';
                detp4.style.paddingBlock = '1rem';

                detp2.style.height = '0rem';
                detp3.style.height = '0rem';
                detp.style.height = '0rem';
                detp5.style.height = '0rem';

                detp2.style.paddingBlock = '0rem';
                detp3.style.paddingBlock = '0rem';
                detp.style.paddingBlock = '0rem';
                detp5.style.paddingBlock = '0rem';
            }
        }

        function viewFAQ5() {
            if (detp5.style.height === '6rem') {
                detp5.style.height = '0rem';
                detp5.style.paddingBlock = '0rem';
            } else {
                detp5.style.height = '6rem';
                detp5.style.paddingBlock = '1rem';

                detp2.style.height = '0rem';
                detp3.style.height = '0rem';
                detp4.style.height = '0rem';
                detp.style.height = '0rem';

                detp2.style.paddingBlock = '0rem';
                detp3.style.paddingBlock = '0rem';
                detp4.style.paddingBlock = '0rem';
                detp.style.paddingBlock = '0rem';
            }
        }
    </script>

</body>

</html>