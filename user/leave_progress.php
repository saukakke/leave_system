<?php
  session_start();
  if(!isset($_SESSION['user']) || $_SESSION['user'] == null){
    header("Location: ../index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Progress | Leave Management System</title>
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
                        <ul><?php
                            $_SESSION['user'] = $_GET['id'];
                            echo '<a href="dashboard.php?id='.$_SESSION['user'].'"><li><i class="fa fa-home"></i> Dashboard</li></a>
                            <a href="leave_record.php?id='.$_SESSION['user'].'"><li><i class="fa fa-list"></i> Leave records</li></a>
                            <a href="apply.php?id='.$_SESSION['user'].'"><li><i class="fa fa-pencil"></i> Apply for Leave</li></a>
                            <a href="leave_progress.php?id='.$_SESSION['user'].'"><li id="active"><i class="fa fa-bar"></i> Leave progress</li></a>
                            <a href="updateprofile.php?id='.$_SESSION['user'].'"><li><i class="fa fa-edit"></i> Update Profile</li></a>
                            <a href="editprofile.php?id='.$_SESSION['user'].'"><li><i class="fa fa-user"></i> View Profile</li></a>
                            <a href="../logout.php"><li class="active"><i class="fa fa-sign-out"></i>Log out</li></a>';
                            ?>
                        <ul>
                    </div>
                </div>
                <div class="col-lg-10 col-md-9 col-sm-9">
                    <h1 class="header">Leave Progress</h1>
                    <hr class="header_line">
                    <div class="main">
                    <div style="margin-left: 30px;">
                        <?php
                        $server = 'localhost';
                        $user = 'root';
                        $pass = '';
                        $db = 'db_leave';

                        $conn = mysqli_connect($server, $user, $pass, $db);
                        $sql = "SELECT start, end, status, leave_type from tbl_apply where staff_id = '".$_SESSION['user']."';";
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            if(mysqli_num_rows($result) > 0){
                                $row = mysqli_fetch_assoc($result);
                                if($row['status'] == 'Accept'){
                                    $start = strtotime($row['start']);
                                    $end = strtotime($row['end']);
                                    $now = strtotime(date('Y-m-d'));
                                    $diff_start_end = (($end - $start) / (3600*24));
                                    $diff_start_now = (($now - $start) / (3600*24));
                                    if($diff_start_end > $diff_start_now){
                                        echo '<p>You started your leave on '.$row['start'].' and you are expected to resume office on '.$row['end']."</p>";
                                        echo '<p>You have exhausted '.$diff_start_now.' days from your leave.'."</p>";
                                        $slq1 ="SELECT description from tbl_leave where name = '".$row['leave_type']."'";
                                        $result1 = mysqli_query($conn, $slq1);
                                        if($result1){
                                            $row1 = mysqli_fetch_assoc($result1);
                                            echo '<p>'.$row1['description'].'</p>';
                                        }
                                        echo '<p>You have '.(($diff_start_end - $diff_start_now)).' days from your leave.</p>';?>
                                        <progress style="background-color: #4d4;
                                                    border: 1px solid #8d8;
                                                    border-radius: 30px;
                                                    overflow: hidden;
                                                    -webkit-appearance: none;
                                                    &::-webkit-progress-bar{
                                                        background: #8d8;
                                                    }
                                                    &::-webkit-progress-value, &::-moz-progress-bar {
                                                        color: green;
                                                    }
                                                }" id="progress" max="<?php echo ($diff_start_end); ?>" value="<?php echo $diff_start_now; ?>"></progress>
                                    <?php }else{
                                        echo '<div class="alert alert-danger" style="text-align: center;">
                                                You have exhausted your leave.
                                            </div>';
                                    }
                                }elseif($row['status'] == 'decline'){
                                    echo '<div class="alert alert-danger" style="text-align: center;">
                                            Sorry! Your leave request was not granted.
                                        </div>';
                                }else{
                                    echo '<div class="alert alert-secondary" style="text-align: center;">
                                            Your leave is under review. Please excersice patience while waiting for response.
                                        </div>';
                                }
                            }else{
                                echo '<div class="alert alert-danger" style="text-align: center;">
                                        You haven\'t apply for leave.
                                    </div>';
                            }
                        }
                        
                        ?>
                    </div>
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