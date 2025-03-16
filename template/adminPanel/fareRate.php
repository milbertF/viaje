<?php
$fareRates = isset($_SESSION['fareRates']) ? $_SESSION['fareRates'] : [];
include '../../php/fareRate.php';

if (!isset($_SESSION['adminID'])) {
    header("Location: ../loginPage/index.php");
    exit();
}

// Ensure data is present for each vehicle type
$fareRates = array_merge([
    'Car' => ['startingPrice' => '', 'additionalPassenger' => '', 'fareRate/KM' => ''],
    'Motorcycle' => ['startingPrice' => '', 'additionalPassenger' => '', 'fareRate/KM' => ''],
    'Tricycle' => ['startingPrice' => '', 'additionalPassenger' => '', 'fareRate/KM' => ''],
    'Auto Rickshaw' => ['startingPrice' => '', 'additionalPassenger' => '', 'fareRate/KM' => '']
], $fareRates);

$userRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';
$profilePicture = isset($_SESSION['profile_picture']) ? $_SESSION['profile_picture'] : '../../static/images/default-profile.png';

$successMessage = isset($_SESSION['successMessage']) ? $_SESSION['successMessage'] : '';
$errorMessage = isset($_SESSION['errorMessage']) ? $_SESSION['errorMessage'] : '';


unset($_SESSION['successMessage']);
unset($_SESSION['errorMessage']);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaje / Fare Rate</title>
    <link rel="shortcut icon" href="../../static/images/logo/logoViaje.png" type="image/x-icon">
    <link rel="stylesheet" href="../../static/stylesheet/components/style.css">
    <link rel="stylesheet" href="../../static/stylesheet/css/fareRate.css">
</head>

