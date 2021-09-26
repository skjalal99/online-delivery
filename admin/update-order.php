<?php include('includes/header.php');?>

<?php include('includes/nav-menu.php');?>
    <!-- breadcrumb ends -->
    <div class='container-fluid'>
                    <div aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update Order</li>
                    </ol>
            </div>
    <!-- breadcrumb ends -->
    <!-- main starts -->
 
            <div class="container">
            <h3 class="text-center">
               Update Food
                <small class="text-muted">- Update Food </small>

            </h3></br>

<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM tbl_order WHERE ID = '$id'";

    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $count = mysqli_num_rows($res);
        if ($count = 1)
         {
            $row = mysqli_fetch_assoc($res);
            $customer_name = $row['customer_name'];
            $customer_email1 = $row['customer_email'];
            $customer_add = $row['customer_address'];
            $customer_mob = $row['customer_contact'];
            $food = $row['food'];
            $qty =  $row['qty'];
            $date = $row['order_date'];
            // $date = strtotime($date);
            // $date = date("d/m/y",$date);
            $status = $row['status'];

        }
    }
}

?>







    <!-- Update Order  -->

        <form action=" " method="post" enctype="multipart/form-data">
        <div class="form-group row">
              <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Customer Name:</label>
              <div class="col-sm-4">
                <input type="text"  class="form-control" name="customer_name" value= "<?php echo $customer_name ;?>" />
              </div>
            </div>

            <div class="form-group row">
                <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Customer Mobile:</label>
                <div class="col-sm-4">
                <input type="number"  class="form-control" name="customer_mob" value= "<?php echo $customer_mob;?>" />
              </div> 
            </div>

            <div class="form-group row">
                <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">customer Address:</label>
                <div class="col-sm-4">
                <input type="text"  class="form-control" name="customer_add" value= "<?php echo  $customer_add;?>" />
              </div> 
            </div>
            <div class="form-group row">
                <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">customer Email:</label>
                <div class="col-sm-4">
                <input type="text"  class="form-control" name="customer_mail" value= "<?php echo $customer_email1;?>" />
              </div> 
            </div>
           
            <div class="form-group row">
              <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Food Name:</label>
              <div class="col-sm-4">
                <input type="text"  class="form-control" name="food_name" value= "<?php echo $food;?>" />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Qty:</label>
              <div class="col-sm-4">
                <input type="text"  class="form-control" name="qty" value= "<?php echo $qty;?>" />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Date:</label>
              <div class="col-sm-4">
                <input type="text" disabled  class="form-control" name="date" value="<?php echo $date;?>"/>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">Status:</label>
              <div class="col-sm-4">
                <select class="form-control" name="status" id="">
                    <option value="<?php echo $status;?>" selected> <?php echo $status;?></option>
                    <option value="Inprocess">Inprocess</option>
                    <option value="Delivered">Delivered</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
            </div>
             
             
            
             
            <div class="form-group row ">
                <div class="col-sm-10 text-center">
                
                 <input type="submit" class="btn btn-primary " name="update_order" value="Update ">
                 <input type="button" class="btn btn-alert " name="cancel" value="Cancel ">
              
                </div>
            </div>

       </form>  <!-- Update Order Ends  -->
      

</div>
</div>


<?php include('includes/footer.php');?>

<?php

if(isset($_POST['update_order']))
{

    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_mail'];
    $customer_add = $_POST['customer_add'];
    $customer_mob = $_POST['customer_mob'];
    $food = $_POST['food_name'];
    $qty =  $_POST['qty'];
    $status = $_POST['status'];

    $sql1 = "UPDATE tbl_order SET 
    food = '$food',
    qty = '$qty',
    status = '$status',
    customer_name = '$customer_name',
    customer_contact = '$customer_mob',
    customer_email = '$customer_email',
    customer_address = '$customer_add'
    WHERE ID = '$id'
    ";
    
    $res1 =  mysqli_query($conn, $sql1);

    if($res1 == TRUE )
    {
        $_SESSION['update-order'] = "<div class='alert alert-success text-center' role='alert'>Order Updated </div>";
        header('location:'.SITE_URL.'/admin/manage-order.php');
    }
    else
    {
        $_SESSION['update-order'] = "<div class='alert alert-success text-center' role='alert'>Something Went Wrong!</div>";
        header('location:'.SITE_URL.'/admin/manage-order.php');
    }

}



?>