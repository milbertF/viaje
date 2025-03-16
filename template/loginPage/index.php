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
    <title>Viaje / Admin Login</title>
    <link rel="shortcut icon" href="../../static/images/logo/logoViaje.png" type="image/x-icon">
    <link rel="stylesheet" href="../../static/stylesheet/components/style.css">
    <link rel="stylesheet" href="../../static/stylesheet/css/index.css">
</head>

<body>
    <div class="whole">

        <!-- Show success or error message -->

        <?php if ($errorMessage): ?>
            <div class="modals error-message" role="dialog">
                <p><?php echo htmlspecialchars($errorMessage); ?></p>
            </div>
        <?php endif; ?>

        <div class="indexwrap">
            <div class="indexcon">
                <div class="jjjj">
                    <div class="logo">
                        <img src="../../static/images/logo/logoViaje.png" alt="">
                    </div>
                    <h1>Viaje Admin Panel</h1>
                </div>

                <!-- Login form -->
                <form class="form" action="../../php/login.php" method="POST">
                    <div class="inpPart">
                        <label>Email</label>
                        <div class="input">
                            <input type="email" name="email" required>
                        </div>
                    </div>
                    <div class="inpPart">
                        <label>Password</label>
                        <div class="input">
                            <input type="password" name="password" id="conIinput-Password" required>
                        </div>
                        <div class="showPass">
                            <input type="checkbox" id="showpass">
                            <label for="showpass">Show Password</label>
                        </div>
                    </div>
                    <button type="submit">Login</button>
                </form>

                <p onclick="redirect('forgotpass.html')" class="forgot">forgot password?</p>
            </div>
        </div>
    </div>

    <script src="../../static/javascript/header.js"></script>
    <script src="../../static/javascript/sidebar.js"></script>
    <script src="../../static/javascript/script.js"></script>
    <script>
        document.getElementById('showpass').addEventListener('change', function() {
            var passwordInput = document.getElementById('conIinput-Password');
            if (this.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    </script>
</body>

</html>