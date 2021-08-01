<?php 

class DTR{
    private static $tbl_dtr = 'tbl_dtr';
    private static $tbl_employee_image = 'tbl_employee_image';

    public static function addRecordWithScanner(){
        if(isset($_POST['employee_id'])){
            $employee_id        = $_POST['employee_id'];
            $employee_name      = $_POST['employee_name'];
            $date               = $_POST['date'];
            $time_in            = $_POST['time_in'];
            $time_out           = $_POST['time_out'];
            $over_time_in       = $_POST['over_time_in'];
            $over_time_out      = $_POST['over_time_out'];
            $captured_image     = $_POST['captured_image'];
            $total_work_hours   = 0;

            $query = Db::fetch(self::$tbl_dtr, '', 'employee_id = ? AND date = ? AND time_out = ? OR over_time_out = ?', array($employee_id, $date, '', ''), '', '','');
            $result = Db::assoc($query);

            if(Db::count($query) == 0){
                Db::insert(self::$tbl_dtr, array('employee_id', 'employee_name', 'date',  'time_in', 'time_out', 'over_time_in', 'over_time_out', 'total_work_hours'), array($employee_id, $employee_name, $date, $time_in, $time_out, $over_time_in, $over_time_out, $total_work_hours));
                Db::insert(self::$tbl_employee_image, array('employee_id', 'employee_image'), array($employee_id, $captured_image));
            }
        }
    }

    public static function addRecordNoScanner(){
        if(isset($_POST['employee_id'])){
            $employee_id        = $_POST['employee_id'];
            $employee_name      = $_POST['employee_name'];
            $date               = $_POST['date'];
            $time_in            = $_POST['time_in'];
            $time_out           = $_POST['time_out'];
            $over_time_in       = $_POST['over_time_in'];
            $over_time_out      = $_POST['over_time_out'];
            $total_work_hours   = 0;

            $query = Db::fetch(self::$tbl_dtr, '', 'employee_id = ? AND date = ? AND time_out = ? OR over_time_out = ?', array($employee_id, $date, '', ''), '', '','');
            $result = Db::assoc($query);
            if(Db::count($query) == 0){
                Db::insert(self::$tbl_dtr, array('employee_id', 'employee_name', 'date',  'time_in', 'time_out', 'over_time_in', 'over_time_out', 'total_work_hours'), array($employee_id, $employee_name, $date, $time_in, $time_out, $over_time_in, $over_time_out, $total_work_hours));
            } 
            if($result['time_out'] == ''){
                if($time_out != ''){
                    $time_out         = $_POST['time_out'];
                    $total_work_hours = floatval($_POST['total_work_hours']);
                    Db::update(self::$tbl_dtr, array('time_out', 'total_work_hours'), array($time_out , $total_work_hours), 'employee_id = ? and date = ?', array($employee_id, $date));
                }
            }
            if($result['over_time_in'] == ''){
                if ($over_time_in != ''){
                    Db::update(self::$tbl_dtr, array('over_time_in'), array($over_time_in), 'employee_id = ? and date = ?', array($employee_id, $date));
                }
            }
            if($result['over_time_out'] == ''){
                if($over_time_out != ''){
                    $total_work_hours = floatval($_POST['total_work_hours']);
                    Db::update(self::$tbl_dtr, array('over_time_out', 'total_work_hours'), array($over_time_out , $total_work_hours), 'employee_id = ? and date = ?', array($employee_id, $date));
                }
            }
        }
    }

    public static function getDTRData(){
        if(isset($_GET['employee_id'])){
            $query = Db::fetch(self::$tbl_dtr, '', 'employee_id = ? AND date = ?', array($_GET['employee_id'], $_GET['date']), '', '', '');
            $query2 = Db::fetch('tbl_shifting_hours s JOIN tbl_employees e ON s.shifting_type_name = e.shifting_type_name', '', 'employee_number = ?', $_GET['employee_id'], '', '', '');
            $result = Db::num($query);
            $result2 = Db::num($query2);
            
            echo json_encode(array_merge($result, $result2));
        }
    }

    public static function fetchRecordDTRData(){
        $query = Db::fetch(self::$tbl_dtr, '', '', '', 'id DESC', '', '');
        $limit = $_GET['start'].', '.$_GET['length'];
        if($_GET['length'] != -1){
            $query = Db::fetch(self::$tbl_dtr, '','','','id DESC', $limit, '');
        }
        if(!empty($_GET['search']['value'])){
            $like_val = '%'.$_GET['search']['value'].'%';
            $query = Db::fetch(self::$tbl_dtr, '', 'employee_id LIKE ? OR employee_name LIKE ?', array($like_val, $like_val), '', '', '');
        }
        $list_data = array();
        while($tbl_DTR = Db::assoc($query)){
            $shifting_query = Db::fetch('tbl_shifting_hours s JOIN tbl_employees e ON s.shifting_type_name = e.shifting_type_name', '', 'employee_number = ?', $tbl_DTR['employee_id'], '', '', '');
            $result = Db::num($shifting_query);

            $dataRow = array();
            $dataRow[] = date('M d, Y (D)', strtotime(date($tbl_DTR['date'])));
            $dataRow[] = $tbl_DTR['employee_id'];
            $dataRow[] = $tbl_DTR['employee_name'];
            $dataRow[] = $tbl_DTR['time_in'];
            $dataRow[] = $tbl_DTR['time_out'];
            $dataRow[] = $result[5];
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

    public static function updateRecord(){
        
    }

    public static function removeRecord(){
        
    }
}