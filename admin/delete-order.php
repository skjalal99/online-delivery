<?php include('includes/header.php');?>

<?php include('includes/nav-menu.php');?>


<?php 

// fetch the id from get method:
if(isset($_GET['id']))
{

        //Fetch Data

        $id = $_GET['id'];

       

        // Generate a del query:
          $sql = "DELETE FROM tbl_order WHERE ID = '$id'";

        //execution:
        $res = mysqli_query($conn,$sql);


          //check query executed or not:

        if($res==TRUE)
        {

              
          //order deleted

          //create a session to echo msg

          $_SESSION['order-del'] = "<div class='alert alert-warning text-center' role='alert'>Deleted Successfully.</div>";

            // Redirect to page:
            

         header("Location:".SITE_URL."/admin/manage-order.php");

        }

        else
        {

            $_SESSION['order-del'] = "<div class='alert alert-warning text-center' role='alert'>Unable to delete order.</div>";

            // Redirect to page:

         header("Location:".SITE_URL."/admin/manage-order.php");

        }

}

?>


