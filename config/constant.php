<?php 
    session_start();

    define('SITEURL' , 'http://localhost/trios/');


    $conn= mysqli_connect('localhost','root','') or die(mysqli_error());
    $db_select=mysqli_select_db($conn,  'trios') or die(mysqli_error());

?>