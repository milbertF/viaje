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
$profilePicture = isset($_SESSION['profile_picture']) ? $_SESSION['profile_picture'] : '../../static/images/default-profile.png';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaje / About Us</title>
    <link rel="shortcut icon" href="../../static/images/logo/logoViaje.png" type="image/x-icon">
    <link rel="stylesheet" href="../../static/stylesheet/components/style.css">
    <link rel="stylesheet" href="../../static/stylesheet/css/aboutus.css">
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
                    <p>About Us</p>
                </div>
                <!-- wrapper-->
                <div class="wrap">
                    <!-- content -->
                    <div class="content2">





                        <div class="aboutLogo">
                            <img src="../../static/images/logo/logoViaje.png" alt="">
                        </div>
                        <div class="systemName">
                            <p>Viaje</p>
                            <p>An Automated Notification Mobile Application
                                for Commuters of Zamboanga City</p>
                        </div>
                        <div class="description">
                            <p>This project aims to tackle the
                                various challenges faced by commuters
                                in Zamboanga City, striving to provide reliable,
                                safe, and efficient transportation services.
                                Despite significant technological advancements,
                                commuters often experience unpredictable wait
                                times, a lack of transparency concerning driver
                                credentials, and inadequate emergency communication
                                channels. These persistent issues highlight the
                                necessity for a comprehensive solution that integrates
                                seamless booking systems, real-time notifications,
                                and stringent safety measures. The primary objective
                                of this initiative is to develop and implement Commute
                                Connect, an automated notification web application
                                designed to enhance the commuting experience in
                                Zamboanga City by offering dependable, secure, and
                                efficient transportation options through advanced
                                booking systems, instant notifications, and robust
                                safety features. The development process for Commute
                                Connect will be methodical, beginning with an extensive
                                requirements gathering phase involving stakeholder
                                interviews and market research to ensure the solution
                                addresses the real needs of commuters. The detailed
                                system architecture will encompass key components
                                such as user registration, booking systems,
                                notification mechanisms, safety features, and payment
                                options. Employing the Agile methodology will facilitate
                                iterative development and testing, ensuring continuous
                                alignment with user needs and functionality expectations.
                                Furthermore, feedback from beta testing and pilot phases
                                will be pivotal in driving refinements and enhancements
                                before the final implementation. By systematically
                                addressing the pain points of commuters and integrating
                                state-of-the-art technology, Commute Connect aims to
                                revolutionize the transportation landscape in Zamboanga
                                City, making daily commutes more predictable, transparent,
                                and safe.
                            </p>
                        </div>
                        <div class="behind">
                            <p>People Behind Viaje</p>
                        </div>
                        <div class="member">
                            <div class="partmember">
                                <div class="memberpic">
                                    <img src="../../static/images/member/milbert.png" alt="">
                                </div>
                                <div class="name">
                                    <p>Milbert Falcasantos</p>
                                </div>
                                <div class="role">
                                    <p>FrontEnd Developer</p>
                                </div>
                            </div>
                            <div class="partmember">
                                <div class="memberpic fra">
                                    <img src="../../static/images/member/franz.png" alt="">
                                </div>
                                <div class="name">
                                    <p>Franz Nathaniel Valdez</p>
                                </div>
                                <div class="role">
                                    <p>Project Manager</p>
                                </div>
                            </div>
                            <div class="partmember">
                                <div class="memberpic rog">
                                    <img src="../../static/images/member/rogie.png" alt="">
                                </div>
                                <div class="name">
                                    <p>Rogie Gabotero</p>
                                </div>
                                <div class="role">
                                    <p>BackEnd Developer</p>
                                </div>
                            </div>
                        </div>
                        <div class="description">
                            <h1 class="general">General objective:</h1>
                            <p>The overarching goal of this Capstone Project is
                                to develop and implement Commute Connect, an innovative
                                automated notification web application designed to
                                significantly enhance the commuting experience for
                                residents of Zamboanga City. Commute Connect aims to
                                address critical challenges faced by commuters, providing
                                them with access to reliable, safe, and efficient
                                transportation services. This will be achieved through
                                the integration of seamless booking systems, real-time
                                notifications, and robust safety features. By leveraging
                                advanced technologies and user-centric design principles,
                                the project aspires to create a comprehensive solution that
                                not only meets but exceeds the expectations of Zamboanga
                                City's commuters. The successful implementation of Commute
                                Connect will ensure that users can enjoy a more predictable,
                                transparent, and secure commuting experience, thus contributing
                                to improved quality of life and greater satisfaction with public
                                transportation services. Through meticulous planning, iterative
                                development, and continuous feedback from stakeholders,
                                this Capstone Project will deliver a cutting-edge application
                                that sets a new standard for commuter services in the region.
                            </p>
                        </div>
                        <div class="started">
                            <p>22/06/2024</p>
                        </div>




                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="../../static/javascript/header.js"></script>
    <script src="../../static/javascript/sidebar.js"></script>
    <script src="../../static/javascript/script.js"></script>
</body>

</html>