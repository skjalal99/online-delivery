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

                echo '<div class="alert alert-success" role="alert">'.$_SESSION['login'].'</div>';
                unset($_SESSION['login']);
            
            }
        ?>

            <h3>
                Dashboard
                <small class="text-muted">(Online Food Delivery)</small>
            </h3>
            <div class="row">
            
                        <div class="col-md-3 jumbotron jumboclass">
                        <span class="badge badge-secondary">3</span>
                                <div>Categories</div>
                        </div>
                        <div class="col-md-3 jumbotron jumboclass">
                        <span class="badge badge-secondary">3</span>
                                <div>Categories</div>
                        </div>
                        <div class="col-md-3 jumbotron jumboclass">
                        <span class="badge badge-secondary">3</span>
                                <div>Categories</div>
                        </div>
                        <div class="col-md-3 jumbotron jumboclass">
                        <span class="badge badge-secondary">3</span>
                                <div>Categories</div>
                        </div>
                        </div>
                </div>
            </div>

    <!-- main ends -->