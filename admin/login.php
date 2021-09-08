<?php include('includes/header.php');?>





<div class="container login-container1">
            <div class="row justify-content-center ">
                <div class="col-md-6  login-form">

                <?php
                        if(isset($_SESSION['login']))
                        {
                            echo $_SESSION['login'];
                            unset ($_SESSION['login']);
                        }

                        if(isset($_SESSION['Not-login']))
                        {
                            echo $_SESSION['Not-login'];
                            unset ($_SESSION['Not-login']);
                        }

                ?>



                    <h3>Login</h3>
                    <form method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="login-name" placeholder="User Name *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control"name="login-pass" placeholder="Your Password *" value="" />
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" name="login-submit" class="btn btn-primary" value="Login" />
                        </div>
                       
                    </form>
                </div>
             </div>
</div>   

<?php

if(isset($_POST['login-submit']))
{
   
 $user_name = $_POST['login-name'];
 $password = md5($_POST['login-pass']);

$sql = "SELECT * FROM tbl_admin WHERE user_name = '$user_name' AND password = '$password'";

$res = mysqli_query($conn, $sql) or die(mysqli_error());

    if($res == TRUE)
    {
       $count = mysqli_num_rows($res);

       if($count == 1)
       {
        
        // Session set for login Message:
        
        $_SESSION['login'] =  "<div class='alert alert-success text-center' role='alert'>You are successfully logged in </div>";

        // Session set for user session:

        $_SESSION['user']= $user_name;

        header("location:".SITE_URL.'/admin');

       }
       else
       {
           $_SESSION['login'] = "<div class='alert alert-warning text-center' role='alert'>Try logging again!</div>";

           header('location:'.SITE_URL.'/admin/login.php');
       }

    }

}

?>



