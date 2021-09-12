<?php include('includes/header.php');?>

<?php include('includes/nav-menu.php');?>


<?php 


if(isset($_GET['id']))
{


        // fetch the id from get method:
        $id = $_GET['id'];

        // Generate a del query:
        $sql = "SELECT * FROM tbl_category WHERE ID = $id";

        //execution:
        $res = mysqli_query($conn,$sql);

        //check query executed or not:

        $count = mysqli_num_rows($res);

        
        if($count==1)
        {

            $row  = mysqli_fetch_assoc($res);

            $id = $row['id'];

            $title = $row['title'];

            $current_image = $row['image_name'];

            $featured = $row['featured'];

            $active = $row['active'];



        }
        else
        {
            //create a session to echo msg

            $_SESSION['update'] = "category not found!";

            // Redirect to page:

            header("Location:".SITE_URL."/admin/manage-category.php");



        }



}



?>

<!-- //form to display data -->

<!-- breadcrumb ends -->
<div class='container'>
                <div aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Category</li>
                            <li class="breadcrumb-item active" aria-current="page">Add Categories</li>
                        </ol>
                </div>
    </div>          
<!-- breadcrumb ends -->



<div class="container">
            <h3 class="text-center">
                Add Categories
                <small class="text-muted">- Add Categories to food</small>
            </h3></br>

    <!-- UPDATE Cat form starts  -->

        <form action=" " method="post" enctype="multipart/form-data">
           
            <div class="form-group row">
              <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Categories Name:</label>
              <div class="col-sm-4">
                <input type="text"  class="form-control" name="title" value="<?php echo $title;?>">
              </div>
            </div>

            <div class="form-group row">
                <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Image:</label>
                    <div class="col-sm-4">
                          <?php 
                          
                            if($current_image != " " )
                            {
                            ?>
                                <img src="<?php echo SITE_URL;?>/admin/assets/images/category/<?php echo $current_image;?>" name="current_image" width="100" height="100">
                          
                          <?php
                            
                            }
                            else
                            {

                                echo "No Image";
                            }

                          ?>
                    </div>   
            </div>

            <div class="form-group row">
                <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Image:</label>
                    <div class="col-sm-4">
                           <input type="file" name="change_img">
                    </div>   
            </div>

           <div class="form-group row">
                <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Featured:</label>
                    <div class="col-sm-4">
                            <label class="radio-inline radio-button">
                                <input <?php if($featured=="Yes"){echo "checked";}?> type="radio" name="featured" value="Yes">Yes
                            </label> 
                            <label class="radio-inline radio-button">
                                <input <?php if($featured=="No"){echo "checked";}?> type="radio" name="featured" value="No"> No
                            </label>
                    
                    </div>   
            </div>   
            <div class="form-group row">
                <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Active Status:</label>
                    <div class="col-sm-4">
                            <label class="radio-inline radio-button">
                                <input type="radio" name="active" value="Yes" <?php if($active == "Yes"){echo "checked";}?> > Yes
                            </label>
                            <label class="radio-inline radio-button">
                                <input type="radio" name="active" value="No"  <?php if($active == "No"){echo "checked";}?> > No
                            </label>
                    
                    </div>   
            </div> 
             
            <div class="form-group row ">
                <div class="col-sm-10 text-center">
                
                 <input type="submit" class="btn btn-primary " name="update_cat" value="Update ">
              
                </div>
            </div>

       </form>  <!-- UPDATE cat form Ends  -->
      

</div>



<!-- updating db and get data from form -->
<?php
    if(isset($_POST['update_cat']))
    {
      
        $title = $_POST['title'];
         $current_image;
        
        //  Featured

        if(isset($_POST['featured']))
        {
           
            $featured = $_POST['featured'];
            
        }
        else
        {
             $featured = "No";
        }

        // Active 

        if(isset($_POST['active']))
        {
           
             $active = $_POST['active'];
             
        }
         else
        {
              $active = "No";
        }

        



        // check wheather image is not empty
        if(isset($_FILES['change_img']['name']))
        {
            //Get the image name
            $change_img = $_FILES['change_img']['name'];

            if($change_img !="")
            {

            

                    //auto renaming and getting extension of image
                    $ext = explode('.', $change_img);

                    $ext= end( $ext);

                    // rename the image name:
                    $change_img = "Food_cat_".rand(00000,99999).'.'.$ext; // eg:Food_cat_12321.jpg

                    // Get from source path
                    $source_path = $_FILES['change_img']['tmp_name'];
                    
                    // set the destination path
                    $destination_path = "../admin/assets/images/category/".$change_img;
                    
                    // move the uploaded file to destination
                    $upload = move_uploaded_file($source_path, $destination_path);

                    // check uploaded or not

                 //if upload file failed

                    if($upload == FALSE)
                    {

                        $_SESSION['upload-change-error'] = "<div class='alert alert-warning text-center' role='alert'>Error: Uploading failed</div>";

                        header('location:'.SITE_URL.'/admin/manage-category.php');

                        die();

                    }


                    //remove the current image

                   $current_img_path = "../admin/assets/images/category/".$current_image;

                   $current_img_remove =  unlink($current_img_path);
                    
               
            }
            else
            {
                $change_img = $current_image;

            }

            $sql1 = "UPDATE tbl_category SET 
            title = '$title', 
            image_name = '$change_img',
            featured = '$featured',
            active = '$active'
            WHERE id = '$id'";

          
            $res1  = mysqli_query($conn, $sql1) or die(mysqli_error());

            if($res1 == TRUE)
            {
                $_SESSION['update-cat'] = "<div class='alert alert-success text-center' role='alert'>Category Upldated Successfully.</div>";
                header('location:'.SITE_URL.'/admin/manage-category.php');
            }
            else
            {
                echo "failed";
            }

        }












        // // upload image

        // if(isset($_FILES['change_img']['name']))
        // {
        //     //Get the image name
        //     $change_img = $_FILES['change_img']['name'];

        //     if($change_img !=="")
        //     {

        //     //auto renaming and getting extension of image
        //     $ext = end(explode('.', $change_img));

        //      // rename the image name:
        //     $change_img = "Food_cat_".rand(00000,99999).'.'.$ext; // eg:Food_cat_12321.jpg

        //     // Get from source path
        //       $source_path = $_FILES['change_img']['tmp_name'];
            
        //       // set the destination path
        //       $destination_path = "../admin/assets/images/category/".$change_img;
            
        //       // move the uploaded file to destination
        //       $upload = move_uploaded_file($source_path, $destination_path);

        //       //if upload file failed
        //       if($upload == FALSE)
        //       {

        //         $_SESSION['upload-change-error'] = "<div class='alert alert-warning text-center' role='alert'>Error: Uploading failed</div>";

        //         header('location:'.SITE_URL.'/admin/manage-category.php');

        //         die();

        //       }
              
        //       //remove the current image

        //       $path = "../admin/assets/images/category/".$current_image;

        //       $remove = unlink($path);

        //       if($remove = false)
        //       {
        //         $_SESSION['remove-error'] = "<div class='alert alert-warning text-center' role='alert'>Error: Failed to remove file</div>";

        //         header('location:'.SITE_URL.'/admin/manage-category.php');

        //       }

        //     }
        //     else
        //     {

        //         $change_img = $current_image;

        //     }


        // }
        // else
        // {

        //     $change_img = $current_image;

        // }





      
    }

?>