<?php include('partials/menu.php'); ?>

<?php
    // Check whether ID is set or not
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // SQL query to get selected food
        $sql2 = "SELECT * FROM tbl_food WHERE id=$id";
        $res2 = mysqli_query($conn, $sql2);

        $row2 = mysqli_fetch_assoc($res2);

        // Get individual values
        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['image_name'];
        $current_category = $row2['category_id'];
        $featured = $row2['featured'];
        $active = $row2['active'];
    } else {
        // Redirect to manage food if ID not set
        header('location:' . SITEURL . 'admin/manage-food.php');
        exit();
    }
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                            if ($current_image != "") {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" width="150px">
                                <?php
                            } else {
                                echo "No image available.";
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Select New Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">
                            <?php
                                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                                $res = mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($res);

                                if ($count > 0) {
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $category_title = $row['title'];
                                        $category_id = $row['id'];
                                        ?>
                                        <option <?php if ($current_category == $category_id) echo "selected"; ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                        <?php
                                    }
                                } else {
                                    echo "<option value='0'>Category not available</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if ($featured == "Yes") echo "checked"; ?> type="radio" name="featured" value="Yes">Yes
                        <input <?php if ($featured == "No") echo "checked"; ?> type="radio" name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if ($active == "Yes") echo "checked"; ?> type="radio" name="active" value="Yes">Yes
                        <input <?php if ($active == "No") echo "checked"; ?> type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $category_id = $_POST['category'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                // Check image update
                if ($_FILES['image']['name'] != "") {
                    $image_name = $_FILES['image']['name'];
                    $parts = explode('.', $image_name);
                    $ext = end($parts);
                    $image_name = "Food-Name-" . rand(0000, 9999) . "." . $ext;

                    $src_path = $_FILES['image']['tmp_name'];
                    $dest_path = "../images/food/" . $image_name;

                    $upload = move_uploaded_file($src_path, $dest_path);

                    if ($upload == false) {
                        $_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
                        header('location:' . SITEURL . 'admin/manage-food.php');
                        exit();
                    }

                    // Remove old image
                    if ($current_image != "") {
                        $remove_path = "../images/food/" . $current_image;
                        if (file_exists($remove_path)) {
                            $remove = unlink($remove_path);
                            if ($remove == false) {
                                $_SESSION['remove-failed'] = "<div class='error'>Failed to remove current image.</div>";
                                header('location:' . SITEURL . 'admin/manage-food.php');
                                exit();
                            }
                        }
                    }
                } else {
                    $image_name = $current_image;
                }

                // Update food in database
                $sql3 = "UPDATE tbl_food SET 
                    title = '$title', 
                    description = '$description', 
                    price = $price,
                    image_name = '$image_name', 
                    category_id = '$category_id', 
                    featured = '$featured', 
                    active = '$active' 
                    WHERE id = $id";

                $res3 = mysqli_query($conn, $sql3);

                if ($res3 == true) {
                    $_SESSION['update'] = "<div class='success'>Food Updated Successfully.</div>";
                } else {
                    $_SESSION['update'] = "<div class='error'>Failed to Update Food.</div>";
                }

                header('location:' . SITEURL . 'admin/manage-food.php');
                exit();
            }
        ?>
    </div>
</div>

<?php include('partials/footer.php'); ?>
