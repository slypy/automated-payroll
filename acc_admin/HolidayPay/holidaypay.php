<div class="row" style="margin-top: -45px;">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="header-title">
                    <h3>
                        Holiday Pay
                    </h3>
                    <div>
                        <a href="#add-holiday-form" data-target="#add-holiday-pay-form" data-toggle="modal" data-backdrop="static" class="btn btn-primary btn-sm"> <i class="material-icons">add</i>Create Holiday Pay for today</a>
                    </div>
                </div>
                <div class="header-line">
                    <hr>
                </div>

                <div class="table-responsive">
                    <table id="holiday-pay-table" class="table table-hover table-striped table-bordered">
                        <thead class="text-info">
                            <th>
                                Holiday Name
                            </th>
                            <th>
                                Date
                            </th>
                            <th width="150">
                                None Over Time
                            </th>
                            <th width="150">
                                Over Time
                            </th>
                            <th class="text-center" width="100">Action</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<form id="addHolidayPay" method="POST" autocomplete="off">
    <div id="add-holiday-pay-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-header-title">
                        <h3 class="modal-title" id="exampleModalLabel">Holiday Pay as of today </h3>
                        <p class="modal-title" id="exampleModalLabel"><?php echo date('(D) M d, Y', strtotime(date('Y-m-d'))); ?></p>
                    </div>

                    <button class="close" id="btnclose" type="button" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    <div class="position-container" style="margin-bottom: 25px; margin-left: -5px;">
                        <div class="material-textfield">
                            <input id="holiday_name" placeholder=" " name="holiday_name" type="text" required style="width: 210px;">
                            <label>Holiday Name</label>
                        </div>
                        <div class="material-textfield" style="margin-right: -5px;">
                            <input id="holiday_date" placeholder=" " name="holiday_date" class="holidate" type="date" data-date="" data-date-format="MMM DD, YYYY" required style="width: 210px;">
                            <label>Date</label>
                        </div>
                    </div>
                    <div class="position-container" style="justify-content: space-between;">
                        <div class="input-date" style="margin-left: -5px;">
                            <div class="material-textfield">
                                <input id="none_over_time_percent" placeholder=" " name="none_over_time_percent" class="fn" type="text" required style="width: 210px;">
                                <label>None OT %</label>
                            </div>
                            <p>eg. 10, 25, 50, 100</p>
                        </div>
                        <div class="input-date" style="margin-right: -5px;">
                            <div class="material-textfield">
                                <input id="over_time_percent" placeholder=" " name="over_time_percent class="fn" type="text" required style="width: 210px;">
                                <label>Over Time %</label>
                            </div>
                            <p>eg. 10, 25, 50, 100</p>
                        </div>
                    </div>
                </div>
                <!-- Footer Buttons -->
                <div class="modal-footer" style="height: 75px">
                    <button type="submit" name="add_holiday_pay" class="btn btn-success btn-md">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form id="updateHolidayPay" method="POST" autocomplete="off">
    <div id="update-holiday-pay-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-header-title">
                        <h3 class="modal-title" id="exampleModalLabel">Holiday Pay as of today </h3>
                        <p class="modal-title" id="exampleModalLabel"><?php echo date('(D) M d, Y', strtotime(date('Y-m-d'))); ?></p>
                    </div>

                    <button class="close" id="btnclose" type="button" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    <div class="position-container" style="margin-bottom: 25px; margin-left: -5px;">
                        <div class="material-textfield">
                            <input id="holiday_name" placeholder=" " name="holiday_name" type="text" required style="width: 210px;">
                            <label>Holiday Name</label>
                        </div>
                        <div class="material-textfield" style="margin-right: -5px;">
                            <input id="holiday_date" placeholder=" " name="holiday_date" class="holidate" type="date" data-date="" data-date-format="MMM DD, YYYY" required style="width: 210px;">
                            <label>Date</label>
                        </div>
                    </div>
                    <div class="position-container" style="justify-content: space-between;">
                        <div class="input-date" style="margin-left: -5px;">
                            <div class="material-textfield">
                                <input id="none_over_time_percent" placeholder=" " name="none_over_time_percent" class="fn" type="text" required style="width: 210px;">
                                <label>None OT %</label>
                            </div>
                            <p>eg. 10, 25, 50, 100</p>
                        </div>
                        <div class="input-date" style="margin-right: -5px;">
                            <div class="material-textfield">
                                <input id="over_time_percent" placeholder=" " name="over_time_percent class="fn" type="text" required style="width: 210px;">
                                <label>Over Time %</label>
                            </div>
                            <p>eg. 10, 25, 50, 100</p>
                        </div>
                    </div>
                </div>
                <!-- Footer Buttons -->
                <div class="modal-footer" style="height: 75px">
                    <button type="submit" class="btn btn-success btn-md">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>