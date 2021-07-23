<?php 

class ShiftingHours{
    protected static $db_tbl = 'tbl_shifting_hours';
    protected static $overtime_tbl = 'tbl_overtime';
    protected static $late_policy_tbl = 'tbl_late_policy';

    public static function add($shifting_type_name, $start_time, $end_time, $break_time, $total_work_hours){
        $query = Db::fetch(self::$db_tbl, "id", "shifting_type_name = ?", $shifting_type_name, "", "", "");

        if(Db::count($query)){
            $_SESSION['shifting_type_name_already_taken'] = "Shifting type name is already exist! try use another name.";

            return false;
        } else {
            Db::insert(self::$db_tbl, array("shifting_type_name", "start_time", "end_time", "break_time", "total_work_hours"), array($shifting_type_name, $start_time, $end_time, $break_time, $total_work_hours));
        }
    }


    public static function fetchName(){
        $query = Db::fetch(self::$db_tbl, "", "", "", "", "", "");

        while($result = Db::assoc($query)){
            if(strtolower($result['shifting_type_name']) == 'open shift'){
                echo '<option value="'.$result['shifting_type_name'].'">'.$result['shifting_type_name'].' (anytime - '.$result['total_work_hours'].' hrs)</option>';
            } else {
                echo '<option value="'.$result['shifting_type_name'].'">'.$result['shifting_type_name'].' ('.$result['start_time'].' - '.$result['end_time'].')</option>';
            }
        }
        return;
    }

    public static function fetchList(){
        $query = Db::fetch(self::$db_tbl, "", "", "", "", "", "");

        $limit = $_GET['start'].', '.$_GET['length'];
        if($_GET['length'] != -1){
            $query = Db::fetch(self::$db_tbl, "", "", "", "", $limit, "");
        }

        if(!empty($_GET['search']['value'])){
            $like_val = $_GET['search']['value'];

            $query = Db::fetchLike(self::$db_tbl, "shifting_type_name", $like_val);
        }

        $listData = array();
        while($tbl_shifting = Db::assoc($query)){
            $dataRow = array();

            if(strtolower($tbl_shifting['shifting_type_name']) == 'open shift'){
                $dataRow[] = $tbl_shifting['shifting_type_name'];
                $dataRow[] = 'any time';
                $dataRow[] = 'any time';
                $dataRow[] = $tbl_shifting['break_time'].' hrs.mins';
                $dataRow[] = $tbl_shifting['total_work_hours'].' hrs.mins';
                $dataRow[] = '<button type="button" name="update" id="'.$tbl_shifting['id'].'" class="btn btn-success update"><i class="material-icons">edit</i></button>';
            } else {
                $dataRow[] = $tbl_shifting['shifting_type_name'];
                $dataRow[] = $tbl_shifting['start_time'];
                $dataRow[] = $tbl_shifting['end_time'];
                $dataRow[] = $tbl_shifting['break_time'].' hrs.mins';
                $dataRow[] = $tbl_shifting['total_work_hours'].' hrs.mins';
                $dataRow[] = '<button type="button" name="update" id="'.$tbl_shifting['id'].'" class="btn btn-success update"><i class="material-icons">edit</i></button>
                <button type="button" name="delete" id="'.$tbl_shifting['id'].'" class="btn btn-danger delete"><i class="material-icons">delete</i></button>';
            }
        
            $listData[] = $dataRow;
        }

        $query2 = Db::fetch(self::$db_tbl, "", "", "", "", "", "");
        $numRows = Db::count($query2);

        $result_data = array (
            'draw'              => intval($_GET['draw']),
            'recordsTotal'      => $numRows,
            'recordsFiltered'   => $numRows,
            'data'              => $listData
        );

        echo json_encode($result_data);
    }

    public static function fetchOverTime(){
        $query = Db::fetch(self::$overtime_tbl, "", "", "", "", "", "");
        $tbl_overtime = Db::num($query);

        $listData = array();
        $dataRow = array();

        $dataRow[] = $tbl_overtime[1];
        $dataRow[] = $tbl_overtime[2].' hours';
        $dataRow[] = '<button type="button" name="update" id="'.$tbl_overtime[0].'" class="btn btn-success update"><i class="material-icons">edit</i></button>';

        $listData[] = $dataRow;

        $numRows = Db::count($query);
        $result_data = array(
            'draw'              => intval($_GET['draw']),
            'recordsTotal'      => $numRows,
            'recordsFiltered'   => $numRows,
            'data'              => $listData
        );

        echo json_encode($result_data);
    }

