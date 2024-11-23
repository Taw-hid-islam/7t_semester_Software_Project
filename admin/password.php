
<?php include('partials/menu.php') ?>
    <!-- main content section start-->
    <div class="main_content">
             <div class="wrapper">
              <h1>Change Password</h1>
              <br><br><br>
              
              
             <?php
             if(isset($_GET['user_id'])){
                $user_id=$_GET['user_id'];
             }
             
             ?>
              
            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Current Password: </td>
                        <td><input type="password" name="current_password" placeholder="Current Password"></td>
                    </tr>
                    <tr>
                        <td>New Password: </td>
                        <td><input type="password" name="new_password" placeholder="New Password"></td>
                    </tr>
                    <tr>
                        <td>Confirm Password: </td>
                        <td><input type="password" name="confirm_password" placeholder="Confirm Password"></td>
                    </tr>
                    
                    
                    <tr>
                        <td colspan="2"> 
                        
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">   
                            
                        <input type="submit" name="submit" value="Change Password" class="btn btn-success">
                        </td>
                        
                    </tr>
                </table>

            </form>

              </div>
          
          </div>


<?php 
    if(isset($_POST['submit'])){
        $user_id=$_POST['user_id'];
        $current_password=md5($_POST['current_password']);
        $new_password=md5($_POST['new_password']);
        $confirm_password=md5($_POST['confirm_password']);

        $sql ="SELECT * FROM user WHERE user_id=$user_id AND password='$current_password'";
        $result=mysqli_query($conn , $sql);
        if($result==true){
        
            
            if($result==true){
                $count=mysqli_num_rows($result);

                if($count==1){
                  
                    //user exixts and password canbe changeds
                    if($new_password==$confirm_password){

                        $sql2="UPDATE user SET password='$new_password' WHERE user_id=$user_id";
                        $result2=mysqli_query($conn ,$sql2);

                        if($result2==true){
                            $_SESSION['add']='Password Changed Successfully';
                    header("location:".SITEURL."admin/manage_admin.php");

                        }
                        else{
                            $_SESSION['add']='Faild to Changed Password';
                    header("location:".SITEURL."admin/manage_admin.php");

                        }

                    }
                    else{
                        $_SESSION['add']='Password did not Match';
                    header("location:".SITEURL."admin/manage_admin.php");

                    }
                  
                  
                }
                else{
                    $_SESSION['add']='User Not Found';
                    header("location:".SITEURL."admin/manage_admin.php");
                }
              }
    }
}

?>
       
         
  <?php include('partials/footer.php') ?>
