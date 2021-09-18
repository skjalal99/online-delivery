<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
<?php

if(isset($_SESSION['order']))
{
    echo $_SESSION['order'];
    unset( $_SESSION['order']);

}
?>



<?php

        $sql = "SELECT * FROM tbl_food WHERE featured='Yes' and active='Yes'";

        $res = mysqli_query($conn, $sql);

        if($res == TRUE)
        {

            $count = mysqli_num_rows($res);

            if($count>0)
            {
                while($row = mysqli_fetch_assoc($res))
                {

                    $f_id = $row['id'];
                    $title = $row['title'];
                    $description = $row['descriptn'];
                    $price = $row['price'];
                    $image = $row['img_name'];


?>         

            <div class="food-menu-box">
                <div class="food-menu-img">
                     <img src="<?php echo SITE_URL;?>/admin/assets/images/food/<?php echo $image;?>"  alt="Food" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title;?></h4>
                    <p class="food-price">$ <?php echo $price;?></p>
                    <p class="food-detail">
                          <?php echo $description;?>
                    </p>
                    <br>

                    <a href="<?php echo SITE_URL;?>/order.php?id=<?php echo $f_id;?>" class="btn btn-primary" type="submit">Order Now</a>
                </div>
            </div>

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

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->