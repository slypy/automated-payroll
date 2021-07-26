<!-- ------------------------------------------------------------------------------------- -->
<!-- ------------------------------- Main Body Content ----------------------------------- -->
<!-- ------------------------------------------------------------------------------------- -->

<!------------------------------------------------->
<!-- Display active employees in Form Data Table -->
<!------------------------------------------------->

<div class="row" style="margin-top: -40px">
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
                        <button data-target="#add-employee-form" data-toggle="modal" data-backdrop="static" class="btn btn-primary btn-sm"> <i class="material-icons">add</i> Add new Employee</a>
                    </div>
                </div>
                <div class="header-line">
                    <hr>
                </div>
                <div class="table-responsive">
                    <table id="active-employee-table" class="table table-sm table-hover table-bordered" cellspacing="0">
                        <thead class="text-primary text-sm">
                            <th  class="text-center" width=25 style="cursor: pointer;">
                                <input type="checkbox" id="check_all"/>
                            </th>
                            <th>
                                Employee ID #
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Contact No.
                            </th>
                            <th>
                                Shifting
                            </th>
                            <th>
                                Position
                            </th>
                            <th>
                                Status
                            </th>
                            <th class="text-center">
                                Action
                            </th>
                        </thead>
                    </table>
                </div>
                <div class="btn-group">
                    <button id="remove_active_employee" type="button" class="btn btn-danger"><i class="material-icons">delete</i> Remove Selected</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!------------------------------->
<!-- Display Removed Employess -->
<!------------------------------->

<!-- Pass the form data table on delete employee in controller.php type{action} case: delete -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div id="remove-employees" class="card-header card-header-primary" style="cursor: pointer;">
                <h4 class="card-title mt-0">Click to show/hide Removed Employees</h4>
            </div>
            <div id="display-employee" class="card-body" style="display: none;">
                <div class="table-responsive">
                    <table id="removed-employee-table" class="table table-hover  table-bordered">
                        <thead class="text-info">
                            <th class="text-center" width=25>
                                <input type="checkbox" id="check_all_removed"/>
                            </th>
                            <th>
                                Employee ID#
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Email Address
                            </th>
                            <th>
                                Position
                            </th>
                            <th>
                                Status
                            </th>
                            <th class="text-center">
                                Action
                            </th>
                        </thead>
                    </table>
                </div>
                <div class="btn-group">
                    <button id="delete_removed_employee" type="button" class="btn btn-danger"><i class="material-icons">delete</i> Delete Selected</button>
                </div>
            </div>
        </div>
    </div>
