<?php
session_start();
session_unset();
session_destroy();
header("Location: ../template/loginPage/index.php"); // Redirect to login page after logout
exit;
?>