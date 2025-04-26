<?php include('partial-front/menu.php'); ?>

<!-- Categories Section Starts Here -->
<section class="special-combo">
    <h2 class="text-center">Explore Foods</h2>
    <div class="combo-cards">

        <?php
        // Display all categories that are active
        $sql = "SELECT * FROM tbl_category WHERE active='YES'";
        $res = mysqli_query($conn, $sql);

        if ($res && mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
                ?>
                
                <a href="pizza_menu.php?category_id=<?php echo $id; ?>">
                    <div class="combo-card">
                        <?php if ($image_name != "") { ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                        <?php } else { ?>
                            <div class="error">Image not found.</div>
                        <?php } ?>
                        <h3 class="float-text text-white"><?php echo $title; ?></h3>
                    </div>
                </a>

                <?php
            }
        } else {
            // Category not available
            echo "<div class='error'>Category not found.</div>";
        }
        ?>

    </div>
</section>
<br>

<?php include('partial-front/footer.php'); ?>
