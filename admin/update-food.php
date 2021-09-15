<?php include('includes/header.php');?>

<?php include('includes/nav-menu.php');?>



<?php 


if(isset($_GET['id']))
{


        // fetch the id from get method:
        $id = $_GET['id'];

        // Generate a del query:
        $sql = "SELECT * FROM tbl_food WHERE ID = $id";

        //execution:
        $res = mysqli_query($conn,$sql);

        //check query executed or not:

        $count = mysqli_num_rows($res);

        
        if($count==1)
        {

          $row  = mysqli_fetch_assoc($res);

          echo  $id = $row['id'];
          echo  $food_title = $row['title'];
          echo  $food_descr = $row['descriptn'];
          echo  $food_price = $row['price'];
          echo  $food_cat = $row['category_id'];
          echo  $food_curr_image = $row['img_name'];
          echo  $food_featured = $row['featured'];
          echo  $food_active = $row['active'];


        }
        else
        {
            //create a session to echo msg

            $_SESSION['update-food'] = "Food not found!";

            // Redirect to page:

            header("Location:".SITE_URL."/admin/manage-food.php");



        }



}



?>



<!-- breadcrumb ends -->
<div class='container'>
                    <div aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Foods</li>
                        <li class="breadcrumb-item active" aria-current="page">Update Foods</li>
                    </ol>
            </div>
    <!-- breadcrumb ends -->



<div class="container">
            <h3 class="text-center">
               Update Food
                <small class="text-muted">- Update Food </small>

            </h3></br>


    <!-- Update Food  -->

        <form action=" " method="post" enctype="multipart/form-data">
           
            <div class="form-group row">
              <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Title:</label>
              <div class="col-sm-4">
                <input type="text"  class="form-control" name="food_title" value= "<?php echo $food_title;?>" />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Description:</label>
              <div class="col-sm-4">
                <textarea class="form-control" col='4' rows='4' name="food_description" ><?php echo $food_descr;?></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Price:</label>
              <div class="col-sm-4">
                <input type="number"  class="form-control" name="food_price" value= "<?php echo $food_price;?>" />
              </div>
            </div>

            <div class="form-group row">
                <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Current Image:</label>
                    <div class="col-sm-4">
                  
                           <img src="../admin/assets/images/food/<?php echo $food_curr_image;?>" width="100" height='100' alt="No Image to display">
                    </div>   
            </div>

            <div class="form-group row">
                <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Food Image:</label>
                    <div class="col-sm-4">
                           <input type="file" name="food_image">
                    </div>   
            </div>

           <div class="form-group row">
                <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Category:</label>
                    <div class="col-sm-4">
                    <select  class="form-control" name='food_category'>
            
                    <?php
                    
                        $sql = "SELECT * FROM tbl_category WHERE featured = 'Yes' and active = 'Yes'";

                        $res = mysqli_query($conn, $sql) or die(mysqli_query_error());

                        if($res == TRUE)
                        {
                           $count = mysqli_num_rows($res);

                           if ($count>0)
                           {

                                while($row = mysqli_fetch_assoc($res))
                                {

                                   $c_id = $row['id'] ;
                                   $title = $row['title'] ;
                                   $featured = $row['featured'] ;
                                   $active = $row['active'] ;
                            ?>
                                <option <?php if($food_cat==$c_id){ echo "selected";}?> value ='<?php echo $c_id;?>'><?php echo $title;?></option>


                            <?php




                                }

                           }
                        }


                    
                    ?>


                    </select>
             </div>   
            </div>   
            <div class="form-group row">
                <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Featured:</label>
                    <div class="col-sm-4">
                            <label class="radio-inline radio-button">
                                <input type="radio" name="food_featured" value="Yes"  <?php if($featured=="Yes"){echo "checked";} ?>> Yes
                            </label>
                            <label class="radio-inline radio-button">
                                <input type="radio" name="food_featured" value="No" <?php if($featured=="No"){echo "checked";} ?>> No
                            </label>
                    
                    </div>   
            </div> 
            <div class="form-group row">
                <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Active Status:</label>
                    <div class="col-sm-4">
                            <label class="radio-inline radio-button">
                                <input type="radio" name="food_active" value="Yes" <?php if($active=="Yes"){echo "checked";} ?>> Yes
                            </label>
                            <label class="radio-inline radio-button">
                                <input type="radio" name="food_active" value="No" <?php if($active=="No"){echo "checked";} ?>> No
                            </label>
                    
                    </div>   
            </div> 
             
            <div class="form-group row ">
                <div class="col-sm-10 text-center">
                
                 <input type="submit" class="btn btn-primary " name="update_food" value="Update ">
              
                </div>
            </div>

       </form>  <!-- Update Food Ends  -->
      

</div>
</div>

<!-- Collect the data from form and store in db -->

<?php

        if(isset($_POST['update_food']))
        {

           $food_title =    $_POST['food_title'];
           $food_descr =    $_POST['food_description'];
           $food_price =    $_POST['food_price'];
           $food_cat   =    $_POST['food_category'];

           if(isset($_POST['food_featured']))
           {

             $food_featured = $_POST['food_featured'];

            
           }
           else
           {

             $food_featured = 'No';

           }
           if(isset($_POST['food_active']))
           {

             $food_active = $_POST['food_active'];

            
           }
           else
           {

             $food_active = 'No';

           }

           // upload image// upload image

            if(isset($_FILES['food_image']['name']))
            {

                //Get the image name
                $food_image = $_FILES['food_image']['name'];

                if($food_image !="")
                {

                $food_image = $_FILES['food_image']['name'];

                //auto renaming and getting extension of image
                $ext = explode('.', $food_image);
                $ext = end($ext);

                // rename the image name:
                $food_image = "Food_cat_".rand(00000,99999).'.'.$ext; // eg:Food_cat_12321.jpg

                // Get from source path
                $source_path = $_FILES['food_image']['tmp_name'];
            
                // set the destination path
                $destination_path = "../admin/assets/images/food/".$food_image;
            
                // move the uploaded file to destination
                $upload = move_uploaded_file($source_path, $destination_path);

                //if upload file failed
                if($upload == FALSE)
                {

                    $_SESSION['upload-food-error'] = "<div class='alert alert-warning text-center' role='alert'>Error: Uploading failed</div>";

                    header('location:'.SITE_URL.'/admin/manage-food.php');

                    die();

                }

                  //remove the current image

                  $current_img_path = "../admin/assets/images/food/".$food_curr_image;

                  $current_img_remove =  unlink($current_img_path);
    

                }
                else
                {
                    $food_image = $food_curr_image;
    
                }
              }
                    //sql query

                    echo $food_title.$food_descr.$food_price.$food_image.$food_cat.$food_featured.$food_active.$id;

                    
                    $sql1 = "UPDATE tbl_food SET 
                    title = '$food_title', 
                    descriptn='$food_descr',
                    price = '$food_price',
                    img_name = '$food_image', 
                    category_id = '$food_cat',
                    featured = '$food_featured', 
                    active = '$food_active'
                    WHERE id = '$id'";

             

                    $res1 = mysqli_query($conn, $sql1) or die(mysqli_error());

                    if($res1== TRUE)
                    {
                        //session 
                        $_SESSION['inserted'] = "<div class='alert alert-success text-center' role='alert'> Food updated successfully</div>";

                        // Redirection

                        header('location:'.SITE_URL.'/admin/manage-food.php');
                    }



        }


?>






<?php include('includes/footer.php');?>