//ajax request for retrive data
let tbody = document.getElementById("tbody");
function showData(){
    tbody.innerHTML = "";
    const xhr = new XMLHttpRequest();
    xhr.open("GET",'retrieve.php',true);
    xhr.responseType = "json";
    xhr.onload = ()=>{
        if(xhr.status === 200){
            // console.log(xhr.response);
            if(xhr.response){
                x = xhr.response;
            }
            else{
                x = "";
            }
            for(i=0;i<x.length;i++){
                tbody.innerHTML +="<tr><td>" + 
                x[i].id + "</td><td>" +
                x[i].fname +"</td><td>" +
                x[i].lname +"</td><td>" + 
               
                x[i].email + "</td><td>" +
                x[i].dob +"</td><td>" +
                x[i].number + "</td><td>" +
                x[i].country +"</td><td>" +
                x[i].bio +"</td><td><button class='btn btn-warning btn-sm btn-edit mr-2' data-sid=" + 
                x[i].id + ">Edit</button><button class='btn btn-danger btn-sm btn-del' data-sid="+ 
                x[i].id + ">Delete</button></td></tr>";
            }
        }else{
            console.log("problem occured");
        }
        
        user_delete();
        user_edit();
        
    };
    xhr.send();
}

showData();

//ajax request for insert  or update user data
document.getElementById("addUser").addEventListener("click",add_user);

function add_user(e){
    e.preventDefault();
    // console.log("Save Button clicked");
    
    let uid = document.getElementById("id").value;
    let fname = document.getElementById("fname").value;
    let lname = document.getElementById("lname").value;  
    let email = document.getElementById("email").value;
    let dob = document.getElementById("dob").value;
    let number = document.getElementById("number").value;
    let country = document.getElementById("country").value;
    let bio = document.getElementById("bio").value;
    
    

    //create xhr object
    const xhr = new XMLHttpRequest();
    //initialize
    xhr.open("POST",'insert.php',true);
   
    //set request header
    xhr.setRequestHeader("Content_Type","application/json");
    //handle response
    xhr.onload = function() {
        if (xhr.status === 200) {
            //response handling code
            // console.log(xhr.responseText);
            document.getElementById("msg").innerHTML = "<div class='alert alert-success mt-3 role='alert'>" + 
            xhr.responseText + "</div>";
            // document.getElementById("myForm").reset();//to set blank form after submitting data
            showData(); //this function is used to print data in table
        }
        else {
            console.log("Problem Occured"); //if the status not found it gives message problem occured
        }
        
    };
     
    const mydata = {id:uid,fname:fname,lname:lname,email:email,dob:dob,number:number,country:country,bio:bio};
    // console.log(mydata);
    //conver js object to json string
    const data = JSON.stringify(mydata);
    // console.log(data);
    //send request with data
    xhr.send(data);


}

//ajax call for delete

function user_delete(){
    var x = document.getElementsByClassName("btn-del");
    // console.log(x);
    // console.log(x.length);
    for(let i=0;i < x.length;i++){
        // console.log(x[i].getAttribute("data-sid"));
        x[i].addEventListener("click",function(){
            id = x[i].getAttribute("data-sid");
            console.log("Delete Button Clicked",id);
            const xhr = new XMLHttpRequest();
            xhr.open("POST","remove.php",true);
            xhr.setRequestHeader("Content-Type","application/json");
            xhr.onload=()=>{
                if(xhr.status===200){
                    document.getElementById("msg").innerHTML = "<div class='alert alert-danger mt-3 role='alert'>" + 
                    xhr.responseText + "</div>";
                    document.getElementById("myForm").reset();
                    showData();
                }
                else{
                    console.log("problem occured");
                }
            }
              
            const mydata = {id:id};
            // console.log(mydata);
            //conver js object to json string
            const data = JSON.stringify(mydata);
            // console.log(data);
            //send request with data
            xhr.send(data);

        })

    }
}

function user_edit(){
    var x = document.getElementsByClassName("btn-edit");
    let uid = document.getElementById("id");
    let fname = document.getElementById("fname");
    let lname = document.getElementById("lname");
    let email = document.getElementById("email");
    let dob = document.getElementById("dob");
    let number = document.getElementById("number");
    let country = document.getElementById("country");
    let bio = document.getElementById("bio");
    // console.log(x);
    // console.log(x.length);
    for(let i=0;i < x.length;i++){
        // console.log(x[i].getAttribute("data-sid"));
        x[i].addEventListener("click",function(){
            id = x[i].getAttribute("data-sid");
            console.log("edit Button Clicked",id);
            const xhr = new XMLHttpRequest();
            xhr.open("POST","edit.php",true);
            xhr.responseType = 'json';
            xhr.setRequestHeader("Content-Type","application/json");
            xhr.onload=()=>{
                if(xhr.status===200){
                    // console.log(xhr.response.id);
                    a = xhr.response;
                    console.log(a);
                    uid.value = a.id;
                    fname.value = a.fname;
                    lname.value = a.lname;
                    email.value = a.email;
                    dob.value = a.dob;
                    number.value = a.number;
                    country.value = a.country;
                    bio.value = a.bio;
                }
                else{
                    console.log("problem occured");
                }
            }
            const mydata = {uid:id};

            // const mydata = {id:id};
            // console.log(mydata);
            //conver js object to json string
            const data = JSON.stringify(mydata);
            // console.log(data);
            //send request with data
            xhr.send(data);

        })

    }
}
