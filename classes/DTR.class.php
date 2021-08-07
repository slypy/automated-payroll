<?php 

class DTR{
    private static $tbl_dtr = 'tbl_dtr';
    public static function addInitialDTR(){
        $query = Db::fetch('tbl_employees', '', '', '', '', '', '');
        $query4 = Db::fetch('tbl_overtime', '', '', '', '', '', '');
        $overtime_result = Db::num($query4);

        if(isset($_POST['start_date'])){
            $date = $_POST['start_date'];
            while($employee = Db::assoc($query)){
                if($employee['employee_status'] == 'active' && $employee['shifting_type_name'] != 'Night Shift'){
                    $query2 = Db::fetch(self::$tbl_dtr, '', 'employee_id = ? AND start_date = ?', array($employee['employee_number'], $date), '','','');
                    $query3 = Db::fetch('tbl_shifting_hours s JOIN tbl_employees e ON s.shifting_type_name = e.shifting_type_name', '', 'employee_number = ?', $employee['employee_number'], '', '', '');

                    $employee_shifting_result = Db::num($query3);

                    if(Db::count($query2) == 0){
                        Db::insert(self::$tbl_dtr, array('employee_id', 'employee_name', 'regular_hrs', 'regular_ot_hrs', 'start_date',  'time_in', 'end_date', 'time_out', 'ot_start_date', 'over_time_in', 'ot_end_date', 'over_time_out'), array($employee['employee_number'], $employee['first_name'].' '.$employee['last_name'], $employee_shifting_result[5], $overtime_result[2], $date, '', '', '', '', '', '' ,''));
                    }
                }
            }
        }
    }
    
    public static function addInitialDTRforNightShift(){
        $employee_query = Db::fetch('tbl_employees', '', '', '', '' ,'' ,'');
        $overtime_query = Db::fetch('tbl_overtime', '', '', '', '', '' ,'', '');
        $overtime_result = Db::assoc($overtime_query);
        
        if(isset($_POST['start_date'])){
            $date = $_POST['start_date'];
            while($employee = Db::assoc($employee_query)){
                if($employee['employee_status'] == 'active' && $employee['shifting_type_name'] == 'Night Shift'){
                    $dtr_query = Db::fetch(self::$tbl_dtr, '', 'employee_id = ? AND start_date = ?', array($employee['employee_number'], $date), '', '', '');

                    $shifting_query = Db::fetch('tbl_shifting_hours s JOIN tbl_employees e ON s.shifting_type_name = e.shifting_type_name', '', 'employee_number = ?', $employee['employee_number'], '', '', '');
                    
                    $shifting_result = Db::assoc($shifting_query);
                    
                    if(Db::count($dtr_query) == 0) {
                        Db::insert(self::$tbl_dtr, array('employee_id', 'employee_name', 'regular_hrs', 'regular_ot_hrs', 'start_date',  'time_in', 'end_date', 'time_out', 'ot_start_date', 'over_time_in', 'ot_end_date', 'over_time_out'), array($employee['employee_number'], $employee['first_name'].' '.$employee['last_name'], $shifting_result['total_work_hours'], $overtime_result['max_working_hours'], $date, '', '', '', '', '', '' ,''));
                    }
                }
            }
        }
    }

