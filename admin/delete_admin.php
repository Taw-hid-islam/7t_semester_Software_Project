<?php

    include('../config/constant.php');

    $user_id=$_GET['user_id'];

    $sql="DELETE from user WHERE user_id=$user_id";

    $result=mysqli_query($conn,$sql);

    if($result==true){

        $_SESSION['add']='Delete Admin is Successfull';

        header("location:".SITEURL."admin/manage_admin.php");

    }
    else{
        echo "faild";
    }





?>