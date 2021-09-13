<?php include('includes/header.php');?>

<?php include('includes/nav-menu.php');?>

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

    <!-- Add Cat form starts  -->

        <form action=" " method="post" enctype="multipart/form-data">
           
            <div class="form-group row">
              <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Categories Name:</label>
              <div class="col-sm-4">
                <input type="text"  class="form-control" name="title" placeholder="New Category title">
              </div>
            </div>

            <div class="form-group row">
                <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Image:</label>
                    <div class="col-sm-4">
                           <input type="file" name="img_file">
                    </div>   
            </div>

           <div class="form-group row">
                <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Featured:</label>
                    <div class="col-sm-4">
                            <label class="radio-inline radio-button">
                                <input type="radio" name="featured" value="Yes" checked> Yes
                            </label> 
                            <label class="radio-inline radio-button">
                                <input type="radio" name="featured" value="No"> No
                            </label>
                    
                    </div>   
            </div>   
            <div class="form-group row">
                <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Active Status:</label>
                    <div class="col-sm-4">
                            <label class="radio-inline radio-button">
                                <input type="radio" name="active" value="Yes" checked> Yes
                            </label>
                            <label class="radio-inline radio-button">
                                <input type="radio" name="active" value="No"> No
                            </label>
                    
                    </div>   
            </div> 
             
            <div class="form-group row ">
                <div class="col-sm-10 text-center">
                
                 <input type="submit" class="btn btn-primary " name="add_cat" value="Add ">
              
                </div>
            </div>

       </form>  <!-- add cat form Ends  -->
      

</div>


<?php

if(isset($_POST['add_cat']))
{

      $title =  $_POST['title'];
     // $img_file = $_POST['img_file'];

    //print_r($_FILES['img_file']);

    //die();

     
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


            // upload image

            if(isset($_FILES['img_file']['name']))
            {

             //Get the image name
             $image_name1 = $_FILES['img_file']['name'];

            //auto renaming and getting extension of image
            $ext = end(explode('.', $image_name1));

             // rename the image name:
            $image_name1 = "Food_cat_".rand(00000,99999).'.'.$ext; // eg:Food_cat_12321.jpg

            // Get from source path
              $source_path = $_FILES['img_file']['tmp_name'];
            
              // set the destination path
              $destination_path = "../admin/assets/images/category/".$image_name1;
            
              // move the uploaded file to destination
              $upload = move_uploaded_file($source_path, $destination_path);
            
              //if upload file failed
              if($upload == FALSE)
              {

                $_SESSION['upload-error'] = "<div class='alert alert-warning text-center' role='alert'>Error: Uploading failed</div>";

                header('location:'.SITE_URL.'/admin/manage-category.php');
                
                die();

              }

             
                          
            }


       //sql query
        
        $sql = "INSERT INTO tbl_category SET title = '$title', image_name = '$image_name1', featured = '$featured', active = '$active'";

        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if($res == TRUE)
        {
            //session 
           $_SESSION['inserted'] = "<div class='alert alert-success text-center' role='alert'>".$image_name." New Category added successfully</div>";

           // Redirection

           header('location:'.SITE_URL.'/admin/manage-category.php');
       }

}


?>





<?php include('includes/footer.php');?>