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


<!-- Add admin form starts  -->

    <form method="post">
      <div class="form-group row">
        <label for="inputfull_name" class="col-sm-2 offset-sm-2 col-form-label">Full Name</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="Full_name" placeholder="Full Name">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">User Name</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="User_name" placeholder="User Name">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3"  class="col-sm-2 offset-sm-2 col-form-label">Password</label>
        <div class="col-sm-4">
          <input type="password" class="form-control" name="Password" placeholder="Password">
        </div>
      </div>
        
      <div class="form-group row ">
        <div class="col-sm-10 text-center">
          <input type="submit" class="btn btn-primary " name="input_submit" value="Submit">
        </div>
      </div>
    </form>  <!-- Add admin form Ends  -->


  </div>
</div>









<?php 



if(isset($_POST['input_submit'])){

  //get the data from submitted form

   $Full_name = $_POST['Full_name'];
   $User_name = $_POST['User_name'];
   $Password = md5($_POST['Password']);


  // Sql query to save data into db

  $sql = "INSERT INTO tbl_admin SET
    full_name = '$Full_name',
    user_name = '$User_name',
    password = '$Password'" ;

    // Execute the sql query


    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    if($res == TRUE)
    
      {
    
      // creating a session variable to display msg on success:

        $_SESSION['addadmin']  = "New admin inserted successfully" ;
      
      // Redirecting after success to home:

      header("Location:".SITE_URL."/admin/manage-admin.php");
      
      }
    else
      {
        $_SESSION['unsuccess']  = "Unsuccessful" ;
        header("Location:http://localhost/online-delivery/admin/manage-admin.php");

      }


   
}


?>




<?php include('includes/footer.php');?>