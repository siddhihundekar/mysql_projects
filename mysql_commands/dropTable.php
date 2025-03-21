<?php
     
    include_once('connection.php');

    echo "</br>";

    $sql = "drop table Teachers";

    if($conn->query($sql)){
        echo "Table Dropped Successfully";
    }else{
        echo "Issue in Dropping Table" . $conn->error ;
    }

?>