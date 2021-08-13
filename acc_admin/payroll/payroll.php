<div class="row" style="margin-top: -40px">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div style="display: flex;  padding: 10px; justify-content: space-between; align-items: center;">
                    <div style="display: flex; align-items: center;">
                        <div class="select">
                            <select id="payroll-type" class="select-text" name="payroll-type" required>
                                <option value="weekly" selected>Weekly</option>
                                <option value="15th">15th - 30th</option>
                                <option value="monthly">Monthly</option>
                            </select>
                            <label class="select-label">Payroll Type</label>
                        </div>
                        <div class="select" style="margin-left: 20px;">
                            <select id="payroll-type" class="select-text" name="payroll-type" required>
                                <option value="monday" selected>Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                                <option value="saturday">Saturday</option>
                                <option value="sunday">Sunday</option>
                            </select>
                            <label class="select-label">Week Day Releasing</label>
                        </div>

                        <div id="payroll-switch" style="top: 3px; left: 15px;">
                            <input type="checkbox" id="switch" class="switchBtn" />
                            <div class="mouth">
                                <div class="tounge"></div>
                            </div>
                            <div class="eye1"></div>
                            <div class="eye2"></div>
                        </div>
                    </div>

                    <div class="payroll-progress">
                        <div class="circle done">
                            <span class="label">1</span>
                            <span class="title">Mon</span>
                        </div>
                        <span class="bar done"></span>
                        <div class="circle done">
                            <span class="label">2</span>
                            <span class="title">Tue</span>
                        </div>
                        <span class="bar half"></span>
                        <div class="circle active">
                            <span class="label">3</span>
                            <span class="title">Wed</span>
                        </div>
                        <span class="bar"></span>
                        <div class="circle">
                            <span class="label">4</span>
                            <span class="title">Thu</span>
                        </div>
                        <span class="bar"></span>
                        <div class="circle">
                            <span class="label">5</span>
                            <span class="title">Fri</span>
                        </div>
                        <span class="bar"></span>
                        <div class="circle">
                            <span class="label">6</span>
                            <span class="title">Sat</span>
                        </div>
                        <span class="bar"></span>
                        <div class="circle">
                            <span class="label">7</span>
                            <span class="title">Sun</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="margin-top: -40px;">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="header-title">
                    <h3>
                        Payroll
                    </h3>
                    <h4>Week 1</h4>
                </div>
                <div class="header-line">
                    <hr>
                </div>
                <div class="table-responsive">
                    <table id="payroll-report-table" class="table table-hover" cellspacing="0">
                        <thead class="text-primary text-sm">
                            <th>
                                Employee ID#
                            </th>
                            <th>
                                Employee Name
                            </th>
                            <th>
                                Week
                            </th>
                            <th>
                                Net Pay
                            </th>
                            <th>
                                Gross Pay
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    20210301
                                </td>
                                <td>
                                    Sly Kint Bacalso
                                </td>
                                <td>
                                    Week 1
                                </td>
                                <td>
                                    $1,000
                                </td>
                                <td>
                                    $5,000
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" style="text-align:right">Total: </th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div>

                </div>
            </div>
        </div>
    </div>
</div>