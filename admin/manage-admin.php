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

        echo '<div class="alert alert-success" role="alert">'.$_SESSION['addadmin'].'</div>';
    
    }
    else
    {
        echo '<div class="alert alert-warning" role="alert">'.$_SESSION['unsuccess'].'</div>';


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

                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>
                                        <a class="btn btn-success" href="#" role="button">Update</a>
                                        <a class="btn btn-danger" href="#" role="button">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>
                                        <a class="btn btn-success" href="#" role="button">Update</a>
                                        <a class="btn btn-danger" href="#" role="button">Delete</a>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>

                     </div>
             </div>

        </div>
   </div>


<?php include('includes/footer.php');?>