<?php include('partials/menu.php') ?>


<div class="main_content">
           <div class="wrapper">
            <h1> Add Catagory </h1>
            <br><br>

            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title: </td>
                        <td><input type="text" name="title" placeholder="Category  Title"></td>
                    </tr>

                    <tr>
                        <td>Select Image: </td>
                        <td><input type="file" name="image_name" ></td>
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
    if(isset($_POST['featured'])){
        $role = $_POST['featured'];
    }
    else{
        $role="NO";
    }
    if(isset($_POST['active'])){
        $phone = $_POST['active'];
    }
    else{
        $phone="NO";
    }

    if(isset($_FILES['image_name']['name'])){
        $image_name=$_FILES['image_name']['name'];

        //similer photo name change

        if($image_name!=""){



        $source_path=$_FILES['image_name']['tmp_name'];
        $destination_path="../images/category/".$image_name;


        $upload=move_uploaded_file($source_path,$destination_path);
        if($upload==false){
            $_SESSION['add']="Failed to uPLOAD iMAGE";
            header("location:".SITEURL."admin/add_catagory.php");
            die();
        }

    }  


    }

    else{
        $image_name="";
    }




    

     //sql query

     $sql="INSERT INTO category SET title='$user_name',image_name='$image_name',featured='$role',active='$phone'";

    

     $result=mysqli_query($conn,$sql) or die(mysqli_error());

     if($result==TRUE){
        $_SESSION['add']="Category Added Successfully";
        header("location:".SITEURL."admin/manage_catagory.php");
        
     }
     else{
        $_SESSION['add']="Failed to Add Catagory";
        header("location:".SITEURL."admin/add_catagory.php");
     }
     

}
?>