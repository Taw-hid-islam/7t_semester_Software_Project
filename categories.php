<?php include('partial_front/menu.php'); ?>



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            
            <?php 
            $sql="SELECT * FROM category WHERE active='Yes'";

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
                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?> " alt="Pizza" class="img-responsive img-curve">

                <h3 class="float-text text-white"><?php echo $title; ?></h3>
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

    <?php include('partial_front/footer.php'); ?>