<!--  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAVE US</title>

    <!-- Bootstrap 4 cdn links: -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- link stylesheet -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
   
    <div class="container-fluid">
        <h2 class="text-center">USER Information</h2>
        <hr>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                <form method="post" id="myForm" class=".needs-validation">
                    <h2 class="text-center">Save Us</h2>
                    <hr>
                    <b> * Required Fields</b>
                    <!-- it gives message to alert user -->
                    <div id="msg"></div>
                    <div class="form-group">
                        <!-- hidden id -->
                        <input type="text" class="form-control" style="display:none" id="id">
                        
                        <!-- first name -->
                        <label for="fname"  class="form-label">First Name:</label>
                        <b> *</b>
                    <span class="error"></span>
                        <input type="text" name="uname" class="form-control" id="fname" required>
                    </div> 
                    <div class="form-group">
                        <!-- last name -->
                        <label for="lname"  class="form-label">Last Name:</label>
                        <b> * </b>
                        <span class="error"></span>
                        <input type="text" name="lname" class="form-control" id="lname" required>
                    </div> 
                    
                    <div class="form-group">
                        <!-- user email -->
                        <label for="email" class="form-lable">Email</label>
                        <b> * </b>
                        <span class="error"></span>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                        <!-- date of birth -->
                        <label for="dob" class="form-label">Date Of Birth:</label>
                        <b> * </b>
                        <span class="error"></span>
                        <input type="date" class="form-control" id="dob" name="dob" max="2000-12-31" required>

                    </div>
                    <div class="form-group">
                        <!-- user mobile number -->
                        <label for="number" class="form-label">Mobile Number</label>
                        <b> * </b>
                        <span class="error"></span>
                        <input type="number" name="number" class="form-control" id="number" required>
                    </div>
                    <div class="form-group">
                        <!-- choose country -->
                        <label for="country" class="form-label">Country:</label>
                        <b> * </b>
                        <span class="error"></span>
                        <input class="form-control" list="countries" name="country" id="country">
                        <datalist id="countries">
                            <option value="">Select Country</option>
                            <option value="india">India</option>
                            <option value="america">America</option>
                            <option value="japan">Japan</option>
                            <option value="russia">Russia</option>
                            
                            <option value="others" onclick="open(0)">Others</option>
                            <input type="text" id="open" class="form-control" style="display:none;">
                            <input type="submit" id="open" onclick="open(1)" class="form-control" style="display:none;">
                            
                        </datalist>
                        
                    </div>
                    
                    <div class="form-group">
                        <!-- more about your self -->
                        <label for="bio" class="form-label">Bio:</label>
                        <b> * </b>
                        <div class="error"></div>
                        <textarea name="bio" id="bio" class="form-control" required style="resize:none;"></textarea>

                    </div>
                    <div class="form-group">
                        
                        <button class="btn btn-success mt-2" style="width: 100%;" id="addUser">Save</button>
                        <button type="reset"class="btn btn-primary mt-2" style="width: 100%;">Reset</button>

                    </div>
                </form>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                <h2 class="text-center">Show User Data</h2>
                <hr>
                <table class="table table-responsive table-bordered">
                    <thead class="text-center">
                        <!-- table header to show headings-->
                        <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                       
                        <th>Email</th>
                        <th>DOB</th>
                        <th>Number</th>
                        <th>Country</th>
                        <th>Bio</th>
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
    <script src="../js/dataControl.js"></script>
   
</body>
</html>
