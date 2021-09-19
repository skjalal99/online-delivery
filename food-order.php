
<?php include('includes/header.php');?>

<?php


if(isset($_POST['order-submit']))
{
     $food  =   sanitize($_POST['f_title']);
     $price  =   sanitize($_POST['f_price']);
     $qty    =   sanitize($_POST['qty']);
     $tot    =   sanitize($qty * $price);
     $status = sanitize('ordered');
     $order_date = sanitize(date("d-m-y h:i:sa"));
     $customer_name  =   sanitize($_POST['full-name']);
     $customer_contact    =   sanitize($_POST['contact']);
     $customer_email = sanitize($_POST['email']);
     $customer_address = sanitize($_POST['address']);


     $food  =  esc_str($food);
     $price  = esc_str($price);
     $qty    =   esc_str($qty); 
     $tot    =  esc_str($tot);
     $status =  esc_str($status);
     $order_date =  esc_str($order_date);
     $customer_name  =    esc_str($customer_name);
     $customer_contact    =    esc_str($customer_contact); 
     $customer_email =  esc_str($customer_email);
     $customer_address =  esc_str($customer_address);




    
  
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

   echo $sql1;

   $res1 = mysqli_query($conn,$sql1) or die(mysqli_error());

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