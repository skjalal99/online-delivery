<?php include('includes/header.php');?>

<?php include('includes/nav-menu.php');?>


    <!-- breadcrumb ends -->
            <div class='container'>
                    <div aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Category</li>
                    </ol>
            </div>
    <!-- breadcrumb ends -->
    <!-- main starts -->
     <div class='container main-cont'>

    <?php
            if(isset($_SESSION['inserted']))
            {

                echo $_SESSION['inserted'];
                unset($_SESSION['inserted']);
            
            }

            if(isset($_SESSION['upload-error']))
            {

                echo $_SESSION['upload-error'];
                unset($_SESSION['upload-error']);
            
            }
            if(isset($_SESSION['update']))
            {

                echo $_SESSION['update'];
                unset($_SESSION['update']);
            
            }
            if(isset($_SESSION['upload-failed']))
            {

                echo $_SESSION['upload-failed'];
                unset($_SESSION['upload-failed']);
            
            }
    ?>


            <h3>
                Manage Category
            </h3>

            <a class="btn btn-primary" href="add-category.php" role="button">Add Category</a>

                <div class='row'>

                <div class='col-md-12 table-manage'>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">S.NO</th>
                                <th scope="col">Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">Featured</th>
                                <th scope="col">Active</th>
                                </tr>
                            </thead>
                            <tbody>

        <?php
                $sno = 1;

                $sql = "SELECT * FROM tbl_category";

                $res = mysqli_query($conn, $sql);

                if($res == True)
                {
                    $count = mysqli_num_rows($res);

                    if($count >0)
                    {

                         while($row=mysqli_fetch_assoc($res))
                         {
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];

        ?>
                           

                                    <tr>
                                        
                                        <th scope="row"><?php echo $sno++;?></th>
                                        <td><?php echo $title;?></td>

                                        <?php
                                            if($image_name!="")
                                            {


                                         ?>
                                            
                                            
                                           <td><img src="<?php echo SITE_URL;?>/admin/assets/images/category/<?php echo $image_name;?>" width="100" height="100"></td>
                                         
                                         <?php

                                            }
                                            else
                                            {
                                         ?>
                                           <td><span>No Image</span></td>
                                      
                                        <?php
                                        }

                                        ?>
                                        
                                        
                                       

                                      <td><?php echo $featured;?></td>
                                        <td><?php echo $active;?></td>
                                        <td>
                                            <a class="btn btn-success" href="<?php echo SITE_URL;?>/admin/update-category.php?id=<?php echo $id?>" role="button">Update</a>
                                            <a class="btn btn-danger" href="<?php echo SITE_URL;?>/admin/delete-category.php?id=<?php echo $id?>" role="button">Delete</a>
                                        </td>
                                    </tr>
                                  
                            



        <?php

                         }

                    }
                     else
                    {

                            echo "No Data";
                    }
                    

                }
                
                
        ?>


                                <!-- <tbody>

                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>
                                                <a class="btn btn-success" href="#" role="button">Update</a>
                                                <a class="btn btn-danger" href="#" role="button">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>
                                                <a class="btn btn-success" href="#" role="button">Update</a>
                                                <a class="btn btn-danger" href="#" role="button">Delete</a>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table> -->
                            </tbody>
                        </table>

                     </div>
             </div>

        </div>
   </div>


<?php include('includes/footer.php');?>