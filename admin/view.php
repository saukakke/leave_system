<html>
  <head>
    <title>Leave Management System</title>
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
            <div style="margin: 10px">
                <?php 
                        $server = 'localhost';
                        $user = 'root';
                        $pass = '';
                        $db = 'db_leave';

                        $conn = mysqli_connect($server, $user, $pass, $db);
                        $id = $_GET['id'];
                        $sql = "SELECT * from tbl_apply where id = '".$id."'";
                        if(isset($_POST['accept'])){
                            $sql1 = 'UPDATE tbl_apply set status = "Accept" where id = "'.$id.'"';
                            $result1 = mysqli_query($conn, $sql1);
                            if($result1){
                                echo '<div class="alert alert-info" style="text-align: center;">
                                        Leave accepted
                                    </div>';
                            }
                        }elseif(isset($_POST['decline'])){
                            $sql1 = 'UPDATE tbl_apply set status = "Decline" where id = "'.$id.'"';
                            $result1 = mysqli_query($conn, $sql1);
                            if($result1){
                                echo '<div class="alert alert-danger" style="text-align: center;">
                                        Leave declined
                                    </div>';
                            }
                        }
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            $row = mysqli_fetch_assoc($result);
                        
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
                                <input type="date" class="form-control" readonly value="'.$row['start'].'" name="surname" id="sname" placeholder="Surname">
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="yoc">Resumption Date</label>
                                <input type="date" class="form-control" readonly value="'.$row['end'].'" name="surname" id="sname" placeholder="Surname">
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control" readonly value="'.$row['phone'].'" name="surname" id="sname" placeholder="Surname">
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" readonly value="'.$row['email'].'" name="surname" id="sname" placeholder="Surname">
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12 col-lg-4">
                            <div class="form-group">
                                <label for="leave_type">Leave type</label>
                                <input type="text" class="form-control" readonly value="'.$row['leave_type'].'" name="surname" id="sname" placeholder="Surname">
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="reason">Reason</label>
                                <textarea required name="reason" id="reason" rows="5" style="font-size: medium;" class="form-control" placeholder="Reason">'.$row['reason'].'</textarea>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                    ';}?>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <form action="<?php $_PHP_SELF; ?>" method="post" class="submit" enctype="multipart/form-data">
                            <button id="submit1" class="btn btn-primary" name="accept">Accept</button>
                            <button id="submit1" class="btn btn-danger" name="decline">Decline</button>
                        </form>
                    </div></div></div>
        </div><div class="footer">
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