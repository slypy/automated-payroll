<?php 

class HolidayPay {
    protected static $db_tbl = "tbl_holiday_pay";

    public static function add($holiday_name, $holiday_date, $none_over_time_percent, $over_time_percent){
        $query = Db::fetch(self::$db_tbl, "", "holiday_name = ? AND holiday_date = ?", array($holiday_name, $holiday_date), "", "", "");

        if(Db::count($query)){
            $_SESSION['holiday_name_already_taken'] = "Holiday Pay is already exist! try create another Holiday Pay.";

            return false;
        } else {
            Db::insert(self::$db_tbl, array("holiday_name", "holiday_date", "none_over_time_percent", "over_time_percent"), array($holiday_name, $holiday_date, $none_over_time_percent, $over_time_percent));
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

            $query = Db::fetchLike(self::$db_tbl, "holiday_name", $like_val);
        }

        $holidayData = array();
        while($tbl_holiday_pay = Db::assoc($query)){
            $holidayRow = array();
            $holidayRow[] = $tbl_holiday_pay['holiday_name'];
            $holidayRow[] = date('M d, Y', strtotime(date($tbl_holiday_pay['holiday_date'])));
            $holidayRow[] = $tbl_holiday_pay['none_over_time_percent'].'%';
            $holidayRow[] = $tbl_holiday_pay['over_time_percent'].'%';
            $holidayRow[] = '<button type="button" name="update" id="'.$tbl_holiday_pay['id'].'" class="btn btn-success update"><i class="material-icons">edit</i></button> <button type="button" name="delete" id="'.$tbl_holiday_pay["id"].'" class="btn btn-danger delete"><i class="material-icons">delete</i></button>';
            $holidayData[] = $holidayRow;
        }

        $query2 = Db::fetch(self::$db_tbl, "", "", "", "", "", "");
        $numRows = Db::count($query2);

        $result_data = array(
            'draw'              => intval($_GET['draw']),
            'recordsTotal'      => $numRows,
            'recordsFiltered'   => $numRows,
            'data'              => $holidayData
        );

        echo json_encode($result_data);

        return;
    }

    public static function getData(){
        if($_GET['holiday_id']){
            $query = Db::fetch(self::$db_tbl, "", "id = ?", $_GET['holiday_id'], "", "", "");

            $row = Db::num($query);
            echo json_encode($row);
        }

        return;
    }

    public static function deleteRow(){
        if($_GET['holiday_id']){
            Db::delete(self::$db_tbl, "id = ?", $_GET['holiday_id']);
        }

        return;
    }

    public static function updateRow(){
        if(isset($_POST['holiday_name'])){
            $holiday_name = $_POST['holiday_name'];
            $holiday_date = $_POST['holiday_date'];
            $none_over_time_percent = $_POST['none_over_time_percent'];
            $over_time_percent = $_POST['over_time_percent'];

            Db::update(self::$db_tbl, array('holiday_name', 'holiday_date', 'none_over_time_percent', 'over_time_percent'), array($holiday_name, $holiday_date, $none_over_time_percent, $over_time_percent), "holiday_name = ?", $holiday_name);
        }
    } 
}