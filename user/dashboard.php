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
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-3">
                <div class="links bg-primary">
                  <?php echo '
                  <ul>
                      <a href="dashboard.php?id='.$_SESSION['user'].'"><li id="active"><i class="fa fa-home"></i> Dashboard</li></a>
                      <a href="leave_record.php?id='.$_SESSION['user'].'"><li><i class="fa fa-list"></i> Leave records</li></a>
                      <a href="apply.php?id='.$_SESSION['user'].'"><li><i class="fa fa-pencil"></i> Apply for Leave</li></a>
                      <a href="leave_progress.php?id='.$_SESSION['user'].'"><li><i class="fa fa-bar"></i> Leave progress</li></a>
                      <a href="updateprofile.php?id='.$_SESSION['user'].'"><li><i class="fa fa-edit"></i> Update Profile</li></a>
                      <a href="editprofile.php?id='.$_SESSION['user'].'"><li><i class="fa fa-user"></i> View Profile</li></a>
                      <a href="../logout.php"><li class="active"><i class="fa fa-sign-out"></i>Log out</li></a>
                  <ul>
              </div>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-9">
                <h1 class="header">Dashboard</h1>
                <hr class="header_line">
                <div class="row">
      <div class="col-sm-6 col-md-4 col-lg-4">
        <a href="dashboard.php?id='.$_SESSION['user'].'">
          <h1><i class="fa fa-home"></i></h1>
          <h3>Dashboard</h3>
        </a>
      </div>
      <div class="col-sm-6 col-md-4 x9 col-lg-4">
        <a href="leave_record.php?id='.$_SESSION['user'].'">
          <h1><i class="fa fa-list"></i></h1>
          <h3>Leave records</h3>
        </a>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-4">
        <a href="apply.php?id='.$_SESSION['user'].'">
          <h1><i class="fa fa-pencil"></i></h1>
          <h3>Apply for Leave</h3>
        </a>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-4">
        <a href="leave_progress.php?id='.$_SESSION['user'].'">
          <h1><i class="fa fa-bar"></i></h1>
          <h3>Leave progress</h3>
        </a>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-4">
        <a href="updateprofile.php?id='.$_SESSION['user'].'">
          <h1><i class="fa fa-edit"></i></h1>
          <h3>Update profile</h3>
        </a>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-4">
        <a href="editprofile.php?id='.$_SESSION['user'].'">
          <h1><i class="fa fa-user"></i></h1>
          <h3>View profile</h3>
        </a>
      </div>
      </div>
        </div></div>
        ';?>
        <div class="footer">
            <footer>
                &copy; NAF Base Yola
            </footer>
        </div>
    </div>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrap.js"></script>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/popper.min.js"></script>
  </body>
</html>
