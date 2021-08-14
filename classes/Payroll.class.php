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


    public static function autoAdd(){
        $dtr_query = Db::fetch(self::$tbl_dtr, 'start_date', 'start_date = ?', '', '', '', '');
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