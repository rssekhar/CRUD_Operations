<?php
include("connect.php");

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);
$id = $mydata['uid'];//


//retrieve specific user data
    $sql = "select * from userinfo where id={$id}";
    $result = $conn->query($sql);
    $row =$result->fetch_assoc();

    echo json_encode($row);
?>
