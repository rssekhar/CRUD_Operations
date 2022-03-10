
<?php
include("connect.php");


$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);
$id = $mydata['id'];//defined
$fname = $mydata['fname'];
$lname = $mydata['lname'];

$email = $mydata['email'];
$dob = $mydata['dob'];
$number = $mydata['number'];
$country = $mydata['country'];
$bio = $mydata['bio'];

// $fnameErr = $lnameErr = $emailErr = $dobErr = $numberErr = $countryErr = $bioErr = "";

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

// $error = "";

    
if(!empty($fname) && !empty($lname)&&!empty($email) && !empty($dob) && !empty($number) && !empty($country) && !empty($bio)){
  

   $sql = "INSERT INTO userinfo(id,fname,lname,email,dob,number,country,bio) VALUES ('$id','$fname','$lname','$email','$dob','$number','$country','$bio') ON DUPLICATE KEY UPDATE 
            fname='$fname',lname='$lname',email='$email',dob='$dob',number='$number',country='$country',bio='$bio'";
    if($conn->query($sql) == TRUE){
        echo "User Added";
    }
    else{
        echo "Unable to Add User";
    }
}
else{
  $fnameErr = $lnameErr =$emailErr = $dobErr = $numberErr = $countryErr = $bioErr = "";

  // fname validation
    if(empty($fname)){
        $fnameErr = "<br>first name is required";
        echo $fnameErr;
    }
    else{
          
      if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
        $fnameErr = "<br>first name has Only letters and white space are allowed";
        echo $fnameErr;
      }
    }
    // lname validation
    if(empty($lname)){
        // alert("last name is required");
        $lnameErr = "<br>last name is required";
        echo $lnameErr;
    }
    else{
          
      if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
        $lnameErr = "<br>last name has Only letters and white space are allowed";
        echo $lnameErr;
      }
    }
    
    // email validation
    if(empty($email)){
        // alert("email is required");
        $emailErr = "<br>email is required";
        echo $emailErr;
    }
    else{
      $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";   
      if (!preg_match($pattern,$email)) {
        $emailErr = "<br>Wrong Email Format";
        echo $emailErr;
      }
    }
    // dob validation
    if(empty($dob)){
        $dobErr = "<br>date of birth is required";
        echo $dobErr;
    }
    if(empty($number)){

        $numberErr = "<br>number is required";
        echo $numberErr;
    }
    // number validation
    else{
      if (!preg_match("/^[7-9][0-9]{0,10}$/",$number)) {
        $numberErr = "<br>Mobile no must contain 10 digits only.";
        echo $numberErr;
      }
       
    }
    // country validation
    if(empty($country)){
        $countryErr = "<br>country is required";
        echo $countryErr;
    }
    else{
          
      if (!preg_match("/^[a-zA-Z-' ]*$/",$country)) {
        $countryErr = "<br>Only letters and white space allowed";
        echo $countryErr;
      }
    }
    // bio validation
    if(empty($bio)){
        
        $bioErr = "<br>bio is required";
        echo $bioErr;
    }
    else{
      $length = strlen($bio);    
      
      if($length != 150){
        $bioErr = "<br>bio must be 150 characters only";
        echo $bioErr;
      }
      
    }
}
?>
