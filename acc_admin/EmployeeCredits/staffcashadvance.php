<!-- Staff Cash Advance Section -->
<div id="tbl-staffCA" class="row" style="margin-top: -40px;">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="header-title">
                    <div>
                        <h3>
                            Staff Cash Advance Record
                        </h3>
                    </div>
                    <div>
                        <a href="#registration-form" data-target="#new-ca-form" data-toggle="modal" data-backdrop="static" class="btn btn-success btn-sm"><i class="material-icons">add</i> New</a>
                    </div>
                </div>
                <div class="header-line">
                    <hr>
                </div>
                <div class="table-responsive">
                    <table id="staff-ca-table" class="table table-sm table-hover table-striped table-bordered" cellspacing="0">
                        <thead class="text-primary text-sm">
                            <th>
                                Employee ID #
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Date of Cash Advance
                            </th>
                            <th class="text-center">
                                ₱ CA Amount
                            </th>
                            <th class="text-center">
                                Salary Deduction
                            </th>
                            <th class="text-center">
                                Action
                            </th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="paid-tbl-staffCA" class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div id="paid-staffCA" class="card-header card-header-primary" style="cursor: pointer;">
                <h4 class="card-title mt-0">Click to show/hide paid cash advance</h4>
            </div>
            <div id="display-paid-tbl-staffCA" class="card-body" style="display: none;">
                <div class="table-responsive">
                    <table id="paid-staff-ca-table" class="table table-sm table-hover table-striped table-bordered" cellspacing="0">
                        <thead class="text-primary text-sm">
                            <th>
                                Employee ID #
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Date of Cash Advance
                            </th>
                            <th class="text-center">
                                ₱ CA Amount
                            </th>
                            <th class="text-center">
                                Salary Deduction
                            </th>
                            <th class="text-center">
                                Action
                            </th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Loan Section -->