</div>
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
<form id="addEmployee" method="POST" autocomplete="on">
    <div id="add-employee-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
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
                        <div class="input-1-5">
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- employee_number: $("#employee_number").val() -->
                                    <input id="employee_number" placeholder=" " name="employee_number" type="text" required value="20210301">
                                    <label>Employee Number</label>
                                </div>
                                <p>Input your format</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- card_id: $("#card_id").val() -->
                                    <input id="card_id" placeholder=" " name="card_id" type="text" required>
                                    <label>Employee Card ID</label>
                                </div>
                                <p>eg. Input the card number</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- fingerprint_number: $("#fingerprint_number").val() -->
                                    <input id="fingerprint_number" placeholder=" " name="fingerprint_number" type="number" required value="1">
                                    <label>FingerPrint number</label>
                                </div>
                                <p>eg. 1</p>
                            </div>
                        </div>
                        <div class="employee-name">
                            <h5>Worker Type</h5>
                            <div class="input-1-6">
                                <div class="select" style="margin-left: 5px;">
                                    <select id="worker_type" class="select-text" name="worker_type" required>
                                        <option value="" selected></option>
                                        <option value="Regular">Regular</option>
                                        <option value="OJT">On-the-Job Training (OJT)</option>
                                        <option value="Contractual">Contractual</option>
                                        <option value="Concession Worker">Concession Worker</option>
                                    </select>
                                    <label class="select-label">Select Job Contract</label>
                                </div>
                                <div class="select">
                                    <!--  job_position: $("#job_position").val() -->
                                    <select id="job_position" class="select-text" name="job_position" required>
                                        <option value="" selected></option>
                                    </select>
                                    <label class="select-label">Select Job Position</label>
                                </div>
                                <div class="select" style="margin-right: 5px;">
                                    <!-- shifting_type: $("#shifting_type").val() -->
                                    <select id="shifting_type" class="select-text" name="shifting_type" required style="background-color: white;">
                                        <option value="" selected></option>
                                    </select>
                                    <label class="select-label" style="border-radius: 5px;">Shifting Shedule</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="employee-name">
                        <h5>Employee Name</h5>
                        <div class="input-2">
                            <div class="material-textfield">
                                <!-- first_name: $("#first_name").val() -->
                                <input id="first_name" placeholder=" " name="first_name" class="fn" type="text" required>
                                <label>First Name</label>
                            </div>
                            <div class="material-textfield">
                                <!-- last_name: $("#last_name").val() -->
                                <input id="last_name" placeholder=" " name="last_name" class="fn" type="text" required>
                                <label>Last Name</label>
                            </div>
                            <div class="material-textfield">
                                <!-- middle_name: $("#middle_name").val() -->
                                <input id="middle_name" placeholder=" " name="middle_name" class="fn" type="text" value="">
                                <label>Middle Name</label>
                            </div>
                        </div>
                    </div>

                    <div class="employee-name">
                        <h5>Employee Information</h5>
                        <div class="input-3" style="margin-bottom: 10px;">
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- birth_date: $("#birth_date").val() -->
                                    <input id="birth_date" placeholder=" " name="birth_date" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" required>
                                    <label>Birth Date</label>
                                </div>
                                <p>click the calendar button</p>
                            </div>
                            <div>
                                <div class="material-textfield" style="margin-left: -20px;">
                                    <!-- age: $("#age").val() -->
                                    <input id="age" placeholder=" " name="age" class="fn" type="number" required style="width: 50px;" readonly>
                                    <label>Age</label>
                                </div>
                            </div>

                            <div class="select">
                                <!-- gender: $("gender").val(), -->
                                <select id="gender" class="select-text" name="gender" required>
                                    <option value="" selected></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <label class="select-label">Gender</label>
                            </div>
                            <div class="select">
                                <!-- civil_status: $("#civil_status").val() -->
                                <select id="civil_status" name="civil_status" class="select-text" required>
                                    <option value="" selected></option>
                                    <option value="Single">Single</option>
                                    <option value="Marriage">Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widowed">Widowed</option>
                                </select>
                                <label class="select-label">Civil Status</label>
                            </div>
                        </div>
                        <div class="input-3" style="margin-bottom: 10px;">
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- full_address: $("#full_address").val() -->
                                    <input id="full_address" placeholder=" " name="full_address" class="fn" type="text" required style="width: 727px;">
                                    <label>Full Address</label>
                                </div>
                                <p>Ex. Street, Barangay, City</p>
                            </div>
                        </div>
                        <div class="input-4">
                            <div class="input-date" style="margin-right: 20px;">
                                <div class="material-textfield">
                                    <!-- email: $("#email").val() -->
                                    <input id="email" placeholder=" " name="email" type="text" required style="width: auto;">
                                    <label>Email</label>
                                </div>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- contact_number: $("#contact_number").val() -->
                                    <input id="contact_number" placeholder=" " name="contact_number" type="text" required style="width: auto;">
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
                                    <!-- contact_person: $("#contact_person").val() -->
                                    <input id="contact_person" placeholder=" " name="contact_person" type="text" required>
                                    <label>Contact Person</label>
                                </div>
                                <p>Complete name of contact person</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- contact_person_number: $("#contact_person_number").val() -->
                                    <input id="contact_person_number" placeholder=" " name="contact_person_number" type="text" required style="width: auto;">
                                    <label>Contact Number</label>
                                </div>
                                <p>eg. 09123456789</p>
                            </div>
                            <div class="select" style="margin-right: 5px;">
                                <!-- relationship: $("#relationship").val() -->
                                <select id="relationship" name="relationship" class="select-text" required>
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
                                <!-- duration_date: $("#duration_date").val() -->
                                <select id="duration_date" name="duration_date" class="select-text" style="background-color: white;">
                                    <option value="Open Time" selected>Open Time</option>
                                    <option value="3 Months">3 Months</option>
                                    <option value="6 Months">6 Months</option>
                                    <option value="1 Year">1 Year</option>
                                    <option value="2 Years">2 Years</option>
                                </select>
                                <label class="select-label" style="border-radius: 5px;">Duration</label>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- start_date: $("#start_date").val() -->
                                    <input id="start_date" placeholder=" " name="start_date" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" value="<?php echo date("Y-m-d", strtotime(date('Y-m-d'))); ?>">
                                    <label>Start Date</label>
                                </div>
                                <p>click the calendar button</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- end_date: $("#end_date").val() -->
                                    <input id="end_date" placeholder=" " name="end_date" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" val="">
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
                                    <!-- sss_number: $("#sss_number").val() -->
                                    <input id="sss_number" placeholder=" " name="sss_number" type="text" required style="width: auto;">
                                    <label>SSS number</label>
                                </div>
                                <p>eg. 34-8888123-8</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- employee_er: $("#employee_er").val() -->
                                    <input id="employee_er" placeholder=" " name="employee_er" type="number" step="0.01" required style="width: auto;">
                                    <label>₱ Employer</label>
                                </div>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- employee_ee: $("#employee_ee").val() -->
                                    <input id="employee_ee" placeholder=" " name="employee_ee" type="number" step="0.01" required style="width: auto;">
                                    <label>₱ Employee</label>
                                </div>
                            </div>
                        </div>
                        <div class="input-6" style="margin: 10px 0px">
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- sss_active_loan: $("#sss_active_loan").val() -->
                                    <input id="sss_active_loan" placeholder=" " name="sss_active_loan" type="number" step="0.01" required style="width: auto;">
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
                                    <!-- philhealth_number: $("#philhealth_number").val() -->
                                    <input id="philhealth_number" placeholder=" " name="philhealth_number" type="text" required style="width: auto;">
                                    <label>Philhealth number</label>
                                </div>
                                <p>eg. 11-202188887</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- philhealth_per_month: $("#philhealth_per_month").val() -->
                                    <input id="philhealth_per_month" placeholder=" " name="philhealth_per_month" type="number" step="0.01" required style="width: auto;">
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
                                    <!--  pag_ibig_number: $("#pag_ibig_number").val() -->
                                    <input id="pag_ibig_number" placeholder=" " name="pag_ibig_number" type="text" required style="width: auto;">
                                    <label>Pag-IBIG fund number</label>
                                </div>
                                <p>eg. 11-202188887</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- pag_ibig_per_month: $("#pag_ibig_per_month").val() -->
                                    <input id="pag_ibig_per_month" placeholder=" " name="pag_ibig_per_month" type="number" step="0.01" required style="width: auto;">
                                    <label>₱ Per Month</label>
                                </div>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- pag_ibig_active_loan: $("#pag_ibig_active_loan").val() -->
                                    <input id="pag_ibig_active_loan" placeholder=" " name="pag_ibig_active_loan" type="number" step="0.01" required style="width: auto;">
                                    <label>₱ Any Active Loan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Buttons -->
                <div class="modal-footer" style="height: 60px">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="employee_data_submit" class="btn btn-success">Register</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- ---------------------------------->
