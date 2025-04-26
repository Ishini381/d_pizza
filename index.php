<?php include('partial-front/menu.php'); ?>

<!-- Hero Section -->
<section class="hero">
    <div class="text-section">
        <h1>Hot Pizza Queen</h1>
        <p>Delicious Pizzas, Irresistible Deals, and Unmatched Convenience<br><br>
        Since Pizza Hut favorites might not be available right now, but we hope to have the full supply of 
        deliciousness back super quick! Your basket looks a little empty, why not check out some of ...</p>
    </div>
    
    <div class="image-section">
        <img src="images/diamond .png" alt="Pizza">
    </div> 
</section>

<!-- Categories Section Starts Here -->
<section class="special-combo">
    <h2 class="text-center">Explore Foods</h2>
    <div class="combo-cards">

        <?php
        // Display all categories that are active
        $sql = "SELECT * FROM tbl_category WHERE active='YES' AND featured='YES' LIMIT 3";
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

<!-- Newsletter Section -->
<section class="connect">
    <img alt="courier boy" src="images/deliveryman.png" />
    <div>
        <h2>Let's Connect!</h2>
        <p>Sign up for our newsletter & get a 10% off bill offers and invites</p>
        <div>
            <form method="POST" action="server.php" onsubmit="return false;">
                <input type="hidden" name="action" value="subscribe">
                <input placeholder="Enter Your E-mail Address" type="email" name="email" />
                <button onclick="subscribe()">Subscribe</button>
            </form>
        </div>    
    </div>
</section>

<!-- Pizza menu section-->
<section class="pizza-menu">
        <h1>PIZZA MENU</h1>
        <h2>THIS IS ALL ABOUT PIZZA</h2>
        <div class="menu-cards">
            <p><b><i></php $category; ?></i></b></p>

            <?php
                $sql = "SELECT * FROM tbl_food WHERE active='Yes' LIMIT 4";
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
                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>"><button>ADD</button></a>
                            
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

<!-- Pizza Overview -->
<section class="pizza-overview">
    <h2>PIZZA OVERVIEW</h2>
    <p class="text-center">CUSTOMER REVIEW</p>
    <div class="review">
        <img alt="Customer Review" src="images/gladgirl-woman.png" />
        <p>“ We tried new hot buttered Cuttlefish and pepper chicken half half pizza. It's delicious as usual. Pepper chicken pizza is a bit hot. <br>
            Pizza hut always try to serve local favourite tastes pizzas. Staff and Service also really good. Don't forget to try <br>
            some local topping pizza.😊🍕🍕🍕 ”</p>
        <p>Date of visit: December 2024</p>
        <p>M.H.Ishini <br> The Best Customer</p>
    </div>
</section>

<?php include('partial-front/footer.php'); ?>
