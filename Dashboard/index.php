<?php
    $pageTitle = "Admin login";
        
        session_start();
        include "init.php";
        
        if(isset($_SESSION['username'])) { 
            header("Location:dashboard.php");
            exit();
        } 
         
        if($_SERVER['REQUEST_METHOD'] == "POST") {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $hasedPass = password_hash($password,PASSWORD_DEFAULT);
            
            $stmt = $con->prepare("SELECT * FROM hosters WHERE email = ?");
            $stmt->execute(array($email));
            $hoster = $stmt->fetch();
                        
            if ( ($hoster['email'] == $email) && (password_verify($password,$hoster['password'])) ) {
                $_SESSION['id'] = $hoster['id'];
                $_SESSION['email'] = $hoster['email'];
                $_SESSION['first_name'] = $hoster['first_name'];
                $_SESSION['last_name'] = $hoster['last_name'];
                $_SESSION['username'] = $hoster['username'];
                $_SESSION['position'] = $hoster['position_id'];
                $_SESSION['admin_trust'] = $hoster['admin_trust'];
                header("Location:dashboard.php");
                exit();
            } else {
                header("Location:index.php");
            }           
        }               
?>

<div class="container d-flex justify-content-center align-items-center">
    <div class="login-box mt-5">
        <div class="login-logo">
            <b>Admin</b> Sign In
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                    <div class="input-group mb-3">
                        <input type="email" name='email' class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name='password' class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
</div>