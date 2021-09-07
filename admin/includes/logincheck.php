

<?php

//checked to loggin
if(!isset($_SESSION['user']))
{
    //Set session msg to login user:
    $_SESSION['Not-login'] = "<div class='alert alert-danger text-center' role='alert'>You are not logged in!</div>";   


    // Navigate to login page:
    header("Location:".SITE_URL.'/admin/login.php');

}


//


?>