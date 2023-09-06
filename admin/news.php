<html>
  <head>
    <title>Add New Post | Leave Management System</title>
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
                        <a href="news.php"><li id="active"><i class="fa fa-book"></i> Create Post</li></a>
                        <a href="add_user.php"><li><i class="fa fa-plus"></i> Add User</li></a>
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
                    <h1 class="header">Publish a Post</h1>
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
                            $title = $_POST['title'];
                            $file = $_POST['file'];
                            $content = $_POST['content'];
                            $file_location = '';
                            
                            $x = mysqli_real_escape_string($conn, strtolower($title));
                            $z = mysqli_real_escape_string($conn, $content);

                            if(isset($_POST['file'])){
                                $location = '../uploads/';
                                $filename = $_FILES['file']['name'];
                                if(move_uploaded_file($$_FILES['file']['tmp_name'], $location.$filename))
                                    $file_location = $location.$filename;
                            }
                            
                            $sql = "INSERT into tbl_post (id, title, content, uploaded_file)
                                    values(NULL, \"$x\", \"$z\", \"$file_location\")";
                            $result = mysqli_query($conn, $sql);

                            if ($result){
                                echo '
                                    <div class="alert alert-primary" style="text-align: center;">
                                        Your post have been primaryfully shared
                                    </div>
                                ';
                            }else{
                                echo '
                                    <div class="alert alert-danger" style="text-align: center;">
                                        There is error in sharing your post
                                    </div>
                                ';
                            }
                        }
                        mysqli_close($conn);
                    ?>
                    <form action="<?php $_PHP_SELF; ?>" method="post"  id="form" enctype="multipart/form-data">  
                    <div class="form-group">
                        <label for="">News Title</label>
                        <input type="text" name="title" required class="form-control" placeholder="News Title">
                    </div>                          
                    <div class="form-group">
                        <label for="">Upload Supportive File</label>
                        <input type="file" name="file" class="form-control" placeholder="Choose a file">
                    </div>
                        <div class="form-group">
                            <label for="">News Content</label>
                            <textarea required name="content" id="textarea" rows="5" resize="noresize" style="font-size: medium;" class="form-control" placeholder="Post Content"></textarea>
                        </div>
                        <div class="submit">
                            <button type="submit" id="submit" name="submit" class="btn btn-primary">Post</button>
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
