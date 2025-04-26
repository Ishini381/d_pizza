<?php
    include('../config/constants.php');
    
    //delete the session
    session_destroy();

    //redirect to login page
    header("location:" . SITEURL . 'admin/login.php');

?>
