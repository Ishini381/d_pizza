<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>

        <br/><br/>

        <?php
            if (isset($_SESSION['upload'])) 
            {
                echo $_SESSION['upload']; 
                unset($_SESSION['upload']);
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the Food" >
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the Food" ></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category" >
                            <?php
                                //create PHP code to display categories from database
                                //create sql to get all active categories from database
                                //display on dropdown
                                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                                $res = mysqli_query($conn,$sql);

                                $count = mysqli_num_rows($res);

                                if($count >0)
                                {
                                    //we have categories
                                    while($row = mysqli_fetch_assoc($res)) 
                                    {
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        
                                        ?>
                                            <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <option value="0">No category food</option>
                                    <?php
                                }

                                //display the dropdown

                            ?>
                            
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            if (isset($_POST['submit'])) 
            {
                //add the food database
                //get the data from form
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                //check whether radio button for featured and active are checked or not
                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = 'No';
                }

                if(isset($_POST['active'])) 
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = 'No';
                }

                //upload the image if selected
                //check whether select image is clicked or not 
                //upload the image only if the image is selected
                if(isset($_FILES['image']['name']))
                {
                    //get the details of the selected image
                    $image_name = $_FILES['image']['name'];

                    //check whether the image is selected or not
                    if ($image_name!="")
                    {
                        //image is selected
                        // get the extension of the image
                        $ext = end(explode('.', $image_name)); 
                        
                        //upload the image
                        //rename the image with a unique
                        $image_name = "food-name-".rand(0000,9999).".".$ext;

                        //upload the image
                        //get the set path and destination path
                        $src = $_FILES['image']['tmp_name']; 
                        $dst = "../images/food/".$image_name;

                        //upload the food image
                        $upload = move_uploaded_file($src, $dst);
                        
                        //check whether image uploaded or not
                        if ($upload == false) 
                        {
                            $_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
                            header('location:'.SITEURL.'admin/add-food.php');
                            die();
                        }
                    }
                }
                else
                {
                    $image_name = "";
                }

                //insert into database
                //create sql query to save or add food
                $sql2 = "INSERT INTO tbl_food SET
                title = '$title',description ='$description', price = $price, 
                image_name = '$image_name' , category_id = $category,
                featured='$featured', active='$active'";

                //excute the query
                $res2 = mysqli_query($conn, $sql2);

                //check whether data inserted or not
                //redirect with message to manage food page
                if ($res2 == true) 
                {
                    //data inserted successfully
                    $_SESSION['add'] = "<div class='success'> Food Added Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
                else
                {
                    //failed to insert data
                    $_SESSION['add'] = "<div class='error'> Failed to add Food.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
                
            }

        ?>
    </div>
<div>

<?php include('partials/footer.php'); ?>