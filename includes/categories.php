
<!-- CAtegories Section Starts Here -->
<section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Our Foods</h2>
 <?php

        $sql = "SELECT * FROM tbl_category WHERE featured='Yes' and active='Yes'";

        $res = mysqli_query($conn, $sql);

        if($res == TRUE)
        {

            $count = mysqli_num_rows($res);

            if($count>0)
            {
                while($row = mysqli_fetch_assoc($res))
                {

                    $title = $row['title'];
                    $image = $row['image_name'];
        

    ?>
        <a href="category-foods.php">
            <div class="box-3 float-container">
                <img src="<?php echo SITE_URL;?>/admin/assets/images/category/<?php echo $image;?>" alt="Pizza" class="img-responsive img-curve">

                <h3 class="float-text text-white"><?php echo $title;?></h3>
            </div>
        </a>

    <?php
                }
            }
            else
            {

                echo "No Data";
            }

}


?>


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->