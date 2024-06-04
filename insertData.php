
<?php include("databaseConfig.php");?>
<?php


    if(isset($_POST['addStudentBtn'])){
        // echo "Add btn clicked";
        $studentName=$_POST['studentName'];
        $mobile=$_POST['mobile'];
        $address=$_POST['address'];
        if($studentName=="" || empty($studentName) || empty($mobile) || empty($address)){
            header('location:index.php?message=All fields are required!');
        }else{
            $query="
             INSERT INTO `crudappdb`.`students`(`studentName`,`mobile`,`address`)
             VALUES ('$studentName','$mobile','$address')
             ";
             $result=mysqli_query($connection,$query);
             if(!$result){
                die("Query failed".mysqli_error( $connection));
             }else{
                header('location:index.php?insert_message=Student added successfully!');
             }
        }
    }
    
?>