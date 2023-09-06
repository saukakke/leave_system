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
                      <a href="applied_leave.php"><li id="active"><i class="fa fa-pencil"></i> Applied Leaves</li></a>
                      <a href="accepted_leaves.php"><li><i class="fa fa-check"></i> Accepted Leaves</li></a>
                      <a href="rejected_leaves.php"><li><i class="fa fa-times"></i> Rejected Leaves</li></a>
                      <a href="pending_leaves.php"><li><i class="fa fa-question"></i> Pending Leaves</li></a>
                      <a href="employess.php"><li><i class="fa fa-users"></i> Employees</li></a>
                      <a href="../logout.php"><li class="active"><i class="fa fa-sign-out"></i>Log out</li></a>
                  <ul>
                </div>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-9">
                <div class="main">
                <h1 class="header">Leave records</h1>
                <table class="table table-striped">
                    <tr>
                        <th>S/N</th>
                        <th>Staff ID</th>
                        <th>Start Date</th>
                        <th>Due Date</th>
                    </tr>
                     <?php
                            $server = 'localhost';
                            $user = 'root';
                            $pass = '';
                            $db = 'db_leave';
                            $sn = 1;

                            $conn = mysqli_connect($server, $user, $pass, $db);
                            $sql = "SELECT id, staff_id, start, end from tbl_apply";
                            $result = mysqli_query($conn, $sql);
                            if($result){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo '<tr>
                                                <td>'.$sn++.'</td>
                                                <td>'.$row['staff_id'].'</td>
                                                <td>'.$row['start'].'</td>
                                                <td>'.$row['end'].'</td>
                                            <tr>';
                                    }
                                }else{
                                    echo '<tr>
                                            <td colspan="4">
                                                <div class="alert alert-danger" style="text-align: center;">
                                                    No leave has been accepted
                                                </div>
                                            </td>
                                          </tr>';
                                }
                            }
                        ?>
                </table>
            </div>
        </div></div>
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