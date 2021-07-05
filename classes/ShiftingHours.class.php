<?php 

class ShiftingHours{
    protected static $db_tbl = 'tbl_shifting_hours';

    public static function add($shifting_type_name, $start_time, $end_time, $break_time, $total_work_hours){
        $query = Db::fetch(self::$db_tbl, "id", "shifting_type_name = ?", $shifting_type_name, "", "", "");

        if(Db::count($query)){
            $_SESSION['shifting_type_name_already_taken'] = "Shifting type name is already exist! try use another name.";

            return false;
        } else {
            Db::insert(self::$db_tbl, array("shifting_type_name", "start_time", "end_time", "break_time", "total_work_hours"), array($shifting_type_name, $start_time, $end_time, $break_time, $total_work_hours));
        }
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
            $dataRow[] = $tbl_shifting['shifting_type_name'];
            $dataRow[] = $tbl_shifting['start_time'];
            $dataRow[] = $tbl_shifting['end_time'];
            $dataRow[] = $tbl_shifting['break_time'];
            $dataRow[] = $tbl_shifting['total_work_hours'];
            $dataRow[] = '<button type="button" name="update" id="'.$tbl_shifting['id'].'" class="btn btn-success update"><i class="material-icons">edit</i></button>
            <button type="button" name="delete" id="'.$tbl_shifting['id'].'" class="btn btn-danger delete"><i class="material-icons">delete</i></button>';

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

    public static function deleteRow(){
        if($_GET['shift_id']){
            Db::delete(self::$db_tbl, "id = ?", $_GET['shift_id']);
        }
    }

    public static function getData(){
        if($_GET['shift_id']){
            $query = Db::fetch(self::$db_tbl,"", "id = ?", $_GET['shift_id'], "", "", "");

            $row = DB::num($query);
            echo json_encode($row);
        }
    }

    public static function updateRow(){
        $shifting_type_name = $_POST['shifting_type_name'];
        $start_time         = $_POST['start_time'];
        $end_time           = $_POST['end_time'];
        $break_time         = $_POST['break_time'];
        $total_work_hours   = $_POST['total_work_hours'];
        
        if(isset($_POST['shifting_type_name'])){
            Db::update(self::$db_tbl, array('shifting_type_name', 'start_time', 'end_time', 'break_time', 'total_work_hours'), array($shifting_type_name, $start_time, $end_time, $break_time, $total_work_hours), "shifting_type_name = ?", $shifting_type_name);
        }
    }
}