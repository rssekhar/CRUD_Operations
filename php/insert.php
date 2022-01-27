<?php
include("connect.php");

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);
$id = $mydata['id'];//defined
$name = $mydata['name'];
$email = $mydata['email'];
$number = $mydata['number'];

//insert data
// if(!empty($name) && !empty($email) && !empty($number)){
//     $sql = "insert into registerdata(name,email,number) values('$name','$email','$number')";
//     if($conn->query($sql) == TRUE){
//         echo "User Added";
//     }
//     else{
//         echo "Unable to Add this User";
//     }
// }
// else{
//     echo "fill all fields";
// }

//add or update user data
if(!empty($name) && !empty($email) && !empty($number)){
    $sql = "INSERT INTO registerdata(id,name,email,number) VALUES ('$id','$name','$email','$number') ON DUPLICATE KEY UPDATE name='$name',email='$email',number='$number'";
    if($conn->query($sql) == TRUE){
        echo "User Added";
    }
    else{
        echo "Unable to Add User";
    }
}
else{
    echo "Please Fill All Fields";
}

?>