<?php include('includes/header.php');?>

<?php include('includes/nav-menu.php');?>



<?php
if(isset($_GET['id']))
{

    echo $id = $_GET['id'];

}






?>






<!-- breadcrumb ends -->
<div class='container'>
                    <div aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Admin</li>
                        <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                    </ol>
            </div>
</div>
    <!-- breadcrumb ends -->



<div class="container">
            <h3 class="text-center">
             Change Password
                <small class="text-muted">- Changes user password to access Dashboard</small>
            </h3></br>








<!-- Add admin form starts  -->

<form method="post">
            
            
            
      
            <div class="form-group row">
              <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Current password</label>
              <div class="col-sm-4">
                <input type="password"  class="form-control" name="curr_pwd" Value="">
              </div>
            </div>
      
            <div class="form-group row">
              <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">New password</label>
              <div class="col-sm-4">
                <input type="password"  class="form-control" name="new_pwd" Value="1234">
              </div>
            </div>
      
            <div class="form-group row">
              <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Confirm password</label>
              <div class="col-sm-4">
                <input type="password"  class="form-control" name="confirm_pwd" Value="1234">
              </div>
            </div>
              
            <div class="form-group row ">
              <div class="col-sm-10 text-center">
                  <input type="hidden" name ="id" value="<?php echo $id;?>">
                <input type="submit" class="btn btn-primary " name="change_pwd" value="Change">
              </div>
            </div>
          </form>  <!-- update admin form Ends  -->
      
      
        </div>


</div>  
<!-- //container ends -->


<?php
if(isset($_POST['change_pwd']))
{
    $Current_pwd = md5($_POST['curr_pwd']);
    $New_pwd = md5($_POST['new_pwd']);
    $Confirm_pwd = md5($_POST['confirm_pwd']);
    $id = $_POST['id'];

    $sql = "SELECT * FROM tbl_admin WHERE id='$id' AND password ='$Current_pwd'";
    $res = mysqli_query($conn, $sql);

    if($res == TRUE)
    {

       //check wheather data available or not
      $count =  mysqli_num_rows($res);

        if($count == 1)
        {
          // user exist pass can b changed:
          // verify new pass = confirm pass

                if($New_pwd == $Confirm_pwd)
                {
                  $sql1 = "UPDATE tbl_admin SET password='$New_pwd' WHERE id='$id'";
                  $res1 = mysqli_query($conn,$sql1);
                          if($res1 == TRUE)
                          {
                          // update the sql query:

                            $_SESSION['Pass-changed']="Password Changed Successfully!";
                            header('location:'.SITE_URL.'/admin/manage-admin.php');

                          }
                          else
                          {

                            //Updation failed:

                            $_SESSION['Pass-changed']="Unable to change password!";
                            header('location:'.SITE_URL.'/admin/manage-admin.php');

                          }
                }
                  else
                {
                  $_SESSION['pass-not-match']="Password not matched!";
                  header('location:'.SITE_URL.'/admin/manage-admin.php');
                }
        }
          else
        {
            $_SESSION['user-not-found']="Error : Unable To Change. Something Went Wrong. Try Again!";
            header('location:'.SITE_URL.'/admin/manage-admin.php');
        }

    }
    
}


?>



