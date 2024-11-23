
    <?php include('partials/menu.php') ?>
    <!-- main content section start-->
    <div class="main_content">
             <div class="wrapper">
              <h1>Update Admin</h1>
              <br><br><br>
              <?php
              $user_id=$_GET['user_id'];
              $sql="SELECT * from user where user_id=$user_id";
              $result=mysqli_query($conn,$sql); 

              if($result==true){
                $count=mysqli_num_rows($result);

                if($count==1){
                   // echo "admin available";
                   $row=mysqli_fetch_assoc($result);
                   $user_name=$row['user_name'];
                   $email=$row['email'];
                   $phone=$row['phone'];

                }
                else{
                    header('location:'.SITEURL.'admin/manage_admin.php');
                }
              }
              
              
              ?>

              
            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Name: </td>
                        <td><input type="text" name="user_name" value="<?php echo $user_name; ?>"></td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
                    </tr>
                    <tr>
                        <td>Phone: </td>
                        <td><input type="text" name="phone" value="<?php echo $phone; ?>"></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2"> 
                         <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">    
                        <input type="submit" name="submit" value="Update Admin" class="btn btn-success">
                        </td>
                        
                    </tr>
                </table>

            </form>

              </div>
          
          </div>


<?php 
    if(isset($_POST['submit'])){
        $user_id=$_POST['user_id'];
        $user_name=$_POST['user_name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];

        $sql ="UPDATE user SET user_name='$user_name',email='$email', phone='$phone' WHERE user_id='$user_id'";
        $result=mysqli_query($conn , $sql);
        if($result==true){
            
        $_SESSION['add']='Update Admin is Successfull';

        header("location:".SITEURL."admin/manage_admin.php");
        }
    }

?>
       
         
  <?php include('partials/footer.php') ?>
