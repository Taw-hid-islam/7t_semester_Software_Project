
<?php include('partials/menu.php') ?>
    <!-- main content section start-->
    <div class="main_content">
             <div class="wrapper">
              <h1>Update Category</h1>
              <br><br><br>
              <?php
              ob_start();
              $user_id=$_GET['user_id'];
              $sql="SELECT * from category where cat_id=$user_id";
              $result=mysqli_query($conn,$sql); 

              if($result==true){
                $count=mysqli_num_rows($result);

                if($count==1){
                   // echo "admin available";
                   $row=mysqli_fetch_assoc($result);
                   $name=$row['title'];
                   $current_image=$row['image_name'];
                 
                   $phone=$row['featured'];
                   $address=$row['active'];

                }
                else{
                    header('location:'.SITEURL.'admin/manage_catagory.php');
                }
              }
              
              
              ?>

              
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title: </td>
                        <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
                    </tr>
                    <tr>
                        <td>Current Image: </td>
                        <td>
                            <?php 
                                if($current_image!=""){
                                    ?>
                                       <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="200px">

                                    <?php

                                }
                                else{
                                    echo "Image Not added";
                                }
                            
                            ?>
                
                        </td>
                    </tr>
                    <tr>
                        <td>New Image: </td>
                        <td><input type="file" name="image_name" ></td>
                    </tr>
                    
                    
                    
                    <tr>
                        <td>Feature: </td>
                        <td>
                            <input <?php if( $phone=="Yes"){ echo "Checked";  }  ?>  type="radio" name="phone" value="Yes"> Yes
                             <input <?php if( $phone=="No"){ echo "Checked";  }  ?>  type="radio" name="phone" value="No"> No
                    </td>
                    </tr>
                    <tr>
                        <td>Active: </td>
                        <td>
                            <input <?php if( $address=="Yes"){ echo "Checked";  }  ?>  type="radio" name="address" value="Yes"> Yes
                            <input <?php if( $address=="No"){ echo "Checked";  }  ?>  type="radio" name="address" value="No"> No
                    </td>
                    </tr>
                    
                    <tr>
                        <td colspan="2"> 
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">  
                         <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">   
                          
                        <input type="submit" name="submit" value="Update Category" class="btn btn-success">
                        </td>
                        
                    </tr>
                </table>

            </form>

              </div>
          
          </div>


<?php 
    if(isset($_POST['submit'])){
        $user_id=$_POST['user_id'];
        $name=$_POST['name'];
        $current_image=$_POST['current_image'];
        
        
        $phone=$_POST['phone'];
        $address=$_POST['address'];

        if(isset($_FILES['image_name']['name'])){
            $image_name=$_FILES['image_name']['name'];
            if($image_name!=""){



                $source_path=$_FILES['image_name']['tmp_name'];
                $destination_path="../images/category/".$image_name;
                
        $upload=move_uploaded_file($source_path,$destination_path);
        if($upload==false){
            $_SESSION['add']="Failed to uPLOAD iMAGE";
            header("location:".SITEURL."admin/update_category.php");
            die();


        }
        if($current_image!=""){
        $remove_path="../images/category/".$current_image;

        $remove=unlink($remove_path);
        }

    }

        else{
            $image_name =$current_image;
        }





        $sql ="UPDATE category SET title='$name', image_name='$image_name' ,featured='$phone',active='$address' WHERE cat_id='$user_id'";
        $result=mysqli_query($conn , $sql);
        if($result==true){
            
        $_SESSION['add']='Update Category is Successfull';
        header('location:'.SITEURL.'admin/manage_catagory.php');
        ob_end_flush();

        
       

        }
    }
}

?>
       
         
  <?php include('partials/footer.php') ?>
