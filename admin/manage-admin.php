<?php include('includes/header.php');?>

<?php include('includes/nav-menu.php');?>


    <!-- breadcrumb ends -->
            <div class='container'>
                    <div aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Category</li>
                    </ol>
            </div>
    <!-- breadcrumb ends -->
    <!-- main starts -->
     <div class='container main-cont'>

    <?php
    if(isset($_SESSION['addadmin'])){

        echo '<div class="alert alert-success" role="alert">'.$_SESSION['admin-del'].'</div>';
        unset($_SESSION['addadmin']);
    
    }

// Delete admin session msg 

    if(isset($_SESSION['admin-del'])){

        echo '<div class="alert alert-success" role="alert">'.$_SESSION['admin-del'].'</div>';
        unset($_SESSION['admin-del']);
    
    }
    
    ?>





            <h3>
                Manage Admin
            </h3>

            <a class="btn btn-primary" href="add-admin.php" role="button">Add Admin</a>

            <div class='row'>
                    <div class='col-md-12 table-manage'>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">S.NO</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php

                            //query to get data from db

                            $sql = "select * from tbl_admin";

                            // Execution

                            $res = mysqli_query($conn, $sql);

                            //to check query executed:

                            if($res == TRUE){

                            // count rows  to check data available in db:

                            $count = mysqli_num_rows($res); // this function will get all row from db

                            $sno = 1;

                            if($count>0){

                                //we have data in db:

                                while($rows=mysqli_fetch_assoc($res)){
                            
                                //while loop will run as long as data runs in loop:

                                //Get individual data
                             
                                    $id = $rows['id']; 
                                    $full_name = $rows['full_name']; 
                                    $user_name = $rows['user_name']; 
                                    

                                //To Display the value:

                             ?>   
                             
                            <tr>
                                    <th scope="row"><?php echo $sno++.'.';?></th>
                                    <td><?php echo $full_name;?></td>
                                    <td><?php echo $user_name;?></td>
                                    <td>
                                        <a class="btn btn-success" href="<?php echo SITE_URL;?>/admin/update-admin.php?id=<?php echo $id ?>" role="button">Update</a>
                                        <a class="btn btn-danger" href="<?php echo SITE_URL;?>/admin/del-admin.php?id=<?php echo $id?>" role="button">Delete</a>
                                    </td>
                            </tr>




                             <?php

                                } // end of while loop:
                            
                                } //end of if count:

                            else{

                                 }

                            } // end of if res:


                            ?>


                                
                                
                            </tbody>
                        </table>

                     </div>
             </div>

        </div>
   </div>


<?php include('includes/footer.php');?>