<?php
  session_start();
  if(!isset($_SESSION['user']) || $_SESSION['user'] == null){
    header("Location: ../index.php");
  }
?>
<html>
  <head>
    <title>Leave Record | Leave Management System</title>
    <link rel="stylesheet" href="../css/font-awesome.css" />
    <link rel="stylesheet" href="../css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/style.css" />
    <script>
        $('#form').DataTable();
    </script>
  </head>
  <body>
    <div class="container bg-primary">
        <div class="wrapper">
        <img src="../img/banner.png" alt="Ahmadu Bello University, Zaria" width="100%">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-3">
                <div class="links bg-primary">
                  <ul>
                      <?php
                        $_SESSION['user'] = $_GET['id'];
                      echo '<a href="dashboard.php?id='.$_SESSION['user'].'"><li><i class="fa fa-home"></i> Dashboard</li></a>
                      <a href="leave_record.php?id='.$_SESSION['user'].'"><li id="active"><i class="fa fa-list"></i> Leave records</li></a>
                      <a href="apply.php?id='.$_SESSION['user'].'"><li><i class="fa fa-pencil"></i> Apply for Leave</li></a>
                      <a href="leave_progress.php?id='.$_SESSION['user'].'"><li><i class="fa fa-bar"></i> Leave progress</li></a>
                      <a href="updateprofile.php?id='.$_SESSION['user'].'"><li><i class="fa fa-edit"></i> Update Profile</li></a>
                      <a href="editprofile.php?id='.$_SESSION['user'].'"><li><i class="fa fa-user"></i> View Profile</li></a>
                      <a href="../logout.php"><li class="active"><i class="fa fa-sign-out"></i>Log out</li></a>';
                      ?>
                  <ul>
                </div>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-9">
                <h1 class="header">Leave records</h1>
                <div class="main">
                <table class="table table-striped mydatatable" id="form" style="width: 100%">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Leave type</th>
                            <th>Start Date</th>
                            <th>Due Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $server = 'localhost';
                            $user = 'root';
                            $pass = '';
                            $db = 'db_leave';
                            $sn = 1;

                            $conn = mysqli_connect($server, $user, $pass, $db);
                            $sql = "SELECT id, leave_type, start, end from tbl_apply where staff_id = '".$_SESSION['user']."'";
                            $result = mysqli_query($conn, $sql);
                            if($result){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result))
                                    echo '<tr>
                                            <td>'.$sn++.'</td>
                                            <td>'.$row['leave_type'].'</td>
                                            <td>'.$row['start'].'</td>
                                            <td>'.$row['end'].'</td>
                                            <td>
                                                <a href="view.php?id='.$row['id'].'">View</a>
                                            </td>
                                          <tr>';
                                }else{
                                    echo '<tr>
                                            <td colspan="5">
                                                <div class="alert alert-danger" style="text-align: center;">
                                                    You haven\'t apply for a leave yet.
                                                </div>
                                            </td>
                                          </tr>';
                                }
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            
                        </tr>
                    </tfoot>
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
        <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
        
</body>
</html>