<!-- Form modal for update employee -->
<!-- ------------------------------- -->
<form id="updateEmployee" method="POST" autocomplete="on">
    <div id="update-employee-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-header-title">
                        <h3 class="modal-title" id="exampleModalLabel">Update Employee Data</h3>
                        <p class="modal-title" id="exampleModalLabel">This form will update employee's data</p>
                    </div>
                    <button class="close" id="btnclose" type="button" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    <div class="input-container-1">
                        <div class="input-1-5">
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- employee_number: $("#employee_number").val() -->
                                    <input id="employee_number" placeholder=" " name="employee_number" type="text" required value="20210301">
                                    <label>Employee Number</label>
                                </div>
                                <p>Input your format</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- card_id: $("#card_id").val() -->
                                    <input id="card_id" placeholder=" " name="card_id" type="text" required>
                                    <label>Employee Card ID</label>
                                </div>
                                <p>eg. Input the card number</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- fingerprint_number: $("#fingerprint_number").val() -->
                                    <input id="fingerprint_number" placeholder=" " name="fingerprint_number" type="number" required value="1">
                                    <label>FingerPrint number</label>
                                </div>
                                <p>eg. 1</p>
                            </div>
                        </div>
                        <div class="employee-name">
                            <h5>Worker Type</h5>
                            <div class="input-1-6">
                                <div class="select" style="margin-left: 5px;">
                                    <!--  worker_type: $("#worker_type").val() -->
                                    <select id="worker_type" class="select-text" name="worker_type" required>
                                        <option value="" selected></option>
                                        <option value="Regular">Regular</option>
                                        <option value="OJT">On-the-Job Training (OJT)</option>
                                        <option value="Contractual">Contractual</option>
                                        <option value="Concession Worker">Concession Worker</option>
                                    </select>
                                    <label class="select-label">Select Job Contract</label>
                                </div>
                                <div class="select">
                                    <!--  job_position: $("#job_position").val() -->
                                    <select id="job_position" class="select-text" name="job_position" required>
                                        <option value="" selected></option>
                                    </select>
                                    <label class="select-label">Select Job Position</label>
                                </div>
                                <div class="select" style="margin-right: 5px;">
                                    <!-- shifting_type: $("#shifting_type").val() -->
                                    <select id="shifting_type" class="select-text" name="shifting_type" required style="background-color: white;">
                                        <option value="" selected></option>
                                    </select>
                                    <label class="select-label" style="border-radius: 5px;">Shifting Schedule</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="employee-name">
                        <h5>Employee Name</h5>
                        <div class="input-2">
                            <div class="material-textfield">
                                <!-- first_name: $("#first_name").val() -->
                                <input id="first_name" placeholder=" " name="first_name" class="fn" type="text" required>
                                <label>First Name</label>
                            </div>
                            <div class="material-textfield">
                                <!-- last_name: $("#last_name").val() -->
                                <input id="last_name" placeholder=" " name="last_name" class="fn" type="text" required>
                                <label>Last Name</label>
                            </div>
                            <div class="material-textfield">
                                <!-- middle_name: $("#middle_name").val() -->
                                <input id="middle_name" placeholder=" " name="middle_name" class="fn" type="text" required>
                                <label>Middle Name</label>
                            </div>
                        </div>
                    </div>

                    <div class="employee-name">
                        <h5>Employee Information</h5>
                        <div class="input-3" style="margin-bottom: 10px;">
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- birth_date: $("#birth_date").val() -->
                                    <input id="birth_date" placeholder=" " name="birth_date" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" required>
                                    <label>Birth Date</label>
                                </div>
                                <p>click the calendar button</p>
                            </div>
                            <div>
                                <div class="material-textfield" style="margin-left: -20px;">
                                    <!-- age: $("#age").val() -->
                                    <input id="age" placeholder=" " name="age" class="fn" type="number" required style="width: 50px;">
                                    <label>Age</label>
                                </div>
                            </div>

                            <div class="select">
                                <!-- gender: $("gender").val(), -->
                                <select id="gender" class="select-text" name="gender" required>
                                    <option value="" selected></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <label class="select-label">Gender</label>
                            </div>
                            <div class="select">
                                <!-- civil_status: $("#civil_status").val() -->
                                <select id="civil_status" name="civil_status" class="select-text" required>
                                    <option value="" selected></option>
                                    <option value="Single">Single</option>
                                    <option value="Marriage">Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widowed">Widowed</option>
                                </select>
                                <label class="select-label">Civil Status</label>
                            </div>
                        </div>
                        <div class="input-3" style="margin-bottom: 10px;">
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- full_address: $("#full_address").val() -->
                                    <input id="full_address" placeholder=" " name="full_address" class="fn" type="text" required style="width: 727px;">
                                    <label>Full Address</label>
                                </div>
                                <p>Ex. Street, Barangay, City</p>
                            </div>
                        </div>
                        <div class="input-4">
                            <div class="input-date" style="margin-right: 20px;">
                                <div class="material-textfield">
                                    <!-- email: $("#email").val() -->
                                    <input id="email" placeholder=" " name="email" type="text" required style="width: auto;">
                                    <label>Email</label>
                                </div>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- contact_number: $("#contact_number").val() -->
                                    <input id="contact_number" placeholder=" " name="contact_number" type="text" required style="width: auto;">
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
                                    <!-- contact_person: $("#contact_person").val() -->
                                    <input id="contact_person" placeholder=" " name="contact_person" type="text" required>
                                    <label>Contact Person</label>
                                </div>
                                <p>Complete name of contact person</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- contact_person_number: $("#contact_person_number").val() -->
                                    <input id="contact_person_number" placeholder=" " name="contact_person_number" type="text" required style="width: auto;">
                                    <label>Contact Number</label>
                                </div>
                                <p>eg. 09123456789</p>
                            </div>
                            <div class="select" style="margin-right: 5px;">
                                <!-- relationship: $("#relationship").val() -->
                                <select id="relationship" name="relationship" class="select-text" required>
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
                                <!-- duration_date: $("#duration_date").val() -->
                                <select id="duration_date" name="duration_date" class="select-text" style="background-color: white;">
                                    <option value="Open Time" selected>Open Time</option>
                                    <option value="3 Months">3 Months</option>
                                    <option value="6 Months">6 Months</option>
                                    <option value="1 Year">1 Year</option>
                                    <option value="2 Years">2 Years</option>
                                </select>
                                <label class="select-label" style="border-radius: 5px;">Duration</label>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- start_date: $("#start_date").val() -->
                                    <input id="start_date" placeholder=" " name="start_date" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" value="<?php echo date("Y-m-d", strtotime(date('Y-m-d'))); ?>">
                                    <label>Start Date</label>
                                </div>
                                <p>click the calendar button</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- end_date: $("#end_date").val() -->
                                    <input id="end_date" placeholder=" " name="end_date" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" val="">
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
                                    <!-- sss_number: $("#sss_number").val() -->
                                    <input id="sss_number" placeholder=" " name="sss_number" type="text" required style="width: auto;">
                                    <label>SSS number</label>
                                </div>
                                <p>eg. 34-8888123-8</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- employee_er: $("#employee_er").val() -->
                                    <input id="employee_er" placeholder=" " name="employee_er" type="number" step="0.01" required style="width: auto;">
                                    <label>₱ Employer</label>
                                </div>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- employee_ee: $("#employee_ee").val() -->
                                    <input id="employee_ee" placeholder=" " name="employee_ee" type="number" step="0.01" required style="width: auto;">
                                    <label>₱ Employee</label>
                                </div>
                            </div>
                        </div>
                        <div class="input-6" style="margin: 10px 0px">
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- sss_active_loan: $("#sss_active_loan").val() -->
                                    <input id="sss_active_loan" placeholder=" " name="sss_active_loan" type="number" step="0.01" required style="width: auto;">
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
                                    <!-- philhealth_number: $("#philhealth_number").val() -->
                                    <input id="philhealth_number" placeholder=" " name="philhealth_number" type="text" required style="width: auto;">
                                    <label>Philhealth number</label>
                                </div>
                                <p>eg. 11-202188887</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- philhealth_per_month: $("#philhealth_per_month").val() -->
                                    <input id="philhealth_per_month" placeholder=" " name="philhealth_per_month" type="number" step="0.01" required style="width: auto;">
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
                                    <!--  pag_ibig_number: $("#pag_ibig_number").val() -->
                                    <input id="pag_ibig_number" placeholder=" " name="pag_ibig_number" type="text" required style="width: auto;">
                                    <label>Pag-IBIG fund number</label>
                                </div>
                                <p>eg. 11-202188887</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- pag_ibig_per_month: $("#pag_ibig_per_month").val() -->
                                    <input id="pag_ibig_per_month" placeholder=" " name="pag_ibig_per_month" type="number" step="0.01" required style="width: auto;">
                                    <label>₱ Per Month</label>
                                </div>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- pag_ibig_active_loan: $("#pag_ibig_active_loan").val() -->
                                    <input id="pag_ibig_active_loan" placeholder=" " name="pag_ibig_active_loan" type="number" step="0.01" required style="width: auto;">
                                    <label>₱ Any Active Loan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Buttons -->
                <div class="modal-footer" style="height: 60px">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="employee_data_submit" class="btn btn-success">update</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form id="employeeInfo">
    <div id="info-employee-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-header-title">
                        <h3 class="modal-title" id="exampleModalLabel">Employee Data</h3>
                        <p class="modal-title" id="exampleModalLabel">This form will print the data</p>
                    </div>
                    <button class="close" id="btnclose" type="button" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    <div class="input-container-1">
                        <div class="input-1-5">
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- employee_number: $("#employee_number").val() -->
                                    <input id="employee_number" placeholder=" " name="employee_number" type="text" required value="20210301">
                                    <label>Employee Number</label>
                                </div>
                                <p>Input your format</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- card_id: $("#card_id").val() -->
                                    <input id="card_id" placeholder=" " name="card_id" type="text" required>
                                    <label>Employee Card ID</label>
                                </div>
                                <p>eg. Input the card number</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- fingerprint_number: $("#fingerprint_number").val() -->
                                    <input id="fingerprint_number" placeholder=" " name="fingerprint_number" type="number" required value="1">
                                    <label>FingerPrint number</label>
                                </div>
                                <p>eg. 1</p>
                            </div>
                        </div>
                        <div class="employee-name">
                            <h5>Worker Type</h5>
                            <div class="input-1-6">
                                <div class="select" style="margin-left: 5px;">
                                    <!--  worker_type: $("#worker_type").val() -->
                                    <select id="worker_type" class="select-text" name="worker_type" required>
                                        <option value="" selected></option>
                                        <option value="Regular">Regular</option>
                                        <option value="OJT">On-the-Job Training (OJT)</option>
                                        <option value="Contractual">Contractual</option>
                                        <option value="Concession Worker">Concession Worker</option>
                                    </select>
                                    <label class="select-label">Select Job Contract</label>
                                </div>
                                <div class="select">
                                    <!--  job_position: $("#job_position").val() -->
                                    <select id="job_position" class="select-text" name="job_position" required>
                                        <option value="" selected></option>
                                    </select>
                                    <label class="select-label">Select Job Position</label>
                                </div>
                                <div class="select" style="margin-right: 5px;">
                                    <!-- shifting_type: $("#shifting_type").val() -->
                                    <select id="shifting_type" class="select-text" name="shifting_type" required style="background-color: white;">
                                        <option value="" selected></option>
                                    </select>
                                    <label class="select-label" style="border-radius: 5px;">Time Shifting</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="employee-name">
                        <h5>Employee Name</h5>
                        <div class="input-2">
                            <div class="material-textfield">
                                <!-- first_name: $("#first_name").val() -->
                                <input id="first_name" placeholder=" " name="first_name" class="fn" type="text" required>
                                <label>First Name</label>
                            </div>
                            <div class="material-textfield">
                                <!-- last_name: $("#last_name").val() -->
                                <input id="last_name" placeholder=" " name="last_name" class="fn" type="text" required>
                                <label>Last Name</label>
                            </div>
                            <div class="material-textfield">
                                <!-- middle_name: $("#middle_name").val() -->
                                <input id="middle_name" placeholder=" " name="middle_name" class="fn" type="text" required>
                                <label>Middle Name</label>
                            </div>
                        </div>
                    </div>

                    <div class="employee-name">
                        <h5>Employee Information</h5>
                        <div class="input-3" style="margin-bottom: 10px;">
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- birth_date: $("#birth_date").val() -->
                                    <input id="birth_date" placeholder=" " name="birth_date" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" required>
                                    <label>Birth Date</label>
                                </div>
                                <p>click the calendar button</p>
                            </div>
                            <div>
                                <div class="material-textfield" style="margin-left: -20px;">
                                    <!-- age: $("#age").val() -->
                                    <input id="age" placeholder=" " name="age" class="fn" type="number" required style="width: 50px;">
                                    <label>Age</label>
                                </div>
                            </div>

                            <div class="select">
                                <!-- gender: $("gender").val(), -->
                                <select id="gender" class="select-text" name="gender" required>
                                    <option value="" selected></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <label class="select-label">Gender</label>
                            </div>
                            <div class="select">
                                <!-- civil_status: $("#civil_status").val() -->
                                <select id="civil_status" name="civil_status" class="select-text" required>
                                    <option value="" selected></option>
                                    <option value="Single">Single</option>
                                    <option value="Marriage">Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widowed">Widowed</option>
                                </select>
                                <label class="select-label">Civil Status</label>
                            </div>
                        </div>
                        <div class="input-3" style="margin-bottom: 10px;">
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- full_address: $("#full_address").val() -->
                                    <input id="full_address" placeholder=" " name="full_address" class="fn" type="text" required style="width: 727px;">
                                    <label>Full Address</label>
                                </div>
                                <p>Ex. Street, Barangay, City</p>
                            </div>
                        </div>
                        <div class="input-4">
                            <div class="input-date" style="margin-right: 20px;">
                                <div class="material-textfield">
                                    <!-- email: $("#email").val() -->
                                    <input id="email" placeholder=" " name="email" type="text" required style="width: auto;">
                                    <label>Email</label>
                                </div>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- contact_number: $("#contact_number").val() -->
                                    <input id="contact_number" placeholder=" " name="contact_number" type="text" required style="width: auto;">
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
                                    <!-- contact_person: $("#contact_person").val() -->
                                    <input id="contact_person" placeholder=" " name="contact_person" type="text" required>
                                    <label>Contact Person</label>
                                </div>
                                <p>Complete name of contact person</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- contact_person_number: $("#contact_person_number").val() -->
                                    <input id="contact_person_number" placeholder=" " name="contact_person_number" type="text" required style="width: auto;">
                                    <label>Contact Number</label>
                                </div>
                                <p>eg. 09123456789</p>
                            </div>
                            <div class="select" style="margin-right: 5px;">
                                <!-- relationship: $("#relationship").val() -->
                                <select id="relationship" name="relationship" class="select-text" required>
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
                                <!-- duration_date: $("#duration_date").val() -->
                                <select id="duration_date" name="duration_date" class="select-text" style="background-color: white;">
                                    <option value="Open Time" selected>Open Time</option>
                                    <option value="3 Months">3 Months</option>
                                    <option value="6 Months">6 Months</option>
                                    <option value="1 Year">1 Year</option>
                                    <option value="2 Years">2 Years</option>
                                </select>
                                <label class="select-label" style="border-radius: 5px;">Duration</label>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- start_date: $("#start_date").val() -->
                                    <input id="start_date" placeholder=" " name="start_date" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" value="<?php echo date("Y-m-d", strtotime(date('Y-m-d'))); ?>">
                                    <label>Start Date</label>
                                </div>
                                <p>click the calendar button</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- end_date: $("#end_date").val() -->
                                    <input id="end_date" placeholder=" " name="end_date" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" val="">
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
                                    <!-- sss_number: $("#sss_number").val() -->
                                    <input id="sss_number" placeholder=" " name="sss_number" type="text" required style="width: auto;">
                                    <label>SSS number</label>
                                </div>
                                <p>eg. 34-8888123-8</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- employee_er: $("#employee_er").val() -->
                                    <input id="employee_er" placeholder=" " name="employee_er" type="number" step="0.01" required style="width: auto;">
                                    <label>₱ Employer</label>
                                </div>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- employee_ee: $("#employee_ee").val() -->
                                    <input id="employee_ee" placeholder=" " name="employee_ee" type="number" step="0.01" required style="width: auto;">
                                    <label>₱ Employee</label>
                                </div>
                            </div>
                        </div>
                        <div class="input-6" style="margin: 10px 0px">
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- sss_active_loan: $("#sss_active_loan").val() -->
                                    <input id="sss_active_loan" placeholder=" " name="sss_active_loan" type="number" step="0.01" required style="width: auto;">
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
                                    <!-- philhealth_number: $("#philhealth_number").val() -->
                                    <input id="philhealth_number" placeholder=" " name="philhealth_number" type="text" required style="width: auto;">
                                    <label>Philhealth number</label>
                                </div>
                                <p>eg. 11-202188887</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- philhealth_per_month: $("#philhealth_per_month").val() -->
                                    <input id="philhealth_per_month" placeholder=" " name="philhealth_per_month" type="number" step="0.01" required style="width: auto;">
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
                                    <!--  pag_ibig_number: $("#pag_ibig_number").val() -->
                                    <input id="pag_ibig_number" placeholder=" " name="pag_ibig_number" type="text" required style="width: auto;">
                                    <label>Pag-IBIG fund number</label>
                                </div>
                                <p>eg. 11-202188887</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- pag_ibig_per_month: $("#pag_ibig_per_month").val() -->
                                    <input id="pag_ibig_per_month" placeholder=" " name="pag_ibig_per_month" type="number" step="0.01" required style="width: auto;">
                                    <label>₱ Per Month</label>
                                </div>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <!-- pag_ibig_active_loan: $("#pag_ibig_active_loan").val() -->
                                    <input id="pag_ibig_active_loan" placeholder=" " name="pag_ibig_active_loan" type="number" step="0.01" required style="width: auto;">
                                    <label>₱ Any Active Loan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Buttons -->
                <div class="modal-footer" style="height: 60px">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="employee_data_submit" class="btn btn-success">Print</button>
                </div>
            </div>
        </div>
    </div>
</form>