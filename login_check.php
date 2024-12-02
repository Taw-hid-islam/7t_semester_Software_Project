<?php include('config/constant.php') ?>

<?php




if($conn===false)
{
    die("Connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name =mysqli_real_escape_string($conn,$_POST['username']);
    $pass =mysqli_real_escape_string($conn,$_POST['password']);
    $sql="select * from user where user_name='".$name."' AND password='".$pass."' ";

    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);

    if($row["role"]=="user"){
        $user_id = $row['user_id'];
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_name']=$name;
        $_SESSION['role']='user';
    
        header("location:index.php?user_id=" . $user_id);
    }
    

    elseif($row["role"]=="admin")

    {
        $user_id = $row['user_id'];
        $_SESSION['user_id'] = $user_id;
        
        $_SESSION['user_name']=$name;
        $_SESSION['role']='admin';
        header("location:admin/index.php?user_id=" . $user_id);

    }
    else{

        session_start();
         $mes="UserName or Password didn't match";
         $_SESSION['loginMessage']=$mes;
         header("location:login.php");
    }

}







?>