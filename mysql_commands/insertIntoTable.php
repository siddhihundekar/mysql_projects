<?php
     
    include_once('connection.php');

    echo "</br>";

    // $sql = "INSERT INTO `course`( `name`) 
    //      VALUES ('[BCS]'),('[BBA]')";

    // $sql = "INSERT INTO `students`( `first_name`, `last_name`, `mobile_no`, `course_id`)
    //         VALUES ('Mahek','Patel','9657291681','1'),
    //                ('Dnyeshwari','Jadhav','9730173863','1'),
    //                ('Vaishnavi','Ghongde','9307366601','1'),
    //                ('Sushmita','Navgire','7745096557','1')";

    // $sql = "INSERT INTO `teachers`(`name`, `mobile_no`, `course_id`) 
    //         VALUES ('S A Bhadange','8625033417','1'),
    //                ('S A Bhadange','8625033417','3'),
    //                ('A A Deshmukh','9405117808','1'),
    //                ('A A Deshmukh','9405117808','2'),
    //                ('Jyoti Mundhe','7841893959','1'),
    //                ('Jyoti Mundhe','7841893959','3'),
    //                ('Kumbhar Sir','9423342897','1'),
    //                ('Kumbhar Sir','9423342897','2')";

    if($conn->query($sql)){
        echo "Data Inserted Successfully";
    }else{
        echo "Issue in Inserting Data into Table" . $conn->error ;
    }


?>


 