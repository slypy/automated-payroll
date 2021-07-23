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
                    <table id="employee-dtr-table" class="table table-sm table-hover table-striped table-bordered" cellspacing="0">
                        <thead class="text-primary text-sm">
                            <th>
                                Employee ID#
                            </th>
                            <th>
                                Employee Name
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
                                    <?php echo date('(D) M d, Y', strtotime(date('Y-m-d'))); ?>
                                </td>
                                <td>
                                    8:00 AM
                                </td>
                                <td>
                                    8:00 PM
                                </td>
                                <td class="text-danger">
                                    0 hours
                                </td>
                                <td class="text-warning">
                                    ₱ 0
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