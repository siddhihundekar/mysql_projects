<?php
     
    include_once('connection.php');

    echo "</br>";

    $sql = "create database College";
    
    if ($conn->query($sql)){
        echo "Database Created Successfully";
    }else{
        echo "Error in Creating Database" . $conn->error;
    }
    
?>