    public static function fetchLatePolicy(){
        $query = Db::fetch(self::$late_policy_tbl, "", "", "", "", "", "");
        $tbl_latepolicy = Db::num($query);
        
        $listData = array();
        $dataRow = array();

        $float_time = explode('.', strval($tbl_latepolicy[1]));
        
        $late_after = '';

        if(count($float_time) > 1){
            if($float_time[0] == '0'){
                $handle_min = str_split($float_time[1]);
                
                if(count($handle_min) > 1 && $handle_min[0] == '0'){
                    $late_after = $handle_min[1].' min';
                } else if (count($handle_min) > 1){
                    $late_after = $float_time[1].' min';
                } else {
                    $late_after = $float_time[1].'0 min';
                }
            } else {
                $late_after = $tbl_latepolicy[1].' hr';
            }
        } else {
            $late_after = $tbl_latepolicy[1].' hr';
        }

        $dataRow[] = $late_after;
        $dataRow[] = '₱ '.$tbl_latepolicy[2];
        $dataRow[] = '<button type="button" name="update" id="'.$tbl_latepolicy[0].'" class="btn btn-success update"><i class="material-icons">edit</i></button>';

        $listData[] = $dataRow;

        $numRows = Db::count($query);
        $result_data = array(
            'draw'              => intval($_GET['draw']),
            'recordsTotal'      => $numRows,
            'recordsFiltered'   => $numRows,
            'data'              => $listData
        );

        echo json_encode($result_data);
    }

    public static function deleteRow(){
        if($_GET['shift_id']){
            Db::delete(self::$db_tbl, "id = ?", $_GET['shift_id']);
        }
    }

    public static function getData(){
        if(isset($_GET['shift_id'])){
            $query = Db::fetch(self::$db_tbl,"", "id = ?", $_GET['shift_id'], "", "", "");

            $row = Db::num($query);
            echo json_encode($row);
        } else if(isset($_GET['overtime_id'])){
            $query = Db::fetch(self::$overtime_tbl, "", "id = ?", $_GET['overtime_id'], "", "", "");

            $row = Db::num($query);
            echo json_encode($row);
        } else if(isset($_GET['latepolicy_id'])){
            $query = Db::fetch(self::$late_policy_tbl, "", "id = ?", $_GET['latepolicy_id'], "", "", "");

            $row = Db::num($query);
            echo json_encode($row);
        } else {
            #do nothing
        }
    }

    public static function updateRow(){
        if(isset($_POST['shifting_type_name'])){
            $shifting_type_name = $_POST['shifting_type_name'];
            $start_time         = $_POST['start_time'];
            $end_time           = $_POST['end_time'];
            $break_time         = $_POST['break_time'];
            $total_work_hours   = $_POST['total_work_hours'];

            Db::update(self::$db_tbl, array('shifting_type_name', 'start_time', 'end_time', 'break_time', 'total_work_hours'), array($shifting_type_name, $start_time, $end_time, $break_time, $total_work_hours), "shifting_type_name = ?", $shifting_type_name);
        } else if (isset($_POST['overtime_hours'])) {
            $max_working_hours = $_POST['overtime_hours'].'.'.$_POST['overtime_minutes'];
            
            Db::update(self::$overtime_tbl, array('over_time', 'max_working_hours'), array('Over Time',floatval($max_working_hours)), "id = ? ", "1");
        } else if (isset($_POST['latepolicy_hours'])){
            $late_after =  $_POST['latepolicy_hours'].'.'.$_POST['latepolicy_minutes'];
            $penalty_amount = $_POST['penalty_amount'];

            Db::update(self::$late_policy_tbl, array('late_after', 'penalty_amount'), array($late_after, $penalty_amount), "id = ?", "1");
        } else {
            # do nothing
        }
    }
}