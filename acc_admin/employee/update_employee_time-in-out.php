<form action="" method="post" style="margin-top: -40px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="max-height: 170px;">
                <div class="card-body">
                    <div class="header-title">
                        <h3>
                            Search Employee
                        </h3>
                    </div>
                    <div class="header-line">
                        <hr>
                    </div>
                    <div class="search-container">
                        <div class="date-input">
                            <div class="input-date">
                                <div class="material-textfield">
                                    <input id="endDate" placeholder=" " name="EndDate" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" required>
                                    <label>Date From</label>
                                </div>
                                <p>click the calendar button</p>
                            </div>
                            <div class="input-date">
                                <div class="material-textfield">
                                    <input id="endDate" placeholder=" " name="EndDate" type="date" data-date="" data-date-format="MMM DD, YYYY" style="width: auto;" required>
                                    <label>Date Until</label>
                                </div>
                                <p>click the calendar button</p>
                            </div>
                        </div>
                        <div class="u-search-input">
                            <div>
                                <div class="material-textfield">
                                    <input id="search" placeholder=" " name="FirstName" type="text" autocomplete="off" onkeyup="searchDB(this);" required>
                                    <label>Search Employee</label>
                                </div>
                            </div>

                            <div style="margin-top: -4px;">
                                <button type="submit" name="UpdateSalary" class="btn btn-success btn-md">Search Record</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="">
    <div class="row" style="margin-top: -50px;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="header-title">
                        <h3>
                            Record from {{Date}} until {{Date}}
                        </h3>
                    </div>
                    <div class="header-line">
                        <hr>
                    </div>
                    <div class="table-responsive">
                        <table id="employee-record-table" class="table table-sm table-hover" cellspacing="0">
                            <thead class="text-primary text-sm">
                                <th>
                                    Track No.
                                </th>
                                <th>
                                    Date
                                </th>
                                <th>
                                    Time In
                                </th>
                                <th>
                                    Time Out
                                </th>
                                <th>
                                    Time Late
                                </th>
                                <th>
                                    Penalty Amount
                                </th>
                                <th>
                                    Remark
                                </th>
                                <th class="text-center">
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        2021012401
                                    </td>
                                    <td>
                                        20-01-2021
                                    </td>
                                    <td>
                                        6:30 AM
                                    </td>
                                    <td>
                                        6:30 PM
                                    </td>
                                    <td class="text-danger">
                                        2 hours
                                    </td>
                                    <td class="text-warning">
                                        500
                                    </td>
                                    <td>
                                        no data
                                    </td>
                                    <td class="td-actions text-center">
                                        <button title="Edit" type="button" rel="tooltip" class="btn btn-success" data-target="#update-time-in-form" data-toggle="modal" data-backdrop="static">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="controller.php?action=add" id="registerEmployee" method="POST" autocomplete="off">
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
                        <div class="material-textfield" style="margin-right: 0px;">
                            <input id="" placeholder=" " name="CardID" type="time" required style="width: 220px;">
                            <label>Time In</label>
                        </div>
                        <div class="material-textfield" style="margin-right: 0px;">
                            <input id="" placeholder=" " name="CardID" type="time" required style="width: 220px;">
                            <label>Time Out</label>
                        </div>
                        <div class="material-textfield" style="margin-right: 0px;">
                            <input id="" placeholder=" " name="CardID" type="text" required style="width: auto;">
                            <label>₱ Penalty Amount</label>
                        </div>
                    </div>
                    <div class="remark-field">
                        <div class="material-textfield">
                            <input id="" placeholder=" " name="CardID" type="text" required style="width: 727px;">
                            <label>Remark</label>
                        </div>
                    </div>

                </div>

                <!-- Footer Buttons -->
                <div class="modal-footer" style="height: 75px">
                    <div class="material-textfield" style="margin-right: 0px;">
                        <input id="cardID" placeholder=" " name="CardID" type="text" required style="width: 150px;" disabled="disabled" value="Admin">
                        <label>Edited By</label>
                    </div>
                    <div class="material-textfield" style="margin-right: 0px;">
                        <input id="cardID" placeholder=" " name="CardID" type="text" required style="width: 250px;">
                        <label>Input Admin Password</label>
                    </div>
                    <button type="submit" name="UpdateSalary" class="btn btn-success btn-md">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>