<div class="row" style="margin-top: -40px;">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="header-title">
                    <h3>
                        Real Time DTR <?php echo date('(D) M d, Y', strtotime(date('Y-m-d'))); ?>
                    </h3>
                </div>
                <div class="header-line">
                    <hr>
                </div>
                <div class="table-responsive">
                    <table id="employee-dtr-table" class="table table-sm table-hover table-bordered" cellspacing="0">
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
                                Regular Time
                            </th>
                            <th>
                                Over Time In
                            </th>
                            <th>
                                Over Time Out
                            </th>
                            <th>
                                Total
                            </th>
                        </thead>
                    </table>
                </div>
                <div>

                </div>
            </div>
        </div>
    </div>
</div>

<form id="addDTRRecord">
    <div id="add-dtr-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-header-title">
                        <h3 class="modal-title" id="exampleModalLabel">Manually Add DTR</h3>
                        <p class="modal-title" id="exampleModalLabel">this form will input employee's DTR when device is down</p>
                    </div>

                    <button class="close" id="btnclose" type="button" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    <div style="display: flex; justify-content: space-between; flex-wrap: wrap; flex-grow: 3;">
                        <div class="material-textfield" style="margin-right: 0px;">
                            <input id="employee_id" placeholder=" " name="employee_id" type="text" required style="width: 220px;">
                            <label>Employee ID</label>
                        </div>
                        <div class="material-textfield" style="margin-right: 0px;">
                            <input id="employee_name" placeholder=" " name="employee_name" type="text" required style="width: 220px;">
                            <label>Employee Name</label>
                        </div>
                        <div class="select">
                            <select id="type" name="type" class="select-text" style="background-color: white;">
                                <option value="Time In" selected>Time In</option>
                                <option value="Time Out">Time Out</option>
                                <option value="Over Time In">Over Time In</option>
                                <option value="Over Time Out">Over Time Out</option>
                            </select>
                            <label class="select-label" style="border-radius: 5px;">Type</label>
                        </div>
                        <div class="material-textfield" style="margin-top: 20px;">
                            <input id="date" placeholder=" " name="date" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" value="<?php echo date("Y-m-d", strtotime(date('Y-m-d'))); ?>">
                            <label>Date</label>
                        </div>
                        <div id="time_in" class="material-textfield" style=" display: none;   margin-top: 20px">
                            <input id="i_time_in" placeholder=" " name="time_in" type="time" style="width: 220px;" value="<?php echo date("H:i", strtotime(date('Y-m-d H:i'))); ?>">
                            <label>Time In</label>
                        </div>
                        <div id="time_out" class="material-textfield" style=" display: none;  margin-top: 20px">
                            <input id="i_time_out" placeholder=" " name="time_out" type="time" style="width: 220px;" value="">
                            <label>Time Out</label>
                        </div>
                        <div id="over_time_in" class="material-textfield" style="display: none;  margin-top: 20px">
                            <input id="i_over_time_in" placeholder=" " name="over_time_in" type="time" style="width: 220px;" value="">
                            <label>Time In</label>
                        </div>
                        <div id="over_time_out" class="material-textfield" style="margin-top: 20px; display: none;">
                            <input id="i_over_time_out" placeholder=" " name="over_time_out" type="time" style="width: 220px;" value="">
                            <label>Over Time Out</label>
                        </div>
                    </div>
                </div>

                <!-- Footer Buttons -->
                <div class="modal-footer" style="height: 75px">
                    <button type="submit" name="addDTR" class="btn btn-success btn-md">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>