<?php
include("connect.php");

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);
$id = $mydata['id'];


//insert data
if(!empty($id)){
    $sql = "delete from registerdata where id={$id}";
    if($conn->query($sql) == TRUE){
        echo "User Deleted Successfully";
    }
    else{
        echo "Unable to Delete";
    }
}
else{
    echo "Please Fill All Fields";
}

?>