<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Send Reply</h1>

        <br><br>

        <?php
            // Check if the id is set
            if(isset($_GET['id'])) {
                $id = $_GET['id'];

                // Fetch the contact message from DB
                $sql = "SELECT * FROM tbl_contact WHERE id=$id";
                $res = mysqli_query($conn, $sql);

                if($res == TRUE && mysqli_num_rows($res) == 1) {
                    $row = mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $email = $row['email'];
                    $message = $row['message'];
                } else {
                    $_SESSION['reply'] = "<div class='error'>Message not found.</div>";
                    header('location:'.SITEURL.'admin/manage-contact.php');
                    exit();
                }
            } else {
                header('location:'.SITEURL.'admin/manage-contact.php');
                exit();
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td><strong>Full Name:</strong></td>
                    <td><?php echo $full_name; ?></td>
                </tr>

                <tr>
                    <td><strong>Email:</strong></td>
                    <td><?php echo $email; ?></td>
                </tr>

                <tr>
                    <td><strong>Message:</strong></td>
                    <td><?php echo $message; ?></td>
                </tr>

                <tr>
                    <td><strong>Your Reply:</strong></td>
                    <td>
                        <textarea name="reply_message" cols="40" rows="6" required></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                        <input type="submit" name="submit" value="Send Reply" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            if(isset($_POST['submit'])) {
                $to = $_POST['email'];
                $reply_message = mysqli_real_escape_string($conn, $_POST['reply_message']);

                // Simulate sending email (you can replace this with actual mail() function if email is configured)
                // mail($to, "Reply from Admin", $reply_message); // Uncomment if email server is configured

                // Optional: save reply in a `tbl_reply` table or update `tbl_contact` with reply column if available

                $_SESSION['reply'] = "<div class='success'>Reply sent successfully to $to.</div>";
                header('location:'.SITEURL.'admin/manage-contact.php');
                exit();
            }
        ?>
    </div>
</div>

<?php include('partials/footer.php'); ?>
