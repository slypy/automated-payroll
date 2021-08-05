<div class="row" style="margin-top: -45px;">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="header-title">
                    <h3>
                        Job Positions
                    </h3>
                    <div>
                        <a href="#add-custom-shifting-type-form" data-target="#add-job-position-form" data-toggle="modal" data-backdrop="static" class="btn btn-primary btn-sm"> <i class="material-icons">add</i> New Job Position</a>
                    </div>
                </div>
                <div class="header-line">
                    <hr>
                </div>

                <div class="table-responsive">
                    <table id="position-table" class="table table-hover">
                        <thead class="text-info">
                            <th>
                                Position List
                            </th>
                            <th class="text-center">
                                Salary
                            </th>
                            <th class="text-center">
                                Wage Type
                            </th>
                            <th class="text-center" width="100">Action</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<form id="addJobPosition" method="POST" autocomplete="off">
    <div id="add-job-position-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-header-title">
                        <h3 class="modal-title" id="exampleModalLabel">New Job Position Form</h3>
                        <p class="modal-title" id="exampleModalLabel">Add new job position</p>
                    </div>

                    <button class="close" id="btnclose" type="button" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    <div class="position-container" style="margin-bottom: 20px; margin-left: -5px;">
                        <div class="material-textfield">
                            <input id="position_name" placeholder=" " name="position_name" type="text" required style="width: 437px;">
                            <label>Position Name</label>
                        </div>
                    </div>
                    <div class="position-container" style="justify-content: space-between;">
                        <div class="select" style="width: 210px;">
                            <select id="wage_type" class="select-text" name="wage_type" required style="width: 210px;">
                                <option value="Per Hour" selected>Per Hour</option>
                                <option value="Per Day">Per Day</option>
                            </select>
                            <label class="select-label">Wage Type</label>
                        </div>
                        <div class="material-textfield" style="margin-right: -5px;">
                            <input id="wage_salary" placeholder=" " name="wage_salary" type="number" step="0.01" required style="width: 210px;">
                            <label>₱</label>
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

<form id="updateJobPosition" method="POST" autocomplete="off">
    <div id="update-job-position-form" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-header-title">
                        <h3 class="modal-title" id="exampleModalLabel">New Job Position Form</h3>
                        <p class="modal-title" id="exampleModalLabel">Add new job position</p>
                    </div>

                    <button class="close" id="btnclose" type="button" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    <div class="position-container" style="margin-bottom: 20px; margin-left: -5px;">
                        <div class="material-textfield">
                            <input id="position_name" placeholder=" " name="position_name" type="text" required style="width: 437px;">
                            <label>Position Name</label>
                        </div>
                    </div>
                    <div class="position-container" style="justify-content: space-between;">
                        <div class="select" style="width: 210px;">
                            <select id="wage_type" class="select-text" name="wage_type" required style="width: 210px;">
                                <option value="Per Hour" selected>Per Hour</option>
                                <option value="Per Day">Per Day</option>
                            </select>
                            <label class="select-label">Wage Type</label>
                        </div>
                        <div class="material-textfield" style="margin-right: -5px;">
                            <input id="wage_salary" placeholder=" " name="wage_salary" type="number" step="0.01" required style="width: 210px;">
                            <label>₱</label>
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