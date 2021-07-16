<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo Config::SYSTEM_NAME ?></title>
    <?php
    include "../../utils/header3.php";
    include "../../modules/list.php";
    ?>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="torquoise" data-background-color="white" style="z-index: 999;">
            <div class="logo">
                <!-- company logo -->
                <a href="<?php echo $web_root ?>acc_admin/dashboard/" class="simple-text logo-normal">
                    <img src="<?php echo $web_root; ?>res/cmp_logo.png" alt="logo" height="80" width="80">
                </a>
                <!-- company name -->
                <a href="<?php echo $web_root ?>acc_admin/dashboard/" class="simple-text logo-normal">
                    El Pardo
                </a>
            </div>

            <!-- SIDEBAR -->
            <div id="sidebar-scroll" class="sidebar-wrapper" onmouseover="this.style.overflow='overlay'" onmouseout="this.style.overflow='hidden'">
                <ul class="nav">
                    <!-- Dashboard -->
                    <li class="nav-item" href="<?php echo $web_root; ?>acc_admin/dashboard/">
                        <a class="nav-link" href="<?php echo $web_root; ?>acc_admin/dashboard/">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item" href="<?php echo $web_root; ?>acc_admin/dashboard/">
                        <a class="nav-link" href="<?php echo $web_root; ?>acc_admin/dtr/">
                            <i class="material-icons">access_time</i>
                            <p>Daily Time Record</p>
                        </a>
                    </li>
                    <!-- Employee -->
                    <hr style="width: 230px;">
                    <li class="nav-item" href="<?php echo $web_root; ?>acc_admin/employee/">
                        <a class="nav-link" href="<?php echo $web_root; ?>acc_admin/employee/">
                            <i class="material-icons">assignment_ind</i>
                            <p>Employees</p>
                        </a>
                    </li>
                    <!-- Staff Cash Advance -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $web_root; ?>acc_admin/EmployeeCredits/">
                            <i class="material-icons">monetization_on</i>
                            <p>Employee Credits</p>
                        </a>
                    </li>
                    <!-- Payroll Report -->
                    <hr style="width: 230px;">
                    <li class="nav-item" href="<?php echo $web_root; ?>acc_admin/reports/">
                        <a class="nav-link" href="<?php echo $web_root; ?>acc_admin/reports/">
                            <i class="material-icons">receipt</i>
                            <p>Payroll</p>
                        </a>
                    </li>
                    <hr style="width: 230px;">
                    <li class="nav-item" href="<?php echo $web_root; ?>acc_admin/HolidayPay/">
                        <a class="nav-link" href="<?php echo $web_root; ?>acc_admin/HolidayPay/">
                            <i class="material-icons">account_balance_wallet</i>
                            <p>Holiday Pay</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navigation bar -->
            <nav class="navbar navbar-expand-lg navbar-light navbar-absolute fixed-top" style="max-height: 55px; z-index: 99; box-shadow: 0px 0px 5px 0px rgb(167, 167, 167)">
                <div class="container-fluid">
                    <div class="navbar-wrapper">

                        <?php
                        # request current url
                        $u_url = $_SERVER['REQUEST_URI'];
                        # create matching string url 
                        $u_employee_url = $web_root . 'acc_admin/employee/index.php?page=time-in-out';
                        $s_employee_url = $web_root . 'acc_admin/employee/index.php?page=shifting-hours';
                        $p_employee_url = $web_root . 'acc_admin/employee/index.php?page=job-positions';


                        # if match echo back button in the left top navigation bar of the time-in-out page
                        if (strval($u_url) === strval($u_employee_url) || strval($u_url) === strval($s_employee_url) || strval($u_url) === strval($p_employee_url)) {
                            echo '<a href="' . $web_root . 'acc_admin/employee/" class="btn btn-primary btn-sm"> <i class="material-icons">arrow_back</i> Back</a>';
                        }
                        ?>

                        <!-- echo page title -->
                        <h4 id="page-title" class="navbar-brand" style="margin-top: 5px;"><?php echo $page_title; ?></h4>
                    </div>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">

                            <?php
                            # request url for the current page
                            $url = $_SERVER['REQUEST_URI'];
                            # create matching string url
                            $employee_url = $web_root . 'acc_admin/employee/';
                            $staffcash_advance_url = $web_root . 'acc_admin/EmployeeCredits/';
                        
                            if (strval($url) == strval($employee_url)) {
                                echo '
                                <li class="nav-item" style="margin-left: 20px;">
                                    <a href="' . $web_root . 'acc_admin/employee/index.php?page=job-positions" class="btn btn-warning btn-sm"> <i class="material-icons">work</i> Job Positions</a>
                                </li>
                                <li class="nav-item" style="margin-left: 20px;">
                                    <a href="' . $web_root . 'acc_admin/employee/index.php?page=shifting-hours" class="btn btn-warning btn-sm"> <i class="material-icons">access_time</i> Shifting Schedules</a>
                                </li> 
                                                      
                                <li class="nav-item" style="margin-left: 20px;">
                                    <a href="' . $web_root . 'acc_admin/employee/index.php?page=time-in-out" class="btn btn-warning btn-sm"> <i class="material-icons">update</i> Update employee\'s dtr</a>
                                </li>';
                            } else if (strval($url) == strval($staffcash_advance_url)) {
                                echo '
                                <li class="nav-item">
                                    <button id="staffCA-btn" class="btn btn-primary btn-sm"> <i class="material-icons">monetization_on</i> Staff Cash Advance</button>
                                </li> 
                                <li class="nav-item" style="margin-left:20px">
                                    <button id="loan-btn" class="btn btn-warning btn-sm"> <i class="material-icons">monetization_on</i> loan</button>
                                </li>                            
                                <li class="nav-item" style="margin-left:20px;">
                                    <button id="misc-btn" class="btn btn-warning btn-sm"> <i class="material-icons">monetization_on</i> Employee miscellaneous</button>
                                </li> 
                                <li class="nav-item" style="margin-left: 20px;">
                                    <button id="damage-btn" class="btn btn-warning btn-sm"> <i class="material-icons">show_chart</i> Damage record</button>
                                </li>';
                            }

                            ?>

                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <i class="material-icons">keyboard_arrow_down</i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="#">Settings</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="controller.php?action=logout">Log out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            <!-- load Body content from chunked forms -->
            <div class="content">
                <div class="container-fluid">
                    <?php require_once $page_content ?>
                </div>
            </div>


            <!-- ------ -->
            <!-- FOOTER -->
            <!-- ------ -->
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="float-left">
                        <ul>
                            <li>
                                <a href="#"> KMB Solutions </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright float-right">
                        &copy;2021
                        , made by
                        <a href="https://www.facebook.com/sly.018" target="_blank">Sly Bacalso</a> <i class="material-icons">favorite</i>
                        for interactive UI
                    </div>
                    <!-- your footer here -->
                </div>
            </footer>
        </div>
    </div>
</body>
</html>