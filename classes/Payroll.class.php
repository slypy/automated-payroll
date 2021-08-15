<?php

class Payroll {
    private static $tbl_payroll = 'tbl_payroll';
    private static $tbl_dtr = 'tbl_dtr';
    private static $tbl_positions = 'tbl_positions';
    private static $tbl_employees = 'tbl_employees';
    private static $tbl_employee_misc = 'tbl_employee_misc';
    private static $tbl_staffCA = 'tbl_staffCA';
    private static $tbl_staffLoan = 'tbl_staffLoan';
    private static $tbl_staffDamages = 'tbl_staffLoan';

    private function calcContributions(){

        return; //return the total contribution;
    }

    private function calcDeductions(){

        return; //return the total deductions
    }  

    private function calcTotalWorkedDays(){
        
        return; //return the total Worked Days
    }

    private function calcTotalWorkedHours(){

        return; //return the total workedhours
    }

    private function checkHoliday(){
        
        return; //returns a value to be added if there is a work day that is holiday
    }

    private function calcNetPay(){

        return; //returns total Deductions
    }

    private function calcGrossPay(){

        return; //returns the total of subract(initial salary - NetPay)
    }


    public static function startCalculate(){
        $dtr_query = Db::fetch(self::$tbl_dtr, 'start_date', 'start_date = ?', '', '', '', '');
    }

    public static function getReport(){
        $employee_query = Db::fetch('tbl_employees', 'employee_number, first_name, last_name', '','', '', '', '');
        $limit = $_GET['start'].', '.$_GET['length'];
        if($_GET['length'] != -1){
            $employee_query = Db::fetch('tbl_employees', 'employee_number, first_name, last_name', "", "", "", $limit, "");
        }

        if(!empty($_GET['search']['value'])){
            $like_val = $_GET['search']['value'];
            $employee_query = Db::fetch('tbl_employees', 'employee_number, first_name, last_name', 'employee_id = ? OR employee_name = ? OR start_date = ?', array($like_val, $like_val, $like_val), '', '', '');
        }
        $list_data = array();
        while($tbl_employee = Db::assoc($employee_query)){
            $dataRow = array();
            $dataRow[] = $tbl_employee['employee_number'];
            $dataRow[] = $tbl_employee['first_name'].' '.$tbl_employee['last_name'];
            $dataRow[] = 'Week 1';
            $dataRow[] = '₱1000';
            $dataRow[] ='₱1000';
            $dataRow[] = '<button type="button" name="info" id="'.$tbl_employee['id'].'" class="btn btn-info payroll-info"><i class="material-icons">info</i></button>';
            $list_data[] = $dataRow;
        }
        $query2 = Db::fetch(self::$tbl_dtr, '', '', '', '', '', '');
        $numRows = Db::count($query2);
        $result_data = array(
            'draw'              => intval($_GET['draw']),
            'recordsTotal'      => $numRows,
            'recordsFiltered'   => $numRows,
            'data'              => $list_data,
            'netpayTotal'       => 20000,
            'grosspayTotal'     => 15000, 
        );
        echo json_encode($result_data);
    }

    public static function getPayrollSettings($data){
        $settings = json_decode($data);
        echo json_encode($settings);
    }

    public static function setPayrollSettings($data){
        if(isset($_GET['payroll_switch'])){
            $ptype = $_GET['payroll_type'];
            $pday  = $_GET['payroll_day'];
            $enabled = $_GET['payroll_switch'];
            $settings = json_decode($data);

            foreach($settings as $key => $value){
                $value->payroll_type = $ptype;
                $value->payroll_day = $pday;
                $value->payroll_switch = $enabled;
            }

            $updateSettings = json_encode($settings);
            file_put_contents('settings.json', $updateSettings);
        }
    }
}