<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>

    <!-- Bootstrap 4 cdn links:-->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    
    
    <!-- Icon links: -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- FontAwesome icon link: -->
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

    <!-- link stylesheet -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/form.css">
</head>
<body>
   
    <div class="container-fluid">
        <h2 class="text-center">USER Information</h2>
        <hr>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                <form method="post" id="myForm">
                    <h2 class="text-center">Add /Update User</h2>
                    <hr>
                    <div class="form-group">
                        <!-- hidden id -->
                        <input type="text" class="form-control" style="display:none" id="id">
                        <!-- user name -->
                        <label for="uname"  class="form-label">Name</label>
                        <input type="text" name="uname" class="form-control" id="name" required>
                    </div> 
                    <div class="form-group">
                        <!-- user email -->
                        <label for="email" class="form-lable">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                        <!-- user mobile number -->
                        <label for="number" class="form-label">Mobile Number</label><br>
                        <input type="text" name="number" class="form-control" id="number" required>
                    </div>
                    <div class="form-group">
                        
                        <button class="btn btn-success mt-2" style="width: 100%;" id="addUser">Save</button>
                        <button type="reset"class="btn btn-primary mt-2" style="width: 100%;">Reset</button>

                    </div>
                    <!-- it gives message to alert user -->
                    <div id="msg"></div>
                </form>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                <h2 class="text-center">Show User Data</h2>
                <hr>
                <table class="table table-striped">
                    <thead class="text-center">
                        <!-- table header to show headings-->
                        <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Number</th>
                        <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody class="text-center" id="tbody">
                        <!-- table body to show user data -->
                        <tr id="id">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td> 
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../js/popper.js"></script>
    <script src="../js/controlUser.js"></script>
   
</body>
</html>