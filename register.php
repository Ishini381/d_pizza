<?php
session_start(); // Start the session
include('config/constants.php');

$msg = '';

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Password confirmation check
    if ($password !== $confirm_password) 
    {
        $msg = "Passwords do not match!";
    } 
    else 
    {
        // Check if user already exists
        $sql = "SELECT * FROM tbl_users WHERE email = '$email' AND password = 'password'";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) 
        {
            $msg = "User already exists!";
        } 
        else 
        {
            // Hash the password before storing it
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert new user
            $sql2 = "INSERT INTO tbl_users (username, email, password) 
                     VALUES ('$username', '$email', '$hashed_password')";
            if (mysqli_query($conn, $sql2)) 
            {
                header('Location:'. SITEURL . 'login.php');
                exit();
            } 
            else 
            {
                $msg = "Registration failed.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <section class="container2">
        <form action="" method="POST">
            <h1>Registration</h1>
            <p class="msg"><?= $msg ?></p> 
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" placeholder="Mobile(Ex:74 2780225) / Email *" required>
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Enter Your Email *" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Password *" required>
            </div>
            <div class="input-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Your Password *" required>
            </div>
            <div class="button-group">
                <button class="account" name="submit"><i class="fas fa-user icon"></i> Register Now</button>
                <p>Already have an account? <a href="login.php">Login Now</a></p>
            </div>
        </form>
    </section>
</body>
</html>
