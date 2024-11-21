<?php include('partial_front/menu.php'); ?>


<?php 
    if(isset($_GET['cat_id'])){
        $cat_id=$_GET['cat_id'];

        $sql="SELECT title from category where cat_id=$cat_id";

        $result=mysqli_query($conn,$sql);

        $row=mysqli_fetch_assoc($result);

        $cat_title=$row['title'];


    }
    else{
        header('location:'.SITEURL);
    }


?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $cat_title; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 

                    $sql2="SELECT * FROM menu_item WHERE cat_id=$cat_id";
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

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partial_front/footer.php'); ?>