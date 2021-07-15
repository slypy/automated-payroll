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
                        <a href="#loan-form" data-target="#loan-form" data-toggle="modal" data-backdrop="static" class="btn btn-success btn-sm"><i class="material-icons">add</i> New</a>
                    </div>
                </div>
                <div class="header-line">
                    <hr>
                </div>
                <div class="table-responsive">
                    <table id="loan-table" class="table table-sm table-hover" cellspacing="0">
                        <thead class="text-primary text-sm">
                            <th>
                                Loan #
                            </th>
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
                                Intereset %
                            </th>
                            <th class="text-center">
                                ₱ Balance Remaining
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
                                <td>
                                    Jun 30, 2021
                                </td>
                                <td class="text-warning text-center">
                                    5500
                                </td>
                                <td class="text-success text-center">
                                    10
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
                                <input id="ca_date" placeholder=" " name="ca_date" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" value="<?php echo date("Y-m-d", strtotime(date('Y-m-d'))); ?>"  required>
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