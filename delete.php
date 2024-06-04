<?php include('header.php') ?>
<?php include('databaseConfig.php')?>
<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query="DELETE FROM   `crudappdb`.`students` WHERE id=$id";

        $result=mysqli_query($connection,$query);
        if(!$result){
            die("Error in delete".mysqli_error($connection));
        }else{
            header('location:index.php?deleteMsg=Student deleted successfully');
        }
    }
?>