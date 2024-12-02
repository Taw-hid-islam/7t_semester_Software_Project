<?php 
ob_start();
include('partials/menu.php') ?>


<div class="main_content">
           <div class="wrapper">
            <h1> Add Catagory </h1>
            <br><br>

            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title: </td>
                        <td><input type="text" name="title" placeholder="Title of food"></td>
                    </tr>

                    <tr>
                        <td>Description: </td>
                        <td><textarea name="description" cols="30" rows="5" placeholder="Description of the food."></textarea></td>
                    </tr>

                    <tr>
                        <td>Price: </td>
                        <td><input type="number" name="price" ></td>
                    </tr>




                    <tr>
                        <td>Select Image: </td>
                        <td><input type="file" name="image_name" ></td>
                    </tr>
                    <tr>
                        <td>Category: </td>
                        <td>
                            <select name="category">

                            <?php 
                                //create php code to display category

                                //1create sql to get acyive categoris

                                $sql="SELECT * from category where active='Yes'";

                                $res=mysqli_query($conn,$sql);

                                $count=mysqli_num_rows($res);

                                if($count>0){
                                    while($row=mysqli_fetch_assoc($res)){
                                        $cat_id=$row['cat_id'];
                                        $title=$row['title'];
                                        ?>
                                        <option value="<?php echo $cat_id; ?>"><?php echo $title; ?> </option>
                                        <?php
                                    }


                                }
                                else{

                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php

                                }
                            
                            
                            ?>

                            </select>
                        </td>
                    </tr>
                    
                    
                    <tr>
                        <td>Feature: </td>
                        <td><input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                    </tr>
                    <tr>
                        <td>Active: </td>
                        <td>
                            <input type="radio" name="active" value="Yes"> Yes
                             <input type="radio" name="active" value="No"> No
                    </td>
                    </tr>
                   
                   
                   
                    <tr>
                        <td colspan="2"> 
                        <input type="submit" name="submit" value="Add" class="btn btn-success">
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
     $user_name = $_POST['title'];
     $description = $_POST['description'];
     $price = $_POST['price'];
     $category = $_POST['category'];
     
    if(isset($_POST['featured'])){
        $featured = $_POST['featured'];
    }
    else{
        $featured="NO";
    }
    if(isset($_POST['active'])){
        $active = $_POST['active'];
    }
    else{
        $active="NO";
    }

    if(isset($_FILES['image_name']['name'])){
        $image_name=$_FILES['image_name']['name'];

        //similer photo name change

        if($image_name!=""){



        $source_path=$_FILES['image_name']['tmp_name'];
        $destination_path="../images/food/".$image_name;


        $upload=move_uploaded_file($source_path,$destination_path);
        if($upload==false){
            $_SESSION['add']="Failed to uPLOAD iMAGE";
            header("location:".SITEURL."admin/add_food.php");
            die();
        }

    }  


    }

    else{
        $image_name="";
    }




    

     //sql query

     $sql="INSERT INTO menu_item SET
      name='$user_name',
     description='$description', 
     price=$price ,
     image_name='$image_name',
     featured='$featured',
     active='$active',
     cat_id=$category ";

    

     $result=mysqli_query($conn,$sql);

     if($result==TRUE){
        $_SESSION['add']="Food Added Successfully";
        header("location:".SITEURL."admin/manage_food.php");
        ob_end_flush();
        
     }
     else{
        $_SESSION['add']="Failed to Add Food";
        header("location:".SITEURL."admin/add_food.php");
     }
     

}
?>