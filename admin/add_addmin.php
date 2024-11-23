<?php include('partials/menu.php') ?>


<div class="main_content">
           <div class="wrapper">
            <h1> Add Admin </h1>
            <br><br>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Name: </td>
                        <td><input type="text" name="user_name" placeholder="Enter Your Name"></td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td><input type="text" name="email" placeholder="Enter Your Email"></td>
                    </tr>
                    <tr>
                        <td>Phone: </td>
                        <td><input type="text" name="phone" placeholder="Enter Your phone"></td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td><input type="password" name="password" placeholder="Enter Your password"></td>
                    </tr>
                    <tr>
                        <td colspan="2"> 
                        <input type="submit" name="submit" value="Add Admin" class="btn btn-success">
                        </td>
                        
                    </tr>
                </table>

            </form>

           </div>

</div>


<?php include('partials/footer.php') ?>



<?php 
//process the value to save in database

if(isset($_POST['submit']))
{
     $user_name = $_POST['user_name'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $password = md5($_POST['password']);
     $role="admin";

     //sql query

     $sql="INSERT INTO user SET user_name='$user_name',password='$password',role='$role',email='$email',phone='$phone'";

    

     $result=mysqli_query($conn,$sql) or die(mysqli_error());

     if($result==TRUE){
        $_SESSION['add']="Admin Added Successfully";
        header("location:".SITEURL."admin/manage_admin.php");
        
     }
     else{
        $_SESSION['add']="Failed to Add Admin";
        header("location:".SITEURL."admin/add_admin.php");
     }
     

}
?>