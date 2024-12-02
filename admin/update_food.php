
<?php include('partials/menu.php') ?>
    <!-- main content section start-->
    <div class="main_content">
             <div class="wrapper">
              <h1>Update Food</h1>
              <br><br><br>
              <?php
              ob_start();
              $user_id=$_GET['user_id'];
              $sql="SELECT * from menu_item where item_id=$user_id";
              $result=mysqli_query($conn,$sql); 

              if($result==true){
                $count=mysqli_num_rows($result);

                if($count==1){
                   // echo "admin available";
                   $row=mysqli_fetch_assoc($result);
                   $name=$row['name'];
                   $description=$row['description'];
                   $price=$row['price'];
                   $current_image=$row['image_name'];
                   $current_category=$row['cat_id'];
                 
                   $featured=$row['featured'];
                   $active=$row['active'];

                }
                else{
                    header('location:'.SITEURL.'admin/manage_food.php');
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
                        <td>Description: </td>
                        <td><textarea name="description" cols="30" rows="5" ><?php echo $description; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Price: </td>
                        <td><input type="number" name="price" value="<?php echo $price; ?>"></td>
                    </tr>
                    <tr>
                        <td>Current Image: </td>
                        <td>
                            <?php 
                                if($current_image!=""){
                                    ?>
                                       <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" width="200px">

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
                        <td>
                            <input type="file" name="image_name" >
                        </td>
                    </tr>


                    <tr>
                        <td>Category: </td>
                        <td>
                            <select name="category">

                            <?php 

                            $sql="SELECT * FROM category WHERE active='Yes'";
                            $res=mysqli_query($conn,$sql);
                            $count=mysqli_num_rows($res);
                            if($count>0){
                                while($row=mysqli_fetch_assoc($res)){
                                    $catagory_title=$row['title'];
                                    $cat_id=$row['cat_id'];

                                   ?>
                                   <option <?php if($current_category==$cat_id){ echo "selected";}  ?> value="<?php echo $cat_id; ?>"><?php echo $catagory_title; ?></option>
                                   <?php
                            
                                }

                            }
                            
                            ?>
                                

                            </select>
                        </td>
                    </tr>


                    
                    
                    
                    <tr>
                        <td>Feature: </td>
                        <td>
                            <input <?php if( $featured=="Yes"){ echo "Checked";  }  ?>  type="radio" name="phone" value="Yes"> Yes
                             <input <?php if( $featured=="No"){ echo "Checked";  }  ?>  type="radio" name="phone" value="No"> No
                    </td>
                    </tr>
                    <tr>
                        <td>Active: </td>
                        <td>
                            <input <?php if( $active=="Yes"){ echo "Checked";  }  ?>  type="radio" name="address" value="Yes"> Yes
                            <input <?php if( $active=="No"){ echo "Checked";  }  ?>  type="radio" name="address" value="No"> No
                    </td>
                    </tr>
                    
                    <tr>
                        <td colspan="2"> 
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">  
                         <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">   
                          
                        <input type="submit" name="submit" value="Update Food" class="btn btn-success">
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
        $description=$_POST['description'];
        $price=$_POST['price'];
        $current_image=$_POST['current_image'];
        

        
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $category=$_POST['category'];

        if(isset($_FILES['image_name']['name'])){
            $image_name=$_FILES['image_name']['name'];
            if($image_name!=""){



                $source_path=$_FILES['image_name']['tmp_name'];
                $destination_path="../images/food/".$image_name;
                
        $upload=move_uploaded_file($source_path,$destination_path);
        if($upload==false){
            $_SESSION['add']="Failed to uPLOAD iMAGE";
            header("location:".SITEURL."admin/update_food.php");
            die();


        }
        if($current_image!=""){
        $remove_path="../images/food/".$current_image;

        $remove=unlink($remove_path);
        }

    }

        else{
            $image_name =$current_image;
        }





        $sql ="UPDATE menu_item SET 
        name='$name', 
        description='$description', 
        price=$price, 
        image_name='$image_name' ,
        featured='$phone',
        active='$address', 
        cat_id='$category' 
        WHERE item_id='$user_id'";

        $result=mysqli_query($conn , $sql);
        if($result==true){
            
        $_SESSION['add']='Update Food is Successfull';
        header('location:'.SITEURL.'admin/manage_food.php');
        ob_end_flush();

        
       

        }
    }
}

?>
       
         
  <?php include('partials/footer.php') ?>
