<?php
    //check whether the user is logged in or not(authorization)
    if(!isset($_SESSION['user']))
    {
        //user is not logged in
        //redirect to login page with message
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access Admin Panel.<div/>";
        
        //redirect to login page
        header('location:'.SITEURL.'admin/login.php');
    
    }
?>