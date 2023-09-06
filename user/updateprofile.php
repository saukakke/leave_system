<?php
  session_start();
  if(!isset($_SESSION['user']) || $_SESSION['user'] == null){
    header("Location: ../index.php");
  }
?>
<html>
  <head>
    <title>Update Profile | Leave Management System</title>
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
                    <?php 
                        $sever = 'localhost';
                        $usernamr = 'root';
                        $password = '';
                        $db_name = 'db_leave';

                        $conn = mysqli_connect($sever, $usernamr, $password, $db_name);
                        $_SESSION['user'] = $_GET['id'];
                        
                        $sql = "SELECT * from tbl_profile where staff_id = '".$_SESSION['user']."'";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0)
                            $row = mysqli_fetch_assoc($result);
                        echo '
                  <ul>
                      <a href="dashboard.php?id='.$_SESSION['user'].'"><li><i class="fa fa-home"></i> Dashboard</li></a>
                      <a href="leave_record.php?id='.$_SESSION['user'].'"><li><i class="fa fa-list"></i> Leave records</li></a>
                      <a href="apply.php?id='.$_SESSION['user'].'"><li><i class="fa fa-pencil"></i> Apply for Leave</li></a>
                      <a href="leave_progress.php?id='.$_SESSION['user'].'"><li><i class="fa fa-bar"></i> Leave progress</li></a>
                      <a href="updateprofile.php?id='.$_SESSION['user'].'"><li id="active"><i class="fa fa-edit"></i> Update Profile</li></a>
                      <a href="editprofile.php?id='.$_SESSION['user'].'"><li><i class="fa fa-user"></i> View Profile</li></a>
                      <a href="../logout.php"><li class="active"><i class="fa fa-sign-out"></i>Log out</li></a>
                  <ul>
                </div>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-9">
                <h1 class="header">Update Profile</h1>
                <hr class="header_line">';?>
                <div class="main">
                <form id="form" action="<?php $_PHP_SELF; ?>" method="post" enctype="multipart/form-data">
                    <?php 
                    if(isset($_POST['submit'])){
                            $phone = $_POST['phone'];
                            $email = $_POST['email'];
                            $lga = $_POST['lga'];
                            $state = $_POST['state'];
                            $nation = $_POST['nation'];
                            $yoa = $_POST['yoa'];
                            $yoc = $_POST['yoc'];
                            $dob = $_POST['dob'];
                            $p_address = $_POST['address1'];
                            $c_address = $_POST['address2'];
                            $user_id = $_SESSION['user'] = $_GET['id'];

                            $sql = 'UPDATE tbl_profile set phone = "'.$phone.'", 
                            email = "'.$email.'", 
                            lga = "'.$lga.'", 
                            state = "'.$state.'", 
                            nation = "'.$nation.'", 
                            yop = "'.$yoa.'",
                            yoc = "'.$yoc.'",
                            dob = "'.$dob.'",
                            c_address = "'.$c_address.'", 
                            p_address = "'.$p_address.'" where staff_id = "'.$user_id.'"';
                            $result = mysqli_query($conn, $sql);
                            if($result){
                                echo '
                                    <div class="alert alert-primary" style="text-align: center">
                                        Profile primaryfully updated
                                    </div>
                                ';
                                header("refresh:2 updateprofile.php?id=".$user_id);
                            }else{
                                echo '
                                    <div class="alert alert-danger" style="text-align: center">
                                        Profile not updated
                                    </div>
                                ';
                            }
                         }
                          echo '<div class="row">
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
                                <div class="form-check">
                                    <label class="form-check-label" for="male" style="font-weight: normal;">
                                        <input type="radio" id="male" name="gender" class="form-check-radio" value="Male" checked/> Male
                                    </label>
                                    <label class="form-check-label" for="female" style="font-weight: normal;">
                                        <input type="radio" id="female" name="gender" class="form-check-radio" value="Female" /> Female
                                    </label>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-3">
                            <div class="form-group">
                                <label for="yoa">Year of Appointment</label>
                                <input type="date" value="'.$row['yoc'].'" name="yoa" class="form-control">
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-3">
                            <div class="form-group">
                                <label for="yoc">Year of Confirmation</label>
                                <input type="date" value="'.$row['yop'].'" name="yoc" class="form-control">
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
                                <input type="date" value="'.$row['dob'].'" name="dob" class="form-control" placeholder="Date of Birth">
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
                    </div>';
                    ?>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 btnApplyDiv">
                            <button class="bg-primary btnApply" type="submit" name="submit">Update Profile</button>
                        </div>
                    </div>
                </form>
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