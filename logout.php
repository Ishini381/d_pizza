<?php
session_start();

include('config/constants.php');

// Destroy all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to login page after logout
header('Location:' . SITEURL . 'login.php');
exit();
?>
