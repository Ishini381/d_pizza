<?php include('partials/menu.php'); ?>

<!-- Main Content Section Starts -->
<div class="main-content">
            <div class="wrapper">
                <h1>Manage Menu</h1>
                <br/><br/>

                <?php
                    if (isset($_SESSION['add'])) 
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                    if (isset($_SESSION['delete'])) 
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if (isset($_SESSION['upload'])) 
                    {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }
                    if (isset($_SESSION['unautorized'])) 
                    {
                        echo $_SESSION['unautorized'];
                        unset($_SESSION['unautorized']);
                    }

                    if (isset($_SESSION['update'])) 
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }


                ?>
                <!-- Button to add Admin -->
                <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add food</a>
                <br/><br/>
                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        //create sql query to get all the food
                        $sql = "SELECT *FROM tbl_food";

                        //Execute the query
                        $res = mysqli_query($conn,$sql);

                        //Count rows 
                        $count = mysqli_num_rows($res);

                        //create serial number variable
                        $sn=1;

                        //check the whether we have data in database or not
                        if($count>0)
                        {
                            //get the food from database and display
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id=$row['id'];
                                $title=$row['title'];
                                $price=$row['price'];
                                $image_name=$row['image_name'];
                                $featured=$row['featured'];
                                $active=$row['active'];

                                ?>
                                
                                <tr>
                                    <td><?php echo $sn ++; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $price; ?></td>
                                    <td>
                                        <?php  
                                            //whether we have image or not 
                                            if($image_name != "")
                                            {
                                                //display the image
                                                ?>
                                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px">
                                                <?php

                                            }
                                            else
                                            {
                                                //display the message
                                                echo "<div class='error'>Image not available</div>";

                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete Food</a>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                        else
                        {
                            echo "<tr> <td colspan = '2' class='error'> Food not added yet. </td> </tr>";
                        }
                    ?>
                </table>

            </div>
        </div>
        <!-- Main Content Section Ends -->

<?php include('partials/footer.php'); ?>