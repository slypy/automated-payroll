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

                <a href="#" class="simple-text logo-normal">
                    <img src="<?php echo web_root; ?>res/cmp_logo.png" alt="logo" height="50" width="50">

                </a>
                <a href="#" class="simple-text logo-normal">
                    El Pardo
                </a>
            </div>
            <div id="sidebar-scroll" class="sidebar-wrapper" onmouseover="this.style.overflow='overlay'" onmouseout="this.style.overflow='hidden'">
                <ul class="nav">
                    <li class="nav-item" href="<?php echo $web_root; ?>acc_admin/dashboard/">
                        <a class="nav-link" href="<?php echo $web_root; ?>acc_admin/dashboard/">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <hr style="width: 230px;">
                    <li class="nav-item" href="<?php echo $web_root; ?>acc_admin/employee/">
                        <a class="nav-link" href="<?php echo $web_root; ?>acc_admin/employee/">
                            <i class="material-icons">assignment_ind</i>
                            <p>Employees</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $web_root; ?>acc_admin/staffcashadvance/">
                            <i class="material-icons">monetization_on</i>
                            <p>Staff Cash Advances</p>
                        </a>
                    </li>
                    <hr style="width: 230px;">
                    <li class="nav-item" href="<?php echo $web_root; ?>acc_admin/reports/">
                        <a class="nav-link" href="<?php echo $web_root; ?>acc_admin/reports/">
                            <i class="material-icons">receipt</i>
                            <p>Payroll Report</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo $web_root; ?>acc_admin/EVpayroll/">
                            <i class="material-icons">playlist_add_check</i>
                            <p style="font-size: 13px;">Employee's Payroll Verification</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo $web_root; ?>acc_admin/SApayroll/">
                            <i class="material-icons">event_note</i>
                            <p style="font-size: 14px;">Schedule AutoPrint Payroll</p>
                        </a>
                    </li>
                    <hr style="width: 230px;">
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo $web_root; ?>acc_admin/clockupdate/">
                            <i class="material-icons">schedule</i>
                            <p>Update Clock-in/out</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light navbar-absolute fixed-top" style="max-height: 55px; z-index: 99; box-shadow: 0px 0px 5px 0px rgb(167, 167, 167)">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;"><?php echo $page_title; ?></a>
                    </div>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="#registration-form" data-target="#update-salary-form" data-toggle="modal" data-backdrop="static" class="btn btn-success btn-sm"> <i class="material-icons">monetization_on</i> Update employee salary</a>
                            </li>
                            <li class="nav-item" style="margin-left: 20px;">
                                <a href="#registration-form" data-target="#update-salary-form" data-toggle="modal" data-backdrop="static" class="btn btn-success btn-sm"> <i class="material-icons">playlist_add</i> Import Excel Data File</a>
                            </li>
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
                            <!-- your navbar here -->
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->


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
         * jQuery -- Bootstrap -- WoW -- Material Design
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
                "bAutoWidth": false,
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
                } else {
                    $("div[data-id='employee-gov'").hide();
                }
            });

            /*****
             * this event handler is for select time type in 
             * TIME IN/OUT in Admin Parameter
             /***/
            $("#time-type").on('change', function() {
                switch ($(this).val()) {
                    case "Other Shift":
                        $("div[data-id='time'").show();
                        $("#start-time").val("08:00");
                        $("#end-time").val("20:00");
                        break;
                    case 'Regular Shift':
                        $("div[data-id='time'").show();
                        $("#start-time").val("08:00");
                        $("#end-time").val("20:00");
                        break;
                    default:
                        $("div[data-id='time'").hide();
                        break;
                }
            })

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
            $("#employeeInfo input").prop('disabled', true);
            $("#employeeInfo select").prop('disabled', true);

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
                        alert(year);
                        break;
                }
            });

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();
        });
    </script>
    <script>
        demo = {
            initDocumentationCharts: function() {
                if ($('#dailySalesChart').length != 0 && $('#websiteViewsChart').length != 0) {
                    /* ----------==========     Daily Sales Chart initialization For Documentation    ==========---------- */

                    dataDailySalesChart = {
                        labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
                        series: [
                            [12, 17, 7, 17, 23, 18, 38]
                        ]
                    };

                    optionsDailySalesChart = {
                        lineSmooth: Chartist.Interpolation.cardinal({
                            tension: 0
                        }),
                        
                        low: 0,
                        high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
                        width: '200px',
                        height: '200px',
                        chartPadding: {
                            top: 0,
                            right: 0,
                            bottom: 0,
                            left: 0
                        },
                    }

                    var dailySalesChart = new Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);

                    var animationHeaderChart = new Chartist.Line('#websiteViewsChart', dataDailySalesChart, optionsDailySalesChart);
                }
            },

            initDashboardPageCharts: function() {

                if ($('#dailySalesChart').length != 0 || $('#completedTasksChart').length != 0 || $('#websiteViewsChart').length != 0) {
                    /* ----------==========     Daily Sales Chart initialization    ==========---------- */

                    dataDailySalesChart = {
                        labels: ['M', 'T', 'W', 'TH', 'F', 'S', 'S'],
                        series: [
                            [12252, 100007, 752003, 152227, 211553, 105002, 210200]
                        ]
                    };

                    optionsDailySalesChart = {
                        lineSmooth: Chartist.Interpolation.cardinal({
                            tension: 5
                        }),
                        low: 0,
                        high: 1000000, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
                        showArea: true,
                        height: '200px',
                        chartPadding: {
                            top: 20,
                            right: 0,
                            bottom: 0,
                            left: 25
                        },
                    }

                    var dailySalesChart = new Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);

                    md.startAnimationForLineChart(dailySalesChart);



                    /* ----------==========     Completed Tasks Chart initialization    ==========---------- */

                    dataCompletedTasksChart = {
                        labels: ['M', 'T', 'W', 'TH', 'F', 'S', 'S'],
                        series: [
                            [230, 750, 450, 1000, 280, 240, 20],
                        ]
                    };

                    optionsCompletedTasksChart = {
                        lineSmooth: Chartist.Interpolation.cardinal({
                            tension: 5
                        }),
                        low: 0,
                        height: '200px',
                        showArea: true,
                        chartPadding: {
                            top: 20,
                            right: 0,
                            bottom: 0,
                            left: 0
                        }
                    }

                    var completedTasksChart = new Chartist.Line('#completedTasksChart', dataCompletedTasksChart, optionsCompletedTasksChart);

                    // start animation for the Completed Tasks Chart - Line Chart
                    md.startAnimationForLineChart(completedTasksChart);


                    /* ----------==========     Emails Subscription Chart initialization    ==========---------- */

                    var dataWebsiteViewsChart = {
                        labels: ['J', 'F', 'M', 'A', 'M', 'J', 'J', 'A', 'S', 'O', 'N', 'D'],
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
                        height: '200px',
                        chartPadding: {
                            top: 20,
                            right: 0,
                            bottom: 0,
                            left: 0
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
                    var websiteViewsChart = Chartist.Bar('#websiteViewsChart', dataWebsiteViewsChart, optionsWebsiteViewsChart, responsiveOptions);

                    //start animation for the Emails Subscription Chart
                    md.startAnimationForBarChart(websiteViewsChart);
                }
            },

            initGoogleMaps: function() {
                var myLatlng = new google.maps.LatLng(40.748817, -73.985428);
                var mapOptions = {
                    zoom: 13,
                    center: myLatlng,
                    scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
                    styles: [{
                        "featureType": "water",
                        "stylers": [{
                            "saturation": 43
                        }, {
                            "lightness": -11
                        }, {
                            "hue": "#0088ff"
                        }]
                    }, {
                        "featureType": "road",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "hue": "#ff0000"
                        }, {
                            "saturation": -100
                        }, {
                            "lightness": 99
                        }]
                    }, {
                        "featureType": "road",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                            "color": "#808080"
                        }, {
                            "lightness": 54
                        }]
                    }, {
                        "featureType": "landscape.man_made",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "color": "#ece2d9"
                        }]
                    }, {
                        "featureType": "poi.park",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "color": "#ccdca1"
                        }]
                    }, {
                        "featureType": "road",
                        "elementType": "labels.text.fill",
                        "stylers": [{
                            "color": "#767676"
                        }]
                    }, {
                        "featureType": "road",
                        "elementType": "labels.text.stroke",
                        "stylers": [{
                            "color": "#ffffff"
                        }]
                    }, {
                        "featureType": "poi",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    }, {
                        "featureType": "landscape.natural",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "visibility": "on"
                        }, {
                            "color": "#b8cb93"
                        }]
                    }, {
                        "featureType": "poi.park",
                        "stylers": [{
                            "visibility": "on"
                        }]
                    }, {
                        "featureType": "poi.sports_complex",
                        "stylers": [{
                            "visibility": "on"
                        }]
                    }, {
                        "featureType": "poi.medical",
                        "stylers": [{
                            "visibility": "on"
                        }]
                    }, {
                        "featureType": "poi.business",
                        "stylers": [{
                            "visibility": "simplified"
                        }]
                    }]

                };
                var map = new google.maps.Map(document.getElementById("map"), mapOptions);

                var marker = new google.maps.Marker({
                    position: myLatlng,
                    title: "Hello World!"
                });

                // To add the marker to the map, call setMap();
                marker.setMap(map);
            }
        }
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

        });
    </script>
</body>

</html>