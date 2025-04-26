<?php include('partials/menu.php'); ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>
                <br/><br/></br>

                <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];//displaying session message
                        unset($_SESSION['add']);//Removing session message
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }

                    if(isset($_SESSION['password-not-match']))
                    {
                        echo $_SESSION['password-not-match'];
                        unset($_SESSION['password-not-match']);
                    }

                    if(isset($_SESSION['change-password']))
                    {
                        echo $_SESSION['change-password'];
                        unset($_SESSION['change-password']);
                    }
                ?>
                
                <br/><br/>
                <!-- Button to add Admin -->
                <a href="add-admin.php" class="btn-primary">Add Admin</a>
                <br/><br/>
                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Full name</th>
                        <th>User name</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        // Query to get all admin
                        $sql = "SELECT * FROM tbl_admin";
                        //Execute the query
                        $res = mysqli_query($conn,$sql);

                        //check whether the query is executed of not
                        if($res == TRUE)
                        {
                            //Count rows 
                            $count = mysqli_num_rows($res);
                            
                            $sn=1;

                            //check the num of rows
                            if($count>0)
                            {
                                //we have data in database
                                while($rows = mysqli_fetch_assoc($res))
                                {
                                    //using while loop get the data
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $user_name=$rows['user_name'];

                                    ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $user_name; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>
                                    <?php

                                }

                            }
                            else
                            {
                                //we do not have data in database
                            }

                        }
                    ?>

                </table>

            </div>
        </div>
        <!-- Main Content Section Ends -->

<?php include('partials/footer.php'); ?>