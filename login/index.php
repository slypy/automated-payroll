<?php
require_once "../important.php";
include "../modules/error.php";

if(Account::loggedIn()){
    Page::redir("../dashboard/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo Config::SYSTEM_NAME ?></title>
    <?php 
        require_once "../utils/header2.php"; 
        include "../modules/list.php";
    ?>
</head>

<body>
    <nav class="navbar navbar-dark shadow-none" style="background-color: #33b3a6; color: white"> 
        <div class="container">
            <div class="navhead navbar-header">
                <a href="../index.php" style="display: flex; align-items: center;">
                    <h5 class="aol-title">KMB Solutions </h5>
                </a>
            </div>
            <a href="../signup/index.php" class="btn btn-light btn-rounded">
                Sign up</a>
        </div>
    </nav>

    <div class="m-container">
        <div class="wrap">
            <form method="POST" action="../modules/controller.php?action=login">
                <br>
                <div class="form-title">
                    <div class="cmp-logo">
                        <div id="logo-sprite">
                            <img src="../res/cmp_logo.png" alt="logo">
                        </div>
                    </div>
                    <div class="cmp-name">
                        <h3><?php echo CompanyName; ?></h3>
                    </div>
                    
                </div>
                <br>
                <!-- Create Login Error -->
                <?php
                    if(isset($_SESSION['invalid_account'])){
                        $msg = $_SESSION['invalid_account'];
                                
                        Error($msg, 'login');
                        session_destroy();
                    }
                ?>
                <div class="aol-reg">
                    <div class="usr material-textfield has-validation">
                        <input id="user" class="usr1" name="username" placeholder=" " type="text" required>
                        <label>Username</label>
                    </div>
                </div>
                <div class="aol-reg">
                    <div class="usr material-textfield">
                        <input class="usr1" name="password" placeholder=" " type="password"  required>
                        <label>Password</label>
                    </div>
                </div>
                <br>
                <div class="terms">
                    <p>
                        By clicking "Login", you agree to our Terms & Conditions and Privacy Policy.
                    </p>
                    <button name="login" type="submit" class="btn btn-rounded" style="background-color: #33b3a6; color: white"> 
                        Login</button>
                </div>
                <br>
                <br>
                <!-- <div class="log">
                    <p>
                        New to <?php echo CompanyName; ?>?
                    </p>
                    <a href="../signup/index.php" type="button">
                        Sign up to <?php echo CompanyName; ?></a>
                </div> -->
            </form>
        </div>
    </div>
    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3" style="background-color: #33b3a6; color:white; font-size:small">
            © 2020 Copyright |
            <a class="text-light" href="../index.php"><?php echo CompanyName; ?></a>
        </div>
    </footer>
</body>
</html>