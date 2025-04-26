<?php
session_start();
include("config/constants.php");

$message = "";

if (isset($_POST['send'])) {
    $id = $_POST['id'];
    $contact_id = $_POST['contact_id'];
    $full_name = $_POST['full_name'];
    $email = $_SESSION['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $sql = "INSERT INTO tbl_contact (id, contact_id, full_name, email, phone, message) 
    VALUES ('$id', '$contact_id','$full_name', '$email', '$phone', '$message')";
    
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($res == TRUE) {
        $message ="Feedback submitted successfully!";
    } else {
        $message ="Failed to submit feedback.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diamond Foods - Hot Pizza Queen</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/contact_us.css">
    <script src="js/contact_us.js"></script>
</head>
<body>
    <div class="container">
        <h1>Feed back</h1>
        <form action="" method = "POST"> 
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="tel" name="phone" placeholder="Ex:071 4947546" required>
            <textarea name="message" placeholder="Message" required></textarea>
            <button type="submit" name="send" value="send">SEND</button>
        </form>
    </div>
    <?php if (!empty($message)) { ?>
    <script>
        alert("<?php echo $message; ?>\n\nFull Name: <?php echo $full_name; ?>\nPhone: <?php echo $phone; ?>\nMessage: <?php echo $msg; ?>");
    </script>
    <?php } ?>

</body>
</html>