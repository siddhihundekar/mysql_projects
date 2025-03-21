<?php

    include('connection.php');

    echo "</br>";

    // $sql = "CREATE TABLE `course`(
    //     id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //     name VARCHAR(30) NOT NULL,
    //     created_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    // )";

    // $sql = "CREATE TABLE `Teachers`(
    //     id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //     name VARCHAR(30) NOT NULL,
    //     mobile_no VARCHAR(10) NOT NULL,
    //     course_id INT(3) UNSIGNED NOT NULL,
    //     created_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    //     FOREIGN KEY (course_id) REFERENCES course(id)
    // )";

    $sql = "CREATE TABLE `Students`(
        id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(30) NOT NULL,
        last_name VARCHAR(30) NOT NULL,
        mobile_no VARCHAR(10) NOT NULL,
        course_id INT(3) UNSIGNED NOT NULL,
        created_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (course_id) REFERENCES course(id)
        )";

    if($conn->query($sql)){
        echo "Table Created Successfully";
    }else{
        echo "Issue in Creating Table" . $conn->error;
    }

?>