    public static function addRecordWithScanner(){
        $tbl_overtime_query = Db::fetch('tbl_overtime', '', '','', '', '', '');
        $tbl_overtime = Db::assoc($tbl_overtime_query);

        if(isset($_POST['card_id'])){
            $card_id        = $_POST['card_id'];
            $tbl_employees_query = Db::fetch('tbl_employees', '', 'card_id = ?', $card_id, '', '', '');
            $tbl_employees = Db::assoc($tbl_employees_query);

            $employee_id        = $tbl_employees['employee_number'];
            $employee_name      = $tbl_employees['first_name'].' '.$tbl_employees['last_name'];
            $date               = $_POST['date'];
            $time_in            = $_POST['time'];
            $time_out           = $_POST['time'];
            $over_time_in       = $_POST['time'];
            $over_time_out      = $_POST['time'];

            /**
             * <summary>
             *   This code structure is in descending form to ignore 
             *   auto update on query condition
             * 
             *  5th ⇑ :  first check over_time 
             *  4th ⇑ :  second check over_time_in
             *  3rd ⇑ :  third check time_out
             *  2nd ⇑ :  fourth check time_in
             *  1st ⇑ :  fifth check if DTR is not in database 
             * |TRUE|       then insert new DTR data containing time_in value;
             * </summary>
             * <param string={card_id, time, date}></param>
             * <Author> Sly Bacalso </Author>
             */
            if($over_time_out_query = Db::fetch(self::$tbl_dtr, '', 'employee_id = ? AND start_date != ? AND time_in != ? AND end_date != ? AND ot_start_date != ? AND over_time_in != ? AND ot_end_date = ?', array($employee_id, '', '', '', '', '', ''), '' ,'', '') ){
                if($over_time_out_result = Db::assoc($over_time_out_query)){
                    if($over_time_out_result['over_time_out'] == ''){
                        Db::update(self::$tbl_dtr, array('ot_end_date', 'over_time_out'), array($date, $over_time_out), 'employee_id = ? AND ot_start_date = ?', array($employee_id, $over_time_out_result['ot_start_date']));
                    }
                }
            } 
            
            if($over_time_in_query = Db::fetch(self::$tbl_dtr, '', 'employee_id = ? AND start_date != ? AND time_in != ? AND end_date = ? AND time_out != ?  AND ot_start_date = ? AND over_time_in = ?', array($employee_id, '', '', $date, '', '', ''), '', '', '')){

                if($over_time_in_result = Db::assoc($over_time_in_query)){
                    if($over_time_in_result['over_time_in'] == ''){
                        Db::update(self::$tbl_dtr, array('ot_start_date', 'over_time_in'), array($date, $over_time_in), 'employee_id = ? AND end_date = ?', array($employee_id, $over_time_in_result['end_date']));
                    }   
                }
            } 
            
            if($time_out_query = Db::fetch(self::$tbl_dtr, '', 'employee_id = ? AND start_date != ? AND time_in != ? AND end_date = ? AND time_out = ?', array($employee_id, '', '', '', ''), '', '', '')){
                if($time_out_result = Db::assoc($time_out_query)){
                    if($time_out_result['time_out'] == ''){
                        Db::update(self::$tbl_dtr, array('end_date', 'time_out'), array($date, $time_out), 'employee_id = ? AND start_date = ?', array($employee_id, $time_out_result['start_date']));
                    }
                }
            } 
            
            if($time_in_query = Db::fetch(self::$tbl_dtr, '', 'employee_id = ? AND start_date = ? AND time_in = ?', array($employee_id, $date, ''), '', '','')){
                if($time_in_result = Db::assoc($time_in_query)){
                    if($time_in_result['time_in'] == ''){
                        Db::update(self::$tbl_dtr, array('time_in'), array($time_in), 'employee_id = ? AND start_date = ?', array($employee_id, $time_in_result['start_date']));
                    }
                }
            }

            $tbl_dtr_query = Db::fetch(self::$tbl_dtr, '', 'employee_id = ? AND start_date = ?', array($employee_id, $date), '', '', '');
 
            if(Db::count($tbl_dtr_query) == 0){
                $tbl_shifting_hours_query = Db::fetch('tbl_shifting_hours s JOIN tbl_employees e ON s.shifting_type_name = e.shifting_type_name', '', 'employee_number = ?', $employee_id, '', '', '');
                $tbl_shifting_hours = Db::assoc($tbl_shifting_hours_query);

                Db::insert(self::$tbl_dtr, array('employee_id', 'employee_name', 'regular_hrs', 'regular_ot_hrs', 'start_date', 'time_in', 'end_date', 'time_out', 'ot_start_date', 'over_time_in', 'ot_end_date', 'over_time_out'), array($employee_id, $employee_name, $tbl_shifting_hours['total_work_hours'], $tbl_overtime['max_working_hours'], $date, $time_in, '','','','','', ''));
            } 
        }
    }

