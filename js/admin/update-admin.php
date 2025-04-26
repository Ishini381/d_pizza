<?php include('partials/menu.php'); ?>

<div class="maincontent">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br/><br/><br/>

        <?php
            //get the id selected admin
            $id = $_GET['id'];

            //create sql query to get the details
            $sql = "SELECT * FROM tbl_admin WHERE id=$id";

            //execute the query
            $res = mysqli_query($conn,$sql);

            //check executed
            if($res == TRUE)
            {
                $count = mysqli_num_rows($res);
                if($count == 1) {
                    $row = mysqli_fetch_assoc($res);

                    $full_name=$row['full_name'];
                    $user_name=$row['user_name'];
                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }            

        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full name: </td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name; ?>"/></td>
                </tr>

                <tr>
                    <td>User name: </td>
                    <td><input type="text" name="user_name" value="<?php echo $user_name; ?>"/></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    //check submit button clicked or not
    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $user_name = $_POST['user_name'];

        $sql = "UPDATE tbl_admin SET 
        full_name = '$full_name',
        user_name = '$user_name' WHERE id = '$id'";

        $res = mysqli_query($conn,$sql);

        if($res == TRUE)
        {
            //Admin updated
            $_SESSION['update'] = "<div class='success'>Admin updated successfully </div>";
            header("location:" . SITEURL . 'admin/manage-admin.php');
        }
        else
        {
            //failed to updated
            $_SESSION['update'] = "<div class='error'>Failed to update admin </div>";
            header("location:" . SITEURL . 'admin/manage-admin.php');
        }

    }
?>
<?php include('partials/footer.php'); ?>