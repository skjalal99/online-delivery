
<?php include('../admin/includes/logincheck.php');?>
<?php



    if(isset($_SESSION['login'])){

        echo '<div class="alert alert-success" role="alert">'.$_SESSION['login'].'</div>';
        unset($_SESSION['login']);
    
    }
?>
      
    <!-- breadcrumb ends -->
    <div class='container'>
        <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Library</li>
        </ol>
        </div>

        
    <!-- breadcrumb ends -->
    <!-- main starts -->
        <div class='container main-cont'>
        <?php
            if(isset($_SESSION['login'])){

                echo $_SESSION['login'];
                unset($_SESSION['login']);
            
            }
        ?>



        <?php
        
            $sql1 = "SELECT COUNT(DISTINCT('user_name')) FROM tbl_admin";
            $sql2 = "SELECT * FROM tbl_category";
            $sql3 = "SELECT * FROM tbl_food";
            $sql4 = "SELECT * FROM tbl_order";
            $sql5 = "SELECT SUM(total) as Revenue FROM tbl_order WHERE status = 'Delivered'";

            $res1 = mysqli_query($conn, $sql1);
            $res2 = mysqli_query($conn, $sql2);
            $res3 = mysqli_query($conn, $sql3);
            $res4 = mysqli_query($conn, $sql4);
            $res5 = mysqli_query($conn, $sql5);

            $users = mysqli_num_rows($res1);
            $categories = mysqli_num_rows($res2);
            $foods = mysqli_num_rows($res3);
            $orders = mysqli_num_rows($res4);
            $row = mysqli_fetch_assoc($res5);
            $revenue = $row['Revenue'];

                        
        
        ?>

            <h3>
                Dashboard
                <small class="text-muted">(Online Food Delivery)</small>
            </h3>
            <div class="row">

                        <div class="col-md-3 jumbotron jumboclass">
                        <span class="badge badge-primary"><?php echo $users;?></span>
                                <div>Users</div>
                        </div>
                        <div class="col-md-3 jumbotron jumboclass">
                        <span class="badge badge-success"><?php echo $categories;?></span>
                                <div>Categories</div>
                        </div>
                        <div class="col-md-3 jumbotron jumboclass">
                        <span class="badge badge-warning"><?php echo $foods;?></span>
                                <div>Food</div>
                        </div>
                        <div class="col-md-3 jumbotron jumboclass">
                        <span class="badge badge-info"><?php echo $orders;?></span>
                                <div>Orders</div>
                        </div>
                        </div>
                        <div class="col-md-12 jumbotron jumboclass">
                          <h1>Total Revenue <span class="badge badge-dark">$ <?php echo $revenue;?></span></h1>
                        </div>
                        </div>
                </div>
            </div>

    <!-- main ends -->