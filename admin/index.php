<?php include('partials/menu.php')

   ?>

        <!-- main content section start-->
        <div class="main_content">
           <div class="wrapper">
            <h1>Dashboard</h1>

            <div class="col-4 text-center">
                
               <?php
               $sql="SELECT * from category"; 
               $result=mysqli_query($conn ,$sql);
               $count =mysqli_num_rows($result);

               ?>
                <h1><?php echo $count; ?></h1>
                <br>
                catagory
            </div>
            <div class="col-4 text-center">
            <?php
               $sql2="SELECT * from menu_item"; 
               $result2=mysqli_query($conn ,$sql2);
               $count2 =mysqli_num_rows($result2);

               ?>
                <h1><?php echo $count2; ?></h1>
                <br>
                Foods
            </div>
            <div class="col-4 text-center">
            <?php
               $sql3="SELECT * from orders"; 
               $result3=mysqli_query($conn ,$sql3);
               $count3 =mysqli_num_rows($result3);

               ?>
               <h1><?php echo $count3; ?></h1>
                <br>
                Total Orders
            </div>
            <div class="col-4 text-center">
                <?php
                $sql4="SELECT SUM(total) AS Total FROM orders WHERE status='Delivered' "; 
                $result4=mysqli_query($conn ,$sql4);
                $row4=mysqli_fetch_assoc($result4);

                $total_sell=$row4['Total'];
              
                ?>

                <h1>৳<?php echo $total_sell; ?></h1>
                <br>
                Total Sells
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Booking
            </div>
            <div class="col-4 text-center">
                <h1>3</h1>
                <br>
                Staff
            </div>
            <div class="clearfix"></div>
           </div>
          
        </div>
        <!-- content section ends-->
        
<?php include('partials/footer.php') ?>