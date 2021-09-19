<?php include('includes/header.php');?>

<?php include('includes/nav-menu.php');?>


    <!-- breadcrumb ends -->
            <div class='container-fluid'>
                    <div aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Order</li>
                    </ol>
            </div>
    <!-- breadcrumb ends -->
    <!-- main starts -->
     <div class=' main-cont'>
            <h3>
                Manage Order
            </h3>

 

            <div class='row'>
                    <div class='col-md-12 table-manage'>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">S.NO</th>
                                <th scope="col">Food Name</th>
                                <th scope="col" colspan="2">Date</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Customer Mobile</th>
                                <th scope="col">customer Address</th>
                                <th scope="col">customer email</th> 
                                <th scope="col">Qty</th>
                                <th scope="col">Price</th>
                                <th scope="col">Tot</th>
                                <th scope="col">Status</th>
                                <th scope="col"colspan="4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    
                                    $sql = "SELECT * FROM tbl_order";

                                    $res = mysqli_query($conn, $sql) or die(mysqli_error());

                                    $sno = 1;

                                    if ($res ==  true)
                                    {
                                        $count = mysqli_num_rows($res);

                                        if ($count>0) 
                                        {
                                            while($row = mysqli_fetch_assoc($res))
                                            {

                                                $food = $row['food'];
                                                $price = $row['price'];
                                                $qty   = $row['qty'];
                                                $tot   = $row['total'];
                                                $order_date   = $row['order_date'];
                                                $status   = $row['status'];
                                                $customer_name   = $row['customer_name'];
                                                $customer_contact   = $row['customer_contact'];
                                                $customer_email   = $row['customer_email'];
                                                $customer_address   = $row['customer_address'];

                                   
?>
                                <tr>
                                    <td scope="row"><?php echo $sno++;?></td>
                                    <td><?php echo $food;?></td>
                                    <td colspan="2"><?php echo $order_date;?></td>
                                    <td><?php echo $customer_name;?></td>
                                    <td><?php echo $customer_contact;?></td>
                                    <td><?php echo $customer_address;?></td>
                                    <td><?php echo $customer_email;?></td>
                                    <td><?php echo $qty;?></td>
                                    <td><?php echo $price;?></td>
                                    <td><?php echo $tot;?></td>
                                    <td ><?php echo $status;?></td>

                                    <td colspan="4">
                                        <a class="btn btn-success" href="#" role="button">Update</a>
                                        <a class="btn btn-danger" href="#" role="button">Delete</a>
                                    </td>
                                </tr>

                                    <?php
                                    
                                    }
                                                                                                        

                                    }
                                    else
                                    {
                                      echo' 
                                    <tr>
                                        <td colspan="12" class="text-center"><b>No Data</b></td>
                                           
                                    </tr>';

                                    }

                                    }

                                    ?>
 
 
                         
                              
                                
                            </tbody>
                        </table>

                     </div>
             </div>

        </div>
   </div>


<?php include('includes/footer.php');?>