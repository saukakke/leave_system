<html>
    <head>
        <title>Leave Management System</title>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container bg-primary">
            <main class="wrapper">
                <img class="image-responsive" width="100%" src="img/banner.png" alt="Ahmadu Bello University, Zaria" />
                <fieldset>
                    <legend class="submit">
                        <h3>Change Account Password</h3>
                        <hr class="header_line">    
                    </legend>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <img src="img/undraw_forgot_password_re_hxwm (2).svg" alt="Welcome Images" width="100%" srcset="">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <?php
                                $server = 'localhost';
                                $usernemr = 'root';
                                $password = '';
                                $db_name = 'db_leave';

                                $conn = mysqli_connect($server, $usernemr, $password, $db_name) or die ('Connection Error');

                                if(isset($_POST['submit']))
                                {
                                    $username = $_POST['username'];
                                    $password = $_POST['password'];
                                    $c_password = $_POST['c_password'];
                                    
                                    $x = mysqli_real_escape_string($conn, $username);
                                    $y = mysqli_real_escape_string($conn, $password);
                                    $z = mysqli_real_escape_string($conn, $c_password);

                                    $sql = "SELECT * from tbl_login where staff_id = '".$x."'";
                                    $result = mysqli_query($conn, $sql);
                                    if ($result){
                                        if(mysqli_num_rows($result) > 0)
                                        {
                                            if( $y == $z){
                                                $sql = "UPDATE tbl_login set staff_password_hashed = '".md5($y)."', staff_password_unhashed = '".$y."' where staff_id = '".$x."'";
                                                $result = mysqli_query($conn, $sql);
                                                if($result){
                                                    echo '
                                                        <div class="alert alert-primary" style="text-align: center;">
                                                            You have primaryfully changed your password
                                                        </div>
                                                    ';
                                                }
                                            }else{
                                                echo '
                                                    <div class="alert alert-danger" style="text-align: center;">
                                                        New Password and Confirm Pasword do not match
                                                    </div>
                                                ';
                                            }
                                        }else{
                                            echo '
                                                <div class="alert alert-danger" style="text-align: center;">
                                                    No Staff with '.$x.' ID in the database
                                                </div>
                                            ';
                                        }
                                    }
                                }
                                mysqli_close($conn);
                            ?>
                            <form action="<?php $_PHP_SELF; ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">Employee ID</label>
                                    <input type="text" name="username" class="form-control" placeholder="Employee ID">
                                </div>
                                <div class="form-group">
                                    <label for="">New Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="New Password">
                                </div>
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="password" name="c_password" class="form-control" placeholder="Confirm New Password">
                                </div>
                                <div class="submit">
                                    <a href="index.php" class="btn btn-danger">Back</a>
                                    <button type="submit" name="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </fieldset>
                </main>
        <div class="bg-primary" id="footer">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-xl-4">
                    <ul>
                        <label class="footer-label">Navigations</label>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="login.php">User Login</a></li>
                        <li><a href="index2.php">Admin Login</a></li>
                        <li><a href="posts.html">News</a></li>
                    </ul>
                </div>

                <div class="col-md-4 col-lg-4 col-xl-4">
                    <ul>
                        <label class="footer-label">Additional Links</label>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="register.html">Sign Up</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                    </ul>
                </div>

                <div class="col-md-4 col-lg-4 col-xl-4">
                    <ul>
                        <label class="footer-label">Let's talk</label>
                        <li><a href="#">naf-base-yola.mil.ng</a></li>
                        <li><a href="#">naf-base-yola</a></li>
                        <li><a href="#">naf-base-yola</a></li>
                        <li>address</li>
                    </ul>
                </div>
            </div>
        </div>
        <footer class="footer">
            &copy; 2021 Yasin Muhammed Tukur
        </footer>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
</body>
</html>