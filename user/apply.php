<?php
  session_start();
  if(!isset($_SESSION['user']) || $_SESSION['user'] == null){
    header("Location: ../index.php");
  }
?>
<html>
  <head>
    <title>Apply for Leave | Leave Management System</title>
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
                    $_SESSION['user'] = $_GET['id'];
                    echo '
                  <ul>
                      <a href="dashboard.php?id='.$_SESSION['user'].'"><li><i class="fa fa-home"></i> Dashboard</li></a>
                      <a href="leave_record.php?id='.$_SESSION['user'].'"><li><i class="fa fa-list"></i> Leave records</li></a>
                      <a href="apply.php?id='.$_SESSION['user'].'"><li id="active"><i class="fa fa-pencil"></i> Apply for Leave</li></a>
                      <a href="leave_progress.php?id='.$_SESSION['user'].'"><li><i class="fa fa-bar"></i> Leave progress</li></a>
                      <a href="updateprofile.php?id='.$_SESSION['user'].'"><li><i class="fa fa-edit"></i> Update Profile</li></a>
                      <a href="editprofile.php?id='.$_SESSION['user'].'"><li><i class="fa fa-user"></i> View Profile</li></a>
                      <a href="../logout.php"><li class="active"><i class="fa fa-sign-out"></i>Log out</li></a>
                  <ul>
                </div>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-9">
                <h1 class="header">Apply for Leave</h1>
                <hr class="header_line">';
                ?>
                <div class="main">
                <form id="form" action="<?php $_PHP_SELF; ?>" method="post" enctype="multipart/form-data">
                    <?php 
                        $server = 'localhost';
                        $user = 'root';
                        $pass = '';
                        $db = 'db_leave';

                        $conn = mysqli_connect($server, $user, $pass, $db);
                        if(isset($_POST['submit'])){
                            $x = $_SESSION['user'];
                            $surname = $_POST['surname'];
                            $firstname = $_POST['firstname'];
                            $middlename = $_POST['middlename'];
                            $gender = $_POST['gender'];
                            $start = $_POST['start'];
                            $end = $_POST['end'];
                            $reason = $_POST['reason'];
                            $phone = $_POST['phone'];
                            $email = $_POST['email'];
                            $leave_type = $_POST['leave_type'];

                            
                            if($gender != ''){
                                $sql1 = "INSERT into tbl_apply values(Null, \"$x\", \"$surname\", \"$firstname\", \"$middlename\", \"$gender\", \"$start\", \"$end\", \"$phone\", \"$email\", \"$leave_type\", \"$reason\", \"Pending\")";
                                $result = mysqli_query($conn, $sql1) or die('cant insert');
                                if($result){
                                    echo '<div class="alert alert-primary" style="text-align: center;">
                                            You have primaryfuly applied for the leave.
                                        </div>';
                                }else{
                                    echo '<div class="alert alert-danger" style="text-align: center;">
                                            There is an error in your query
                                        </div>';
                                }
                            }else{
                                echo '<div class="alert alert-danger" style="text-align: center;">
                                            Update your profile please.
                                        </div>';
                            }
                        }
                        $user_id = $_SESSION['user'] = $_GET['id'];
                        $sql = "SELECT surname, firstname, middlename, gender, phone, email from tbl_profile where staff_id = '".$user_id."'";
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            $row = mysqli_fetch_assoc($result);
                            if($row['gender'] != ''){
                    echo '<div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="sname">Surname</label>
                                <input type="text" class="form-control" readonly value="'.$row['surname'].'" name="surname" id="sname" placeholder="Surname">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" readonly value="'.$row['firstname'].'" name="firstname" id="fname" placeholder="First Name">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="mname">Middle Name</label>
                                <input type="text" class="form-control" readonly value="'.$row['middlename'].'" name="middlename" id="mname" placeholder="Middle Name">
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <input type="text" id="male" name="gender" class="form-control" readonly value="'.$row['gender'].'"/>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="yoa">Starting Date</label>
                                <input type="date" required name="start" class="form-control">
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="yoc">Resumption Date</label>
                                <input type="date" required name="end" class="form-control">
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" required name="phone" value="'.$row['phone'].'" class="form-control" placeholder="Phone Number">
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" required name="email" value="'.$row['email'].'" class="form-control" placeholder="Email Address">
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12 col-lg-4">
                            <div class="form-group">
                                <label for="leave_type">Leave type</label>
                                <select required class="form-control" name="leave_type" style="font-size: medium;">
                                    <option>Select Leave type</option>
                                    <option value="Prota Leave">Prota Leave</option>
                                    <option value="Leave of Absence">Leave of Absence</option>
                                    <option value="Annual Leave">Annual Leave.</option>
                                    <option value="Casual Leave">Casual Leave.</option>
                                    <option value="Study with pay Leave">Study with pay Leave.</option>
                                    <option value="Study without pay Leave">Study without pay Leave.</option>
                                    <option value="Maternity Leave">Maternity Leave.</option>
                                    <option value="Sabbatical Leave">Sabbatical Leave</option>
                                </select>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="reason">Reason</label>
                                <textarea required name="reason" id="reason" rows="5" style="font-size: medium;" class="form-control" placeholder="Reason"></textarea>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 btnApplyDiv">
                            <button class="bg-primary btnApply" type="submit" name="submit">Apply</button>
                        </div>
                    </div>';}
                    else{
                        echo '<div class="alert alert-danger" style="text-align: center">
                                Update your profile to get acces to apply for a leave.
                            </div>';
                    }}
                    ?>
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