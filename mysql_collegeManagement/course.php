<?php
    include('connection.php');

    session_start();

    // $sql = "SELECT * FROM course";
    // $result = $conn->query($sql);

    if (isset($_GET['action']) && isset($_GET['id'])){
        if($_GET['action']=="delete"){
                $del_query="DELETE from course where id=".$_GET['id'];
                if($conn->query($del_query)){
                    echo "<script>alert('Data Deleted Successfully')</script>";
                    $sql = "SELECT * FROM course";
                    $result = $conn->query($sql);
                }
            }elseif($_GET['action']=="edit"){
                    $read_data = "SELECT * from course where id=".$_GET['id'];
                   
                    $data = $conn->query($read_data);
                    if(isset($data) && $data->num_rows>0){
                        $data_row = $data->fetch_assoc();
                    }
                }
            }elseif(isset($_POST['name']) && isset($_POST['category'])){
                $name = $_POST['name'];
                $category = $_POST['category'];
                if (empty($name) || empty($category)){
                    die("Please fill all the fields");
                }

                if(isset($_POST['action']) && isset($_POST['id'])){
                    if($_POST['action'] == "update"){
                        $sql = "UPDATE `course` SET `name` = '".$name."', `category` = '".$category."' WHERE `id` = ".$_POST['id'];
                        $actionToShow = "Update";
                    }
                }else{
                    $sql = "INSERT INTO `course`( `name`, `category`) VALUES ('".$name."','".$category."')";
                    $actionToShow = "Create";
                }
           

                if ($conn->query($sql)){
                    $_SESSION["msg"] = "Course ".$actionToShow."d Successfully";
                } else {
                    echo $conn->error;
                }
            }

            $sql = "SELECT * FROM course";
            $result = $conn->query($sql);

?>


<?php include ("layouts/header.php"); ?>
<?php include ("layouts/navbar.php"); ?>

<style>
    legend{
        color: #0dcaf0;;
    }
</style>

  <div class="container">
  <!-- <h1>Welcome Admin !!</h1> -->
    <div class="row">
            <div class="col-3 p-1">
                <form action="course.php" method="POST">
                    <?php 
                        if(isset($_SESSION['msg'])){
                            echo "<script>alert('".$_SESSION['msg']."')</script>";
                        }
                    ?>   
                    <?php if(isset($_GET['action']) && $_GET['action']=="edit"){ ?>
                        <legend>Update New Course</legend>
                        <input type="text" name="id" value="<?php echo $_GET['id'] ?>" hidden>
                        <input type="text" name="action" value="update" hidden>
                    <?php
                        }else{
                    ?>
                        <legend>Add New Course</legend>
                    <?php
                        }
                    ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="name" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Name" value="<?php echo $data_row["name"] ?? ""; ?>">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Category</label>
                    <input type="text" name="category" class="form-control" id="exampleFormControlInput2" placeholder="Type Category" value="<?php echo $data_row["category"] ?? ""; ?>">
                </div>
                <input type="submit" class="btn btn-info float-end" id="exampleFormControlInput3" placeholder="Submit">
                </div>
                </form>

                <div class="col-8 p-1 ms-4"><br><br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>                     
                    <tbody>
                    <?php
                        if($result && $result->num_rows>0){
                            while($row=$result->fetch_assoc()){
                                ?>
                        <tr>
                            <td><?php echo 1; ?></td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["category"]; ?></td>
                            <td><?php echo '<a href="course.php?action=delete&id='.$row['id'].'">Delete</a>  
                                            <a href="course.php?action=edit&id='.$row['id'].'">Edit</a>'; ?></td>
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
   
