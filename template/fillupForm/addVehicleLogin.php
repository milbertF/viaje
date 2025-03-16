<?php
session_start();
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
    <title>Rider Login</title>
    <link rel="stylesheet" href="../../static/stylesheet/components/style.css">
    <link rel="stylesheet" href="../../static/stylesheet/css/addVehicle.css">
</head>

<body>
    <div class="whole">
        <?php if ($errorMessage): ?>
            <div class="modals error-message" role="dialog">
                <p><?php echo htmlspecialchars($errorMessage); ?></p>
            </div>
        <?php endif; ?>

        <div class="riderLoginWrap">
            <div class="loginContainer">
                <h3>Please Login with your Rider Account</h3>
                <form method="POST" action="../../php/addVehiclePHP/addVehicleLogin.php">
                    <div class="inpPart">
                        <label>Email</label>
                        <div class="input">
                            <input type="text" name="RiderEmail" required>
                        </div>
                    </div>
                    <div class="inpPart">
                        <label>Password</label>
                        <div class="input">
                            <input type="password" name="RiderPassword" id="conIinput-Password" required>
                        </div>
                        <div class="showPass">
                            <input type="checkbox" id="showpass">
                            <label for="showpass">Show Password</label>
                        </div>
                    </div>
                    <button type="submit">LOGIN</button>
                </form>
            </div>
        </div>
    </div>

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