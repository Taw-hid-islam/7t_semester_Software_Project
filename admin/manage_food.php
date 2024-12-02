<?php include('partials/menu.php') ?>

        <!-- main content section start-->
        <div class="main_content">
           <div class="wrapper">
            <h1>Manage Food</h1>
            <br/><br/>
            <!-- Button to add admin-->
            <a href="add_food.php" class="btn btn-primary">Add Food</a>
            <br/><br/><br/>

         
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

            <table class="tbl-full">
               <tr>
                  <th> S.N.</th>
                  <th>Title </th>
                 
                  <th>Price  </th>
                  <th>Image  </th>
                  <th>Feature </th>
                  <th>Active </th>
              
                  <th>Action </th>    
               </tr>


               <?php
               $sql="SELECT * from menu_item"; 
               $result=mysqli_query($conn ,$sql);

               if($result==true){
                  $count =mysqli_num_rows($result);
                  $sn=1;

                  if($count>0){
                     while($rows=mysqli_fetch_assoc($result)){
                        $user_id=$rows['item_id'];
                        $title=$rows['name'];
                      
                        $price=$rows['price'];
                        $image_name=$rows['image_name'];
                        $featured=$rows['featured'];
                        $active=$rows['active'];
                      
                        
                      
                        ?>
                          <td><?php echo $sn++; ?></td>
                        <td><?php echo $title; ?></td>
                       
                        <td><?php echo $price; ?></td>
                        <td>
                           <?php 
                           if($image_name!=""){
                              ?>
                              <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px">
                              <?php
                           }
                           
                           ?>
                        
                        </td>
                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>
                        
                        <td>

                        <a href="<?php echo SITEURL; ?>admin/update_food.php?user_id=<?php echo $user_id; ?>" class="btn btn-success" onclick="return confirm('Are You Sure To Update This Data?');">Update </a>
                        <a href="<?php echo SITEURL; ?>admin/delete_food.php?user_id=<?php echo $user_id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This Data?');">Delete </a>

                        </td>
                     </tr>
                     

                        <?php
                     }

                  }
                  else{

                  }


               }

               
               
               ?>
             </table>

           
           </div>
          
        </div>
        <!-- content section ends-->
       

        <?php include('partials/footer.php') ?>