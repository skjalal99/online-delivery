<?php include('includes/header.php');?>

<?php

// To logout the user:

session_destroy();

// To redirect to login page:

header('location:'.SITE_URL.'/admin/login.php');

?>





