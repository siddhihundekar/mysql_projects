<?php
    $servername="localhost";
    $username = "root";
    $password = "";
    $database = "college";

    $conn = new mysqli($servername, $username, $password, $database);


    if ($conn->connect_error) {
        echo "Connection failed" . $conn->connect_error;
    } 
    // else {
    //     echo "Connected successfully";
    // }
    
    

?>