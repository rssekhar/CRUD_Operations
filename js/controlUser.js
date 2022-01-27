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
                x[i].name +"</td><td>" + 
                x[i].email + "</td><td>" +
                x[i].number + "</td><td><button class='btn btn-warning btn-sm btn-edit mr-2' data-sid=" + 
                x[i].id + ">Edit</button><button class='btn btn-danger btn-sm btn-del' data-sid="+ 
                x[i].id + "'>Delete</button></td></tr>";
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
    console.log("Save Button clicked");
    let uid = document.getElementById("id").value;
    let name = document.getElementById("name").value;
    let email = document.getElementById("email").value;
    let number = document.getElementById("number").value;

    // console.log(name,email,number);

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
            document.getElementById("myForm").reset();//to set blank form after submitting data
            showData(); //this function is used to print data in table
        }
        else {
            console.log("Problem Occured"); //if the status not found it gives message problem occured
        }
        
    };
     
    const mydata = {id:uid,name:name,email:email,number:number};
    console.log(mydata);
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
            // console.log("Delete Button Clicked",id);
            const xhr = new XMLHttpRequest();
            xhr.open("POST","delete.php",true);
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
    let name = document.getElementById("name");
    let email = document.getElementById("email");
    let number = document.getElementById("number");
    // console.log(x);
    // console.log(x.length);
    for(let i=0;i < x.length;i++){
        // console.log(x[i].getAttribute("data-sid"));
        x[i].addEventListener("click",function(){
            id = x[i].getAttribute("data-sid");
            // console.log("Delete Button Clicked",id);
            const xhr = new XMLHttpRequest();
            xhr.open("POST","edit.php",true);
            xhr.responseType = 'json';
            xhr.setRequestHeader("Content-Type","application/json");
            xhr.onload=()=>{
                if(xhr.status===200){
                    // console.log(xhr.response.id);
                    a = xhr.response;
                    uid.value = a.id;
                    name.value = a.name;
                    email.value = a.email;
                    number.value = a.number;
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