    public static function addRecordNoScanner(){
        $query4 = Db::fetch('tbl_overtime', '', '', '', '', '', '');
        $overtime_result = Db::num($query4);
        if(isset($_POST['employee_id'])){
            $employee_id        = $_POST['employee_id'];
            $employee_name      = $_POST['employee_name'];
            $date               = $_POST['date'];
            $time_in            = $_POST['time_in'];
            $time_out           = $_POST['time_out'];
            $over_time_in       = $_POST['over_time_in'];
            $over_time_out      = $_POST['over_time_out'];
            
            # FIXED add new DTR with specific time in
            $query = Db::fetch(self::$tbl_dtr, '', 'employee_id = ? AND start_date = ?', array($employee_id, $date), '', '','');
            # if $query result is 0 then insert new DTR data with time_in value
            if(Db::count($query) == 0){
                $query2 = Db::fetch('tbl_shifting_hours s JOIN tbl_employees e ON s.shifting_type_name = e.shifting_type_name', '', 'employee_number = ?', $employee_id, '', '', '');
                $result1 = Db::num($query2);

                if($time_out == '' && $over_time_in == '' && $over_time_out == ''){
                    Db::insert(self::$tbl_dtr, array('employee_id', 'employee_name','regular_hrs', 'regular_ot_hrs', 'start_date',  'time_in', 'end_date', 'time_out', 'ot_start_date', 'over_time_in', 'ot_end_date','over_time_out'), array($employee_id, $employee_name, $result1[5], $overtime_result[2], $date, $time_in, '', $time_out, '',$over_time_in, '',$over_time_out));
                }
            }

            # if POST time_in is not empty string then do insert time_in
            if($time_in != ''){
                $time_in_query = Db::fetch(self::$tbl_dtr, '', 'employee_id = ? AND start_date = ? AND time_in = ?', array($employee_id, $date, ''), '', '','');
                $time_in_result = Db::assoc($time_in_query);
            
                # if the specific time_in of the queried specific start_date insert time in
                if($time_in_result['time_in'] == ''){
                    Db::update(self::$tbl_dtr, array('time_in'), array($time_in), 'employee_id = ? AND start_date = ?', array($employee_id, $time_in_result['start_date']));
                }
            }

            # if POST time_out is not empty string then do insert for time_out
            if($time_out != ''){
                # Queries empty string end_date and time_out and start_date and time_in is not an empty string
                $time_out_query = Db::fetch(self::$tbl_dtr, '', 'employee_id = ? AND start_date != ? AND time_in != ? AND end_date = ? AND time_out = ?', array($employee_id, '', '', '', ''), '', '', '');
                $time_out_result = Db::assoc($time_out_query);

                if($time_out_result['time_out'] == ''){
                    Db::update(self::$tbl_dtr, array('end_date', 'time_out'), array($date, $time_out), 'employee_id = ? AND start_date = ?', array($employee_id, $time_out_result['start_date']));
                }
            }

            if($over_time_in != '') {
                $over_time_in_query = Db::fetch(self::$tbl_dtr, '', 'employee_id = ? AND start_date != ? AND time_in != ? AND end_date = ? AND ot_start_date = ? AND over_time_in = ?', array($employee_id, '', '', $date, '', ''), '', '', '');
                $over_time_in_result = Db::assoc($over_time_in_query);

                if($over_time_in_result['over_time_in'] == ''){
                    Db::update(self::$tbl_dtr, array('ot_start_date', 'over_time_in'), array($date, $over_time_in), 'employee_id = ? AND end_date = ?', array($employee_id, $over_time_in_result['end_date']));
                }
            }

            if($over_time_out != ''){
                $over_time_out_query = Db::fetch(self::$tbl_dtr, '', 'employee_id = ? AND start_date != ? AND time_in != ? AND end_date != ? AND ot_start_date != ? AND over_time_in != ? AND ot_end_date = ?', array($employee_id, '', '', '', '', '', ''), '' ,'', '');
                $over_time_out_result = Db::assoc($over_time_out_query);

                if($over_time_out_result['over_time_out'] == ''){
                    Db::update(self::$tbl_dtr, array('ot_end_date', 'over_time_out'), array($date, $over_time_out), 'employee_id = ? AND ot_start_date = ?', array($employee_id, $over_time_out_result['ot_start_date']));
                }
            }
        }
    }

    public static function getDTRData(){
        if(isset($_GET['card_id'])){
            $date = $_GET['date'];
            $query = Db::fetch('tbl_employees', 'card_id = ?', '', '', '', '', '');
            $employee = Db::assoc($query);
            
            $query2 = Db::fetch(self::$tbl_dtr, '', 'employee_id = ? AND date = ?', array($employee['employee_number'], $date), '', '', '');
            echo json_encode(Db::num($query2));
        }

        if(isset($_GET['employee_id'])){
            $query = Db::fetch(self::$tbl_dtr, '', 'employee_id = ? AND date = ?', array($_GET['employee_id'], $_GET['date']), '', '', '');
            $query2 = Db::fetch('tbl_shifting_hours s JOIN tbl_employees e ON s.shifting_type_name = e.shifting_type_name', '', 'employee_number = ?', $_GET['employee_id'], '', '', '');
            $result = Db::num($query);
            $result2 = Db::num($query2);
            echo json_encode(array_merge($result, $result2));
        }

        if(isset($_GET['dtr_id'])){
            $query = Db::fetch(self::$tbl_dtr, '', 'id = ?', $_GET['dtr_id'], '', '', '');
            $result = Db::num($query);
            echo json_encode($result);
        }
    }
    
