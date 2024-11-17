<?php include('partial_front/menu.php'); ?>
<?php
    if(isset($_GET['food_id']))
    {
        $food_id=$_GET['food_id'];

        $sql="SELECT * from menu_item WHERE item_id=$food_id";
        
        $result=mysqli_query($conn,$sql);

        $count=mysqli_num_rows($result);

        if($count==1){
            $row=mysqli_fetch_assoc($result);
                
                $name=$row['name'];
             
                $price=$row['price'];
                $image_name=$row['image_name'];
                

                 

        }
        else{
            header('location:'.SITEURL);
            }
    }
    else{
        header('location:'.SITEURL);
    }


?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $name; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $name; ?>">


                        <p class="food-price">৳ <?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="quantity" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="Enter name" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="Enter Number" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="Enter email" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="Enter address" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php 

            if(isset($_POST['submit'])){

                $food=$_POST['food'];
                $price=$_POST['price'];
                $quantity=$_POST['quantity'];

                $total=$price * $quantity;

                $order_date=date("Y-m-d h:i:sa"); //order date

                $status="Ordered";
                $customer_name=$_POST['full-name'];
                $contact=$_POST['contact'];
                $email=$_POST['email'];
                $address=$_POST['address'];


                $sql2="INSERT INTO orders SET
                food='$food',
                price=$price,
                quantity=$quantity,
                total=$total,
                order_date='$order_date',
                status='$status',
                customer_name='$customer_name',
                contact='$contact',
                email='$email',
                address='$address' ";

                
     $result2=mysqli_query($conn,$sql2);

     if($result2==TRUE){
        $_SESSION['add']="Food Ordered Successfully";
        header("location:".SITEURL);
        ob_end_flush();
        
     }
     else{
        $_SESSION['add']="Failed to Add Order";
        header("location:".SITEURL);
     }
     


            }
            
            
            
            ?>






        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <?php include('partial_front/footer.php'); ?>