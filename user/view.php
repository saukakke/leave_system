<?php
  session_start();
  if(!isset($_SESSION['user']) || $_SESSION['user'] == null){
    header("Location: ../index.php");
  }
?>

<html>
  <head>
    <title>Dashboard | Leave Management System</title>
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
                        $x = $_SESSION['user'];

                        if(isset($_POST['cancel'])){
                            $id = $_GET['id'];
                            $sql = "DELETE from tbl_apply where id = '$id'";
                            $result = mysqli_query($conn, $sql);
                            if($result){
                                echo '
                                <div class="alert alert-primary" style="text-align: center">
                                    You primaryfully cancelled a leave request.
                                </div>';
                                header("refresh:0 leave_record.php?id=".$x);
                            }else{
                                echo '
                                <div class="alert alert-danger" style="text-align: center">
                                    Unable to cancel a leave request.
                                </div>';
                            }
                        }
                        
                        $sql = "SELECT * from tbl_apply where staff_id = '".$_SESSION['user']."' and id = '".$id."'";
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            $row = mysqli_fetch_assoc($result);
                            if($row['status'] == 'Accept'){
                                echo '<div class="alert alert-primary" style="text-align: center">
                                        Your leave has been granted.
                                    </div>';
                            }elseif($row['status'] == 'decline'){
                                echo '<div class="alert alert-danger" style="text-align: center">
                                        Your leave has been rejected.
                                    </div>';
                            }else{
                                echo '<div class="alert alert-secondary" style="text-align: center">
                                        Your leave is under review. Please exercise patience while waiting for response.
                                    </div>';
                            }
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
                    </div>
                    ';}?>
            </div>
            <form action="<?php $_PHP_SELF; ?>" method="post">
            <?php
                
                
                if($row['status'] == 'Pending')
                    echo '
                        <div class="col-12" id="cancel">
                            <input type="submit" id="btnCancel" name="cancel" value="Cancel Leave Request" class="bg-danger">
                            <a href="leave_record.php?id='.$x.'" id="back" class="btn btn-primary">Back</a>
                        </div>
                    </form>';
                else
                    echo '
                        <div class="col-12" id="cancel">
                            <a href="leave_record.php?id='.$x.'" id="back" class="btn btn-primary">Back</a>
                        </div>';
            ?>
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