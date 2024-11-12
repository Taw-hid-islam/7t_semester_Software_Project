<?php include('config/constant.php') ?>
<?php
    error_reporting(0);
    session_start();
    session_destroy();
    if($_SESSION['message']){
        $message=$_SESSION['message'];
        echo "<script type='text/javascript'>
        alert('$message');
        </script>";

    }
?>
<! DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Restaurant Management System </title>
        <link rel="stylesheet" type="text/css" href="css/test.css">
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

            <!-- Optional theme -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

            <!-- Latest compiled and minified JavaScript -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <nav>
            <label class="logo"> Trio's Restro</label>

            <ul>
                <li><a href="#cata">Catagory </a> </li>
                
                <li><a href="frontfood.php">Menu </a> </li>
                <li><a href="about.php">About </a> </li>
               
                <li><a href="login.php" class="btn btn-success">Login </a> </li>
                <li><a href="#reg" class="btn btn-danger">Sign Up </a> </li>
             

            </ul>
        </nav>

        
        <div class="section1">
        
            <label class="img_text"> Welcome to Trio's Restro
               
            </label>
           
         <img class="main_img" src="images/bgss.jpeg">

        </div>

        <div class="container">

            <div class="row">

                <div class="col-md-4">
                    <img class="welcome_img" src="images/intro.jpg">

                </div>

                <div class="col-md-8">
                    <h1> Welcome to Trio's Restro</h1>
                    <p> Indulge in a culinary journey from the comfort of your own home with Trio's Restro. Our online platform brings the exquisite flavors of our kitchen directly to your doorstep, ensuring that you can savor the essence of fine dining wherever you are.Browse through our carefully curated menu, featuring a diverse selection of dishes crafted by our talented chefs. From gourmet delights to comforting classics, we offer something to tantalize every palate.Ordering through our platform is seamless and convenient, allowing you to explore our menu, customize your selections, and place your order with just a few clicks. Whether you're hosting a cozy dinner for two or a virtual gathering with friends and family, let us take care of the culinary details while you focus on creating unforgettable moments.</p>

                </div>

            </div>
        </div>

        <center>
            <h1> Our Associate </h1>
        </center>

    <div class="container" >

         <div class="row">

             <div class="col-md-5">
                <div class="image-container">
                    <img class="associate" src="images/samanta.png">
                    <h4><center>Samanta Akter</center></h4>
                    <p>Good food is the foundation of genuine happiness and we try to provide good food</p>
                </div>


      

             </div>

             <div class="col-md-5">
                <div class="image-container">
                    <img class="associate" src="images/shafin.png">
                    <h4><center>Shahriar kobir Shafin</center></h4>
                    <p>Food is not just about sustenance; it's a journey that tantalizes the senses, evokes emotions, and creates lasting memories. </p>
        
                </div>

             </div>
             
             <div class="col-md-5">
                <div class="image-container">
                    <img class="associate" src="images/tawhid.png">
                    <h4><center>Tawhidul Islam</center></h4>
                    <p>Success in the restaurant industry isn't just about serving great food; it's about creating memorable experiences for every guest who walks through our doors.</p>
        
        

                </div>
             </div>
             
             <div class="col-md-5">
                 <div class="image-container">
                    <img class="associate" src="images/zidan.jpg">
                    <h4><center>Md Sahriyar Zidan </center></h4>
                    <p>Our mission is to deliver quality and joy in every bite, making every meal unforgettable.</p>
        
                </div>

             </div>


        </div>
    </div>
    <center>
            <h1 id="cata"> Our Foods Catagory </h1>
        </center>


    <div class="container"  >

  
         <div class="row">
            
         <?php 
            $sql="SELECT * FROM category WHERE active='Yes' AND featured='Yes' LIMIT 3";

            $result=mysqli_query($conn,$sql);

            $count=mysqli_num_rows($result);

            if($count>0){
                while($row=mysqli_fetch_assoc($result)){
                    $cat_id=$row['cat_id'];
                    $title=$row['title'];
                    $image_name=$row['image_name'];
                    ?>

             <div class="col-md-4">
             <img class="associate" src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?> ">
             <h4><center><?php echo $title; ?></center></h4>
           
             </div>
             <?php

}
}




?>


           

            
        </div>
    </div>
 
    <center>
        <h1 class="regis" id="reg">Registration Form</h1>

    </center>


    <div align="center" class="regis" action="registration.php" method="post">
        <form action="registration.php" method="post">
            <div class="reg">
                <label class="lebel_text">Name</label>
                <input class="input_deg" type="text" name="user_name" required>

            </div>
            <div class="reg">
                <label class="lebel_text">Email</label>
                <input class="input_deg"  type="email" name="email" required>
                

            </div>
            <div class="reg">
                <label class="lebel_text">Phone</label>
                <input class="input_deg"  type="text" name="phone" required>

            </div>
            <div class="reg">
                <label class="lebel_text">Password</label>
                <input class="input_deg"  type="password" name="password" required>

            </div>
            <div class="reg">
                
                <input class="btn btn-primary" id="submit" type="submit" name="create" value="Sign Up" >

            </div>
        </form>
    
    </div>

  <footer>
    <h3 class="footer_text">2024 all right reserved by Trio's Restro. Developed by <a href=#> skadush </a></h3>
  </footer>




      


        

    </body>
</html>        