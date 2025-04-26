<?php
// Start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Define constants
define('SITEURL', 'http://localhost/foodsite/');
define('LOCALHOST', 'localhost');
define('DB_PORT', 3307); // Important: no quotes (it's an integer)
define('DB_USERNAME', 'root');
define('DB_PASSWORD', ''); // If your MySQL root has a password, put it here
define('DB_NAME', 'pizza');

// Connect to database with all parameters
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>


