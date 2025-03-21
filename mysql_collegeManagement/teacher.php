<?php
    include('connection.php');
    session_start();
    // $sql = "SELECT * FROM teachers";
    // $result = $conn->query($sql);

    if (isset($_GET['action']) && isset($_GET['id'])){
        if($_GET['action']=="delete"){
                $del_query="DELETE from teachers where id=".$_GET['id'];
                if($conn->query($del_query)){
                    echo "<script>alert('Data Deleted Successfully')</script>";
                    $sql = "SELECT * FROM teachers";
                    $result = $conn->query($sql);
                }
            }elseif($_GET['action']=="edit"){
                    $read_data = "SELECT * from teachers where id=".$_GET['id'];
                   
                    $data = $conn->query($read_data);
                    if(isset($data) && $data->num_rows>0){
                        $data_row = $data->fetch_assoc();
                        // print_r($data_row);
                    }
                } 
            }elseif(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile_no']) && isset($_POST['joining_date'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $mobileNumber = $_POST['mobile_no'];
                $joiningDate = $_POST['joining_date'];
                if (empty($name) || empty($email) || empty($mobileNumber) || empty($joiningDate) ){
                    die("Please fill all the fields");
                }
                
                if (isset($_POST['id']) && isset($_POST['action'])) {
                    if($_POST['action'] == "update"){
                    $sql = "UPDATE `teachers` SET `name` = '" . $name . "', `email` = '" . $email . "', `mobile_no` = '" . $mobileNumber . "', `joining_date` = '" . $joiningDate . "' WHERE `id` = " . $_POST['id'];
                    $actionToShow = "Update";
                    }
                } else {
                    $sql = "INSERT INTO `teachers` (`name`, `email`, `mobile_no`, `joining_date`) VALUES ('" . $name . "', '" . $email . "', '" . $mobileNumber . "', '" . $joiningDate . "')";
                    $actionToShow = "Create";
                }
                
                if ($conn->query($sql)) {
                    $_SESSION["msg"]="Teacher ".$actionToShow."d Successfully"; 
                }else{
                    echo $conn->error;
                }
            }

               
               
            
        $sql = "SELECT * FROM teachers";
        $result = $conn->query($sql);
    
    
        // echo "<script>alert('Data ".$_GET['id']." is ".$_GET['action']."' </script>"

?>

   

<?php include ("layouts/header.php"); ?>
<?php include ("layouts/navbar.php"); ?>

<style>
    legend{
        color: #0dcaf0;;
    }
</style>

    <div class="container-fluid py-1 ">
    <!-- <h4>Welcome Admin !!</h4> -->
        <div class="row">
            <div class="col-3 p-1">
                <form action="teacher.php" method="POST">
                    <?php 
                        if(isset($_SESSION['msg'])){
                            echo "<script>alert('".$_SESSION['msg']."')</script>";
                        }
                    ?>                       
                    <?php if(isset($_GET['action']) && $_GET['action']=="edit"){ ?>
                        <legend>Update Teacher</legend>
                        <input type="text" name="id" value="<?php echo $_GET['id'] ?>" hidden>
                        <input type="text" name="action" value="update" hidden>
                    <?php
                        }else{
                    ?>
                        <legend>Add New Teacher</legend>
                    <?php
                        }
                    ?>

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="name" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Name" value="<?php echo $data_row["name"] ?? ""; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput2" placeholder="Enter Your Email" value="<?php echo $data_row["email"] ?? ""; ?>">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Mobile Number</label>
                    <input type="number" name="mobile_no" class="form-control" id="exampleFormControlInput3" placeholder="7666461361" value="<?php echo $data_row["mobile_no"] ?? ""; ?>">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Joining Date</label>
                    <input type="date" name="joining_date" class="form-control" id="exampleFormControlInput4" placeholder="7666461361" value="<?php echo $data_row["joining_date"] ?? ""; ?>">
                </div>
                <div>
                <input type="submit" class="btn btn-info float-end" id="exampleFormControlInput5" placeholder="Submit">
                </div>

                </form>
            </div>
            <div class="col-8 p-1 ms-4">
                <table class="table"><br><br>
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Joining Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                        
                        
                    <tbody>
                    <?php
                        if($result && $result->num_rows>0){
                            while($row=$result->fetch_assoc()){
                                ?>
                        <tr>
                            <td><?php echo 1 ?></td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["mobile_no"]; ?></td>
                            <td><?php echo $row["joining_date"]; ?></td>
                            <td><?php echo '<a href="teacher.php?action=delete&id='.$row['id'].'">Delete</a>
                                            <a href="teacher.php?action=edit&id='.$row['id'].'">Edit</a>' ?></td>
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