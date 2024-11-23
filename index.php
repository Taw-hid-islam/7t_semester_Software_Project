<?php include('partial_front/menu.php'); ?>


<?php
    error_reporting(0);
    session_start();
    session_destroy();
    if($_SESSION['add']){
        $message=$_SESSION['add'];
        echo "<script type='text/javascript'>
        alert('$message');
        </script>";

    }
?>






  
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php 
            $sql="SELECT * FROM category WHERE active='Yes' AND featured='Yes' LIMIT 3";

            $result=mysqli_query($conn,$sql);

            $count=mysqli_num_rows($result);

            if($count>0){
                while($row=mysqli_fetch_assoc($result)){
                    $cat_id=$row['cat_id'];
                    $title=$row['title'];
                    $image_name=$row['image_name'];
                    ?>
                    
                     <a href="<?php echo SITEURL; ?>category-foods.php?cat_id=<?php echo $cat_id; ?>">
                     <div class="box-3 float-container">
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?> "  class="img-responsive img-curve">

                            <h3 class="float-text text-white"> <?php echo $title; ?></h3>
                        </div>
                        </a>
                  <?php

                }
            }


            
            
            ?>

          

           

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->




    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>


            <?php 
            $sql2="SELECT * FROM menu_item WHERE active='Yes' AND featured='Yes' LIMIT 6";

            $result2=mysqli_query($conn,$sql2);

            $count2=mysqli_num_rows($result2);

            if($count2>0){
                while($row=mysqli_fetch_assoc($result2)){
                    $item_id=$row['item_id'];
                    $name=$row['name'];
                    $description=$row['description'];
                    $price=$row['price'];
                    $image_name=$row['image_name'];
                    ?>
                            <div class="food-menu-box">
                        <div class="food-menu-img">
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $name; ?></h4>
                            <p class="food-price">৳ <?php echo $price; ?></p>
                            <p class="food-detail">
                            <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $item_id ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>




                    <?php

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



    <?php include('partial_front/footer.php'); ?>

    