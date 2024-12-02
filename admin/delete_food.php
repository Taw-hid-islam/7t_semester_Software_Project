<?php

    include('../config/constant.php');

    if(isset($_GET['user_id']) AND isset($_GET['image_name']))

    {
        $user_id=$_GET['user_id'];
        $image_name=$_GET['image_name'];

        if($image_name!=""){
            $path="../images/food/".$image_name;
            $remove= unlink($path);
        }

        $sql="DELETE from menu_item WHERE item_id=$user_id";

    $result=mysqli_query($conn,$sql);

    if($result==true){

        $_SESSION['add']='Delete Food is Successfull';

        header("location:".SITEURL."admin/manage_food.php");

    }
    else{
        echo "faild";
    }









    }

    



?>