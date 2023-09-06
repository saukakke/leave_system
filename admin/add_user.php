<html>
  <head>
    <title>Add User | Leave Management System</title>
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
                        <a href="add_user.php"><li id="active"><i class="fa fa-plus"></i> Add User</li></a>
                        <a href="applied_leave.php"><li><i class="fa fa-pencil"></i> Applied Leaves</li></a>
                        <a href="accepted_leaves.php"><li><i class="fa fa-check"></i> Accepted Leaves</li></a>
                        <a href="rejected_leaves.php"><li><i class="fa fa-times"></i> Rejected Leaves</li></a>
                        <a href="pending_leaves.php"><li><i class="fa fa-question"></i> Pending Leaves</li></a>
                        <a href="employess.php"><li><i class="fa fa-users"></i> Employees</li></a>
                        <a href="../logout.php"><li class="active"><i class="fa fa-sign-out"></i>Log out</li></a>
                    <ul>
                </div>
                </div>
                <div class="col-lg-10 col-md-9 col-sm-9">
                    <h1 class="header">Add Employee</h1>
                    <hr class="header_line">
                <div class="main">
                    <?php
                        $server = 'localhost';
                        $usernemr = 'root';
                        $password = '';
                        $db_name = 'db_leave';

                        $conn = mysqli_connect($server, $usernemr, $password, $db_name) or die(('Connection Error'));

                        if(isset($_POST['submit']))
                        {
                            $username = $_POST['username'];
                            $surname = $_POST['surname'];
                            $firstname = $_POST['firstname'];
                            $middlename = $_POST['middlename'];
                            
                            $x = mysqli_real_escape_string($conn, strtolower($username));
                            $y = mysqli_real_escape_string($conn, $surname);
                            $z = mysqli_real_escape_string($conn, $firstname);
                            $w = mysqli_real_escape_string($conn, $middlename);
                            $hashed = md5($y);

                            $sql = "INSERT into tbl_login (id, user_type, staff_id, staff_password_hashed, staff_password_unhashed)
                                    values(NULL, \"staff\", \"$x\", \"$hashed\", \"$y\");";
                            $sql .= "INSERT into tbl_profile (id, surname, firstname, middlename, staff_id, gender, yoc, yop, phone, email, dob, lga, state, nation, c_address, p_address)
                                    values(NULL, \"$y\", \"$z\", \"$w\", \"$x\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\");";
                            $result = mysqli_multi_query($conn, $sql);
                            if ($result){
                                echo '
                                    <div class="alert alert-primary" style="text-align: center;">
                                        You have primaryfully add a new staff
                                    </div>
                                ';
                            }else{
                                echo '
                                    <div class="alert alert-danger" style="text-align: center;">
                                        There is error in adding the user
                                    </div>
                                ';
                            }
                        }
                        mysqli_close($conn);
                    ?>
                    <form action="<?php $_PHP_SELF; ?>" method="post"  id="form" enctype="multipart/form-data">                            
                        <input type="text" name="username" class="form-control" placeholder="Employee ID">
                        <input type="text" name="surname" class="form-control" placeholder="Employee Surname">
                        <input type="text" name="firstname" class="form-control" placeholder="Employee Firstname">
                        <input type="text" name="middlename" class="form-control" placeholder="Employee Middlename">
                        <div class="submit">
                            <button type="submit" id="submit" name="submit" class="btn btn-primary">Add User</button>
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
