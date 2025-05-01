<!-- Additional Vehicle Fillup Form -->

<?php
include '../../php/addVehiclePHP/addVehicleForm.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vehicle</title>
    <link rel="stylesheet" href="../../static/stylesheet/components/style.css">
    <link rel="stylesheet" href="../../static/stylesheet/css/userfillup.css">
    <link rel="stylesheet" href="../../static/stylesheet/css/addVehicleForm.css">
</head>

<body>
    <div class="whole">
        <h1>Hello, <?php echo htmlspecialchars($firstName . ' ' . $lastName); ?></h1>
        <p>Please fill up the form to add another Vehicle</p>
        <form method="POST" action="../../php/addVehiclePHP/addVehicleForm.php" enctype="multipart/form-data">
            <div class="formCon">
                <h3>Vehicle Information</h3>
                <div class="inpPart">
                    <label>Vehicle Type</label>
                    <div class="input">
                        <select name="addvehicleType" required>
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
                        <input type="text" name="addvehiclePlateNo" required>
                    </div>
                </div>
                <div class="inpPart">
                    <label>Vehicle Make</label>
                    <div class="input">
                        <input type="text" name="addvehicleMake" required>
                    </div>
                </div>
                <div class="inpPart">
                    <label>Vehicle Model</label>
                    <div class="input">
                        <input type="text" name="addvehicleModel" required>
                    </div>
                </div>
                <div class="inpPart">
                    <label>Model Year</label>
                    <div class="input">
                        <select name="addvehicleModelYear" id="yearSelect" required>
                            <option disabled selected style="display: none;"></option>
                            <option disabled>Model Year</option>
                        </select>
                    </div>
                </div>
                <div class="inpPart">
                    <label>Vehicle Color</label>
                    <div class="input">
                        <input type="text" name="addvehicleColor" required>
                    </div>
                </div>
                <div class="inpPart">
                    <label>Vehicle Ownership</label>
                    <div class="input">
                        <select name="addvehicleOwnership" required>
                            <option disabled selected style="display: none;"></option>
                            <option value="Owned">Owned</option>
                            <option value="Borrowed / Rented">Borrowed / Rented</option>
                            <option value="Second Hand">Second Hand</option>
                            <option value="New">New</option>
                        </select>
                    </div>
                </div>

                <input type="hidden" name="addvehicleStatus" value="Pending">


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

            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        const startYear = 1950;
        const endYear = new Date().getFullYear();
        const yearSelect = document.getElementById('yearSelect');

        for (let year = endYear; year >= startYear; year--) {
            const option = document.createElement('option');
            option.value = year;
            option.text = year;
            yearSelect.appendChild(option);
        }
    </script>
</body>

</html>