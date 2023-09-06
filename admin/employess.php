<html>
  <head>
    <title>Leave Record | Leave Management System</title>
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
                <h1 class="header">Employees</h1>
                <table class="table table-striped">
                    <tr>
                        <th>S/N</th>
                        <th>Employee Name</th>
                        <th>Employee ID</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        $server = 'localhost';
                        $user = 'root';
                        $pass = '';
                        $db = 'db_leave';
                        $sn = 1;

                        $conn = mysqli_connect($server, $user, $pass, $db);
                        $sql = "SELECT surname, firstname, middlename, staff_id from tbl_profile";
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '<tr>
                                            <td>'.$sn++.'</td>
                                            <td>'.$row['surname'].' '.$row['firstname'].' '.$row['middlename'].'</td>
                                            <td>'.$row['staff_id'].'</td>
                                            <td><a href="view_staff_record.php?id='.$row['staff_id'].'">View Profile</a></td>
                                          </tr>';
                                }
                            }
                        }
                    ?>
                    
                </table>
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
        <script src="../js/datatable-bootstrap.js"></script>
</body>
</html>