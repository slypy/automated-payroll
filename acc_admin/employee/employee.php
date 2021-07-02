    <?php

    ################ TODO #################
    #  Update all POST input for back end #
    #######################################

    ?>


    <!-- ------------------------------------------------------------------------------------- -->
    <!-- ------------------------------- Main Body Content ----------------------------------- -->
    <!-- ------------------------------------------------------------------------------------- -->


    <!------------------------------------------------->
    <!-- Display active employees in Form Data Table -->
    <!------------------------------------------------->

    <!-- Pass the form data table on remove employee in controller.php type{action} case: remove -->
    <form action="controller.php?action=remove" Method="POST" style="margin-top: -40px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="header-title">
                            <div>
                                <!-- Table Title -->
                                <h3>
                                    List of active Employees
                                </h3>
                            </div>

                            <div>
                                <a href="#registration-form" data-target="#import-excel-form" data-toggle="modal" data-backdrop="static" class="btn btn-success btn-sm"> <i class="material-icons">playlist_add</i> Import Excel Data File</a>
                                <!-- Load Form Modal Add new Employee -->
                                <a href="#registration-form" data-target="#registration-form" data-toggle="modal" data-backdrop="static" class="btn btn-primary btn-sm"> <i class="material-icons">add</i> Add new Employee</a>

                            </div>

                        </div>
                        <div class="header-line">
                            <hr>
                        </div>
                        <div class="table-responsive">
                            <table id="active-table" class="table table-sm table-hover" cellspacing="0">
                                <thead class="text-primary text-sm">
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Employee ID #
                                    </th>
                                    <th>
                                        Profile
                                    </th>

                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Card No.
                                    </th>
                                    <th>
                                        FingerPrint No.
                                    </th>
                                    <th>
                                        Contact No.
                                    </th>
                                    <th>
                                        Email Address
                                    </th>
                                    <th>
                                        Position
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="selector[]" id="selector[]" value="' . $result->PROID . '" />
                                        </td>
                                        <td>
                                            SM-20211241
                                        </td>
                                        <td>
                                            <img src="<?php echo $web_root; ?>res/sly.jpg" alt="" height="50" width="50">
                                        </td>
                                        <td>
                                            Sly Bacalso
                                        </td>
                                        <td>
                                            1025
                                        </td>
                                        <td>
                                            120
                                        </td>
                                        <td>
                                            09123456789
                                        </td>
                                        <td>
                                            nasa.sly14@gmail.com
                                        </td>
                                        <td class="text-danger">
                                            Software Engineer
                                        </td>
                                        <td class="td-actions text-left">
                                            <button title="Edit" type="button" rel="tooltip" class="btn btn-success" data-target="#update-form" data-toggle="modal" data-backdrop="static">
                                                <i class="material-icons">edit</i>
                                            </button>

                                            <button title="More info" type="button" rel="tooltip" class="btn btn-info" data-target="#info-form" data-toggle="modal" data-backdrop="static">
                                                <i class="material-icons">info</i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="btn-group">
                            <button type="submit" class="btn btn-danger" name="delete"><i class="material-icons">delete</i> Remove Selected</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>


    <!------------------------------->
    <!-- Display Removed Employess -->
    <!------------------------------->

    <!-- Pass the form data table on delete employee in controller.php type{action} case: delete -->
    <form action="controller.php?action=delete" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div id="remove-employees" class="card-header card-header-primary" style="cursor: pointer;">
                        <h4 class="card-title mt-0">Click to show/hide Removed Employees</h4>
                    </div>
                    <div id="display-employee" class="card-body" style="display: none;">
                        <div class="table-responsive">
                            <table id="removed-table" class="table table-hover">
                                <thead class="text-info">
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Profile
                                    </th>
                                    <th>
                                        First Name
                                    </th>
                                    <th>
                                        Last Name
                                    </th>
                                    <th>
                                        Card #
                                    </th>
                                    <th>
                                        FingerPrint #
                                    </th>
                                    <th>
                                        Email Address
                                    </th>
                                    <th>
                                        Position
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="selector[]" id="selector[]" value="' . $result->PROID . '" />
                                        </td>
                                        <td>
                                            <img src="<?php echo $web_root; ?>res/sly.jpg" alt="" height="50" width="50">
                                        </td>
                                        <td>
                                            Sly
                                        </td>
                                        <td>
                                            Bacalso
                                        </td>
                                        <td>
                                            1025
                                        </td>
                                        <td>
                                            120
                                        </td>
                                        <td>
                                            nasa.sly14@gmail.com
                                        </td>
                                        <td class="text-danger">
                                            Software Engineer
                                        </td>
                                        <td>
                                            <a title="edit" class="btn btn-info btn-sm" href="' . web_root . 'admin/products/index.php?view=edit&id=' . $result->PROID . '">Print <i class="material-icons">print</i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="btn-group">
                            <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-trash fw-fa"></i> Remove Selected</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <!-- ----------------------------------------------------------------------------------------- -->
    <!-- ------------------------------- Navagition Top modals ----------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------- -->

    <!-- -------------------------------- -->
    <!-- Form modal for update new salary -->
    <!-- -------------------------------- -->
    <form action="controller.php?action=add" id="registerEmployee" method="POST" autocomplete="off">
        <div id="update-salary-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-header-title">
                            <h3 class="modal-title" id="exampleModalLabel">Salary Adjustment</h3>
                            <p class="modal-title" id="exampleModalLabel">This form will update the employee's salary</p>
                        </div>

                        <button class="close" id="btnclose" type="button" data-dismiss="modal">×</button>
                    </div>

                    <div class="modal-body">
                        <div class="update-position-salary-container">
                            <div class="select" style="margin-left: 5px;">
                                <!--  WorkerType: $("#worker-type").val() -->
                                <select class="select-text" name="WorkerType" required>
                                    <option value="" selected></option>
                                    <option value="Regular">SOftware Engineer</option>
                                </select>
                                <label class="select-label">Select Position</label>
                            </div>
                            <div class="select" style="margin-left: 5px;">
                                <select class="select-text" name="WorkerType" required>
                                    <option value="" selected></option>
                                    <option value="Per Hour">Per Hour</option>
                                    <option value="Per Day">Per Day</option>
                                    <option value="Per Week">Per Week</option>
                                    <option value="Per Month">Per Month</option>
                                </select>
                                <label class="select-label">Wages</label>
                            </div>
                            <div class="material-textfield" height="30">
                                <input id="cardID" placeholder=" " name="CardID" type="text" required style="width: 200px;">
                                <label>₱</label>
                            </div>
                        </div>
                        <div class="container-1" style="margin-bottom: 20px;">
                            <h4>Holiday Pay Policy Adjustment as <?php echo date('(D) M d, Y', strtotime(date('Y-m-d'))); ?> </h4>

                            <div class="inside-container">
                                <!-- title -->
                                <h5 class="title">
                                    Overtime Cost Adjustment
                                </h5>

                                <!-- input container -->
                                <div class="input-6">
                                    <h5 style="margin-top: 10px">
                                        Regular Rate with Overtime:
                                    </h5>
                                    <div class="input-date">
                                        <div class="material-textfield">
                                            <!-- RegularRateWOvertime: $("#regularrateWOvertime").val() -->
                                            <input id="regularrateWOvertime" placeholder=" " name="RegularRateWOvertime" type="text" required style="width: auto;">
                                            <label>₱</label>
                                        </div>
                                        <p>
                                            PerHour
                                        </p>
                                    </div>
                                    <h4>+</h4>
                                    <div class="input-date">
                                        <div class="material-textfield">
                                            <!-- Percentage: $("#percentage").val() -->
                                            <input id="percentage" placeholder=" " name="Percentage" type="text" required style="width: 100px;">
                                            <label>%</label>
                                        </div>
                                        <p>
                                            eg. 25
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="inside-container" style="margin-top: 20px;">
                                <h5 class="title">
                                    Holiday Pay Adjustment
                                </h5>
                                <div class="input-6">
                                    <div class="input-date">
                                        <div class="material-textfield">
                                            <!-- RegularRate: $("#regularRate").val() -->
                                            <input id="regularRate" placeholder=" " name="RegularRate" type="text" required style="width: auto;">
                                            <label>₱ Regular Rate</label>
                                        </div>
                                        <p>
                                            PerHour
                                        </p>
                                    </div>
                                    <h4>+</h4>
                                    <div class="input-date">
                                        <div class="material-textfield">
                                            <!-- HolidayPay: $("#holidayPay").val() -->
                                            <input id="holidayPay" placeholder=" " name="HolidayPay" type="text" required style="width: auto;">
                                            <label>₱ Holiday Pay</label>
                                        </div>
                                        <p>
                                            PerHour
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- TIME-IN/OUT section -->
                        <div class="container-2">
                            <h4>Time-IN/Time-OUT Policy Adjustment as of <?php echo date('(D) M d, Y', strtotime(date('Y-m-d'))); ?></h4>

                            <!-- Late Policy input -->
                            <div class="inside-container" style="margin-top: 20px;">
                                <h5 class="title">
                                    Late Policy
                                </h5>
                                <div class="input-6">
                                    <h5 style="margin-top: 10px; margin-left:10px;">
                                        Late After:
                                    </h5>
                                    <div class="input-date">
                                        <div class="material-textfield">
                                            <!-- LateHours: $("#lateHours").val() -->
                                            <input id="lateHours" placeholder=" " name="LateHours" type="text" required style="width: 100px;">
                                            <label>Hours</label>
                                        </div>
                                    </div>
                                    <h4>:</h4>
                                    <div class="input-date">
                                        <div class="material-textfield">
                                            <!-- LateMinutes: $("#lateMinutes").val() -->
                                            <input id="lateMinutes" placeholder=" " name="LateMinutes" type="text" required style="width: 100px;">
                                            <label>Minutes</label>
                                        </div>
                                    </div>
                                    <h5 style="margin-top: 10px; margin-left: 20px">
                                        Late Penalty:
                                    </h5>
                                    <div class="input-date">
                                        <div class="material-textfield">
                                            <!-- PenaltyAmount: $("#penaltyAmount").val() -->
                                            <input id="penaltyAmount" placeholder=" " name="PenaltyAmount" type="text" required style="width: 150px;">
                                            <label>₱ Amount</label>
                                        </div>
                                        <p>
                                            PerHour
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Early Time in input -->
                            <div class="inside-container" style="margin-top: 20px;">
                                <h5 class="title">
                                    For Early Time IN
                                </h5>
                                <div class="input-6">
                                    <h5 style="margin-top: 10px; margin-left:10px;">
                                        Limit to: &nbsp;&nbsp;&nbsp;
                                    </h5>
                                    <div class="input-date">
                                        <div class="material-textfield">
                                            <!-- LimitHours: $("#limitHours").val() -->
                                            <input id="limitHours" placeholder=" " name="LimitHours" type="text" required style="width: 100px;">
                                            <label>Hours</label>
                                        </div>
                                    </div>
                                    <h4>:</h4>
                                    <div class="input-date">
                                        <div class="material-textfield">
                                            <!-- LimitMinutes: $("#limitMinutes").val() -->
                                            <input id="limitMinutes" placeholder=" " name="LimitMinutes" type="text" required style="width: 100px;">
                                            <label>Minutes</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Buttons -->
                    <div class="modal-footer" style="height: 60px">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="UpdateSalary" class="btn btn-success btn-md">update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- ------------------------------- -->
    <!-- Form modal for add new position -->
    <!-- ------------------------------- -->

    <!-- {id} : $("#addPosition") -->
    <form action="controller.php?action=add_position" id="addPosition" method="POST" autocomplete="off">
        <div id="add-position-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
            <div class="modal-dialog modal-md" role="document" style="max-width: 500px">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-header-title">
                            <h3 class="modal-title" id="exampleModalLabel">Positions</h3>
                            <p class="modal-title" id="exampleModalLabel">Add new position</p>
                        </div>

                        <button class="close" id="btnclose" type="button" data-dismiss="modal">×</button>
                    </div>

                    <div class="modal-body">
                        <div class="table-responsive" style="margin-top: -20px;">
                            <table id="position-table" class="table table-hover table-striped">
                                <thead class="text-info">
                                    <th>
                                        Position List
                                    </th>
                                    <th class="text-center">
                                        ₱ Per Hour
                                    </th>
                                    <th class="text-center">
                                        ₱ Per Day
                                    </th>
                                    <th width="50">Action</th>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <!-- Footer Buttons -->
                    <div class="modal-footer" style="height: 150px; align-items: center; align-content: center; justify-content: center;">
                        <div>
                            <div class="position-container" style="margin-bottom: 20px; margin-left: -5px;">
                                <div class="material-textfield">
                                    <!-- position_name: $("#position_name").val() -->
                                    <input id="position_name" placeholder=" " name="position_name" type="text" required style="width: 285px;">
                                    <label>Position Name</label>
                                </div>

                            </div>
                            <div class="position-container" style="justify-content: space-between;">
                                <div style="display: flex;">
                                    <div class="select" style="width: 140px; margin-left: 0px;">
                                        <!--  wage: $("#wage").val() -->
                                        <select id="wage" class="select-text" name="wage" required style="width: 140px;">
                                            <option value="Per Hour" selected>Per Hour</option>
                                            <option value="Per Day">Per Day</option>
                                        </select>
                                        <label class="select-label">Wages</label>
                                    </div>
                                    <div class="material-textfield">
                                        <!-- wage_amount: $("#wage_amount").val() -->
                                        <input id="wage_amount" placeholder=" " name="wage_amount" type="number" required style="width: 140px;">
                                        <label>₱</label>
                                    </div>
                                </div>

                                <div style="margin-top: 3px;">
                                    <button type="submit" name="add_position" class="btn btn-success btn-sm">Add</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <!-- ------------------------------------------------------------------------------------ -->
    <!-- ------------------------------- Main Body modals ----------------------------------- -->
    <!-- ------------------------------------------------------------------------------------ -->

    <!-- -------------------------------- -->
    <!-- Form modal for import excel file -->
    <!-- -------------------------------- -->

    <form action="" method="post">
        <div id="import-excel-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-header-title">
                            <h3 class="modal-title" id="exampleModalLabel">Import Excel data file</h3>
                            <p class="modal-title" id="exampleModalLabel">Download the template to import your existing data.</p>
                        </div>

                        <button class="close" id="btnclose" type="button" data-dismiss="modal">×</button>
                    </div>

                    <div class="modal-body">
                        <div class="import-excel">
                            <div class="material-textfield">
                                <input id="" placeholder=" " name="CardID" type="file" accept=".xlsx, .xls, .csv" style="width: max-content; height: max-content;" required>
                                <label>Upload Excel file</label>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Buttons -->
                    <div class="modal-footer" style="max-height: 60px">
                        <a href="../../TemplateExcel/excel-template.xls" class="btn btn-primary btn-sm" style="margin-right: 60px;" download> <i class="material-icons">get_app</i> Download Template</a>

                        <button type="submit" name="UpdateSalary" class="btn btn-success btn-md">Import</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- ---------------------------------->
    <!-- Form modal for add new employee -->
    <!-- ------------------------------- -->
    <form action="controller.php?action=add" id="registerEmployee" method="POST" autocomplete="off">
        <div id="registration-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-header-title">
                            <h3 class="modal-title" id="exampleModalLabel">Employee Registration</h3>
                            <p class="modal-title" id="exampleModalLabel">Register new employee</p>
                        </div>
                        <button class="close" id="btnclose" type="button" data-dismiss="modal">×</button>
                    </div>

                    <div class="modal-body">
                        <div class="input-container-1">
                            <div class="input-1-5" style="margin-bottom: 20px;">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- CardID: $("#cardID").val() -->
                                        <input id="cardID" placeholder=" " name="CardID" type="text" required style="width: 200px;" value="0015077572">
                                        <label>Employee Number</label>
                                    </div>
                                    <p>Input your format</p>
                                </div>
                            </div>
                            <div class="input-1-5">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- CardID: $("#cardID").val() -->
                                        <input id="cardID" placeholder=" " name="CardID" type="text" required style="width: 200px;">
                                        <label>Employee Card ID</label>
                                    </div>
                                    <p>eg. Input the card number</p>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- FingerPrint: $("#fingerPrint").val() -->
                                        <input id="fingerPrint" placeholder=" " name="FingerPrint" type="text" required style="width: 200px;" value="1">
                                        <label>FingerPrint number</label>
                                    </div>
                                    <p>eg. 1</p>
                                </div>
                            </div>
                            <div class="employee-name">
                                <h5>Worker Type</h5>
                                <div class="input-1-6">
                                    <div class="select" style="margin-left: 5px;">
                                        <!--  WorkerType: $("#worker-type").val() -->
                                        <select id="worker-type" class="select-text" name="WorkerType" required>
                                            <option value="" selected></option>
                                            <option value="Regular">Regular</option>
                                            <option value="OJT">On-the-Job Training (OJT)</option>
                                            <option value="Contractual">Contractual</option>
                                            <option value="Concession Worker">Concession Worker</option>
                                        </select>
                                        <label class="select-label">Select Job Contract</label>
                                    </div>
                                    <div class="select">
                                        <!--  WorkerType: $("#worker-type").val() -->
                                        <select class="select-text" name="WorkerType" required>
                                            <option value="" selected></option>
                                            <option value="Regular">Software Engineer</option>
                                        </select>
                                        <label class="select-label">Select Job Position</label>
                                    </div>
                                    <div class="select" style="margin-right: 5px;">
                                        <!-- TimeType: $("#time-type").val() -->
                                        <select id="time-type" class="select-text" name="TimeType" required style="background-color: white;">
                                            <option value="Open Time" selected>Open Time</option>
                                            <option value="Regular Shift">Regular Shift</option>
                                        </select>
                                        <label class="select-label" style="border-radius: 5px;">Time Shifting</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Image input here -->
                        </div>


                        <div class="employee-name">
                            <h5>Employee Name</h5>
                            <div class="input-2">
                                <div class="material-textfield">
                                    <!-- FirstName: $("#fname").val() -->
                                    <input id="fname" placeholder=" " name="FirstName" class="fn" type="text" required>
                                    <label>First Name</label>
                                </div>
                                <div class="material-textfield">
                                    <!-- LastName: $("#lname").val() -->
                                    <input id="lname" placeholder=" " name="LastName" class="fn" type="text" required>
                                    <label>Last Name</label>
                                </div>
                                <div class="material-textfield">
                                    <!-- MiddleName: $("#mname").val() -->
                                    <input id="mname" placeholder=" " name="MiddleName" class="fn" type="text" required>
                                    <label>Middle Name</label>
                                </div>
                            </div>
                        </div>

                        <div class="employee-name">
                            <h5>Employee Information</h5>
                            <div class="input-3">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- BirthDate: $("#birthDate").val() -->
                                        <input id="birthDate" placeholder=" " name="BirthDate" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" required>
                                        <label>Birth Date</label>
                                    </div>
                                    <p>click the calendar button</p>
                                </div>
                                <div>
                                    <div class="material-textfield" style="margin-left: -20px;">
                                        <!-- Age: $("#age").val() -->
                                        <input id="age" placeholder=" " name="Age" class="fn" type="text" required style="width: 50px;">
                                        <label>Age</label>
                                    </div>
                                </div>

                                <div class="select">
                                    <!-- Gender: $("gender").val(), -->
                                    <select id="gender" class="select-text" name="Gender" required>
                                        <option value="" selected></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <label class="select-label">Gender</label>
                                </div>
                                <div class="select">
                                    <!-- CivilStatus: $("#civilStatus").val() -->
                                    <select id="civilStatus" name="CivilStatus" class="select-text" required>
                                        <option value="" selected></option>
                                        <option value="Single">Single</option>
                                        <option value="Marriage">Marriage</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                    </select>
                                    <label class="select-label">Civil Status</label>
                                </div>
                            </div>
                            <div class="input-3">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- FullAddress: $("#fullAddress").val() -->
                                        <input id="fullAddress" placeholder=" " name="FullAddress" class="fn" type="text" required style="width: 727px;">
                                        <label>Full Address</label>
                                    </div>
                                    <p>Ex. Street, Barangay, City</p>
                                </div>
                            </div>
                            <div class="input-4">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- Email: $("#email").val() -->
                                        <input id="email" placeholder=" " name="Email" type="text" required style="width: auto;">
                                        <label>Email</label>
                                    </div>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- ContactNumber: $("#contactNumber").val() -->
                                        <input id="contactNumber" placeholder=" " name="ContactNumber" type="text" required style="width: auto;">
                                        <label>Contact Number</label>
                                    </div>
                                    <p>eg. 09123456789</p>
                                </div>
                            </div>
                        </div>
                        <div class="employee-name">
                            <h5>Contact Person for incase of emergency</h5>
                            <div class="input-5">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- ContactPerson: $("#contactPerson").val() -->
                                        <input id="contactPerson" placeholder=" " name="ContactPerson" type="text" required style="width: 250px;">
                                        <label>Contact Person</label>
                                    </div>
                                    <p>Complete name of contact person</p>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- ContactPersonNumber: $("#contactPersonNumber").val() -->
                                        <input id="contactPersonNumber" placeholder=" " name="ContactPersonNumber" type="text" required style="width: auto;">
                                        <label>Contact Number</label>
                                    </div>
                                    <p>eg. 09123456789</p>
                                </div>
                                <div class="select" style="margin-right: 5px;">
                                    <select id="relationship" name="Relationship" class="select-text" required>
                                        <option value="" selected></option>
                                        <option value="Wife">Wife</option>
                                        <option value="Husband">Husband</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Father">Father</option>
                                        <option value="Nephew">Nephew</option>
                                    </select>
                                    <label class="select-label">Relationship</label>
                                </div>
                            </div>
                        </div>

                        <div class="employee-name" style="background-color: #fe8484; border-radius: 5px; padding: 10px; color: white; margin-top: 20px;">
                            <h5 style="font-weight: bold;margin-top: 0px;">Employment Contract Duration</h5>
                            <div class="input-6" style="justify-content: start">

                                <div class="select" style="margin-right: 5px;">
                                    <select id="durationDate" name="DurationDate" class="select-text" style="background-color: white;">
                                        <option value="Open Time" selected>Open Time</option>
                                        <option value="3 Months">3 Months</option>
                                        <option value="6 Months">6 Months</option>
                                        <option value="1 Year">1 year</option>
                                        <option value="2 Years">2 Years</option>
                                    </select>
                                    <label class="select-label" style="border-radius: 5px;">Duration</label>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <input id="startDate" placeholder=" " name="StartDate" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" value="<?php echo date("Y-m-d", strtotime(date('Y-m-d'))); ?>">
                                        <label>Start Date</label>
                                    </div>
                                    <p>click the calendar button</p>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <input id="endDate" placeholder=" " name="EndDate" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" val="">
                                        <label>End Date</label>
                                    </div>
                                    <p>click the calendar button</p>
                                </div>
                            </div>
                        </div>

                        <div data-id="employee-gov" class="employee-payroll">
                            <h5>Enter SSS (this is Optional)</h5>
                            <div class="input-6">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- SSSNumber: $("#sssNumber").val() -->
                                        <input id="sssNumber" placeholder=" " name="SSSNumber" type="text" required style="width: auto;">
                                        <label>SSS number</label>
                                    </div>
                                    <p>eg. 34-8888123-8</p>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- EmployeeER: $("#employeeER").val() -->
                                        <input id="employeeER" placeholder=" " name="EmployeeER" type="text" required style="width: auto;">
                                        <label>₱ Employee (ER)</label>
                                    </div>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- EmployeeEE: $("#employeeEE").val() -->
                                        <input id="employeeEE" placeholder=" " name="EmployeeEE" type="text" required style="width: auto;">
                                        <label>₱ Employee (EE)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-6" style="margin: 10px 0px">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- SSSActiveLoan: $("#sssActiveLoan").val() -->
                                        <input id="sssActiveLoan" placeholder=" " name="SSSActiveLoan" type="text" required style="width: auto;">
                                        <label>₱ Any Active SSS Loan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-id="employee-gov" class="employee-payroll" style="background-color: rgb(119, 190, 119)">
                            <h5>Enter Philhealth (this is Optional)</h5>
                            <div class="input-6" style="justify-content: start">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- PhilhealthNumber: $("#philhealthNumber").val() -->
                                        <input id="philhealthNumber" placeholder=" " name="PhilhealthNumber" type="text" required style="width: auto;">
                                        <label>Philhealth number</label>
                                    </div>
                                    <p>eg. 11-202188887</p>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- Philhealth_PerMonth: $("#philhealth_perMonth").val() -->
                                        <input id="philhealth_perMonth" placeholder=" " name="Philhealth_PerMonth" type="text" required style="width: auto;">
                                        <label>₱ Per Month</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-id="employee-gov" class="employee-payroll" style="background-color: #ffb347">
                            <h5>Enter Pag-IBIG fund (this is Optional)</h5>
                            <div class="input-6">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!--  PagIBIGNumber: $("#pagIbigNumber").val() -->
                                        <input id="pagIbigNumber" placeholder=" " name="PagIBIGNumber" type="text" required style="width: auto;">
                                        <label>Pag-IBIG fund number</label>
                                    </div>
                                    <p>eg. 11-202188887</p>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- PagIBIG_PerMonth: $("#pagIbig_perMonth").val() -->
                                        <input id="pagIbig_perMonth" placeholder=" " name="PagIBIG_PerMonth" type="text" required style="width: auto;">
                                        <label>₱ Per Month</label>
                                    </div>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- PagIBIG_ActiveLoan: $("#pagIbig_activeLoan").val() -->
                                        <input id="pagIbig_activeLoan" placeholder=" " name="PagIBIG_ActiveLoan" type="text" required style="width: auto;">
                                        <label>₱ Any Active Loan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Buttons -->
                    <div class="modal-footer" style="height: 60px">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="EmployeeRegister" class="btn btn-success">Register</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- ---------------------------------->
    <!-- Form modal for update employee -->
    <!-- ------------------------------- -->
    <form action="controller.php?action=add" id="registerEmployee" method="POST" autocomplete="off">
        <div id="update-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-header-title">
                            <h3 class="modal-title" id="exampleModalLabel">Employee Registration</h3>
                            <p class="modal-title" id="exampleModalLabel">Register new employee</p>
                        </div>

                        <button class="close" id="btnclose" type="button" data-dismiss="modal">×</button>
                    </div>

                    <div class="modal-body">
                        <div class="input-container-1">
                            <div class="input-1-5" style="margin-bottom: 20px;">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- CardID: $("#cardID").val() -->
                                        <input id="cardID" placeholder=" " name="CardID" type="text" required style="width: 200px;" value="0015077572">
                                        <label>Employee Number</label>
                                    </div>
                                    <p>Input your format</p>
                                </div>
                            </div>
                            <div class="input-1-5">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- CardID: $("#cardID").val() -->
                                        <input id="cardID" placeholder=" " name="CardID" type="text" required style="width: 200px;">
                                        <label>Employee Card ID</label>
                                    </div>
                                    <p>eg. Input the card number</p>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- FingerPrint: $("#fingerPrint").val() -->
                                        <input id="fingerPrint" placeholder=" " name="FingerPrint" type="text" required style="width: 200px;" value="1">
                                        <label>FingerPrint number</label>
                                    </div>
                                    <p>eg. 1</p>
                                </div>
                            </div>
                            <div class="employee-name">
                                <h5>Worker Type</h5>
                                <div class="input-1-5">
                                    <div class="select" style="margin-left: 5px;">
                                        <!--  WorkerType: $("#worker-type").val() -->
                                        <select id="u-worker-type" class="select-text" name="WorkerType" required>
                                            <option value="" selected></option>
                                            <option value="Regular">Regular</option>
                                            <option value="OJT">On-the-Job Training (OJT)</option>
                                            <option value="Contractual">Contractual</option>
                                            <option value="Concession Worker">Concession Worker</option>
                                        </select>
                                        <label class="select-label">Select Job Contract</label>
                                    </div>
                                    <div class="select" style="margin-left: 5px;">
                                        <!--  WorkerType: $("#worker-type").val() -->
                                        <select class="select-text" name="WorkerType" required>
                                            <option value="" selected></option>
                                            <option value="Regular">Software Engineer</option>
                                        </select>
                                        <label class="select-label">Select Job Position</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Image input here -->
                        </div>


                        <div class="employee-name">
                            <h5>Employee Name</h5>
                            <div class="input-2">
                                <div class="material-textfield">
                                    <!-- FirstName: $("#fname").val() -->
                                    <input id="fname" placeholder=" " name="FirstName" class="fn" type="text" required>
                                    <label>First Name</label>
                                </div>
                                <div class="material-textfield">
                                    <!-- LastName: $("#lname").val() -->
                                    <input id="lname" placeholder=" " name="LastName" class="fn" type="text" required>
                                    <label>Last Name</label>
                                </div>
                                <div class="material-textfield">
                                    <!-- MiddleName: $("#mname").val() -->
                                    <input id="mname" placeholder=" " name="MiddleName" class="fn" type="text" required>
                                    <label>Middle Name</label>
                                </div>
                            </div>
                        </div>

                        <div class="employee-name">
                            <h5>Employee Information</h5>
                            <div class="input-3">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- BirthDate: $("#birthDate").val() -->
                                        <input id="birthDate" placeholder=" " name="BirthDate" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" required>
                                        <label>Birth Date</label>
                                    </div>
                                    <p>click the calendar button</p>
                                </div>
                                <div>
                                    <div class="material-textfield" style="margin-left: -20px;">
                                        <!-- Age: $("#age").val() -->
                                        <input id="age" placeholder=" " name="Age" class="fn" type="text" required style="width: 50px;">
                                        <label>Age</label>
                                    </div>
                                </div>

                                <div class="select">
                                    <!-- Gender: $("gender").val(), -->
                                    <select id="gender" class="select-text" name="Gender" required>
                                        <option value="" selected></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <label class="select-label">Gender</label>
                                </div>
                                <div class="select">
                                    <!-- CivilStatus: $("#civilStatus").val() -->
                                    <select id="civilStatus" name="CivilStatus" class="select-text" required>
                                        <option value="" selected></option>
                                        <option value="Single">Single</option>
                                        <option value="Marriage">Marriage</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                    </select>
                                    <label class="select-label">Civil Status</label>
                                </div>
                            </div>
                            <div class="input-3">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- FullAddress: $("#fullAddress").val() -->
                                        <input id="fullAddress" placeholder=" " name="FullAddress" class="fn" type="text" required style="width: 727px;">
                                        <label>Full Address</label>
                                    </div>
                                    <p>Ex. Street, Barangay, City</p>
                                </div>
                            </div>
                            <div class="input-4">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- Email: $("#email").val() -->
                                        <input id="email" placeholder=" " name="Email" type="text" required style="width: auto;">
                                        <label>Email</label>
                                    </div>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- ContactNumber: $("#contactNumber").val() -->
                                        <input id="contactNumber" placeholder=" " name="ContactNumber" type="text" required style="width: auto;">
                                        <label>Contact Number</label>
                                    </div>
                                    <p>eg. 09123456789</p>
                                </div>
                            </div>
                        </div>
                        <div class="employee-name">
                            <h5>Contact Person for incase of emergency</h5>
                            <div class="input-5">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- ContactPerson: $("#contactPerson").val() -->
                                        <input id="contactPerson" placeholder=" " name="ContactPerson" type="text" required style="width: 250px;">
                                        <label>Contact Person</label>
                                    </div>
                                    <p>Complete name of contact person</p>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- ContactPersonNumber: $("#contactPersonNumber").val() -->
                                        <input id="contactPersonNumber" placeholder=" " name="ContactPersonNumber" type="text" required style="width: auto;">
                                        <label>Contact Number</label>
                                    </div>
                                    <p>eg. 09123456789</p>
                                </div>
                                <div class="select" style="margin-right: 5px;">
                                    <select id="relationship" name="Relationship" class="select-text" required>
                                        <option value="" selected></option>
                                        <option value="Wife">Wife</option>
                                        <option value="Husband">Husband</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Father">Father</option>
                                        <option value="Nephew">Nephew</option>
                                    </select>
                                    <label class="select-label">Relationship</label>
                                </div>
                            </div>
                        </div>
                        <div class="container-2" style="background-color: #7c5295; border-radius: 5px; padding: 10px; color: white; margin-top: 20px;">
                            <h5 style="font-weight: bold;margin-top: 0px;">Time Shifting</h5>

                            <div class="input-6" style="margin-top: 20px;">
                                <div class="select">
                                    <!-- TimeType: $("#time-type").val() -->
                                    <select id="time-type" class="select-text" name="TimeType" required style="background-color: white;">
                                        <option value="Open Time" selected>Open Time</option>
                                        <option value="Regular Shift">Regular Shift</option>
                                    </select>
                                    <label class="select-label" style="border-radius: 5px;">Type</label>
                                </div>
                                <div data-id="time" class="input-date" style="margin-left: 5px; display: none;">
                                    <div class="material-textfield">
                                        <!-- StartTime: $("#start-time").val() -->
                                        <input id="start-time" placeholder=" " name="StartTime" type="time" required style="width: 170px;">
                                        <label>Start</label>
                                    </div>
                                </div>
                                <div data-id="time" class="input-date" style="display: none;">
                                    <div class="material-textfield">
                                        <!-- EndTime: $("end-time").val() -->
                                        <input id="end-time" placeholder=" " name="EndTime" type="time" required style="width: 170px;">
                                        <label>End</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="employee-name" style="background-color: #fe8484; border-radius: 5px; padding: 10px; color: white; margin-top: 20px;">
                            <h5 style="font-weight: bold;margin-top: 0px;">Employment Contract Duration</h5>
                            <div class="input-6" style="justify-content: start">

                                <div class="select" style="margin-right: 5px;">
                                    <select id="durationDate" name="DurationDate" class="select-text" style="background-color: white;">
                                        <option value="Open Time" selected>Open Time</option>
                                        <option value="3 Months">3 Months</option>
                                        <option value="6 Months">6 Months</option>
                                        <option value="1 Year">1 year</option>
                                        <option value="2 Years">2 Years</option>
                                    </select>
                                    <label class="select-label" style="border-radius: 5px;">Duration</label>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <input id="startDate" placeholder=" " name="StartDate" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" value="<?php echo date("Y-m-d", strtotime(date('Y-m-d'))); ?>">
                                        <label>Start Date</label>
                                    </div>
                                    <p>click the calendar button</p>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <input id="endDate" placeholder=" " name="EndDate" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" val="">
                                        <label>End Date</label>
                                    </div>
                                    <p>click the calendar button</p>
                                </div>
                            </div>
                        </div>

                        <div data-id="employee-gov" class="employee-payroll">
                            <h5>Enter SSS (this is Optional)</h5>
                            <div class="input-6">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- SSSNumber: $("#sssNumber").val() -->
                                        <input id="sssNumber" placeholder=" " name="SSSNumber" type="text" required style="width: auto;">
                                        <label>SSS number</label>
                                    </div>
                                    <p>eg. 34-8888123-8</p>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- EmployeeER: $("#employeeER").val() -->
                                        <input id="employeeER" placeholder=" " name="EmployeeER" type="text" required style="width: auto;">
                                        <label>₱ Employee (ER)</label>
                                    </div>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- EmployeeEE: $("#employeeEE").val() -->
                                        <input id="employeeEE" placeholder=" " name="EmployeeEE" type="text" required style="width: auto;">
                                        <label>₱ Employee (EE)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-6" style="margin: 10px 0px">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- SSSActiveLoan: $("#sssActiveLoan").val() -->
                                        <input id="sssActiveLoan" placeholder=" " name="SSSActiveLoan" type="text" required style="width: auto;">
                                        <label>₱ Any Active SSS Loan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-id="employee-gov" class="employee-payroll" style="background-color: rgb(119, 190, 119)">
                            <h5>Enter Philhealth (this is Optional)</h5>
                            <div class="input-6" style="justify-content: start">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- PhilhealthNumber: $("#philhealthNumber").val() -->
                                        <input id="philhealthNumber" placeholder=" " name="PhilhealthNumber" type="text" required style="width: auto;">
                                        <label>Philhealth number</label>
                                    </div>
                                    <p>eg. 11-202188887</p>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- Philhealth_PerMonth: $("#philhealth_perMonth").val() -->
                                        <input id="philhealth_perMonth" placeholder=" " name="Philhealth_PerMonth" type="text" required style="width: auto;">
                                        <label>₱ Per Month</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-id="employee-gov" class="employee-payroll" style="background-color: #ffb347">
                            <h5>Enter Pag-IBIG fund (this is Optional)</h5>
                            <div class="input-6">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!--  PagIBIGNumber: $("#pagIbigNumber").val() -->
                                        <input id="pagIbigNumber" placeholder=" " name="PagIBIGNumber" type="text" required style="width: auto;">
                                        <label>Pag-IBIG fund number</label>
                                    </div>
                                    <p>eg. 11-202188887</p>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- PagIBIG_PerMonth: $("#pagIbig_perMonth").val() -->
                                        <input id="pagIbig_perMonth" placeholder=" " name="PagIBIG_PerMonth" type="text" required style="width: auto;">
                                        <label>₱ Per Month</label>
                                    </div>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- PagIBIG_ActiveLoan: $("#pagIbig_activeLoan").val() -->
                                        <input id="pagIbig_activeLoan" placeholder=" " name="PagIBIG_ActiveLoan" type="text" required style="width: auto;">
                                        <label>₱ Any Active Loan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Buttons -->
                    <div class="modal-footer" style="height: 60px">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="EmployeeRegister" class="btn btn-success">Register</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- --------------------------------------- -->
    <!-- Form modal for display info of employee -->
    <!-- --------------------------------------- -->
    <form action="controller.php?action=add" id="employeeInfo" method="POST" autocomplete="off">
        <div id="info-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-header-title">
                            <h3 class="modal-title" id="exampleModalLabel">Employee Registration</h3>
                            <p class="modal-title" id="exampleModalLabel">Register new employee</p>
                        </div>

                        <button class="close" id="btnclose" type="button" data-dismiss="modal">×</button>
                    </div>

                    <div class="modal-body">
                        <div class="input-container-1">
                            <div class="input-1-5" style="margin-bottom: 20px;">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- CardID: $("#cardID").val() -->
                                        <input id="cardID" placeholder=" " name="CardID" type="text" required style="width: 200px;" value="0015077572">
                                        <label>Employee Number</label>
                                    </div>
                                    <p>Input your format</p>
                                </div>
                            </div>
                            <div class="input-1-5">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- CardID: $("#cardID").val() -->
                                        <input id="cardID" placeholder=" " name="CardID" type="text" required style="width: 200px;">
                                        <label>Employee Card ID</label>
                                    </div>
                                    <p>eg. Input the card number</p>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- FingerPrint: $("#fingerPrint").val() -->
                                        <input id="fingerPrint" placeholder=" " name="FingerPrint" type="text" required style="width: 200px;" value="1">
                                        <label>FingerPrint number</label>
                                    </div>
                                    <p>eg. 1</p>
                                </div>
                            </div>
                            <div class="employee-name">
                                <h5>Worker Type</h5>
                                <div class="input-1-5">
                                    <div class="select" style="margin-left: 5px;">
                                        <!--  WorkerType: $("#worker-type").val() -->
                                        <select id="u-worker-type" class="select-text" name="WorkerType" required>
                                            <option value="" selected></option>
                                            <option value="Regular">Regular</option>
                                            <option value="OJT">On-the-Job Training (OJT)</option>
                                            <option value="Contractual">Contractual</option>
                                            <option value="Concession Worker">Concession Worker</option>
                                        </select>
                                        <label class="select-label">Select Job Contract</label>
                                    </div>
                                    <div class="select" style="margin-left: 5px;">
                                        <!--  WorkerType: $("#worker-type").val() -->
                                        <select class="select-text" name="WorkerType" required>
                                            <option value="" selected></option>
                                            <option value="Regular">Software Engineer</option>
                                        </select>
                                        <label class="select-label">Select Job Position</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Image input here -->
                        </div>


                        <div class="employee-name">
                            <h5>Employee Name</h5>
                            <div class="input-2">
                                <div class="material-textfield">
                                    <!-- FirstName: $("#fname").val() -->
                                    <input id="fname" placeholder=" " name="FirstName" class="fn" type="text" required>
                                    <label>First Name</label>
                                </div>
                                <div class="material-textfield">
                                    <!-- LastName: $("#lname").val() -->
                                    <input id="lname" placeholder=" " name="LastName" class="fn" type="text" required>
                                    <label>Last Name</label>
                                </div>
                                <div class="material-textfield">
                                    <!-- MiddleName: $("#mname").val() -->
                                    <input id="mname" placeholder=" " name="MiddleName" class="fn" type="text" required>
                                    <label>Middle Name</label>
                                </div>
                            </div>
                        </div>

                        <div class="employee-name">
                            <h5>Employee Information</h5>
                            <div class="input-3">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- BirthDate: $("#birthDate").val() -->
                                        <input id="birthDate" placeholder=" " name="BirthDate" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" required>
                                        <label>Birth Date</label>
                                    </div>
                                    <p>click the calendar button</p>
                                </div>
                                <div>
                                    <div class="material-textfield" style="margin-left: -20px;">
                                        <!-- Age: $("#age").val() -->
                                        <input id="age" placeholder=" " name="Age" class="fn" type="text" required style="width: 50px;">
                                        <label>Age</label>
                                    </div>
                                </div>

                                <div class="select">
                                    <!-- Gender: $("gender").val(), -->
                                    <select id="gender" class="select-text" name="Gender" required>
                                        <option value=""></option>
                                        <option value="Male" selected>Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <label class="select-label">Gender</label>
                                </div>
                                <div class="select">
                                    <!-- CivilStatus: $("#civilStatus").val() -->
                                    <select id="civilStatus" name="CivilStatus" class="select-text" required>
                                        <option value="" selected></option>
                                        <option value="Single">Single</option>
                                        <option value="Marriage">Marriage</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                    </select>
                                    <label class="select-label">Civil Status</label>
                                </div>
                            </div>
                            <div class="input-3">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- FullAddress: $("#fullAddress").val() -->
                                        <input id="fullAddress" placeholder=" " name="FullAddress" class="fn" type="text" required style="width: 727px;">
                                        <label>Full Address</label>
                                    </div>
                                    <p>Ex. Street, Barangay, City</p>
                                </div>
                            </div>
                            <div class="input-4">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- Email: $("#email").val() -->
                                        <input id="email" placeholder=" " name="Email" type="text" required style="width: auto;">
                                        <label>Email</label>
                                    </div>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- ContactNumber: $("#contactNumber").val() -->
                                        <input id="contactNumber" placeholder=" " name="ContactNumber" type="text" required style="width: auto;">
                                        <label>Contact Number</label>
                                    </div>
                                    <p>eg. 09123456789</p>
                                </div>
                            </div>
                        </div>
                        <div class="employee-name">
                            <h5>Contact Person for incase of emergency</h5>
                            <div class="input-5">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- ContactPerson: $("#contactPerson").val() -->
                                        <input id="contactPerson" placeholder=" " name="ContactPerson" type="text" required style="width: 250px;">
                                        <label>Contact Person</label>
                                    </div>
                                    <p>Complete name of contact person</p>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- ContactPersonNumber: $("#contactPersonNumber").val() -->
                                        <input id="contactPersonNumber" placeholder=" " name="ContactPersonNumber" type="text" required style="width: auto;">
                                        <label>Contact Number</label>
                                    </div>
                                    <p>eg. 09123456789</p>
                                </div>
                                <div class="select" style="margin-right: 5px;">
                                    <select id="relationship" name="Relationship" class="select-text" required>
                                        <option value="" selected></option>
                                        <option value="Wife">Wife</option>
                                        <option value="Husband">Husband</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Father">Father</option>
                                        <option value="Nephew">Nephew</option>
                                    </select>
                                    <label class="select-label">Relationship</label>
                                </div>
                            </div>
                        </div>
                        <div class="container-2" style="background-color: #7c5295; border-radius: 5px; padding: 10px; color: white; margin-top: 20px;">
                            <h5 style="font-weight: bold;margin-top: 0px;">Time Shifting</h5>

                            <div class="input-6" style="margin-top: 20px;">
                                <div class="select">
                                    <!-- TimeType: $("#time-type").val() -->
                                    <select id="time-type" class="select-text" name="TimeType" required style="background-color: white;">
                                        <option value="Open Time" selected>Open Time</option>
                                        <option value="Regular Shift">Regular Shift</option>
                                    </select>
                                    <label class="select-label" style="border-radius: 5px;">Type</label>
                                </div>
                                <div data-id="time" class="input-date" style="margin-left: 5px; display: none;">
                                    <div class="material-textfield">
                                        <!-- StartTime: $("#start-time").val() -->
                                        <input id="start-time" placeholder=" " name="StartTime" type="time" required style="width: 170px;">
                                        <label>Start</label>
                                    </div>
                                </div>
                                <div data-id="time" class="input-date" style="display: none;">
                                    <div class="material-textfield">
                                        <!-- EndTime: $("end-time").val() -->
                                        <input id="end-time" placeholder=" " name="EndTime" type="time" required style="width: 170px;">
                                        <label>End</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="employee-name" style="background-color: #fe8484; border-radius: 5px; padding: 10px; color: white; margin-top: 20px;">
                            <h5 style="font-weight: bold;margin-top: 0px;">Employment Contract Duration</h5>
                            <div class="input-6" style="justify-content: start">

                                <div class="select" style="margin-right: 5px;">
                                    <select id="durationDate" name="DurationDate" class="select-text" style="background-color: white;">
                                        <option value="Open Time" selected>Open Time</option>
                                        <option value="3 Months">3 Months</option>
                                        <option value="6 Months">6 Months</option>
                                        <option value="1 Year">1 year</option>
                                        <option value="2 Years">2 Years</option>
                                    </select>
                                    <label class="select-label" style="border-radius: 5px;">Duration</label>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <input id="startDate" placeholder=" " name="StartDate" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" value="<?php echo date("Y-m-d", strtotime(date('Y-m-d'))); ?>">
                                        <label>Start Date</label>
                                    </div>
                                    <p>click the calendar button</p>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <input id="endDate" placeholder=" " name="EndDate" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" val="">
                                        <label>End Date</label>
                                    </div>
                                    <p>click the calendar button</p>
                                </div>
                            </div>
                        </div>

                        <div data-id="employee-gov" class="employee-payroll">
                            <h5>Enter SSS (this is Optional)</h5>
                            <div class="input-6">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- SSSNumber: $("#sssNumber").val() -->
                                        <input id="sssNumber" placeholder=" " name="SSSNumber" type="text" required style="width: auto;">
                                        <label>SSS number</label>
                                    </div>
                                    <p>eg. 34-8888123-8</p>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- EmployeeER: $("#employeeER").val() -->
                                        <input id="employeeER" placeholder=" " name="EmployeeER" type="text" required style="width: auto;">
                                        <label>₱ Employee (ER)</label>
                                    </div>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- EmployeeEE: $("#employeeEE").val() -->
                                        <input id="employeeEE" placeholder=" " name="EmployeeEE" type="text" required style="width: auto;">
                                        <label>₱ Employee (EE)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-6" style="margin: 10px 0px">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- SSSActiveLoan: $("#sssActiveLoan").val() -->
                                        <input id="sssActiveLoan" placeholder=" " name="SSSActiveLoan" type="text" required style="width: auto;">
                                        <label>₱ Any Active SSS Loan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-id="employee-gov" class="employee-payroll" style="background-color: rgb(119, 190, 119)">
                            <h5>Enter Philhealth (this is Optional)</h5>
                            <div class="input-6" style="justify-content: start">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- PhilhealthNumber: $("#philhealthNumber").val() -->
                                        <input id="philhealthNumber" placeholder=" " name="PhilhealthNumber" type="text" required style="width: auto;">
                                        <label>Philhealth number</label>
                                    </div>
                                    <p>eg. 11-202188887</p>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- Philhealth_PerMonth: $("#philhealth_perMonth").val() -->
                                        <input id="philhealth_perMonth" placeholder=" " name="Philhealth_PerMonth" type="text" required style="width: auto;">
                                        <label>₱ Per Month</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-id="employee-gov" class="employee-payroll" style="background-color: #ffb347">
                            <h5>Enter Pag-IBIG fund (this is Optional)</h5>
                            <div class="input-6">
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!--  PagIBIGNumber: $("#pagIbigNumber").val() -->
                                        <input id="pagIbigNumber" placeholder=" " name="PagIBIGNumber" type="text" required style="width: auto;">
                                        <label>Pag-IBIG fund number</label>
                                    </div>
                                    <p>eg. 11-202188887</p>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- PagIBIG_PerMonth: $("#pagIbig_perMonth").val() -->
                                        <input id="pagIbig_perMonth" placeholder=" " name="PagIBIG_PerMonth" type="text" required style="width: auto;">
                                        <label>₱ Per Month</label>
                                    </div>
                                </div>
                                <div class="input-date">
                                    <div class="material-textfield">
                                        <!-- PagIBIG_ActiveLoan: $("#pagIbig_activeLoan").val() -->
                                        <input id="pagIbig_activeLoan" placeholder=" " name="PagIBIG_ActiveLoan" type="text" required style="width: auto;">
                                        <label>₱ Any Active Loan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Buttons -->
                    <div class="modal-footer" style="height: 60px">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="EmployeeRegister" class="btn btn-success">Register</button>
                    </div>
                </div>
            </div>
        </div>
    </form>