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


    public static function autoAdd(){
        $dtr_query = Db::fetch(self::$tbl_dtr, 'start_date', 'start_date = ?', '', '', '', '');

        $listData = array();
        while($tbl_DTR = Db::assoc($dtr_query)){
            $listData[] = $tbl_DTR['start_date'];
        }

        print_r($listData);
    }

    public static function autoUpdate(){
        
    }
}