<?php
    include('../config/constants.php'); 

    //check whether the id and image_name value is set or not
    if (isset($_GET['id']) && isset($_GET['image_name']))
    {
        //Get the value and delete
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //Remove the physical image file is available
        if ($image_name != "") 
        {
            //image is avaliable so remove it
            $path = "../images/category/".$image_name;

            //remove the image
            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['remove'] = "<div class='error' Failed to remove image file.</div>";

                header("location:" . SITEURL . 'admin/manage-category.php');

                die();
            }
        }

        //delete data from database
        $sql = "DELETE FROM tbl_category WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if ($res == true) 
        {
            $_SESSION['delete'] = "<div class='success'> Category deleted Successfully.</div>";
            header("location:" . SITEURL . 'admin/manage-category.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'> Failed to delete category.</div>";
            header("location:" . SITEURL . 'admin/manage-category.php');
        }

    }

    else
    {
        //redirected to manage category page
        header("location:" . SITEURL . 'admin/manage-category.php');
    }
?>