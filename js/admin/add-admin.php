<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br/><br/><br/>

        <?php
            if(isset($_SESSION['add']))//checking whether the session is set not
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter Your name" required /></td>
                </tr>

                <tr>
                    <td>User name: </td>
                    <td><input type="text" name="user_name" placeholder="Enter User name" required /></td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Enter password" required /></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
if (isset($_POST['submit'])) {
    // Get form data
    $full_name = $_POST['full_name'];
    $user_name = $_POST['user_name'];
    $password = md5($_POST['password']); // password encryption

    // SQL query
    $sql = "INSERT INTO tbl_admin (full_name, user_name, password) 
            VALUES ('$full_name', '$user_name', '$password')";

    // Execute query
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    // Check result
    if ($res == TRUE) {
        $_SESSION['add'] = "Admin added successfully";
        header("location:" . SITEURL . 'admin/manage-admin.php');
    } else {
        $_SESSION['add'] = "Failed to add admin";
        header("location:" . SITEURL . 'admin/add-admin.php');
    }
}
?>
