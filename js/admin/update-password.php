<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
    <br/><br/>

    <?php
        if(isset($_GET['$id']))
        {
            $id=$_GET['id'];
        }
    ?>

    <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Current Password</td>
                <td>
                    <input type="password" name="current_password" placeholder="Current Password" >
                </td>
            </tr>

            <tr>
                <td>New Password</td>
                <td>
                    <input type="password" name="new_password" placeholder="New Password" >
                </td>
            </tr>

            <tr>
                <td>Confirm Password</td>
                <td>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" >
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Change Password" class="btn-secondary">
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
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        $sql = "SELECT * FROM tbl_admin SET 
        WHERE id =$id AND password='$current_password'";

        $res = mysqli_query($conn,$sql);

        if($res == TRUE)
        {
            $count=mysqli_num_rows($res);

            if($count == 1)
            {
                if($new_password == $confirm_password)
                {
                    $sql = "UPDATE tbl_admin SET 
                    password='$new_password' WHERE id=$id";

                    $res2 = mysqli_query($conn, $sql);

                    if($res2 == TRUE) 
                    {
                        $_SESSION['change-password'] = "<div class='success'>Password changed successfully.</div>";
                        header("location:" . SITEURL . 'admin/manage-admin.php');
                    }
                    else
                    {
                        $_SESSION['change-password'] = "<div class='error'>Failed to change password. Please try again.</div>";
                        header("location:" . SITEURL . 'admin/manage-admin.php');
                    }
                }

                else
                {
                    $_SESSION['password-not-match'] = "<div class='error'>Passwords do not match.</div>";
                    header("location:" . SITEURL . 'admin/manage-admin.php');
                }
            }
    
        }
        else
        {
            $_SESSION['user-not-found'] = "<div class='error'>User Not Found </div>";
            header("location:" . SITEURL . 'admin/manage-admin.php');
        }

    }
?>
<?php include('partials/footer.php'); ?>