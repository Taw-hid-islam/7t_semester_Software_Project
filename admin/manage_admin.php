<?php include('partials/menu.php') ?>

        <!-- main content section start-->
        <div class="main_content">
           <div class="wrapper">
            <h1>Manage Admin</h1>
            <br/><br/>
            <!-- Button to add admin-->
            <a href="add_addmin.php" class="btn btn-primary">Add admin</a>
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
                  <th>Name </th>
                  <th>Email </th>
                  <th>Phone </th>
                  <th>Action </th>    
               </tr>


               <?php
               $sql="SELECT * from user where role='admin'"; 
               $result=mysqli_query($conn ,$sql);

               if($result==true){
                  $count =mysqli_num_rows($result);
                  $sn=1;

                  if($count>0){
                     while($rows=mysqli_fetch_assoc($result)){
                        $user_id=$rows['user_id'];
                        $user_name=$rows['user_name'];
                        $email=$rows['email'];
                        $phone=$rows['phone'];
                      
                        ?>
                          <td><?php echo $sn++; ?></td>
                        <td><?php echo $user_name; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $phone; ?></td>
                        <td>
                        <a href="<?php echo SITEURL; ?>admin/Password.php?user_id=<?php echo $user_id; ?>" class="btn btn-Primary" onclick="return confirm('Are You Sure To Change Password?');">Change Password</a>  
                        <a href="<?php echo SITEURL; ?>admin/update_admin.php?user_id=<?php echo $user_id; ?>" class="btn btn-success" onclick="return confirm('Are You Sure To Update This Data?');">Update Admin</a>
                        <a href="<?php echo SITEURL; ?>admin/delete_admin.php?user_id=<?php echo $user_id; ?>" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This Data?');">Delete Admin</a>

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