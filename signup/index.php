<?php
require_once "../important.php";
include "../modules/error.php";
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
                <div class="navhead navbar-header">
                    <a href="../index.php" style="display: flex; align-items: center;">
                        <!-- <img src="../res/logo.png" alt="logo" height="50" width="50"> -->
                        <h5 class="aol-title">KMB Solutions</h5>
                    </a>
                </div>
            </div>
            <a href="../login/index.php" class="btn btn-light btn-rounded">
                Log In</a>
        </div>
    </nav>

    <div class="m-container">
        <div class="wrap">
            <form method="POST" action="../modules/controller.php?action=signup">
                <br>
                <div class="form-title">
                    <h3>Register an Account</h3>
                </div>
                <br>
                <div class="aol-reg">
                    <div class="material-textfield">
                        <input placeholder=" " name="firstname" class="fn" type="text" required>
                        <label>Firstname</label>
                    </div>
                    <div class="material-textfield">
                        <input placeholder=" " class="fn" name="lastname" type="text" required>
                        <label>Lastname</label>
                    </div>
                </div>
                <div class="aol-reg">
                    <div class="material-textfield">
                        <input id="usr" class="usr" placeholder=" " name="username" type="text" required>
                        <label>Username</label>
                    </div>
                </div>

                <!-- TODO HERE -->
                <?php
                if (isset($_SESSION['user_already_taken'])) {
                    $msg = $_SESSION['user_already_taken'];

                    Error($msg, "signup-username");
                }
                ?>

                <!-- <div class="aol-reg">
                    <div class="material-textfield">
                        <input id="email" class="usr" placeholder=" " name="email" type="email" required>
                        <label>Email</label>
                    </div>
                </div> -->  

                <!-- TODO HERE -->
                <?php
                if (isset($_SESSION['email_already_taken'])) {
                    $msg = $_SESSION['email_already_taken'];

                    Error($msg, 'signup-email');
                    session_destroy();
                }
                ?>

                <div class="aol-reg">
                    <div class="material-textfield">
                        <input class="fn" placeholder=" " name="password" type="password" required>
                        <label>Password</label>
                    </div>
                    <div class="material-textfield">
                        <input class="fn" placeholder=" " name="confirmpassword" type="password" required>
                        <label>Confirm password</label>
                    </div>
                </div>
                <div class="aol-reg">
                    <select name="position" class="picker form-select" aria-label="Default select example">
                        <option selected>Select Position</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <div class="terms">
                    <button href="signup/index.php" type="submit" name="register" class="btn btn-rounded" style="background-color: #33b3a6; color: white">
                        Register</button>
                </div>
                <div class="log">
                    <p>
                        Already have an account?
                    </p>
                    <a href="../login/index.php" type="button" style="color: #33b3a6;">
                        Log In to <?php echo CompanyName; ?></a>
                </div>
            </form>
        </div>
    </div>
    <footer class="cp bg-light text-center text-lg-start">
        <div class="text-center p-3" style="background-color: #33b3a6; color:white; font-size:small">
            © 2020 Copyright |
            <a class="text-light" href="../index.php"><?php echo CompanyName; ?></a>
        </div>
    </footer>
</body>

</html>