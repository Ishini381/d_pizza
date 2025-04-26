<?php
session_start(); 
include('config/constants.php');

$msg = '';

if (isset($_POST['diamond'])) 
{
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbl_users WHERE username = '$username'";
    $res = mysqli_query($conn, $sql);

    if ($res && mysqli_num_rows($res) == 1) 
    {
        $row = mysqli_fetch_assoc($res);

        // Verify password
        if (password_verify($password, $row['password'])) 
        {
            // Success - Set session
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header('Location:' . SITEURL . 'index.php');
            exit();
        } 
        else 
        {
            $msg = "Incorrect password!";
        }
    } 
    else 
    {
        $msg = "User not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <section class="container2">
        <h1>Login to Your Account (LET'S START YOUR ORDER)</h1>

        <form action="" method="POST">
            <p class="msg"><?= $msg ?></p>

            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" placeholder="Enter Your Email *" required>
            </div>

            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="User Password *" required>
            </div>

            <div class="button-group">
                <a href="<?php echo SITEURL; ?>register.php">
                    <button type="button" class="guest"><i class="fas fa-user-friends icon"></i> Create an account</button>
                </a>

                <a href="<?php echo SITEURL; ?>login.php">
                    <button class="diamond" name="diamond" type="submit"><i class="fas fa-user icon"></i> Log in with Diamond Foods</button>
                </a>

                <a href="<?php echo SITEURL; ?>logout.php">
                    <button type="button" class="account"><i class="fas fa-sign-out-alt icon"></i> Logout</button>
                </a>
            </div>
        </form>
    </section>
</body>
</html>
