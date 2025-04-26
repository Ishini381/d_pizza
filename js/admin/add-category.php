<?php include('partials/menu.php'); ?>

<div class="maincontent">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br/><br/>

        <?php
            if (isset($_SESSION['add'])) 
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if (isset($_SESSION['upload'])) 
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        
        ?>

        <br/><br/>
        <!-- Add category form Starts -->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the Category" >
                    </td>
                </tr>

                <tr>
                    <td>Image: </td>
                    <td>
                    <input type="file" name="image" >
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
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <!-- Add category form ends -->
        <?php
            //check submit btton is clicked or not
            if (isset($_POST['submit'])) 
            {
                //get the value from category form
                $title = $_POST['title'];

                //radio input,we need to check whether the button is selected or not
                if (isset($_POST['featured'])) 
                {
                    //get the value from from
                    $featured = $_POST['featured'];
                }
                else{
                    $featured = "No";
                }

                //radio input,we need to check whether the button is selected or not
                if (isset($_POST['active'])) 
                {
                    //get the value from from
                    $active = $_POST['active'];
                }
                else{
                    $active = "No";
                }

                //check whether the image is selected or not and set the value for image 
                if (isset($_FILES['image']['name']))
                {
                    //uploaded the image
                    $image_name = $_FILES['image']['name'];
                    
                    //upload the image only if image is selected
                    if($image_name != "")
                    {

                    //auto rename our image
                    //get the extention of our image(jpg,png,gif etc)
                    $ext = end(explode('.', $image_name)); 

                    //rename the image
                    $image_name = "food_category_".rand(000,999).'.'.$ext;

                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/category/" .$image_name;

                    //upload the image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //check whether the image is uploaded or not
                    //if the image is not uploaded then stop the process
                    if($upload == false)
                    {
                        //set message
                        $_SESSION['upload'] = "<div class='error'> Failed to upload image</div>";
                        header("location:" . SITEURL . 'admin/add-category.php');

                        //stop the process
                        die();
                    }
                    
                    }
                }
                else
                {
                    //did't upload image
                    $image_name = "";
                }

                //create sql query to insert into database
                $sql = "INSERT INTO tbl_category SET
                title='$title', image_name='$image_name', featured='$featured', active='$active'";

                //execute the query and save in database
                $res = mysqli_query($conn,$sql);

                //check whether the data is executed or not
                if ($res == TRUE) {
                    $_SESSION['add'] = "<div class='success'> Category added successfully. </div>";
                    header("location:" . SITEURL . 'admin/manage-category.php');
                } else {
                    $_SESSION['add'] = "<div class='error' Failed to uploaded Category.</div>";
                    header("location:" . SITEURL . 'admin/manage-category.php');
                }
            
            }
        ?>
    </div>
</div>

<?php include('partials/footer.php'); ?>
