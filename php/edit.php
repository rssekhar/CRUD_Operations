<?php
include("connect.php");

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);
$id = $mydata['uid'];//dashboard.js line 155


//retrieve specific user data
    $sql = "select * from registerdata where id={$id}";
    $result = $conn->query($sql);
    $row =$result->fetch_assoc();

    echo json_encode($row);
?>