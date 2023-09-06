<html>
  <head>
    <title>View Profile | Leave Management System</title>
    <link rel="stylesheet" href="../css/font-awesome.css" />
    <link rel="stylesheet" href="../css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
  </head>
  <body>
    
    <div class="container bg-primary">
        <div class="wrapper">
        <img src="../img/banner.png" alt="Ahmadu Bello University, Zaria" width="100%">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-3">
                <div class="links bg-primary">
                  <ul>
                      <a href="dashboard.php"><li><i class="fa fa-home"></i> Dashboard</li></a>
                      <a href="leave_records.php"><li><i class="fa fa-list"></i> Leave records</li></a>
                      <a href="add_user.php"><li><i class="fa fa-plus"></i> Add Staff</li></a>
                      <a href="applied_leave.php"><li><i class="fa fa-pencil"></i> Applied Leaves</li></a>
                      <a href="accepted_leaves.php"><li><i class="fa fa-check"></i> Accepted Leaves</li></a>
                      <a href="rejected_leaves.php"><li><i class="fa fa-times"></i> Rejected Leaves</li></a>
                      <a href="pending_leaves.php"><li><i class="fa fa-question"></i> Pending Leaves</li></a>
                      <a href="employess.php"><li id="active"><i class="fa fa-users"></i> Employees</li></a>
                      <a href="../logout.php"><li class="active"><i class="fa fa-sign-out"></i>Log out</li></a>
                  <ul>
                </div>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-9">
                <div class="main">
                <h1 class="header">View Staff Profile</h1>
                <hr class="header_line">
                <?php 
                    $server = 'localhost';
                    $user = 'root';
                    $pass = '';
                    $db = 'db_leave';
                    $x = $_GET['id'];

                    $conn = mysqli_connect($server, $user, $pass, $db);
                    $sql = "SELECT * from tbl_profile where staff_id= '".$x."'";
                    $result = mysqli_query($conn, $sql);
                    if($result){
                        $row = mysqli_fetch_assoc($result);
                    
                echo '<div id="form"><div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-3">
                            <div class="form-group">
                                <label for="sname">Surname</label>
                                <input type="text" class="form-control" value="'.$row['surname'].'" readonly name="sname" id="sname" placeholder="Surname">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-3">
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" value="'.$row['firstname'].'" readonly name="fname" id="fname" placeholder="First Name">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-3">
                            <div class="form-group">
                                <label for="mname">Middle Name</label>
                                <input type="text" class="form-control" value="'.$row['middlename'].'" readonly name="mname" id="mname" placeholder="Middle Name">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-3">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                    <input type="text" id="male" name="gender" class="form-control" readonly value="'.$row['gender'].'"/>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-3">
                            <div class="form-group">
                                <label for="yoa">Year of Appointment</label>
                                <input type="date" value="'.$row['yoc'].'" readonly name="yoa" class="form-control">
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-3">
                            <div class="form-group">
                                <label for="yoc">Year of Confirmation</label>
                                <input type="date" value="'.$row['yop'].'" readonly name="yoc" class="form-control">
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-3">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" required value="'.$row['phone'].'" name="phone" class="form-control" placeholder="Phone Number">
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-3">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" required value="'.$row['email'].'" name="email" class="form-control" placeholder="Email Address">
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-3">
                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="date" readonly value="'.$row['dob'].'" name="dob" class="form-control" placeholder="Date of Birth">
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-3">
                            <div class="form-group">
                                <label for="lga">Local Government Area</label>
                                <input type="text" required value="'.$row['lga'].'" name="lga" class="form-control" placeholder="Local Government Area">
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-3">
                            <div class="form-group">
                                <label for="state">State of Origin</label>
                                <input type="text" required value="'.$row['state'].'" name="state" class="form-control" placeholder="State of Origin">
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-3">
                            <div class="form-group">
                                <label for="nation">Nationality</label>
                                <input type="text" required value="'.$row['nation'].'" name="nation" class="form-control" placeholder="Nationality">
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="address1">Contact Address</label>
                                <textarea required name="address1" id="address1" rows="5" style="font-size: medium;" class="form-control" placeholder="Contact Address">'.$row['c_address'].'</textarea>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="address2">Residential Address</label>
                                <textarea required name="address2" value="'.$row['p_address'].'" id="address2" rows="5" style="font-size: medium;" class="form-control" placeholder="Residential Address">'.$row['p_address'].'</textarea>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                    </div></div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        </div>
        <div class="footer">
            <footer>
                &copy; 2021 Yasin Muhammed Tukur
            </footer>
        </div>
        </div>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrap.js"></script>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/popper.min.js"></script>
</body>
</html>