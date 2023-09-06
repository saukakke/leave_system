<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Leave Management System</title>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css"/>
    </head>
    <body>
        <div class="container bg-primary">
            <main class="wrapper">
            <img class="img-responsive" width="100%" src="img/banner.png" alt="Ahmadu Bello University, Zaria" />
                <fieldset>
                    <legend class="submit"><h3>Sign in Here</h3><h4>User Login</h4></legend>
                    <div class="col">
                        <?php
                            $server = 'localhost';
                            $usernemr = 'root';
                            $password = '';
                            $db_name = 'db_leave';

                            $conn = mysqli_connect($server, $usernemr, $password, $db_name) or die(mysqli_error('Connection Error'));

                            if(isset($_POST['submit']))
                            {
                                $username = strtolower($_POST['username']);
                                $password = $_POST['password'];
                                
                                $x = mysqli_real_escape_string($conn, $username);
                                $y = mysqli_real_escape_string($conn, $password);

                                if(!preg_match("/jp|p|[1-2]{1}[0-9]{4}/", $username)){
                                    echo '
                                        <div class="alert alert-danger" style="text-align: center;">
                                            Staff ID mismatched
                                        </div>';
                                }else{
                                        $sql = "SELECT * from tbl_login where staff_id = '".$x."'";
                                        $result = mysqli_query($conn, $sql);
                                        if($result){
                                            if(mysqli_num_rows($result) > 0){
                                                $row = mysqli_fetch_assoc($result);
                                                if($row['staff_id'] == $x && $row['user_type'] == 'staff' && $row['staff_password_hashed'] == md5($y)){
                                                    $_SESSION['user'] = $x;
                                                    header("Location: user/dashboard.php");
                                                }else{
                                                    echo '
                                                        <div class="alert alert-danger" style="text-align: center;">
                                                            Wrong password
                                                        </div>
                                                    ';
                                                }
                                            }else{
                                                echo '
                                                    <div class="alert alert-danger" style="text-align: center;">
                                                        No staff with '.$x.' in the database
                                                    </div>
                                                ';
                                            }
                                        }
                                    
                                }
                            }
                            mysqli_close($conn);
                        ?>
                        <form action="<?php $_PHP_SELF; ?>" method="post" enctype="multipart/form-data">
                            <input type="text" name="username" required class="form-control" placeholder="Employee ID">
                            </i><input type="password" name="password" required class="form-control" placeholder="Password">
                            <div class="link">
                                <a href="change_password.php">Forgot password</a>
                            </div>

                            <div class="submit">
                                <!--button type="submit" class="btn btn-primary">Log in</button-->
                                <button id="login" name="submit" type="submit" class="btn btn-primary">Login</button>
                            </div>

                            <div class="row">
                                <hr class="line">
                                <label>or</label>
                                <hr class="line">
                            </div>
                            
                            <div class="submit">
                                <a href="index2.php" class="btn btn-primary" id="login">Admin Login</a>
                            </div>
                        </form>
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
                        <li><a href="index.html#about">About Us</a></li>
                        <li><a href="index.html#contact">Contact Us</a></li>
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