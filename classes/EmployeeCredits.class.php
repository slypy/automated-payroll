<?php

class EmployeeCredits{
    protected static $tbl_staffCA = 'tbl_staffCA';

    public static function add($type = ''){
        switch($type){
            case 'staff_ca':
                if(isset($_POST['employee_number'])){
                    $employee_number = $_POST['employee_number'];
                    $employee_name = $_POST['employee_name'];
                    $ca_date = $_POST['ca_date'];
                    $ca_amount = $_POST['ca_amount'];
                    $ca_remarks = $_POST['ca_remarks'];
        
                    Db::insert(self::$tbl_staffCA, array("employee_number", "employee_name", "date_cash_advance", "cash_advance_amount", "remarks"), array($employee_number, $employee_name, $ca_date, $ca_amount, $ca_remarks));
                }
                break;
        }
    }
    
    public static function fetchDataList(){
        $query = Db::fetch(self::$tbl_staffCA, "", "", "", "", "", "");

        $limit = $_GET['start'].', '.$_GET['length'];
        if($_GET['length'] != -1){
            $query = Db::fetch(self::$tbl_staffCA, "", "", "", "", $limit, "");
        }

        if(!empty($_GET['search']['value'])){
            $like_val = $_GET['search']['value'];

            $query = Db::fetchLike(self::$tbl_staffCA, "employee_number", $like_val);
        }

        $listData = array();
        while($tbl_StaffCA = Db::assoc($query)){
            $dataRow = array();
            $dataRow[] = $tbl_StaffCA['employee_number'];
            $dataRow[] = $tbl_StaffCA['employee_name'];   
            $dataRow[] = date('M d, Y', strtotime(date($tbl_StaffCA['date_cash_advance'])));
            $dataRow[] = $tbl_StaffCA['cash_advance_amount'];
            $dataRow[] = $tbl_StaffCA['cash_advance_amount'];
            $dataRow[] = '<button type="button" name="update" id="'.$tbl_StaffCA['id'].'" class="btn btn-success update"><i class="material-icons">monetization_on</i> pay </button>';

            $listData[] = $dataRow;
        }

        $query2 = Db::fetch(self::$tbl_staffCA, "", "", "", "", "", "");
        $numRows = Db::count($query2);

        $result_data = array (
            'draw'              => intval($_GET['draw']),
            'recordsTotal'      => $numRows,
            'recordsFiltered'   => $numRows,
            'data'              => $listData
        );

        echo json_encode($result_data);
    }

    public static function getData(){
        
    }

    public static function update(){

    }

}