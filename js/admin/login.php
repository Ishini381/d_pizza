<?php include('../config/constants.php'); ?>
<html>
<head>
    <title>Login - Diamond Foods</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<div class="login">
    <h1 class="text-center">login</h1>

    <?php
    if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }

    if (isset($_SESSION['no-login-message']))
    {
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);
    }
    ?>

    <br /><br />
    <!-- login form starts here -->
    <form action="" method="POST" class="text-center">
        User Name: <br>
        <input type="text" name="user_name" placeholder="Enter Username" /><br><br>

        Password: <br>
        <input type="password" name="password" placeholder="Enter Password" /><br><br>

        <input type="submit" name="submit" value="Login" class="btn-primary">
    </form>
    <!-- login form ends here -->

    <p class="text-center">created by - Hansika Ishini</p>
</div>
</html>

<?php
// Make sure session is started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check whether the submit button is clicked or not
if (isset($_POST['submit'])) {
    // Get data from login form
    $user_name = $_POST['user_name'];
    $password = md5($_POST['password']);

    // SQL to check username and password
    $sql = "SELECT * FROM tbl_admin WHERE user_name='$user_name' AND password='$password'";
    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
        $_SESSION['user'] = $user_name;
        
        header("location:" . SITEURL . 'admin/');
    } else {
        $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
        header("location:" . SITEURL . 'admin/login.php');
    }
}
?>
