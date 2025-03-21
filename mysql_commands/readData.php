<?php
    include('connection.php');

    echo "</br>";
    
    $sql = "SELECT * from `Teachers`";
    // $sql = "SELECT * from `Teachers` where 1";
    // $sql = "SELECT * from `Teachers` where 0";
    // $sql = "SELECT * from `Teachers` where name like 'Jyoti Mundhe'";
    // $sql = "SELECT * from `Teachers` where name not like 'A R Bagga'";
    // $sql = "SELECT * from `Teachers` where date(created_on) = '2025-02-12'";
    // $sql = "SELECT * from `Teachers` where date(created_on) = '2025-02-13'";
    // $sql = "SELECT * from `Teachers` order by id ";
    // $sql = "SELECT * from `Teachers` order by id limit 5";
    // $sql = "SELECT * from `Teachers` order by id asc ";
    // $sql = "SELECT * from `Teachers` order by id asc limit 4";
    // $sql = "SELECT * from `Teachers` order by id desc ";
    // $sql = "SELECT * from `Teachers` order by id desc limit 3";
    
    $result = $conn->query($sql);

    if($result){
?>
    <table border="1" style="border-collapse:collapse">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($result->num_rows>0){
                    while ($row = $result->fetch_assoc()){
            ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                </tr>
            <?php
                    // echo "  Id:". $row["id"] ."  Name:". $row["name"]."</br>";
                    }
                }
            ?>
        </tbody>
    </table>
<?php
    }else{
        $conn->error;
    }
    
?>