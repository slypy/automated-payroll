<?php

class Payroll {
    private static $tbl_payroll = 'tbl_payroll';
    private static $tbl_dtr = 'tbl_dtr';

    public static function autoAdd(){
        $dtr_query = Db::fetch(self::$tbl_dtr, 'start_date', 'start_date = ?', '', '', '', '');

        $listData = array();
        while($tbl_DTR = Db::assoc($dtr_query)){
            $listData[] = $tbl_DTR['start_date'];
        }
    }

    public static function autoUpdate(){
        
    }
}