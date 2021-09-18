
<?php include('includes/header.php');?>
<?php
if(isset($_POST['order-submit']))
{
   echo  $food  =   $_POST['f_title'];
   echo  $price  =   $_POST['f_price'];
   echo  $qty    =   $_POST['qty'];
   echo  $tot    =   $qty * $price;
   echo  $status = 'ordered';
   echo $order_date = date("d-m-y h:i:sa");
    echo  $customer_name  =   $_POST['full-name'];
    echo $customer_contact    =   $_POST['contact'];
    echo $customer_email = $_POST['email'];
    echo $customer_address = $_POST['address'];
    
  
   $sql1 = "INSERT INTO tbl_order SET
   food =  '$food',
   price = '$price',
   qty =  '$qty',
   total = '$tot',
   order_date = '$order_date',
   status = '$status',
   customer_name = '$customer_name',
   customer_contact = '$customer_contact',
   customer_email = '$customer_email',
   customer_address = '$customer_address'" ;

   $sql2 = "SELECT * FROM tbl_food";

   $res1 = mysqli_query($conn,$sql1) or die(mysqli_query());

   if($res1 == TRUE)
   {
    $_SESSION['order'] = "<div class='alert alert-success text-center' role='alert'>Thanks for Ordering.</div>";
                header('location:'.SITE_URL.'/foods.php');

   }
   else
   {
    $_SESSION['order'] = "<div class='alert alert-success text-center' role='alert'>Error: Something Went wrong!.</div>";
    header('location:'.SITE_URL.'/foods.php');  
   }

  

}


?>