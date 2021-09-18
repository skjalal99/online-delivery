<?php include('includes/header.php');?>

            <?php 
                        if(isset($_GET['id']))
                        {
                            $f_id = $_GET['id'];

                            $sql = "SELECT * FROM tbl_food WHERE id = '$f_id'";

                            $res = mysqli_query($conn, $sql);

                            if($res ==  TRUE)
                            {

                                $count = mysqli_num_rows($res);

                                if($count == 1)
                                {

                                   $row = mysqli_fetch_assoc($res);
                                   

                                        $title = $row['title'];
                                        $price = $row['price'];
                                        $img   = $row['img_name'];
                              
                                 }
                            }
                        }
                           
                ?>

    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="food-order.php" class="order" method="POST">
                <fieldset>
                    <legend style="color:white;">Selected Food</legend>


                                        <div class="food-menu-img">
                                                    <img src="<?php echo SITE_URL;?>/admin/assets/images/food/<?php echo $img;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                                </div>
                                
                                                <div class="food-menu-desc">
                                                    <h3 style="color:white;"><?php echo $title;?></h3>
                                                     <input type="hidden" name="f_title" value="<?php echo $title;?>">

                                                    <p style="color:white;"class="food-price"><?php echo $price;?></p>
                                                    <input type="hidden" name="f_price" value="<?php echo $price;?>">

                                                    <div style="color:white;" class="order-label">Quantity</div>
                                                    <input type="number" name="qty" class="input-responsive" value="1" required>
                                                 
                                                    
                                                </div>


                </fieldset>
                
                <fieldset>
                    <legend style="color:white;">Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. xyz" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 11113xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. @order.com" class="input-responsive" required>
 
                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="order-submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
<?php include('includes/footer.php');?>

