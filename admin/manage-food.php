<?php include('includes/header.php');?>

<?php include('includes/nav-menu.php');?>


    <!-- breadcrumb ends -->
            <div class='container'>
                    <div aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Food</li>
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
            if(isset($_SESSION['update-food']))
            {
            
                echo $_SESSION['update-food'];
                unset($_SESSION['update-food']);
            
            }
            if(isset($_SESSION['upload-food-error']))
            {

                echo $_SESSION['upload-food-error'];
                unset($_SESSION['upload-food-error']);
            
            }
            if(isset($_SESSION['food-del']))
            {

                echo $_SESSION['food-del'];
                unset($_SESSION['food-del']);
            
            }
            
    ?>

            <h3>
                Manage Food
            </h3>

            <a class="btn btn-primary" href="<?php echo SITE_URL;?>/admin/add-food.php" role="button">Add Food</a>

            <div class='row'>
                    <div class='col-md-12 table-manage'>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">S.NO</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Image</th>
                                <th scope="col">Category</th>
                                <th scope="col">Featured</th>
                                <th scope="col">Active</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>


                    <?php
                    
                  
                    $sql1 =  "SELECT a.id, a.title as f_title,a.descriptn,a.price,a.img_name,a.featured,a.active,b.title as category FROM tbl_food a INNER JOIN tbl_category b ON a.category_id=b.id";
                    //$sql1 =  "SELECT * from tbl_food";

                    $res1 = mysqli_query($conn, $sql1) or die(mysqli_error());


                    if($res1 == TRUE)
                    {
                        
                        $count1 = mysqli_num_rows($res1);
                        

                        if($count1>0)
                        {
                         
                            $sno = 1;

                            while($row1=mysqli_fetch_assoc($res1))
                            {

                                $id = $row1['id'];
                                $title = $row1['f_title'];
                                $description = $row1['descriptn'];
                                $price = $row1['price'];
                                $image = $row1['img_name'];
                                $category = $row1['category'];
                                $featured = $row1['featured'];
                                $active = $row1['active'];
                            ?>
                            <tr>
                                <td scope="row"><?php echo $sno++;?></td>
                                <td scope="row"><?php echo $title;?></td>
                                <td scope="row"><?php echo $description;?></td>
                                <td scope="row"><?php echo $price;?></td>
                                <?php
                                    if($image!="")
                                            {


                                    ?>
                                            
                                <td><img src="<?php echo SITE_URL;?>/admin/assets/images/food/<?php echo $image;?>" width="100" height="100"></td>
                                
                                <?php

                                            }
                                            else
                                            {
                                 ?>
                                           <td><span>No Image</span></td>

                                <?php

                                            }

                                            ?>
                                
                                
                                <td scope="row"><?php echo $category;?></td>
                                <td scope="row"><?php echo $featured;?></td>
                                <td scope="row"><?php echo $active;?></td>
                                <td>
                                        <a class="btn btn-success" href="<?php echo SITE_URL;?>/admin/update-food.php?id=<?php echo $id;?>" role="button">Update</a>
                                        <a class="btn btn-danger" href="<?php echo SITE_URL;?>/admin/delete-food.php?id=<?php echo $id;?>&img=<?php echo $image;?>" role="button">Delete</a>
                                </td>
                            </tr>
                            <?php

                            }

                        }

                        else
                        {
                ?>

                            <td scope="row" colspan='4'><?php echo "No Data Available";?></td>
                          
                <?php
                        }
                       

                    }

                    
                   
                    
                    
                    ?>
                    
            
                                
                            </tbody>
                        </table>

                     </div>
             </div>

        </div>
   </div>


<?php include('includes/footer.php');?>