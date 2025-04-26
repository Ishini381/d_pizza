<?php include('partial-front/menu.php'); ?>
    <section class="pizza-menu">
        <h1>PIZZA MENU</h1>
        <h2>THIS IS ALL ABOUT PIZZA</h2>
        <div class="menu-cards">
            <p><b><i></php $category; ?></i></b></p>

            <?php
                $sql = "SELECT * FROM tbl_food WHERE active='Yes'";
                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if ($count > 0) 
                {
                    while ($row = mysqli_fetch_assoc($res)) 
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                    
                        ?>

                        <div class="menu-card">
                            <?php
                                if ($image_name == "") 
                                { 
                                    echo "<div class='error'>Image not available.</div>";
                                }
                                else
                                {
                                    ?>
                                    <img alt="<?php echo $title; ?>" src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" >
                                    <?php
                                }
                            ?>
                    
                            <h3><?php echo $title;?></h3>
                            <p><?php echo $description;?></p>
                            <p><?php echo $price;?></p>
                            <a href="#"><button>ADD</button></a>
                            
                        </div>
                        <?php
                    }
                }
                else
                {
                    echo "<div class='error'>Food not found.</div>";
                }
            ?>
        </div>
    </section>

<?php include('partial-front/footer.php'); ?>