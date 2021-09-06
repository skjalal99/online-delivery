<?php
//Session Starts
ob_start();
session_start();


// to store a constant repeating value create constant to hold values:

define('LOCALHOST','localhost');
define('DB_USER', 'root');
define('DB_PASSWORD','');
define('DB_NAME', 'online_delivery');
define('SITE_URL','http://localhost/online-delivery');

$conn = mysqli_connect(LOCALHOST, DB_USER, DB_PASSWORD) or die(mysqli_error()); // Database connection


$db_name = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); // select database name



?>