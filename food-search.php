<?php include('includes/header.php');?>


   
<?php
$search = $_POST['search'];

$sql = "SELECT * FROM tbl_food WHERE descriptn Like '%$search%' OR title LIKE '%$search%'";

$res = mysqli_query($conn, $sql);

        if($res == TRUE)
        {

            $count = mysqli_num_rows($res);

            if($count>0)
            {
                while($row = mysqli_fetch_assoc($res))
                {

                    echo $title = $row['title'];

                }
            }
            
        }
        else
            {

                echo "You Search for $search not found";

            }
 
?>


    <?php include('includes/footer.php');?>