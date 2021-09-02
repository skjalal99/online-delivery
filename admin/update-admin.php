<?php include('includes/header.php');?>

<?php include('includes/nav-menu.php');?>



<!-- breadcrumb ends -->
<div class='container'>
                    <div aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Admin</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Admin</li>
                    </ol>
            </div>
    <!-- breadcrumb ends -->



<div class="container">
            <h3 class="text-center">
                Add Admin
                <small class="text-muted">- Add Admin users to access Dashboard</small>
            </h3></br>



<?php
// Get the id of selected user

$id = $_GET['id'];

// Create sql query
$sql =  "SELECT * FROM tbl_admin where id =$id";

//execute

$res =  mysqli_query($conn, $sql);

// check wheather query executed or not
if ($res == TRUE){

$count = mysqli_num_rows($res);

// check we have user or not

if($count==1){

    // get details

    $row = mysqli_fetch_assoc($res);

   echo $full_name = $row['full_name'];
    echo $user_name = $row['user_name'];

}
else{

    header('location:'.SITE_URL.'admin/manage-admin.php');

}
}



?>


<!-- Add admin form starts  -->

    <form method="post">
      <div class="form-group row">
        <label for="inputfull_name" class="col-sm-2 offset-sm-2 col-form-label">Full Name</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="Full_name" Value="<?php echo $full_name;?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">User Name</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="User_name" Value="<?php echo $user_name;?>">
        </div>
      </div>
    
        
      <div class="form-group row ">
        <div class="col-sm-10 text-center">
            <input type="hidden" name ="id" value="<?php echo $id;?>">
          <input type="submit" class="btn btn-primary " name="update_submit" value="update">
        </div>
      </div>
    </form>  <!-- update admin form Ends  -->


  </div>
</div>











<?php include('includes/footer.php');?>