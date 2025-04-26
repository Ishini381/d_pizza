<?php include('partials/menu.php'); ?>

        <!-- contact Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Contact</h1>
                <br/><br/></br>

                <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];//displaying session message
                        unset($_SESSION['add']);//Removing session message
                    }

                    if(isset($_SESSION['reply']))
                    {
                        echo $_SESSION['reply'];
                        unset($_SESSION['reply']);
                    }

                    
                ?>
                
                <br/><br/>
                <!-- Button to add Contact -->
                <a href="add-inquiry.php" class="btn-primary">Add Message</a>
                <br/><br/>
                <table class="tbl-full">
                    <tr>
                        <th>Id</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Message</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        // Query to get all contact
                        $sql = "SELECT * FROM tbl_contact";
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
                                    $email=$rows['email'];
                                    $phone=$rows['phone'];
                                    $message=$rows['message'];

                                    ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $phone; ?></td>
                                        <td><?php echo $message; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/manage-reply.php?id=<?php echo $id; ?>" class="btn-primary">Send Reply</a>
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
        <!-- contact Section Ends -->

<?php include('partials/footer.php'); ?>