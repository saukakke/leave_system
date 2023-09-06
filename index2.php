<!DOCTYPE html>
    <head>
        <title>Home | Leave Management System</title>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container bg-primary">
            <main class="wrapper">
            <img class="img-responsive" width="100%" src="img/banner.png" alt="Ahmadu Bello University, Zaria" />
                <fieldset>
                    <legend class="submit"><h3>Sign in Here</h3><h4>Admin Login</h4></legend>
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

                                if(!preg_match("/[a-z]/", $username)){
                                    echo '
                                        <div class="alert alert-danger" style="text-align: center;">
                                            Wrong Admin details
                                        </div>';
                                }else{
                                    $sql = "SELECT * from tbl_login where staff_id = '".$x."'";
                                        $result = mysqli_query($conn, $sql);
                                        if($result){
                                            if(mysqli_num_rows($result) > 0){
                                                $row = mysqli_fetch_assoc($result);
                                                if($row['staff_id'] == $x && $row['user_type'] == 'admin' && $row['staff_password_hashed'] == md5($y)){
                                                    header("Location: admin/dashboard.php");
                                                }elseif($row['staff_id'] == $x && $row['user_type'] != 'admin'){
                                                    echo '
                                                        <div class="alert alert-danger" style="text-align: center;">
                                                            You are not admin
                                                        </div>
                                                    ';
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
                                                        No staff with <b>'.strtoupper($x).'</b> in the database
                                                    </div>
                                                ';
                                            }
                                        }
                                }
                            }
                            mysqli_close($conn);
                        ?>
                        <form action="<?php $_PHP_SELF; ?>" method="post" enctype="multipart/form-data">
                            <input type="text" name="username" class="form-control" placeholder="Admin Usename">
                            <input type="password" name="password" class="form-control" placeholder="Password">
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
                                <a href="index.php" class="btn btn-primary" id="login">User Login</a>
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