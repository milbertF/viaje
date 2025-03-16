<?php
session_start();
include '../../php/dbConnection.php';

if (!isset($_SESSION['adminID'])) {
    header("Location: ../loginPage/index.php");
    exit();
}

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Fetch vehicle type counts for the current month
$month = date('m');
$vehicleTypes = ['Car', 'Tricycle', 'Tuktuk', 'Motorcycle'];
$vehicleCounts = [];

foreach ($vehicleTypes as $type) {
    $query = "SELECT COUNT(*) as count FROM viaje_report WHERE type_of_vehicle = ? AND MONTH(date) = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $type, $month);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        $data = $result->fetch_assoc();
        $vehicleCounts[$type] = $data['count'] ?? 0;
    } else {
        $vehicleCounts[$type] = 0;
    }
}

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
</head>

<body>
    <div class="whole">
        <main-header user-role="<?= htmlspecialchars($userRole) ?>" profile-picture="<?= htmlspecialchars($_SESSION['profile_picture'] ? '../' . $_SESSION['profile_picture'] : '../../static/images/logo/landscape-placeholder.svg') ?>"></main-header>
        <div class="con">
            <main-sidemenu class="sidebar" user-role="<?= htmlspecialchars($userRole) ?>"></main-sidemenu>
            <div class="container">
                <div class="titleTop">
                    <p>Dashboard</p>
                </div>
                <div class="wrap">
                    <div class="content contentDash">
                        <div class="filterWrapDash">
                            <p>Report/s for the month of</p>
                            <select name="filterDate" id="filterDate">
                                <?php
                                $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                                foreach ($months as $index => $monthName) {
                                    $value = $index + 1;
                                    echo "<option value='$value' " . ($value == date('m') ? 'selected' : '') . ">$monthName</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="graphDash">
                            <canvas id="myChart" style="width:100%;max-width:100%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../static/javascript/header.js"></script>
    <script src="../../static/javascript/sidebar.js"></script>
    <script src="../../static/javascript/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        document.getElementById('filterDate').addEventListener('change', function() {
            let selectedMonth = this.value;
            console.log("Selected Month:", selectedMonth); // Debugging

            fetchData(selectedMonth);
        });

        // Call fetch on page load to display the current month data
        window.onload = function() {
            let currentMonth = new Date().getMonth() + 1; // JS months start from 0
            document.getElementById('filterDate').value = currentMonth;

            fetchData(currentMonth);
        };

        let chart; // Declare chart globally

        function fetchData(month) {
            let url = `../../php/fetch_vehicle_report.php?month=${encodeURIComponent(month)}`;

            console.log("Function fetchData() is running...");
            console.log("Fetching data from:", url); // Debugging: Check the URL

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    console.log("Response from Server:", data); // Debugging

                    if (data.error) {
                        console.error("Error from PHP:", data.error);
                    } else {
                        updateChart(data);
                    }
                })
                .catch(error => console.error("Fetch error:", error));
        }




        function updateChart(data) {
            let xValues = ["Car", "Tricycle", "Tuktuk", "Motorcycle"];
            let yValues = [data.Car, data.Tricycle, data.Tuktuk, data.Motorcycle];
            let barColors = ["red", "blue", "yellow", "green"];

            // Destroy the previous chart instance if it exists
            if (chart) {
                chart.destroy();
            }

            // Create a new chart instance
            chart = new Chart("myChart", {
                type: "bar",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: "Vehicle Reports by Type"
                    }
                }
            });
        }
    </script>
</body>

</html>