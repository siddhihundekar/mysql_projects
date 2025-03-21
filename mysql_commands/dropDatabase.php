<?php
     
    include_once('connection.php');

    echo "</br>";

    $sql = "drop database College";

    if($conn->query($sql)){
        echo "Database Dropped Successfully";
    }else{
        echo "Issue in Dropping Database" . $conn->error ;
    }

?>