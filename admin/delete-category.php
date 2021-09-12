<?php include('includes/header.php');?>

<?php include('includes/nav-menu.php');?>


<?php 

// fetch the id from get method:
if(isset($_GET['id']) && isset($_GET['img']))
{

        //Fetch Data

        $id = $_GET['id'];

        $del_img = $_GET['img'];

        // Generate a del query:
          $sql = "DELETE FROM tbl_category WHERE ID = '$id'";

        //execution:
        $res = mysqli_query($conn,$sql);


          //check query executed or not:

        if($res==TRUE)
        {

          //Query executed successfully then unlink


          $del_img_path = "../admin/assets/images/category/".$del_img;

          $current_img_remove =  unlink($del_img_path);
          



          //Category deleted

          //create a session to echo msg

          $_SESSION['category-del'] = "<div class='alert alert-warning text-center' role='alert'>Deleted Successfully.</div>";

            // Redirect to page:
            

          header("Location:".SITE_URL."/admin/manage-category.php");

        }

        else
        {

            $_SESSION['category-del'] = "<div class='alert alert-warning text-center' role='alert'>Unable to delete category.</div>";

            // Redirect to page:

          header("Location:".SITE_URL."/admin/manage-category.php");

        }

}

?>


