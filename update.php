<?php include('header.php') ?>
<?php include('databaseConfig.php')?>


    <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query=" select * from `crudappdb`.`students` where id =$id";
            $result=mysqli_query($connection,$query);
            
            if(!$result){
                die('Query failed'.mysqli_error($connection));
            }else{
                $row=mysqli_fetch_assoc($result);
                // print_r($row);
            }
        }
    ?>

    <?php
        if(isset($_POST['editStudentBtn'])){
            $newStudentName=$_POST['studentName'];
            $newMobile=$_POST['mobile'];
            $newAddress=$_POST['address'];
            $id=$_GET['editId'];
            $query="
                UPDATE `crudappdb`.`students`
                SET studentName='$newStudentName',
                    mobile='$newMobile',
                    address='$newAddress'
                WHERE id='$id';
            ";

            $result=mysqli_query($connection,$query);
            if(!$result){
                die("Error in update query".mysqli_error($connection));
            }else{
                header('location:index.php?update_msg=Student Updated successfully');
            }
        }
    ?>


 <!-- UPDATE STUDENT MODAL -->
 <form action="update.php?editId=<?php echo $id;?>" method="post">
 
                    <div class="form-group formDivStyle">
                        <label for="studentName" class="form-label">Enter Student name:</label>
                        <input class="form-control" name="studentName" type="text" value="<?php echo $row['studentName']?>">
                    </div>
                    <div class="form-group formDivStyle">
                        <label for="mobile" class="form-label">Enter contact number:</label>
                        <input class="form-control" name="mobile" type="number" value="<?php echo $row['mobile']?>">
                    </div>
                    <div class="form-group formDivStyle">
                        <label for="address" class="form-label">Enter Address:</label>
                        <input class="form-control" name="address" type="text" value="<?php echo $row['address']?>">
                    </div>
                    <input type="submit" class="btn btn-success" name="editStudentBtn" value="Update">

        


</form>
<?php include('footer.php') ?>

