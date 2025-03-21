<?php
    include('connection.php');

    echo "</br>";
    
    // $sql = "UPDATE `course` set name = 'BCA' where id = '2'";
    // $sql = "UPDATE `Teachers` set course_id='1' where id = '5'";
    // $sql = "UPDATE `Students` set course_id='1' where id = '5'";

    if($conn->query($sql)){
        echo "Data Updated Successfully";
    }else{
        echo $conn->error;
    }
?>