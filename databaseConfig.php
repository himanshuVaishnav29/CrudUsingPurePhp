<?php
    $server="localhost:4306";
    $username="root";
    $password="";
    

    $connection=mysqli_connect($server,$username,$password);

    if(!$connection){
        die("Error connecting database".mysqli_connect_error);
    }else{
        // echo"Database connected";
    }
?>