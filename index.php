<?php include('header.php') ?>
<?php include('databaseConfig.php')?>

         <!-- CREATE STUDENT VALIDATION -->
         <?php
            if(isset($_GET['message'])){
                echo '<h6 id="createValidStudentMessage">'.$_GET['message'].'</h6>';
            }
        ?>
        <?php
            if(isset($_GET['insert_message'])){
                echo '<h6 id="successMessage">'.$_GET['insert_message'].'</h6>';
            }
            if(isset($_GET['update_msg'])){
                echo '<h6 id="successMessage">'.$_GET['update_msg'].'</h6>';
            }
            if(isset($_GET['deleteMsg'])){
                echo '<h6 id="successMessage">'.$_GET['deleteMsg'].'</h6>';
            }
        ?>

        <div class="container1">
            <h2>Student's list:</h2>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Add student
            </button>
        </div>

       

        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query=" SELECT *FROM  `crudappdb`.`students` ";
                    $result=mysqli_query($connection,$query);

                    if(!$result){
                        die("Query Failed".mysqli_error($connection));
                    }else{
                        // echo"Query Successful";
                        // print_r($result);
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td> <?php echo $row['id'];?> </td>
                                <td> <?php echo $row['studentName'];?> </td>
                                <td> <?php echo $row['mobile']; ?> </td>
                                <td> <?php echo $row['address'] ?> </td>
                                <td class="text-center button-container">
                                    <a 
                                        href="update.php?id=<?php echo $row['id'];?>" 
                                        class="btn btn-primary"
                                        data-bs-toggle="updateModal" data-bs-target="#updateBackdrop"
                                    >
                                        Edit
                                    </a>
                                    <a href="delete.php?id=<?php echo $row['id'];?>"class="btn btn-danger ">Delete</a>
                                </td>
                            </tr>
                           <?php
                           
                            
                        }
                        
                        
                    }

                ?>
               
            </tbody>
        </table>

        <!-- CREATE STUDENT Modal -->
        <form action="insertData.php" method="post">
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">ADD NEW STUDENT</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="form-group formDivStyle">
                        <label for="studentName" class="form-label">Enter Student name:</label>
                        <input class="form-control" name="studentName" type="text">
                    </div>
                    <div class="form-group formDivStyle">
                        <label for="mobile" class="form-label">Enter contact number:</label>
                        <input class="form-control" name="mobile" type="number">
                    </div>
                    <div class="form-group formDivStyle">
                        <label for="address" class="form-label">Enter Address:</label>
                        <input class="form-control" name="address" type="text">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-success" name="addStudentBtn" value="Add Student">
            </div>
            </div>
        </div>
        </div>
        </form>

        <script>
            function hideMessage(){
                const successMessage=document.getElementById("successMessage");
                const createValidStudentMessage=document.getElementById("createValidStudentMessage");
                setTimeout(() => {
                    successMessage.style.display='none';
                }, 4000);
                
                setTimeout(() => {
                    createValidStudentMessage.style.display='none';                    
                }, 4000);
            }
            hideMessage();
        </script>

<?php include('footer.php');?>