<div id="tbl-loan" class="row" style="margin-top: -40px; display: none;">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="header-title">
                    <div>
                        <h3>
                            Loan Record
                        </h3>
                    </div>
                    <div>
                        <a href="#new-loan-form" data-target="#new-loan-form" data-toggle="modal" data-backdrop="static" class="btn btn-success btn-sm"><i class="material-icons">add</i> New</a>
                    </div>
                </div>
                <div class="header-line">
                    <hr>
                </div>
                <div class="table-responsive">
                    <table id="staff-loan-table" class="table table-sm table-hover table-striped table-bordered" cellspacing="0">
                        <thead class="text-primary text-sm">
                            <th>
                                Employee ID #
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Date of Loan
                            </th>
                            <th>
                                DueDate
                            </th>
                            <th class="text-center">
                                ₱ Loan Amount
                            </th>
                            <th class="text-center">
                                Interest %
                            </th>
                            <th class="text-center">
                                ₱ Balance Remaining
                            </th>
                            <th class="text-center">
                                Action
                            </th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="paid-tbl-loan" class="row" style="display: none">
    <div class="col-md-12">
        <div class="card card-plain">
            <div id="paid-staffLoan" class="card-header card-header-primary" style="cursor: pointer;">
                <h4 class="card-title mt-0">Click to show/hide paid loan</h4>
            </div>
            <div id="display-paid-staffLoan" class="card-body" style="display: none;">
                <div class="table-responsive">
                    <table id="paid-staff-loan-table" class="table table-sm table-hover table-striped table-bordered" cellspacing="0">
                        <thead class="text-primary text-sm">
                            <th>
                                Employee ID #
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Date of Loan
                            </th>
                            <th>
                                DueDate
                            </th>
                            <th class="text-center">
                                ₱ Loan Amount
                            </th>
                            <th class="text-center">
                                Interest %
                            </th>
                            <th class="text-center">
                                ₱ Balance Remaining
                            </th>
                            <th class="text-center">
                                Action
                            </th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="tbl-misc" class="row" style="margin-top: -40px; display: none">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="header-title">
                    <div>
                        <h3>
                            Employee Miscellaneous
                        </h3>
                    </div>
                    <div>
                        <a href="#registration-form" data-target="#new-ca-form" data-toggle="modal" data-backdrop="static" class="btn btn-success btn-sm"><i class="material-icons">add</i> New</a>
                    </div>
                </div>
                <div class="header-line">
                    <hr>
                </div>
                <div class="table-responsive">
                    <table id="staffCA-table" class="table table-sm table-hover" cellspacing="0">
                        <thead class="text-primary text-sm">
                            <th>
                                Transaction #
                            </th>
                            <th>
                                Employee ID #
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Date of Cash Advance
                            </th>
                            <th class="text-center">
                                ₱ CA Amount
                            </th>
                            <th class="text-center">
                                Salary Deduction
                            </th>
                            <th class="text-center">
                                Action
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo date('Ydm'); ?>
                                </td>
                                <td>
                                    SM-202121023
                                </td>
                                <td>
                                    Sly Bacalso
                                </td>
                                <td>
                                    Jun 25, 2021
                                </td>
                                <td class="text-warning text-center">
                                    5500
                                </td>
                                <td class="text-danger text-center">
                                    5500
                                </td>
                                <td class="td-actions text-center">
                                    <button title="delete" type="button" class="btn btn-danger" rel="tooltip">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="tbl-damage" class="row" style="margin-top: -40px; display: none">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="header-title">
                    <div>
                        <h3>
                            Damages Record
                        </h3>
                    </div>
                    <div>
                        <button data-target="#new-damages-form" data-toggle="modal" data-backdrop="static" class="btn btn-success btn-sm"><i class="material-icons">add</i> New</button>
                    </div>
                </div>
                <div class="header-line">
                    <hr>
                </div>
                <div class="table-responsive">
                    <table id="staff-damages-table" class="table table-sm table-hover table-striped table-bordered" cellspacing="0">
                        <thead class="text-primary text-sm">
                            <th>
                                Employee ID #
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Issue Name
                            </th>
                            <th>
                                Date issue
                            </th>
                            <th class="text-center">
                                ₱ Total Damage Amount
                            </th>
                            <th class="text-center">
                                Salary Deduction
                            </th>
                            <th class="text-center">
                                Action
                            </th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="paid-tbl-damages" class="row" style="display: none">
    <div class="col-md-12">
        <div class="card card-plain">
            <div id="paid-staffDamages" class="card-header card-header-primary" style="cursor: pointer;">
                <h4 class="card-title mt-0">Click to show/hide paid damages</h4>
            </div>
            <div id="display-paid-staffDamages" class="card-body" style="display: none;">
                <div class="table-responsive">
                    <table id="paid-staff-damages-table" class="table table-sm table-hover table-striped table-bordered" cellspacing="0">
                        <thead class="text-primary text-sm">
                            <th>
                                Employee ID #
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Issue Name
                            </th>
                            <th>
                                Date issue
                            </th>
                            <th class="text-center">
                                ₱ Total Damage Amount
                            </th>
                            <th class="text-center">
                                Salary Deduction
                            </th>
                            <th class="text-center">
                                Action
                            </th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<form id="addStaffCA" method="POST" autocomplete="off">
    <div id="new-ca-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-header-title">
                        <h3 class="modal-title" id="exampleModalLabel">New Cash Advance</h3>
                        <p class="modal-title" id="exampleModalLabel">complete the form to submit</p>
                    </div>
                    <button class="close" id="btnclose" type="button" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <div class="u-search-input">
                        <div class="input-date">
                            <div class="material-textfield">
                                <input id="employee_number" placeholder=" " name="employee_number" type="text" style="width: auto;" required>
                                <label>Employee ID #</label>
                            </div>
                            <p>eg. EPTC-20210123</p>
                        </div>
                        <div class="input-date">
                            <div class="material-textfield">
                                <input id="employee_name" placeholder=" " name="employee_name" type="text" style="width: auto;" required>
                                <label>Employee Name</label>
                            </div>
                            <p>eg. John Doe</p>
                        </div>
                        <div class="input-date">
                            <div class="material-textfield">
                                <input id="ca_amount" placeholder=" " name="ca_amount" type="number" step="0.01" style="width: auto;" required>
                                <label> ₱ Amount of Cash Advance</label>
                            </div>
                            <p>eg. 5500</p>
                        </div>
                    </div>
                    <div class="remark-field" style="display: flex; justify-content: space-between; margin-top: 20px;">
                        <div class="input-date">
                            <div class="material-textfield">
                                <!-- ca_date: $("#ca_date").val() -->
                                <input id="ca_date" placeholder=" " name="ca_date" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" value="<?php echo date("Y-m-d", strtotime(date('Y-m-d'))); ?>" required>
                                <label>Date</label>
                            </div>
                            <p>click the calendar button</p>
                        </div>
                        <div>
                            <div class="material-textfield">
                                <input id="ca_remarks" placeholder=" " name="ca_remarks" type="text" required style="width: 537px;">
                                <label>Purpose of Cash Advance</label>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Footer Buttons -->
                <div class="modal-footer" style="height: 75px">
                    <button type="submit" name="addstaffCA" class="btn btn-success btn-md">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form id="updateStaffCA" method="POST" autocomplete="off">
    <div id="update-ca-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-header-title">
                        <h3 class="modal-title" id="exampleModalLabel">New Cash Advance</h3>
                        <p class="modal-title" id="exampleModalLabel">complete the form to submit</p>
                    </div>
                    <button class="close" id="btnclose" type="button" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <div class="u-search-input">
                        <div class="input-date">
                            <div class="material-textfield">
                                <input id="employee_number" placeholder=" " name="employee_number" type="text" style="width: auto;" readonly required>
                                <label>Employee ID #</label>
                            </div>
                            <p>eg. EPTC-20210123</p>
                        </div>
                        <div class="input-date">
                            <div class="material-textfield">
                                <input id="employee_name" placeholder=" " name="employee_name" type="text" style="width: auto;" readonly required>
                                <label>Employee Name</label>
                            </div>
                            <p>eg. John Doe</p>
                        </div>
                        <div class="input-date">
                            <div class="material-textfield">
                                <input id="ca_amount" placeholder=" " name="ca_amount" type="number" step="0.01" style="width: auto;" readonly required>
                                <label> ₱ Balance</label>
                            </div>
                            <p>eg. 5500</p>
                        </div>
                    </div>
                    <div class="remark-field" style="display: flex; justify-content: space-between; margin-top: 20px;">
                        <div class="input-date">
                            <div class="material-textfield">
                                <!-- ca_date: $("#ca_date").val() -->
                                <input id="ca_date" placeholder=" " name="ca_date" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" value="<?php echo date("Y-m-d", strtotime(date('Y-m-d'))); ?>" readonly required>
                                <label>Date</label>
                            </div>
                            <p>click the calendar button</p>
                        </div>
                        <div>
                            <div class="material-textfield">
                                <input id="ca_remarks" placeholder=" " name="ca_remarks" type="text" readonly required style="width: 537px;">
                                <label>Purpose of Cash Advance</label>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Footer Buttons -->
                <div class="modal-footer" style="height: 90px">
                    <div class="input-date" style="margin-top: 25px;">
                        <div class="material-textfield">
                            <input id="ca_pay_amount" placeholder=" " name="ca_pay_amount" type="number" step="0.01" style="width: auto;" required>
                            <label> ₱ Amount to Pay</label>
                        </div>
                        <p>eg. 5500</p>
                    </div>
                    <button type="submit" name="addstaffCA" class="btn btn-success btn-md">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form id="addStaffLoan" method="POST" autocomplete="off">
    <div id="new-loan-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-header-title">
                        <h3 class="modal-title" id="exampleModalLabel">New Loan</h3>
                        <p class="modal-title" id="exampleModalLabel">complete the form to submit</p>
                    </div>
                    <button class="close" id="btnclose" type="button" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <div class="u-search-input">
                        <div class="input-date">
                            <div class="material-textfield">
                                <input id="employee_id" placeholder=" " name="employee_id" type="text" style="width: auto;" required>
                                <label>Employee ID #</label>
                            </div>
                            <p>eg. EPTC-20210123</p>
                        </div>
                        <div class="input-date">
                            <div class="material-textfield">
                                <input id="employee_name" placeholder=" " name="employee_name" type="text" style="width: auto;" required>
                                <label>Employee Name</label>
                            </div>
                            <p>eg. John Doe</p>
                        </div>
                        <div class="input-date">
                            <div class="material-textfield">
                                <input id="loan_amount" placeholder=" " name="loan_amount" type="number" step="0.01" style="width: auto;" required>
                                <label> ₱ Amount of Loan</label>
                            </div>
                            <p>eg. 5500</p>
                        </div>
                    </div>
                    <div class="remark-field" style="display: flex; justify-content: space-between; margin-top: 20px;">
                        <div style="display: flex">
                            <div class="input-date">
                                <div class="material-textfield">
                                    <input id="date_of_loan" placeholder=" " name="date_of_loan" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" value="<?php echo date("Y-m-d", strtotime(date('Y-m-d'))); ?>" required>
                                    <label>Date</label>
                                </div>
                                <p>click the calendar button</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <input id="due_date" placeholder=" " name="due_date" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" required>
                                    <label>Due Date</label>
                                </div>
                                <p>click the calendar button</p>
                            </div>
                            <div>
                                <div class="material-textfield">
                                    <input id="loan_interest" placeholder=" " name="loan_interest" type="text" required style="width: 120px;">
                                    <label>Interest %</label>
                                </div>
                            </div>
                        </div>
                        <div style="display: flex;">

                            <div>
                                <div class="material-textfield">
                                    <input id="loan_balance" placeholder=" " name="loan_balance" type="text" readonly value="0" style="width: auto;">
                                    <label>₱ Total Loan Amount</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="remark-field" style="margin-top: 20px">
                        <div>
                            <div class="material-textfield">
                                <input id="loan_remarks" placeholder=" " name="loan_remarks" type="text" required style="width: 727px;">
                                <label>Purpose of Cash Advance</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Buttons -->
                <div class="modal-footer" style="height: 75px">
                    <button type="submit" name="addstaffCA" class="btn btn-success btn-md">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form id="updateStaffLoan" method="POST" autocomplete="off">
    <div id="update-loan-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-header-title">
                        <h3 class="modal-title" id="exampleModalLabel">New Loan</h3>
                        <p class="modal-title" id="exampleModalLabel">complete the form to submit</p>
                    </div>
                    <button class="close" id="btnclose" type="button" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <div class="u-search-input">
                        <div class="input-date">
                            <div class="material-textfield">
                                <input id="employee_id" placeholder=" " name="employee_id" type="text" style="width: auto;" readonly required>
                                <label>Employee ID #</label>
                            </div>
                            <p>eg. EPTC-20210123</p>
                        </div>
                        <div class="input-date">
                            <div class="material-textfield">
                                <input id="employee_name" placeholder=" " name="employee_name" type="text" style="width: auto;" readonly required>
                                <label>Employee Name</label>
                            </div>
                            <p>eg. John Doe</p>
                        </div>
                        <div class="input-date">
                            <div class="material-textfield">
                                <input id="loan_amount" placeholder=" " name="loan_amount" type="number" step="0.01" style="width: auto;" readonly required>
                                <label> ₱ Amount of Loan</label>
                            </div>
                            <p>eg. 5500</p>
                        </div>
                    </div>
                    <div class="remark-field" style="display: flex; justify-content: space-between; margin-top: 20px;">
                        <div style="display: flex">
                            <div class="input-date">
                                <div class="material-textfield">
                                    <input id="date_of_loan" placeholder=" " name="date_of_loan" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" value="<?php echo date("Y-m-d", strtotime(date('Y-m-d'))); ?>" readonly required>
                                    <label>Date</label>
                                </div>
                                <p>click the calendar button</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <input id="due_date" placeholder=" " name="due_date" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" readonly required>
                                    <label>Due Date</label>
                                </div>
                                <p>click the calendar button</p>
                            </div>
                            <div>
                                <div class="material-textfield">
                                    <input id="loan_interest" placeholder=" " name="loan_interest" type="text" readonly required style="width: 120px;">
                                    <label>Interest %</label>
                                </div>
                            </div>
                        </div>
                        <div style="display: flex;">

                            <div>
                                <div class="material-textfield">
                                    <input id="loan_balance" placeholder=" " name="loan_balance" type="text" readonly value="0" style="width: auto;">
                                    <label>₱ Remaining Balance</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="remark-field" style="margin-top: 20px">
                        <div>
                            <div class="material-textfield">
                                <input id="loan_remarks" placeholder=" " name="loan_remarks" type="text" readonly required style="width: 727px;">
                                <label>Purpose of Cash Advance</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Buttons -->
                <div class="modal-footer" style="height: 90px">
                    <div class="input-date" style="margin-top: 25px;">
                        <div class="material-textfield">
                            <input id="loan_pay_amount" placeholder=" " name="loan_pay_amount" type="number" step="0.01" style="width: auto;" required>
                            <label> ₱ Amount to Pay</label>
                        </div>
                        <p>eg. 5500</p>
                    </div>
                    <button type="submit" name="updatestaffCA" class="btn btn-success btn-md">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form id="addStaffDamages" method="POST" autocomplete="off">
    <div id="new-damages-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-header-title">
                        <h3 class="modal-title" id="exampleModalLabel">New Employee Damage Issue</h3>
                        <p class="modal-title" id="exampleModalLabel">complete the form to submit</p>
                    </div>
                    <button class="close" id="btnclose" type="button" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <div class="u-search-input">
                        <div style="display: flex;">
                            <div class="input-date" style="margin-right: 10px">
                                <div class="material-textfield">
                                    <input id="employee_number" placeholder=" " name="employee_number" type="text" style="width: auto;" required>
                                    <label>Employee ID #</label>
                                </div>
                                <p>eg. EPTC-20210123</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <input id="employee_name" placeholder=" " name="employee_name" type="text" style="width: auto;" required>
                                    <label>Employee Name</label>
                                </div>
                                <p>eg. John Doe</p>
                            </div>
                        </div>
                        <div class="input-date">
                            <div class="material-textfield">
                                <!-- ca_date: $("#ca_date").val() -->
                                <input id="date_issue" placeholder=" " name="date_issue" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" value="<?php echo date("Y-m-d", strtotime(date('Y-m-d'))); ?>" required>
                                <label>Date Issue</label>
                            </div>
                            <p>click the calendar button</p>
                        </div>
                    </div>
                    <div class="remark-field" style="display: flex; margin-top: 20px;">
                        <div class="input-date" style="margin-right: 10px">
                            <div class="material-textfield">
                                <input id="damage_amount" placeholder=" " name="damage_amount" type="number" step="0.01" style="width: auto;" required>
                                <label> ₱ Amount of Damage</label>
                            </div>
                            <p>eg. 5500</p>
                        </div>
                        <div>
                            <div class="material-textfield">
                                <input id="issue_name" placeholder=" " name="issue_name" type="text" required style="width: auto;">
                                <label>Issue Name</label>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Footer Buttons -->
                <div class="modal-footer" style="height: 75px">
                    <button type="submit" name="addstaffCA" class="btn btn-success btn-md">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>


