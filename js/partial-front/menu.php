<?php include('config/constants.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diamond Foods - Hot Pizza Queen</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/index.css">
    <script src="js/index.js"></script>
</head>
<body>
    <header>
        <!-- Header Section -->
        <img alt="Diamond Foods Logo" src="images/logo.jpg"/>
        <nav>
            <ul>
                <a href="<?php echo SITEURL; ?>">Home</a>
                <a href="<?php echo SITEURL; ?>pizza_menu.php">Pizza Menu</a>
                <a href="<?php echo SITEURL; ?>order.php">Order</a>
                <a href="<?php echo SITEURL; ?>contact_us.php">Contact_Us</a>
                <a href="<?php echo SITEURL; ?>about_us.php">About_Us</a>
                <i class="fas fa-shopping-bag cart-icon"><a href="cart.html"></a></i>
                <a href="<?php echo SITEURL; ?>login.php"><button class="login-btn">Login</button></a>
            </ul>    
        </nav>
    </header>