    public static function fetchEmployeeRecordDTRData(){
        if(!empty($_GET['search']['value'])){
            $like_val = $_GET['search']['value'];
            $query = Db::fetch(self::$tbl_dtr, '', 'employee_id = ? OR employee_name = ? OR start_date = ?', array($like_val, $like_val, $like_val), '', '', '');

            $list_data = array();
            while($tbl_DTR = Db::assoc($query)){

                $dataRow = array();
                $dataRow[] = date('M d, Y (D)', strtotime(date($tbl_DTR['start_date'])));
                $dataRow[] = $tbl_DTR['employee_id'];
                $dataRow[] = $tbl_DTR['employee_name'];
                $dataRow[] = $tbl_DTR['time_in'];
                $dataRow[] = $tbl_DTR['time_out'];
                $dataRow[] = $tbl_DTR['over_time_in'];
                $dataRow[] = $tbl_DTR['over_time_out'];
                $dataRow[] = $tbl_DTR['total_work_hours'];
                $dataRow[] = '<button type="button" name="update" id="'.$tbl_DTR['id'].'" class="btn btn-success update"><i class="material-icons">edit</i></button>';
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
        } else {
                $dataRow = array();
                $dataRow[] = '';
                $dataRow[] = '';
                $dataRow[] = '';
                $dataRow[] = '';
                $dataRow[] = '';
                $dataRow[] = '';
                $dataRow[] = '';
                $dataRow[] = '';
                $dataRow[] = '';
                $list_data[] = $dataRow;

                $result_data = array(
                    'draw'              => intval($_GET['draw']),
                    'recordsTotal'      => 0, 
                    'recordsFiltered'   => 0,
                    'data'              => $list_data
                );
                echo json_encode($result_data);
        }
    }

    public static function fetchRecordDTRData(){
        $date_now = date('Y-m-d');
        $query = Db::fetch(self::$tbl_dtr, '', 'start_date = ?', $date_now, 'id DESC', '', '');
        $limit = $_GET['start'].', '.$_GET['length'];
        if($_GET['length'] != -1){
            $query = Db::fetch(self::$tbl_dtr, '','date = ?', $date_now,'id DESC', $limit, '');
        }
        if(!empty($_GET['search']['value'])){
            $like_val = '%'.$_GET['search']['value'].'%';
            $query = Db::fetch(self::$tbl_dtr, '', 'employee_id LIKE ? OR employee_name LIKE ? AND date = ?', array($like_val, $like_val, $date_now), '', '', '');
        }
        $list_data = array();
        while($tbl_DTR = Db::assoc($query)){
            $shifting_query = Db::fetch('tbl_shifting_hours s JOIN tbl_employees e ON s.shifting_type_name = e.shifting_type_name', '', 'employee_number = ?', $tbl_DTR['employee_id'], '', '', '');
            $result = Db::num($shifting_query);

            $dataRow = array();
            $dataRow[] = date('M d, Y', strtotime(date($tbl_DTR['start_date'])));
            $dataRow[] = $tbl_DTR['employee_id'];
            $dataRow[] = $tbl_DTR['employee_name'];
            $dataRow[] = explode(' ', $result[1])[0];
            $dataRow[] = (!empty($tbl_DTR['time_in'])) ? date('h:i a', strtotime($tbl_DTR['time_in'])) : '';
            $dataRow[] = (!empty($tbl_DTR['time_out'])) ? date('h:i a', strtotime($tbl_DTR['time_out'])) : '';
            $dataRow[] = $result[5];
            $dataRow[] = (!empty($tbl_DTR['over_time_in'])) ? date('h:i a', strtotime($tbl_DTR['over_time_in'])) : '';
            $dataRow[] = (!empty($tbl_DTR['over_time_out'])) ? date('h:i a', strtotime($tbl_DTR['over_time_out'])) : '';
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