<div class="row" style="margin-top: -40px;">
    <div class="col-md-12">
        <div class="card" style="max-height: 120px;">
            <div class="card-body">
                <div class="header-title">
                    <div style="margin-bottom: 9px;">
                        <h3>
                            Search Employee's DTR
                        </h3>
                    </div>
                    <div>
                        <div class="search-container" style="margin-top: 30px; margin-bottom: 20px;">
                            <div class="u-search-input">
                                <div>
                                    <div class="material-textfield">
                                        <input id="search_data" placeholder=" " type="text" autocomplete="off">
                                        <label>Search Employee</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="margin-top: -50px;">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="header-title">
                    <h3 id="EmployeeName">
                    </h3>
                </div>
                <div class="header-line">
                    <hr>
                </div>
                <div class="table-responsive">
                    <table id="employee-dtr-record-table" class="table table-sm table-hover" cellspacing="0">
                        <thead class="text-primary text-sm">
                            <th>
                                Date
                            </th>
                            <th>
                                Employee ID#
                            </th>
                            <th>
                                Employee Name
                            </th>
                            <th>
                                Time In
                            </th>
                            <th>
                                Time Out
                            </th>
                            <th>
                                OverTime In
                            </th>
                            <th>
                                OverTime
                            </th>
                            <th>
                                Total
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

<form id="updateEmployeeDTR" autocomplete="off">
    <div id="update-time-in-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-header-title">
                        <h3 class="modal-title" id="exampleModalLabel">Update</h3>
                        <p class="modal-title" id="exampleModalLabel">Update Employee Time-In/Out</p>
                    </div>

                    <button class="close" id="btnclose" type="button" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    <div class="update-time-in-form">
                        <div class="material-textfield">
                            <input id="start_date" placeholder=" " name="start_date" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" value="">
                            <label>Start Date</label>
                        </div>
                        <div class="material-textfield" style="margin-right: 0px;">
                            <input id="time_in" placeholder=" " name="time_in" type="time" required style="width: 160px;">
                            <label>Time In</label>
                        </div>
                        <div class="material-textfield">
                            <input id="end_date" placeholder=" " name="end_date" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" value="">
                            <label>End Date</label>
                        </div>
                        <div class="material-textfield" style="margin-right: 0px;">
                            <input id="time_out" placeholder=" " name="time_out" type="time" required style="width: 160px;">
                            <label>Time Out</label>
                        </div>

                    </div>
                    <div class="update-time-in-form">
                        <div class="material-textfield">
                            <input id="ot_start_date" placeholder=" " name="ot_start_date" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" value="">
                            <label>OT Start Date</label>
                        </div>
                        <div class="material-textfield" style="margin-right: 0px;">
                            <input id="over_time_in" placeholder=" " name="over_time_in" type="time" style="width: 160px;">
                            <label>Over Time In</label>
                        </div><div class="material-textfield">
                            <input id="ot_end_date" placeholder=" " name="ot_end_date" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" value="">
                            <label>OT End Date</label>
                        </div>
                        <div class="material-textfield" style="margin-right: 0px;">
                            <input id="over_time_out" placeholder=" " name="over_time_out" type="time" style="width: 160px;">
                            <label>Over Time Out</label>
                        </div>
                    </div>
                </div>

                <!-- Footer Buttons -->
                <div class="modal-footer" style="height: 75px">
                    <input id="dtr_id" type="hidden" name="dtr_id">
                    <div class="material-textfield" style="margin-right: 0px;">
                        <input id="acc_username" placeholder=" " name="acc_username" type="text" required style="width: 200px;" readonly value="<?php echo $_SESSION['username']; ?>">
                        <label>Edited By</label>
                    </div>
                    <div class="material-textfield" style="margin-right: 0px;">
                        <input id="acc_password" placeholder=" " name="acc_password" type="password" required style="width: 200px;">
                        <label>Input Admin Password</label>
                    </div>
                    <button type="submit" name="UpdateSalary" class="btn btn-success btn-md">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>