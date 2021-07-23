<?php 

class DTR{
    protected static $tbl_dtr = 'tbl_dtr';

    public static function addRecord(){
        if(isset($_POST['employee_id'])){
            $employee_id        = $_POST['employee_id'];
            $employee_name      = $_POST['employee_name'];
            $date               = $_POST['date'];
            $time_in            = $_POST['time_in'];
            $time_out           = $_POST['time_out'];
            $over_time_in       = $_POST['over_time_in'];
            $over_time_out      = $_POST['over_time_out'];
            $total_work_hours   = floatval($_POST['total_work_hours']);

            Db::insert(self::$tbl_dtr, array('employee_id', 'employee_name', 'date', 'time_in', 'time_out', 
            'over_time_in', 'over_time_out', 'total_work_hours'), array($employee_id, $employee_name, $date, $time_in, $time_out, $over_time_in, $over_time_out, $total_work_hours));
        }
    }

    public static function fetchRecordDTRData(){
        $query = Db::fetch(self::$tbl_dtr, '', '', '', '', '', '', '');

        $list_data = array();
        while($tbl_DTR = Db::assoc($query)){
            $dataRow = array();
            $dataRow[] = $tbl_DTR['employee_id'];
            $dataRow[] = $tbl_DTR['employee_name'];
            $dataRow[] = $tbl_DTR['date'];
            $dataRow[] = $tbl_DTR['time_in'];
            $dataRow[] = $tbl_DTR['time_out'];
            $dataRow[] = $tbl_DTR['over_time_in'];
            $dataRow[] = $tbl_DTR['over_time_out'];
            $dataRow[] = $tbl_DTR['total_work_hours'];
            $list_data[] = $dataRow;
        }

        $query2 = Db::fetch(self::$tbl_dtr, '', '', '', '', '', '');
        $numRows = Db::count($query2);

        $result_data = array(
            'draw'              => intval($_GET['draw']),
            'recordsTotal'      => $numRows, 
            'recordsFiltered'   => $numRows,
            'data'              => $list_data
        );

        echo json_encode($result_data);
    }
}