<?php
    include('connection.php');

    session_start();

    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);

    if (isset($_GET['action']) && isset($_GET['id'])){
        if($_GET['action']=="delete"){
                $del_query="DELETE from students where id=".$_GET['id'];
                if($conn->query($del_query)){
                    echo "<script>alert('Data Deleted Successfully')</script>";
                    $sql = "SELECT * FROM students";
                    $result = $conn->query($sql);
                }
            }elseif($_GET['action']=="edit"){
                $read_data = "SELECT * from students where id=".$_GET['id'];
               
                $data = $conn->query($read_data);
                if(isset($data) && $data->num_rows>0){
                    $data_row = $data->fetch_assoc();
                }
            }
        }elseif(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile_no']) && isset($_POST['date_of_admission'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $mobile_no = $_POST['mobile_no'];
            $course_id = $_POST['course_id'];
            $date_of_admission = $_POST['date_of_admission'];
            if (empty($name) || empty($email) || empty($mobile_no)|| empty($course_id) || empty($date_of_admission)){
                die ("Please fill all the fields");
            }

            if(isset($_POST['action']) && isset($_POST['id'])){
                if(isset($_POST['id']) == "update"){
                    $sql = "UPDATE `students` SET `name`='".$name."',`email`='".$email."',`mobile_no`='".$mobile_no."',`course_id`='".$course_id."',`date_of_admission`='". $date_of_admission."' WHERE `id` =". $_POST['id'];
                    $actionToShow = "Update";
                }
            }else{
                $sql = "INSERT INTO `students`( `name`, `email`, `mobile_no`,`course_id`, `date_of_admission`) VALUES ('".$name."','".$email."','".$mobile_no."','".$course_id."','".$date_of_admission."')";
                $actionToShow = "Create";
            }

            if ($conn->query($sql)) {
                $_SESSION["msg"]="Student ".$actionToShow."d Successfully"; 
            }else{
                echo $conn->error;
            }
        }
?>

<?php include ("layouts/header.php"); ?>
<?php include ("layouts/navbar.php"); ?>

<style>
    legend{
        color: #0dcaf0;;
    }
</style>

    <div class="container-fluid p-1 ">
    <!-- <h4>Welcome Admin !!</h4> -->
        <div class="row">
            <div class="col-3 p-1 ms-4">
                <form action="student.php" method="POST">
                <?php 
                        if(isset($_SESSION['msg'])){
                            echo "<script>alert('".$_SESSION['msg']."')</script>";
                        }
                    ?>    
                    <?php if(isset($_GET['action']) && $_GET['action']=="edit"){ ?>
                        <legend>Update New Student</legend>
                        <input type="text" name="id" value="<?php echo $_GET['id'] ?>" hidden>
                        <input type="text" name="action" value="update" hidden>
                    <?php
                        }else{
                    ?>
                        <legend>Add New Student</legend>
                    <?php
                        }
                    ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="name" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Name" value="<?php echo $data_row["name"] ?? ""; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Email" value="<?php echo $data_row["email"] ?? ""; ?>">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Mobile Number</label>
                    <input type="number" name="mobile_no" class="form-control" id="exampleFormControlInput1" placeholder="7666461361" value="<?php echo $data_row["mobile_no"] ?? ""; ?>">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Course_id</label>
                    <input type="name" name="course_id" class="form-control" id="exampleFormControlInput1" value="<?php echo $data_row["course_id"] ?? ""; ?>">
                </div>   
                <div class="mb-3">
                    <label for="name" class="form-label">Date of admission</label>
                    <input type="date" name="date_of_admission" class="form-control" id="exampleFormControlInput1" value="<?php echo $data_row["date_of_admission"] ?? ""; ?>">
                </div>
                <div>
                <input type="submit" class="btn btn-info float-end" id="exampleFormControlInput1" placeholder="Submit">
                </div>

                </form>
            </div>
            <div class="col-8 p-1 ms-4">
                <table class="table"><br><br>
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Name</th>
                            <th>Email Number</th>
                            <th>Mobile Number</th>
                            <th>Course_id</th>
                            <th>Date of admission</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                        
                        
                    <tbody>
                    <?php
                        if($result && $result->num_rows>0){
                            while($row=$result->fetch_assoc()){
                                ?>
                        <tr>
                            <td><?php echo 1 ; ?></td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["mobile_no"]; ?></td>
                            <td><?php echo $row["course_id"]; ?></td>
                            <td><?php echo $row["date_of_admission"]; ?></td>
                           
                            <td><?php echo '<a href="student.php?action=delete&id='.$row['id'].'">Delete</a>  
                                            <a href="student.php?action=edit&id='.$row['id'].'">Edit</a>'?></td>
                        </tr> 
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



<?php include("layouts/footer.php"); ?>