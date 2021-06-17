<?php
require_once "important.php";

if (Account::loggedIn()) {
    Page::redir("acc_admin/index.php");
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title><?php echo Config::SYSTEM_NAME ?></title>
        <?php require_once "./utils/header.php"; ?>
    </head>

    <body>
        <div>

        </div>
        <nav role="navigation" class="navbar navbar-expand-md py-4 shadow-none">
            <div class="container">
                <div class="navhead navbar-header">
                    <!-- <img src="res/logo.png" alt="logo" height="100" width="100"> -->
                    <h1 style="align-self: center; font-weight:bold; color: #1271c9;">KMB Solutions</h1>

                </div>

                <div class="navhead navbar-header">
                    <a href="./login/index.php" class="btn btn-primary btn-rounded">
                        Log In</a>
                </div>
            </div>
        </nav>
        <div class="cont container">
            <div class="view">

                <div class="aol-wrap">
                    <div class="aol-content">
                        <h4 class="aol-quote">Amplify your edge</h4>
                        <br>
                        <ul>
                            <li>
                                <h5>
                                    Record and Analyze your trading performance.
                                </h5>
                            </li>
                            <li>
                                <h5>
                                    Learn how other traders perform.
                                </h5>
                            </li>
                            <li>
                                <h5>
                                    Interact with traders.
                                </h5>
                            </li>
                        </ul>
                    </div>
                    <a href="signup/index.php" class="navbar-header btn btn-primary btn-rounded">
                        Get Started</a>
                </div>
                <img class="illustration" src="res/solution_illustration.png" alt="illustration">
            </div>
        </div>

        <footer class="bg-light text-center text-lg-start">
            <div class="text-center p-3" style="background-color: #1271c9; color:white; font-size:small">
                © 2020 Copyright |
                <a class="text-light" href="#">KMB Solutions</a>
            </div>
        </footer>
    </body>

    </html>
<?php
}
?>