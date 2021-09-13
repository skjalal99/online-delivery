<?php include('includes/header.php');?>

<?php include('includes/nav-menu.php');?>

 <!-- breadcrumb ends -->
    <div class='container'>
                <div aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Food</li>
                            <li class="breadcrumb-item active" aria-current="page">Add Food</li>
                        </ol>
                </div>
    </div>          
<!-- breadcrumb ends -->

<?php
            if(isset($_SESSION['upload-food-error']))
            {

                echo $_SESSION['upload-food-error'];
                unset($_SESSION['upload-food-error']);
            
            }
?>

<div class="container">
            <h3 class="text-center">
                Add Categories
                <small class="text-muted">- Add food</small>
            </h3></br>

    <!-- Add Cat form starts  -->

        <form action=" " method="post" enctype="multipart/form-data">
           
            <div class="form-group row">
              <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Title:</label>
              <div class="col-sm-4">
                <input type="text"  class="form-control" name="food_title" placeholder="New Food title">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Description:</label>
              <div class="col-sm-4">
                <textarea class="form-control" col='4' rows='4' name="food_description" placeholder="Description Text"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Price:</label>
              <div class="col-sm-4">
                <input type="number"  class="form-control" name="food_price" placeholder="00.00">
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

                                   $id = $row['id'] ;
                                   $title = $row['title'] ;
                                   $featured = $row['featured'] ;
                                   $active = $row['active'] ;
                            ?>
                                <option   option value ='<?php echo $id;?>'><?php echo $title;?></option>


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
                                <input type="radio" name="food_featured" value="Yes" checked> Yes
                            </label>
                            <label class="radio-inline radio-button">
                                <input type="radio" name="food_featured" value="No"> No
                            </label>
                    
                    </div>   
            </div> 
            <div class="form-group row">
                <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Active Status:</label>
                    <div class="col-sm-4">
                            <label class="radio-inline radio-button">
                                <input type="radio" name="food_active" value="Yes" checked> Yes
                            </label>
                            <label class="radio-inline radio-button">
                                <input type="radio" name="food_active" value="No"> No
                            </label>
                    
                    </div>   
            </div> 
             
            <div class="form-group row ">
                <div class="col-sm-10 text-center">
                
                 <input type="submit" class="btn btn-primary " name="add_food" value="Add ">
              
                </div>
            </div>

       </form>  <!-- add cat form Ends  -->
      

</div>

<!-- Collect the data from form and store in db -->

<?php

        if(isset($_POST['add_food']))
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

                    header('location:'.SITE_URL.'/admin/add-food.php');

                     die();

                }




             }


                    //sql query
                            
                    $sql1 = "INSERT INTO tbl_food SET 
                    title = '$food_title', 
                    descriptn='$food_descr',
                    price = '$food_price',
                    img_name = '$food_image', 
                    category_id = '$food_cat',
                    featured = '$food_featured', 
                    active = '$food_active'";

               // $sql2 = "SELECT * FROM tbl_category";


                    $res1 = mysqli_query($conn, $sql1) or die(mysqli_error());

                    if($res1== TRUE)
                    {
                        //session 
                        $_SESSION['inserted'] = "<div class='alert alert-success text-center' role='alert'>New Food added successfully</div>";

                        // Redirection

                        header('location:'.SITE_URL.'/admin/manage-food.php');
                    }



        }


?>