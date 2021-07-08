<div class="row" style="margin-top: -25px;">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Over Time Maximum Hours</h4>
            </div>
            <div class="card-body table-responsive">
                <table id="over-time-table" class="table table-sm table-hover table-striped table-bordered" cellspacing="0">
                    <thead class="text-primary text-sm">
                        <th>
                            
                        </th>
                        <th>
                            Max Working Hours
                        </th>
                        <th class="text-center" width=100>
                            Action
                        </th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <h4 class="card-title">Late Policy</h4>
            </div>
            <div class="card-body table-responsive">
                <table id="late-policy-table" class="table table-sm table-hover table-striped table-bordered" cellspacing="0">
                    <thead class="text-primary text-sm">
                        <th>
                            Late After
                        </th>
                        <th>
                            Penalty
                        </th>
                        <th class="text-center" width=100>
                            Action
                        </th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row" style="margin-top: -25px;">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="header-title">
                    <h3>
                        Shifting Schedules
                    </h3>
                    <div>
                        <a href="#add-custom-shifting-type-form" data-target="#add-custom-shifting-type-form" data-toggle="modal" data-backdrop="static" class="btn btn-primary btn-sm"> <i class="material-icons">add</i> Add custom shifting hours</a>
                    </div>
                </div>
                <div class="header-line">
                    <hr>
                </div>
                <div class="table-responsive">
                    <table id="employee-shifting-hours-table" class="table table-sm table-hover table-striped table-bordered" cellspacing="0">
                        <thead class="text-primary text-sm">
                            <th>
                                Name
                            </th>
                            <th>
                                Start Time
                            </th>
                            <th>
                                End Time
                            </th>
                            <th>
                                Break Time
                            </th>
                            <th>
                                Total Maximum Working Hours
                            </th>
                            <th class="text-center" width=100>
                                Action
                            </th>
                        </thead>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<form id="addShiftingHours" method="POST" autocomplete="off">
    <div id="add-custom-shifting-type-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-header-title">
                        <h3 class="modal-title" id="exampleModalLabel">Custom Shifting Type form</h3>
                        <p class="modal-title" id="exampleModalLabel">Add new shifting type</p>
                    </div>

                    <button class="close" id="btnclose" type="button" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    <div class="remark-field" style="margin-bottom: 25px; margin-left: -10px;">
                        <div class="material-textfield">
                            <input id="shifting_type_name" placeholder=" " name="shifting_type_name" type="text" required style="width: 450px;">
                            <label>Shifting Type Name</label>
                        </div>
                    </div>
                    <div class="new-custom-shifting">
                        <div class="material-textfield" style="margin-right: 0px;">
                            <input id="start_time" placeholder=" " name="start_time" type="time" required style="width: 135px;">
                            <label>Start Time</label>
                        </div>
                        <div class="material-textfield" style="margin-right: 0px;">
                            <input id="end_time" placeholder=" " name="end_time" type="time" required style="width: 135px;">
                            <label>End Time</label>
                        </div>
                        <div class="input-date">
                            <div class="material-textfield">
                                <input id="break_time" placeholder=" " name="break_time" type="number" step="0.01" required style="width: 160px;">
                                <label>Break Time</label>
                            </div>
                            <p>
                                eg. 2.6 = 2 hours and 6 mins
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Footer Buttons -->
                <div class="modal-footer" style="height: 75px">
                    <button type="submit" name="add_shifting_type" class="btn btn-success btn-md">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>


<form id="updateShiftingHours" method="POST" autocomplete="off">
    <div id="update-custom-shifting-type-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-header-title">
                        <h3 class="modal-title" id="exampleModalLabel">Custom Shifting Type form</h3>
                        <p class="modal-title" id="exampleModalLabel">Update selected shifting type</p>
                    </div>

                    <button class="close" id="btnclose" type="button" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    <div class="remark-field" style="margin-bottom: 25px; margin-left: -10px;">
                        <div class="material-textfield">
                            <input id="shifting_type_name" placeholder=" " name="shifting_type_name" type="text" required style="width: 450px;">
                            <label>Shifting Type Name</label>
                        </div>
                    </div>
                    <div class="new-custom-shifting">
                        <div class="material-textfield" style="margin-right: 0px;">
                            <input id="start_time" placeholder=" " name="start_time" type="time" required style="width: 135px;">
                            <label>Start Time</label>
                        </div>
                        <div class="material-textfield" style="margin-right: 0px;">
                            <input id="end_time" placeholder=" " name="end_time" type="time" required style="width: 135px;">
                            <label>End Time</label>
                        </div>
                        <div class="input-date">
                            <div class="material-textfield">
                                <input id="break_time" placeholder=" " name="break_time" type="number" step="0.01" required style="width: 160px;">
                                <label>Break Time</label>
                            </div>
                            <p>
                                eg. 2.6 = 2 hours and 6 mins
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Footer Buttons -->
                <div class="modal-footer" style="height: 75px">
                    <button type="submit" name="update_shifting_type" class="btn btn-success btn-md">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form id="updateOverTime" method="POST" autocomplete="off">
    <div id="update-over-time-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-header-title">
                        <h3 class="modal-title" id="exampleModalLabel">Over Time hours</h3>
                        <p class="modal-title" id="exampleModalLabel">Update over time maximum hours</p>
                    </div>

                    <button class="close" id="btnclose" type="button" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    <div style="display: flex; justify-content: space-between;">
                        <div class="input-date">
                            <div class="material-textfield">
                                <input id="overtime_hours" placeholder=" " name="overtime_hours" type="number" required style="width: 200px;">
                                <label>Hours</label>
                            </div>
                            <p>
                                eg. 0, 4, 10...
                            </p>
                        </div>
                        <div class="input-date">
                            <div class="material-textfield">
                                <input id="overtime_minutes" placeholder=" " name="overtime_minutes" type="number" required style="width: 200px;">
                                <label>Minutes</label>
                            </div>
                            <p>
                                eg. 0, 5, 30...
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Footer Buttons -->
                <div class="modal-footer" style="height: 75px">
                    <button type="submit" name="update_overtime_hours" class="btn btn-success btn-md">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form id="updateLatePolicy" method="POST" autocomplete="off">
    <div id="update-late-policy-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-header-title">
                        <h3 class="modal-title" id="exampleModalLabel">Late Time Policy</h3>
                        <p class="modal-title" id="exampleModalLabel">Update Late Time Policy</p>
                    </div>

                    <button class="close" id="btnclose" type="button" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    <div style="display: flex; justify-content: space-between;">
                        <div class="input-date">
                            <div class="material-textfield">
                                <input id="latepolicy_hours" placeholder=" " name="overtime_hours" type="number" required style="width: 100px;">
                                <label>Hours</label>
                            </div>
                            <p>
                                eg. 0, 4, 10...
                            </p>
                        </div>
                        <div class="input-date">
                            <div class="material-textfield">
                                <input id="latepolicy_minutes" placeholder=" " name="overtime_minutes" type="number" required style="width: 100px;">
                                <label>Minutes</label>
                            </div>
                            <p>
                                eg. 05, 10, 33...
                            </p>
                        </div>
                        <div class="input-date">
                            <div class="material-textfield">
                                <input id="penalty_amount" placeholder=" " name="penalty_amount" type="number" required style="width: 200px;" step="0.01">
                                <label>₱ Penalty Amount</label>
                            </div>
                            <p>
                                eg. 20, 56.2, 30...
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Footer Buttons -->
                <div class="modal-footer" style="height: 75px">
                    <button type="submit" name="update_overtime_hours" class="btn btn-success btn-md">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>