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
                    <img src="<?php echo web_root; ?>res/cmp_logo.png" alt="logo" height="80" width="80">
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
                        <a class="nav-link" href="<?php echo $web_root; ?>acc_admin/staffcashadvance/">
                            <i class="material-icons">monetization_on</i>
                            <p>Employee Credits</p>
                        </a>
                    </li>
                    <!-- Payroll Report -->
                    <hr style="width: 230px;">
                    <li class="nav-item" href="<?php echo $web_root; ?>acc_admin/reports/">
                        <a class="nav-link" href="<?php echo $web_root; ?>acc_admin/reports/">
                            <i class="material-icons">receipt</i>
                            <p>Payroll Report</p>
                        </a>
                    </li>
                    <!-- Employee's Payroll Verification -->
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo $web_root; ?>acc_admin/EVpayroll/">
                            <i class="material-icons">playlist_add_check</i>
                            <p style="font-size: 13px;">Employee's Payroll Verification</p>
                        </a>
                    </li>
                    <!-- Scheduled AutoPrint Payroll -->
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo $web_root; ?>acc_admin/SApayroll/">
                            <i class="material-icons">event_note</i>
                            <p style="font-size: 14px;">Scheduled AutoPrint Payroll</p>
                        </a>
                    </li>
                    <hr style="width: 230px;">
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

                        # if match echo back button in the left top navigation bar of the time-in-out page
                        if (strval($u_url) === strval($u_employee_url)) {
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
                            $staffcash_advance_url = $web_root.'acc_admin/staffcashadvance/';

                            if (strval($url) == strval($employee_url)) {
                                echo '<li class="nav-item">
                                    <a href="#registration-form" data-target="#add-position-form" data-toggle="modal" data-backdrop="static" class="btn btn-primary btn-sm"> <i class="material-icons">add</i> Add Position</a>
                                </li>
                                <li class="nav-item" style="margin-left: 20px;">
                                    <a href="#registration-form" data-target="#update-salary-form" data-toggle="modal" data-backdrop="static" class="btn btn-primary btn-sm"> <i class="material-icons">monetization_on</i> Salary Adjustment</a>
                                </li>                              
                                <li class="nav-item" style="margin-left: 20px;">
                                    <a href="' . $web_root . 'acc_admin/employee/index.php?page=time-in-out" class="btn btn-warning btn-sm"> <i class="material-icons">update</i> Update employee time in/out</a>
                                </li>';
                            } else if (strval($url) == strval($staffcash_advance_url)){
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
                        &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        , made by
                        <a href="https://www.facebook.com/sly.018" target="_blank">Sly Bacalso</a> <i class="material-icons">favorite</i>
                        for interactive UI
                    </div>
                    <!-- your footer here -->
                </div>
            </footer>
        </div>
    </div>
    <script>
        /**
         * Design functions by Sly Kint A. Bacalso
         * 2021
         * jQuery -- Material Design
         */

        $(document).ready(function() {
            $().ready(function() {
                $sidebar = $('.sidebar');
                $sidebar_img_container = $sidebar.find('.sidebar-background');
                $full_page = $('.full-page');
                $sidebar_responsive = $('body > .navbar-collapse');
                window_width = $(window).width();
                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();
                if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                    if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                        $('.fixed-plugin .dropdown').addClass('open');
                    }
                }

                $('.fixed-plugin a').click(function(event) {
                    //if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                    if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $('.fixed-plugin .active-color span').click(function() {
                    $full_page_background = $('.full-page-background');

                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-color', new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data-color', new_color);
                    }
                });

                $('.fixed-plugin .background-color .badge').click(function() {
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('background-color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-background-color', new_color);
                    }
                });

                $('.fixed-plugin .img-holder').click(function() {
                    $full_page_background = $('.full-page-background');

                    $(this).parent('li').siblings().removeClass('active');
                    $(this).parent('li').addClass('active');

                    var new_image = $(this).find("img").attr('src');

                    if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        $sidebar_img_container.fadeOut('fast', function() {
                            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                            $sidebar_img_container.fadeIn('fast');
                        });
                    }

                    if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $full_page_background.fadeOut('fast', function() {
                            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                            $full_page_background.fadeIn('fast');
                        });
                    }

                    if ($('.switch-sidebar-image input:checked').length == 0) {
                        var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                    }
                });

                $('.switch-sidebar-image input').change(function() {
                    $full_page_background = $('.full-page-background');

                    $input = $(this);

                    if ($input.is(':checked')) {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar_img_container.fadeIn('fast');
                            $sidebar.attr('data-image', '#');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page_background.fadeIn('fast');
                            $full_page.attr('data-image', '#');
                        }

                        background_image = true;
                    } else {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar.removeAttr('data-image');
                            $sidebar_img_container.fadeOut('fast');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page.removeAttr('data-image', '#');
                            $full_page_background.fadeOut('fast');
                        }

                        background_image = false;
                    }
                });

                $('.switch-sidebar-mini input').change(function() {
                    $body = $('body');

                    $input = $(this);

                    if (md.misc.sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        md.misc.sidebar_mini_active = false;

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                    } else {

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                        setTimeout(function() {
                            $('body').addClass('sidebar-mini');

                            md.misc.sidebar_mini_active = true;
                        }, 300);
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);

                });
            });

            // Data Table for Active employees
            $('#active-table').DataTable({
                "responsive": true,
                "bPaginate": true,
                "bFilter": true,
                "dom": 'ftipr',
                "bInfo": true,
                "bAutoWidth": true,
                "searchable": true,
                "orderable": true,
                "sort": false,
                "pageLength": 10,
            });

            // Data Table for removed employees
            $('#removed-table').DataTable({
                "responsive": true,
                "bPaginate": true,
                "bFilter": true,
                "bInfo": false,
                "dom": 'ftipr',
                "bAutoWidth": false,
                "searchable": true,
                "orderable": true,
                "sort": false,
                "pageLength": 10,
            });

            $('#position-table').DataTable({
                "responsive": true,
                "bPaginate": true,
                "bFilter": true,
                "bInfo": false,
                "dom": 'ftipr',
                "bAutoWidth": false,
                "searchable": true,
                "orderable": true,
                "sort": false,
                "pageLength": 5,
            });

            $("#employee-record-table").DataTable({
                "responsive": true,
                "bPaginate": true,
                "bFilter": true,
                "bInfo": true,
                "dom": 'ftipr',
                "bAutoWidth": true,
                "searchable": true,
                "orderable": true,
                "sort": false,
                "pageLength": 10,
            })
            
            $("#staffCA-table").DataTable({
                "responsive": true,
                "bPaginate": true,
                "bFilter": true,
                "bInfo": true,
                "dom": 'ftipr',
                "bAutoWidth": true,
                "searchable": true,
                "orderable": true,
                "sort": false,
                "pageLength": 10,
            });

            $("#loan-table").DataTable({
                "responsive": true,
                "bPaginate": true,
                "bFilter": true,
                "bInfo": true,
                "dom": 'ftipr',
                "bAutoWidth": false,
                "searchable": true,
                "orderable": true,
                "sort": true,
                "pageLength": 10,
            });

            // add class active in li .nav-item on curren url
            $(function() {
                $('.nav-item a[href^="/PayRoll2/acc_admin/' + location.pathname.split("/")[3] + '"]').closest('li').addClass("active");
            });

            /*****
            * Data values from form modal input registration
            /***/
            $("#registerEmployee").on("submit", function(event) {
                var newEmployeeData = {
                    CardID: $("#cardID").val(),
                    FingerPrint: $("#fingerPrint").val(),
                    WorkerType: $("#worker-type").val(),
                    JobTitle: $("#jobTitle").val(),
                    FirstName: $("#fname").val(),
                    LastName: $("#lname").val(),
                    MiddleName: $("#mname").val(),
                    BirthDate: $("#birthDate").val(),
                    Age: $("#age").val(),
                    Gender: $("#gender").val(),
                    CivilStatus: $("#civilStatus").val(),
                    FullAddress: $("#fullAddress").val(),
                    Email: $("#email").val(),
                    ContactNumber: $("#contactNumber").val(),
                    ContactPerson: $("#contactPerson").val(),
                    ContactPersonNumber: $("#contactPersonNumber").val(),
                    Relationship: $("#relationship").val(),
                    DurationDate: $("#durationDate").val(),
                    StartDate: $("startDate").val(),
                    EndDate: $("#endDate").val(),
                    SSSNumber: $("#sssNumber").val(),
                    EmployeeER: $("#employeeER").val(),
                    EmployeeEE: $("#employeeEE").val(),
                    SSSActiveLoan: $("#sssActiveLoan").val(),
                    PhilhealthNumber: $("#philhealthNumber").val(),
                    Philhealth_PerMonth: $("#philhealth_perMonth").val(),
                    PagIBIGNumber: $("#pagIbigNumber").val(),
                    PagIBIG_PerMonth: $("#pagIbig_perMonth").val(),
                    PagIBIG_ActiveLoan: $("#pagIbig_activeLoan").val(),
                    RegularRateWOvertime: $("#regularrateWOvertime").val(),
                    Percentage: $("#percentage").val(),
                    RegularRate: $("#regularRate").val(),
                    HolidayPay: $("#holidayPay").val(),
                    TimeType: $("#time-type").val(),
                    StartTime: $("#start-time").val(),
                    EndTime: $("#end-time").val(),
                    LateHours: $("#lateHours").val(),
                    LateMinutes: $("#lateMinutes").val(),
                    PenaltyAmount: $("#penaltyAmount").val(),
                    LimitHours: $("#limitHours").val(),
                    LimitMinutes: $("#limitMinutes").val(),
                };

                $.ajax({
                    type: "POST",
                    url: "controller.php?action=add",
                    data: newEmployeeData,
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert(errorThrown);
                    },
                }).done(function(data) {
                    console.log(data);
                })

                event.preventDefault();
            });

            /*****
             * this event handler is for select Worker type
             * to show and hide the Gov. Ageny data input
             /***/
            $("#worker-type").on('change', function() {
                if ($("#worker-type").val() === "Regular" || $("#worker-type").val() === "Contractual") {
                    $("div[data-id='employee-gov'").show();
                    $("div[data-id='employee-gov'] input").attr("disabled", false);
                } else {
                    $("div[data-id='employee-gov'").hide();
                    $("div[data-id='employee-gov'] input").attr("disabled", true);
                }
            });

            $("#u-worker-type").on('change', function() {
                if (this.value === "Regular" || this.value === "Contractual") {
                    $("div[data-id='employee-gov'").show();
                    $("div[data-id='employee-gov'] input").attr("disabled", false);
                } else {
                    $("div[data-id='employee-gov'").hide();
                    $("div[data-id='employee-gov'] input").attr("disabled", true);
                }
            });

            $("#employeeInfo input").prop('disabled', true);
            $("#employeeInfo select").prop('disabled', true);


            /*****
             * this event handler is to display Remove Employees
             * On Click 
             /***/
            $("#remove-employees").on('click', function() {
                $("#display-employee").toggle();
            });

            /**
             *  set attribute disable for employee information modal
             */

            $("input[type='date']").on("change", function() {
                this.setAttribute(
                    "data-date",
                    moment(this.value, "YYYY-MM-DD")
                    .format(this.getAttribute("data-date-format"))
                )
            }).trigger("change");

            // TODO
            $("#durationDate").change(function() {
                var date = new Date();
                var year = Number(date.getFullYear());

                switch (this.value) {
                    case '3 Months':
                        $("#endDate").val("")
                        break;

                    default:
                        $("#endDate").val("");
                        break;
                }
            });

            var dashboard = {
                initDashboardPageCharts: function() {
                    dataDailySalesChart = {
                        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                        series: [
                            [12252, 100007, 752003, 152227, 211553, 105002, 210200],
                            [212252, 620007, 700003, 202227, 201553, 405002, 310200]
                        ]
                    };

                    optionsDailySalesChart = {
                        lineSmooth: Chartist.Interpolation.cardinal({
                            tension: 5
                        }),
                        fullWidth: true,
                        low: 0,
                        showArea: true,
                        chartPadding: {
                            top: 20,
                            right: 25,
                            bottom: 0,
                            left: 25
                        },
                    }

                    var DailyNetGrossPay = new Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);

                    dashboard.startAnimationForLineChart(DailyNetGrossPay);

                    var dataWebsiteViewsChart = {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        series: [
                            [50, 20, 32, 56, 67, 3, 22, 11, 15, 9, 10, 30],
                            [50, 20, 32, 56, 67, 3, 22, 11, 15, 9, 10, 30],
                            [50, 20, 32, 56, 67, 3, 22, 11, 15, 9, 10, 30]

                        ]
                    };
                    var optionsWebsiteViewsChart = {
                        stackBars: true,
                        axisX: {
                            showGrid: false
                        },
                        chartPadding: {
                            top: 20,
                            right: 0,
                            bottom: 0,
                            left: -5
                        }
                    };
                    var responsiveOptions = [
                        ['screen and (max-width: 640px)', {
                            seriesBarDistance: 5,
                            axisX: {
                                labelInterpolationFnc: function(value) {
                                    return value[0];
                                }
                            }
                        }]
                    ];
                    var AttendaceViewChart = Chartist.Bar('#websiteViewsChart', dataWebsiteViewsChart, optionsWebsiteViewsChart, responsiveOptions).on('draw', function(data) {
                        if (data.type === 'bar') {
                            data.element.attr({
                                style: 'stroke-width: 20px'
                            });
                        }
                    });

                    //start animation for the Emails Subscription Chart
                    dashboard.startAnimationForBarChart(AttendaceViewChart);
                },

                startAnimationForLineChart: function(chart) {

                    chart.on('draw', function(data) {
                        if (data.type === 'line' || data.type === 'area') {
                            data.element.animate({
                                d: {
                                    begin: 600,
                                    dur: 700,
                                    from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                    to: data.path.clone().stringify(),
                                    easing: Chartist.Svg.Easing.easeOutQuint
                                }
                            });
                        } else if (data.type === 'point') {
                            seq++;
                            data.element.animate({
                                opacity: {
                                    begin: seq * delays,
                                    dur: durations,
                                    from: 0,
                                    to: 1,
                                    easing: 'ease'
                                }
                            });
                        }
                    });

                    seq = 0;
                },
                startAnimationForBarChart: function(chart) {

                    chart.on('draw', function(data) {
                        if (data.type === 'bar') {
                            seq2++;
                            data.element.animate({
                                opacity: {
                                    begin: seq2 * delays2,
                                    dur: durations2,
                                    from: 0,
                                    to: 1,
                                    easing: 'ease'
                                }
                            });
                        }
                    });

                    seq2 = 0;
                },
            }

            dashboard.initDashboardPageCharts();

            $(window).resize(function() {
                dashboard.initSidebarsCheck();

                // reset the seq for charts drawing animations
                seq = seq2 = 0;

                setTimeout(function() {
                    dashboard.initDashboardPageCharts();
                }, 500);
            });

            $("#staffCA-btn").click(function(){
                $("#tbl-staffCA").show();
                $("#tbl-loan").hide();
                $("#tbl-damage").hide();
                $("#tbl-misc").hide();
                $("#page-title").html("Staff Cash Advance");
                $("#loan-btn").removeClass("btn-primary");
                $("#loan-btn").addClass("btn-warning");
                $("#misc-btn").removeClass("btn-primary");
                $("#misc-btn").addClass("btn-warning");
                $("#damage-btn").removeClass("btn-primary");
                $("#damage-btn").addClass("btn-warning");
                $(this).removeClass("btn-warning");
                $(this).addClass("btn-primary");
            })

            $("#loan-btn").click(function(){
                $("#tbl-loan").show();
                $("#tbl-staffCA").hide();
                $("#tbl-damage").hide();
                $("#tbl-misc").hide();
                $("#page-title").html("Loan Record");
                $("#staffCA-btn").removeClass("btn-primary");
                $("#staffCA-btn").addClass("btn-warning");
                $("#misc-btn").removeClass("btn-primary");
                $("#misc-btn").addClass("btn-warning");
                $("#damage-btn").removeClass("btn-primary");
                $("#damage-btn").addClass("btn-warning");
                $(this).removeClass("btn-warning");
                $(this).addClass("btn-primary");
            });
            
            $("#misc-btn").click(function(){
                $("#tbl-misc").show();
                $("#tbl-loan").hide();
                $("#tbl-staffCA").hide();
                $("#tbl-damage").hide();
                $("#page-title").html("Employee Miscellaneous");
                $("#staffCA-btn").removeClass("btn-primary");
                $("#staffCA-btn").addClass("btn-warning");
                $("#loan-btn").removeClass("btn-primary");
                $("#loan-btn").addClass("btn-warning");
                $("#damage-btn").removeClass("btn-primary");
                $("#damage-btn").addClass("btn-warning");
                $(this).removeClass("btn-warning");
                $(this).addClass("btn-primary");
            });

            $("#damage-btn").click(function(){
                $("#tbl-damage").show();
                $("#tbl-loan").hide();
                $("#tbl-staffCA").hide();
                $("#tbl-misc").hide();
                $("#page-title").html("Damages Record");
                $("#staffCA-btn").removeClass("btn-primary");
                $("#staffCA-btn").addClass("btn-warning");
                $("#loan-btn").removeClass("btn-primary");
                $("#loan-btn").addClass("btn-warning");
                $("#misc-btn").removeClass("btn-primary");
                $("#misc-btn").addClass("btn-warning");
                $(this).removeClass("btn-warning");
                $(this).addClass("btn-primary");
            })
        });
    </script>
    <script>
        const db = {
            "0": ["Sly Bacalso", "employee"],
            "1": ["Jeremiah Montebon", "employee"],
            "2": ["Daniel Kiamco", "employee"],
            "3": ["Daniel Kiaco", "employee"],
            "4": ["Danie Kiamco", "employee"],
            "5": ["Danel Kimco", "employee"],
            "6": ["Daie Kiamco", "employee"],
            "7": ["Daniel Kimc", "employee"],
            "8": ["Dniel Kiaco", "employee"],
            "9": ["Daiel Kiamo", "employee"],
            "10": ["Danel Kiamco", "employee"],
            "11": ["Danel Kiamco", "employee"],
            "12": ["John Doe", "employee"]
        };

        function searchDB(elem) {
            let selector = document.getElementById("selector");
            // Check if input is empty
            if (elem.value.trim() !== "") {
                elem.classList.add("dropdown"); // Add dropdown class (for the CSS border-radius)
                // If the selector div element does not exist, create it
                if (selector == null) {
                    selector = document.createElement("div");
                    selector.id = "selector";
                    elem.parentNode.appendChild(selector);
                    // Position it below the input element
                    selector.style.left = elem.getBoundingClientRect().left + "px";
                    selector.style.top = elem.getBoundingClientRect().bottom + "px";
                    selector.style.width = elem.getBoundingClientRect().width + "px";
                }
                // Clear everything before new search
                selector.innerHTML = "";
                // Variable if result is empty
                let empty = true;
                for (let item in db) {
                    // Join the db elements in one string
                    let str = [item.toLowerCase(), db[item][0].toLowerCase(), db[item][1].toLowerCase()].join();

                    // If exists, create an item (button)
                    if (str.indexOf(elem.value.toLowerCase()) !== -1) {
                        let opt = document.createElement("button");
                        opt.setAttribute("onclick", "insertValue(this);")
                        opt.innerHTML = db[item][0];
                        selector.appendChild(opt);
                        empty = false;
                    }
                }
                // If result is empty, display a disabled button with text
                if (empty == true) {
                    let opt = document.createElement("button");
                    opt.disabled = true;
                    opt.innerHTML = "No results";
                    selector.appendChild(opt);
                }
                return true;
            }
            // Remove selector element if input is empty
            else {
                if (selector !== null) {
                    selector.parentNode.removeChild(selector);
                    elem.classList.remove("dropdown");
                }
            }
        }

        // Function to insert the selected item back to the input element
        function insertValue(elem) {
            window.search.classList.remove("dropdown");
            window.search.value = elem.innerHTML;
            elem.parentNode.parentNode.removeChild(elem.parentNode);
        }
    </script>
</body>

</html>