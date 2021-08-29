<?php include('includes/header.php');?>

<?php include('includes/nav-menu.php');?>


<?php 

// fetch the id from get method:
 $id = $_GET['id'];

 // Generate a del query:
$sql = "DELETE FROM tbl_admin WHERE ID = $id";

 //execution:
 $res = mysqli_query($conn,$sql);

 //check query executed or not:

 if($res==TRUE){

    //Query executed successfully

    //admin deleted

    //create a session to echo msg
    $_SESSION['admin-del'] = "User Deleted Successfully";

    // Redirect to page:

    header("Location:".SITE_URL."/admin/manage-admin.php");

 }

 else{

    $_SESSION['admin-del'] = "Unable to delete user";

     // Redirect to page:

     header("Location:".SITE_URL."/admin/manage-admin.php");
 }

?>



 <!-- breadcrumb ends -->
    <div class='container'>
                        <div aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Admin</li>
                            <li class="breadcrumb-item active" aria-current="page">Delete Admin</li>
                        </ol>
                </div>
        <!-- breadcrumb ends -->



        <div class="container">
                    <h3 class="text-center">
                        Delete Admin
                        <small class="text-muted">- Delete Admin users</small>
                    </h3></br>




                    
        </div>


    </div>
</div>
