<?php
    include('../config/constants.php');

    //get id of admin to be deleted
    echo $id = $_GET['id'];

    //create sql query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id = $id";

    //execute the query
    $res = mysqli_query($conn,$sql);

    if($res == TRUE)
    { 
        $_SESSION['delete'] = "<div class='success'>Admin deleted successfully.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'>Failed to delete admin. Try again later.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    //Redirect to manage admin page with message
?>