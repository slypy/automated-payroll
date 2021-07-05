<?php

?>

<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">credit_card</i>
                </div>
                <p class="card-category">Total Net Pay</p>
                <h3 class="card-title">201,200
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">account_balance</i> Update Today
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">assignment_ind</i>
                </div>
                <p class="card-category">Employees</p>
                <h3 class="card-title">34/50</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="<?php echo $web_root ?>acc_admin/employee/" style="display: flex;"><i class="material-icons">info</i> More Info</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                </div>
                <p class="card-category">Late Today</p>
                <h3 class="card-title">4</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">update</i>
                    Tracked Employees today
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">assignment_late</i>
                </div>
                <p class="card-category">Absent Today</p>
                <h3 class="card-title">5</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">update</i> Tracked Employees today
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card card-chart">
            <div class="card-header card-header-success">
                <div class="ct-chart ct-golden-section" id="dailySalesChart"></div>
            </div>
            <div class="card-body">
                <h4 class="card-title">Net Pay and Gross Pay</h4>
                <p class="card-category">
                    <span class="text-success"><i class="material-icons">arrow_drop_up</i> 55% </span> increase today.
                </p>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">access_time</i> update today
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card card-chart">
            <div class="card-header card-header-primary">
                <div class="ct-chart ct-golden-section" id="websiteViewsChart"></div>
            </div>
            <div class="card-body">
                <h4 class="card-title">Attendance Chart</h4>
                <p class="card-category">Monthly Attendance Report</p>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">access_time</i> update today
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <span class="nav-tabs-title">Employee Logs:</span>
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#profile" data-toggle="tab">
                                    <i class="material-icons">how_to_reg</i> On job
                                    <div class="ripple-container"></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#messages" data-toggle="tab">
                                    <i class="material-icons">local_hotel</i> Late
                                    <div class="ripple-container"></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#settings" data-toggle="tab">
                                    <i class="material-icons">assignment_late</i> Absent
                                    <div class="ripple-container"></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Time in</th>
                                    <th>Attendance</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Sly Kint Bacalso</td>
                                        <td><?php echo date('m-d-y', strtotime(date('Y-m-d'))); ?></td>
                                        <td><?php echo date('h:i A', strtotime(date('Y-m-d'))); ?> </td>
                                        <td>Not late</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="messages">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Time In (late)</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Sly Kint Bacalso</td>
                                        <td><?php echo date('m-d-y', strtotime(date('Y-m-d'))); ?></td>
                                        <td><?php echo date('h:i A', strtotime(date('Y-m-d'))); ?> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="settings">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Date Absent</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Sly Kint Bacalso</td>
                                        <td><?php echo date('m-d-y', strtotime(date('Y-m-d'))); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <h4 class="card-title">Employees Stats</h4>
                <p class="card-category">Daily Rate</p>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead class="text-warning">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Hourly Rate</th>
                        <th>Daily Rate</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Sly Kint Bacalso</td>
                            <td>₱ 100</td>
                            <td>₱ 2,400</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>