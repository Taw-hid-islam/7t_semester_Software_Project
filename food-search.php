<?php include('partial_front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php 
            $search=$_POST['search'];
            ?>
            
            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
                 $search=mysqli_real_escape_string($conn,$_POST['search']);

                 $sql="SELECT * FROM menu_item WHERE name LIKE '%$search%' OR description LIKE'%$search%'";

                 $result=mysqli_query($conn,$sql);

                 $count=mysqli_num_rows($result);

                 if($count>0){
                    while($row=mysqli_fetch_assoc($result)){

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

                                        <a href="#" class="btn btn-primary">Order Now</a>
                                    </div>
                                </div>

                        <?php
                    }

                 }
                 else{
                    echo"<div class='error'>Food not found.</div>";
                 }

            ?>


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partial_front/footer.php'); ?>