<body>
    <div class="whole">

        <?php if ($successMessage): ?>
            <div class="modals success-message" role="dialog">
                <p><?php echo htmlspecialchars($successMessage); ?></p>
            </div>
        <?php endif; ?>

        <!-- header -->
        <main-header user-role="<?= htmlspecialchars($userRole) ?>" profile-picture="<?= htmlspecialchars($_SESSION['profile_picture'] ? '../' . $_SESSION['profile_picture'] : '../../static/images/logo/landscape-placeholder.svg') ?>"></main-header>
        <div class="con">
            <!-- sidebar -->
            <main-sidemenu class="sidebar" user-role="<?= htmlspecialchars($userRole) ?>"></main-sidemenu>
            <!-- container -->
            <div class="container">
                <!-- title -->
                <div class="titleTop">
                    <p>Fare Rate</p>
                </div>
                <!-- wrapper-->
                <div class="wrap">
                    <!-- content -->
                    <div class="content">



                        <div class="calculate">
                            <button onclick="openCalculate()">Calculate</button>
                        </div>
                        <div class="farewrap">
                            <!-- Car -->
                            <div class="vehicle">
                                <h3>Car</h3>
                                <div class="price">
                                    <div class="pricing">
                                        <p>Starting Price:</p>
                                        <p><a>₱</a><?= htmlspecialchars($fareRates['Car']['startingPrice']) ?></p>
                                    </div>
                                    <div class="pricing">
                                        <p>Additional Passenger:</p>
                                        <p><a>₱</a><?= htmlspecialchars($fareRates['Car']['additionalPassenger']) ?></p>
                                    </div>
                                    <div class="pricing">
                                        <p>Fare Rate / KM:</p>
                                        <p><a>₱</a><?= htmlspecialchars($fareRates['Car']['fareRate/KM']) ?></p>
                                    </div>
                                </div>
                                <button onclick="openEditFareCar()">Edit</button>
                            </div>

                            <!-- Motorcycle -->
                            <div class="vehicle">
                                <h3>Motorcycle</h3>
                                <div class="price">
                                    <div class="pricing">
                                        <p>Starting Price:</p>
                                        <p><a>₱</a><?= htmlspecialchars($fareRates['Motorcycle']['startingPrice']) ?></p>
                                    </div>
                                    <div class="pricing">
                                        <p>Additional Passenger:</p>
                                        <p><a>₱</a><?= htmlspecialchars($fareRates['Motorcycle']['additionalPassenger']) ?></p>
                                    </div>
                                    <div class="pricing">
                                        <p>Fare Rate / KM:</p>
                                        <p><a>₱</a><?= htmlspecialchars($fareRates['Motorcycle']['fareRate/KM']) ?></p>
                                    </div>
                                </div>
                                <button onclick="openEditFareMotorcycle()">Edit</button>
                            </div>

                            <!-- Tricycle -->
                            <div class="vehicle">
                                <h3>Tricycle</h3>
                                <div class="price">
                                    <div class="pricing">
                                        <p>Starting Price:</p>
                                        <p><a>₱</a><?= htmlspecialchars($fareRates['Tricycle']['startingPrice']) ?></p>
                                    </div>
                                    <div class="pricing">
                                        <p>Additional Passenger:</p>
                                        <p><a>₱</a><?= htmlspecialchars($fareRates['Tricycle']['additionalPassenger']) ?></p>
                                    </div>
                                    <div class="pricing">
                                        <p>Fare Rate / KM:</p>
                                        <p><a>₱</a><?= htmlspecialchars($fareRates['Tricycle']['fareRate/KM']) ?></p>
                                    </div>
                                </div>
                                <button onclick="openEditFareTricycle()">Edit</button>
                            </div>

                            <!-- Auto Rickshaw -->
                            <div class="vehicle">
                                <h3>Auto Rickshaw (tuktuk)</h3>
                                <div class="price">
                                    <div class="pricing">
                                        <p>Starting Price:</p>
                                        <p><a>₱</a><?= htmlspecialchars($fareRates['Auto Rickshaw']['startingPrice']) ?></p>
                                    </div>
                                    <div class="pricing">
                                        <p>Additional Passenger:</p>
                                        <p><a>₱</a><?= htmlspecialchars($fareRates['Auto Rickshaw']['additionalPassenger']) ?></p>
                                    </div>
                                    <div class="pricing">
                                        <p>Fare Rate / KM:</p>
                                        <p><a>₱</a><?= htmlspecialchars($fareRates['Auto Rickshaw']['fareRate/KM']) ?></p>
                                    </div>
                                </div>
                                <button onclick="openEditFareAutoRickshaw()">Edit</button>
                            </div>
                        </div>






                    </div>
                </div>
            </div>
        </div>


        <div class="add-Account-Container" id="add-Account-Container" style="display: none;">
            <div class="close" onclick="closeAddAccounts()">
                <i class="fa fa-times"></i>
            </div>

            <div class="wrapManage" id="wrapCalculate">
                <div class="cons">
                    <h3>Test Calculation</h3>

                    <div class="inpPart">
                        <label>Vehicle Type</label>
                        <div class="input">
                            <select name="vehicleType" id="vehicleType" onchange="updateFareDetailsAndPassengers()">
                                <option value="Car"
                                    data-starting-price="<?= htmlspecialchars($fareRates['Car']['startingPrice']) ?>"
                                    data-additional-passenger="<?= htmlspecialchars($fareRates['Car']['additionalPassenger']) ?>"
                                    data-fare-rate-km="<?= htmlspecialchars($fareRates['Car']['fareRate/KM']) ?>" selected>
                                    Car
                                </option>
                                <option value="Motorcycle"
                                    data-starting-price="<?= htmlspecialchars($fareRates['Motorcycle']['startingPrice']) ?>"
                                    data-additional-passenger="<?= htmlspecialchars($fareRates['Motorcycle']['additionalPassenger']) ?>"
                                    data-fare-rate-km="<?= htmlspecialchars($fareRates['Motorcycle']['fareRate/KM']) ?>">
                                    Motorcycle
                                </option>
                                <option value="Tricycle"
                                    data-starting-price="<?= htmlspecialchars($fareRates['Tricycle']['startingPrice']) ?>"
                                    data-additional-passenger="<?= htmlspecialchars($fareRates['Tricycle']['additionalPassenger']) ?>"
                                    data-fare-rate-km="<?= htmlspecialchars($fareRates['Tricycle']['fareRate/KM']) ?>">
                                    Tricycle
                                </option>
                                <option value="Auto Rickshaw"
                                    data-starting-price="<?= htmlspecialchars($fareRates['Auto Rickshaw']['startingPrice']) ?>"
                                    data-additional-passenger="<?= htmlspecialchars($fareRates['Auto Rickshaw']['additionalPassenger']) ?>"
                                    data-fare-rate-km="<?= htmlspecialchars($fareRates['Auto Rickshaw']['fareRate/KM']) ?>">
                                    Auto Rickshaw (tuktuk)
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="inpPart">
                        <label>Number of Passenger/s</label>
                        <div class="input">
                            <select name="numberOfPassengers" id="numberOfPassengers" onchange="updateFareDetailsAndPassengers()">
                                <option disabled selected style="display: none;">Select Number of Passengers</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>

                    <div class="inpPart">
                        <label>How many kilometer/s</label>
                        <div class="input">
                            <input type="number" name="testCalculate" id="testCalculate" onchange="updateFareDetailsAndPassengers()">
                        </div>
                    </div>

                    <div class="totalcalc">
                        <p>Starting Price:</p>
                        <p><a>₱</a><span id="startingPrice"><?= htmlspecialchars($fareRates['Car']['startingPrice']) ?></span></p>
                    </div>
                    <div class="totalcalc">
                        <p>Additional Passenger:</p>
                        <p><a>₱</a><span id="additionalPassenger"><?= htmlspecialchars($fareRates['Car']['additionalPassenger']) ?></span></p>
                    </div>
                    <div class="totalcalc">
                        <p>Fare Rate / KM:</p>
                        <p><a>₱</a><span id="fareRateKM"><?= htmlspecialchars($fareRates['Car']['fareRate/KM']) ?></span></p>
                    </div>
                    <div class="totalcalc totalcalcZ">
                        <p>Total Price:</p>
                        <p><a>₱</a><span id="totalPrice">00.00</span></p>
                    </div>
                </div>
            </div>


            <div class="wrapManage" id="wrapEditCar">
                <div class="cons">
                    <h3>Edit Car Fare Rate</h3>

                    <form action="../../php/fareRate.php" method="POST">
                        <div class="inpPart">
                            <label>Starting Price</label>
                            <div class="input">
                                <input type="number" step="0.01" name="startingPrice" value="<?= htmlspecialchars($fareRates['Car']['startingPrice']) ?>" required>
                            </div>
                        </div>

                        <div class="inpPart">
                            <label>Additional Passenger</label>
                            <div class="input">
                                <input type="number" step="0.01" name="additionalPassenger" value="<?= htmlspecialchars($fareRates['Car']['additionalPassenger']) ?>" required>
                            </div>
                        </div>

                        <div class="inpPart">
                            <label>Fare Rate / KM</label>
                            <div class="input">
                                <input type="number" step="0.01" name="fareRateKM" value="<?= htmlspecialchars($fareRates['Car']['fareRate/KM']) ?>" required>
                            </div>
                        </div>

                        <input type="hidden" name="vehicle" value="Car">

                        <div class="btnEdit">
                            <button type="reset">Reset</button>
                            <button type="submit">Commit</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="wrapManage" id="wrapEditMotorcycle">
                <div class="cons">
                    <h3>Edit Motorcycle Fare Rate</h3>

                    <form action="../../php/fareRate.php" method="POST">
                        <div class="inpPart">
                            <label>Starting Price</label>
                            <div class="input">
                                <input type="number" step="0.01" name="startingPrice" value="<?= htmlspecialchars($fareRates['Motorcycle']['startingPrice']) ?>" required>
                            </div>
                        </div>

                        <div class="inpPart">
                            <label>Additional Passenger</label>
                            <div class="input">
                                <input type="number" step="0.01" name="additionalPassenger" value="<?= htmlspecialchars($fareRates['Motorcycle']['additionalPassenger']) ?>" required>
                            </div>
                        </div>

                        <div class="inpPart">
                            <label>Fare Rate / KM</label>
                            <div class="input">
                                <input type="number" step="0.01" name="fareRateKM" value="<?= htmlspecialchars($fareRates['Motorcycle']['fareRate/KM']) ?>" required>
                            </div>
                        </div>

                        <input type="hidden" name="vehicle" value="Motorcycle">

                        <div class="btnEdit">
                            <button type="reset">Reset</button>
                            <button type="submit">Commit</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="wrapManage" id="wrapEditTricycle">
                <div class="cons">
                    <h3>Edit Tricycle Fare Rate</h3>

                    <form action="../../php/fareRate.php" method="POST">
                        <div class="inpPart">
                            <label>Starting Price</label>
                            <div class="input">
                                <input type="number" step="0.01" name="startingPrice" value="<?= htmlspecialchars($fareRates['Tricycle']['startingPrice']) ?>" required>
                            </div>
                        </div>

                        <div class="inpPart">
                            <label>Additional Passenger</label>
                            <div class="input">
                                <input type="number" step="0.01" name="additionalPassenger" value="<?= htmlspecialchars($fareRates['Tricycle']['additionalPassenger']) ?>" required>
                            </div>
                        </div>

                        <div class="inpPart">
                            <label>Fare Rate / KM</label>
                            <div class="input">
                                <input type="number" step="0.01" name="fareRateKM" value="<?= htmlspecialchars($fareRates['Tricycle']['fareRate/KM']) ?>" required>
                            </div>
                        </div>

                        <input type="hidden" name="vehicle" value="Tricycle">

                        <div class="btnEdit">
                            <button type="reset">Reset</button>
                            <button type="submit">Commit</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="wrapManage" id="wrapEditAutoRickshaw">
                <div class="cons">
                    <h3>Edit Auto Rickshaw Fare Rate</h3>

                    <form action="../../php/fareRate.php" method="POST">
                        <div class="inpPart">
                            <label>Starting Price</label>
                            <div class="input">
                                <input type="number" step="0.01" name="startingPrice" value="<?= htmlspecialchars($fareRates['Auto Rickshaw']['startingPrice']) ?>" required>
                            </div>
                        </div>

                        <div class="inpPart">
                            <label>Additional Passenger</label>
                            <div class="input">
                                <input type="number" step="0.01" name="additionalPassenger" value="<?= htmlspecialchars($fareRates['Auto Rickshaw']['additionalPassenger']) ?>" required>
                            </div>
                        </div>

                        <div class="inpPart">
                            <label>Fare Rate / KM</label>
                            <div class="input">
                                <input type="number" step="0.01" name="fareRateKM" value="<?= htmlspecialchars($fareRates['Auto Rickshaw']['fareRate/KM']) ?>" required>
                            </div>
                        </div>

                        <input type="hidden" name="vehicle" value="Auto Rickshaw">

                        <div class="btnEdit">
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

    <script>
        function updateFareDetailsAndPassengers() {
            // Get the selected option for vehicle type
            const vehicleTypeSelect = document.getElementById('vehicleType');
            const selectedOption = vehicleTypeSelect.options[vehicleTypeSelect.selectedIndex];

            // Retrieve data attributes from the selected option
            const startingPrice = parseFloat(selectedOption.getAttribute('data-starting-price'));
            const additionalPassenger = parseFloat(selectedOption.getAttribute('data-additional-passenger'));
            const fareRateKM = parseFloat(selectedOption.getAttribute('data-fare-rate-km'));

            // Update the fare details on the page
            document.getElementById('startingPrice').textContent = startingPrice.toFixed(2);
            document.getElementById('fareRateKM').textContent = fareRateKM.toFixed(2);

            // Get the selected number of passengers
            const passengerSelect = document.getElementById("numberOfPassengers");
            const numPassengers = parseInt(passengerSelect.value) || 0; // Default to 0 if no selection

            // Calculate the additional passenger cost
            const totalAdditionalPassenger = additionalPassenger * numPassengers;
            document.getElementById('additionalPassenger').textContent = totalAdditionalPassenger.toFixed(2);

            // Get the number of kilometers entered
            const kilometers = parseFloat(document.getElementById('testCalculate').value) || 0;

            // Update the total price
            updateTotalPrice(startingPrice, additionalPassenger, fareRateKM, numPassengers, kilometers);
        }

        function updatePassengerOptions(vehicleType) {
            // Get the passenger select dropdown
            var passengerSelect = document.getElementById("numberOfPassengers");

            // Clear current options
            passengerSelect.innerHTML = '<option disabled selected style="display: none;">Select Number of Passengers</option>';

            // Define the number of passengers for each vehicle type
            var options = [];

            switch (vehicleType) {
                case 'Car':
                    options = [1, 2, 3, 4];
                    break;
                case 'Motorcycle':
                    options = [1];
                    break;
                case 'Tricycle':
                case 'Auto Rickshaw':
                    options = [1, 2, 3];
                    break;
                default:
                    options = [];
                    break;
            }

            // Add the new options
            options.forEach(function(num) {
                var option = document.createElement("option");
                option.value = num;
                option.text = num;
                passengerSelect.appendChild(option);
            });
        }

        function updateTotalPrice(startingPrice, additionalPassenger, fareRateKM, numPassengers, kilometers) {
            // Calculate the additional passenger cost
            const additionalPassengerCost = additionalPassenger * numPassengers;

            // Calculate the fare rate cost
            const fareRateCost = fareRateKM * kilometers;

            // Calculate the total price
            const totalPrice = startingPrice + additionalPassengerCost + fareRateCost;

            // Update the total price display
            document.getElementById('totalPrice').textContent = totalPrice.toFixed(2);
        }

        // Update total price when kilometers change
        document.getElementById('testCalculate').addEventListener('input', function() {
            updateFareDetailsAndPassengers(); // Recalculate based on updated kilometers
        });

        // Call this function when vehicle type is changed
        document.getElementById('vehicleType').addEventListener('change', function() {
            const selectedVehicle = this.value;
            updatePassengerOptions(selectedVehicle); // Update the number of passengers dropdown based on selected vehicle
            updateFareDetailsAndPassengers(); // Recalculate the fare details and update total
        });

        // Initialize by calling this function once on page load
        window.onload = function() {
            updateFareDetailsAndPassengers(); // Ensures everything is calculated correctly initially
            const vehicleType = document.getElementById('vehicleType').value;
            updatePassengerOptions(vehicleType); // Initialize passenger options on page load
        };
    </script>


</body>

</html>