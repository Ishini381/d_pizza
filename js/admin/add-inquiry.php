<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Message</h1>
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
                    <td>Email: </td>
                    <td><input type="email" name="email" placeholder="Enter Your Email" required /></td>
                </tr>

                <tr>
                    <td>Phone: </td>
                    <td><input type="text" name="phone" placeholder="Enter phone number" required /></td>
                </tr>

                <tr>
                    <td>Message: </td>
                    <td><textarea name="message" cols="30" rows="5" placeholder="Your message" ></textarea></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Message" class="btn-secondary">
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
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message']; 

    // SQL query
    $sql = "INSERT INTO tbl_contact (full_name, email, phone, message) 
            VALUES ('$full_name', '$email', '$phone', '$message')";

    // Execute query
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    // Check result
    if ($res == TRUE) {
        $_SESSION['add'] = "<div class='success'> Inquiry added successfully. </div>";
        header("location:" . SITEURL . 'admin/manage-contact.php');
    } else {
        $_SESSION['add'] = "<div class='error'> Failed to add Inquiry. </div>";
        header("location:" . SITEURL . 'admin/manage-contact.php');
    }
}
?>