<form id="updateStaffDamages" method="POST" autocomplete="off">
    <div id="update-damages-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-header-title">
                        <h3 class="modal-title" id="exampleModalLabel">Pay Employee Damage Issue</h3>
                        <p class="modal-title" id="exampleModalLabel">complete the form to submit</p>
                    </div>
                    <button class="close" id="btnclose" type="button" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <div class="u-search-input">
                        <div style="display: flex;">
                            <div class="input-date" style="margin-right: 10px">
                                <div class="material-textfield">
                                    <input id="employee_number" placeholder=" " name="employee_number" type="text" style="width: auto;" readonly required>
                                    <label>Employee ID #</label>
                                </div>
                                <p>eg. EPTC-20210123</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <input id="employee_name" placeholder=" " name="employee_name" type="text" style="width: auto;" readonly required>
                                    <label>Employee Name</label>
                                </div>
                                <p>eg. John Doe</p>
                            </div>
                        </div>
                        <div class="input-date">
                            <div class="material-textfield">
                                <!-- ca_date: $("#ca_date").val() -->
                                <input id="date_issue" placeholder=" " name="date_issue" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" value="<?php echo date("Y-m-d", strtotime(date('Y-m-d'))); ?>" readonly required>
                                <label>Date Issue</label>
                            </div>
                            <p>click the calendar button</p>
                        </div>
                    </div>
                    <div class="remark-field" style="display: flex; margin-top: 20px;">
                        <div class="input-date" style="margin-right: 10px">
                            <div class="material-textfield">
                                <input id="damage_amount" placeholder=" " name="damage_amount" type="number" step="0.01" style="width: auto;" readonly required>
                                <label> ₱ Amount of Damage</label>
                            </div>
                            <p>eg. 5500</p>
                        </div>
                        <div>
                            <div class="material-textfield" style="margin-right: 23px">
                                <input id="issue_name" placeholder=" " name="issue_name" type="text" readonly required style="width: auto;">
                                <label>Issue Name</label>
                            </div>
                        </div>
                        <div class="input-date">
                            <div class="material-textfield">
                                <input id="damage_amount_balance" placeholder=" " name="damage_amount_balance" type="number" step="0.01" style="width: auto;" readonly required>
                                <label> ₱ Balance</label>
                            </div>
                            <p>eg. 5500</p>
                        </div>
                    </div>
                </div>

                <!-- Footer Buttons -->
                <div class="modal-footer" style="height: 90px">
                    <div class="input-date" style="margin-top: 20px">
                        <div class="material-textfield">
                            <input id="pay_damage_amount" placeholder=" " name="pay_damage_amount" type="number" step="0.01" style="width: auto;" required>
                            <label> ₱ Amount to Pay</label>
                        </div>
                        <p>eg. 5500</p>
                    </div>
                    <button type="submit" name="addstaffCA" class="btn btn-success btn-md">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>