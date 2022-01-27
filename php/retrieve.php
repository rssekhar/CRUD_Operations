<?php
include("connect.php");

//retrieve saved user data
$sql = "select * from registerdata";
$result = $conn->query($sql);

if($result->num_rows > 0){
    $data = array();
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
}
//return json format data as reaponce to ajax call
echo json_encode($data);
?>