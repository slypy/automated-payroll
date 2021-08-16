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

    private static function calcGrossPay($total_worked_hours, $salary){
        return doubleval(floatval($total_worked_hours) * floatval($salary));
    }

    private static function calcNetPay(array $deductions, $gross_pay){
        $total_deduction = 0.0;
        for($i = 0; $i < count($deductions); $i += 1){
            $total_deduction += floatval($deductions[$i]);
        }
        return doubleval($gross_pay - $total_deduction);
    }


    public static function startCalculate(){
        $employee_query = Db::fetch('tbl_employees e
        LEFT OUTER JOIN tbl_positions p ON
	        p.position_name = e.job_position
        LEFT OUTER JOIN tbl_staffCA sc ON
            sc.employee_number = e.employee_number AND sc.salary_deduction != 0
        LEFT OUTER JOIN tbl_staffLoan sl ON
            sl.employee_number = e.employee_number AND sl.loan_balance != 0
        LEFT OUTER JOIN tbl_staffDamages sd ON
            sd.employee_number = e.employee_number AND sd.salary_deduction != 0', 'e.worker_type,
            e.employee_number,
            e.job_position,
            e.shifting_type_name,
            e.first_name,
            e.last_name,
            p.wage_salary,
            e.employee_er,
            e.employee_ee,
            e.sss_active_loan,
            e.philhealth_per_month,
            e.pag_ibig_per_month,
            e.pag_ibig_active_loan,
            IFNULL(sc.salary_deduction, 0) as cash_advance,
            IFNULL(sl.loan_balance, 0) as loan_bal,
            IFNULL(sd.salary_deduction, 0) as total_damages', 'e.employee_status = ?', 'active', '', '', '');

       
        while($tbl_employee = Db::assoc($employee_query)){
            $dtr_query = Db::fetch(self::$tbl_dtr, 'start_date, end_date, total_work_hours', 'employee_id = ?', $tbl_employee['employee_number'], '', '', '');
            $total_worked_hours = 0;
            while($tbl_dtr = Db::assoc($dtr_query)){
                $total_worked_hours += $tbl_dtr['total_work_hours'];
            }

            echo json_encode($tbl_employee);
            
            Db::insert('tbl_payroll', array('employee_id','employee_name', 'job_position', 'shifting_type_name', 'total_worked_hours', 'wage_salary', 'employee_er', 'employee_ee', 'sss_active_loan', 'philhealth_per_month', 'pag_ibig_per_month', 'pag_ibig_active_loan', 'cash_advance', 'loan', 'damages', 'gross_pay', 'net_pay'), array($tbl_employee['employee_number'],$tbl_employee['first_name'].' '.$tbl_employee['last_name'], $tbl_employee['job_position'], $tbl_employee['shifting_type_name'], $total_worked_hours, $tbl_employee['wage_salary'], $tbl_employee['employee_er'], $tbl_employee['employee_ee'], $tbl_employee['sss_active_loan'], $tbl_employee['philhealth_per_month'], $tbl_employee['pag_ibig_per_month'], $tbl_employee['pag_ibig_active_loan'], $tbl_employee['cash_advance'], $tbl_employee['loan_bal'], $tbl_employee['total_damages'], self::calcGrossPay($total_worked_hours, $tbl_employee['wage_salary']), self::calcNetPay(array( $tbl_employee['employee_er'], $tbl_employee['employee_ee'], $tbl_employee['sss_active_loan'], $tbl_employee['philhealth_per_month'], $tbl_employee['pag_ibig_per_month'], $tbl_employee['pag_ibig_active_loan'], $tbl_employee['cash_advance'], $tbl_employee['loan_bal'], $tbl_employee['total_damages']), self::calcGrossPay($total_worked_hours, $tbl_employee['wage_salary']))));
        }
    }

    public static function getReport(){
        $employee_query = Db::fetch('tbl_payroll', '', '','', '', '', '');
        $limit = $_GET['start'].', '.$_GET['length'];
        if($_GET['length'] != -1){
            $employee_query = Db::fetch('tbl_payroll', '', '', '', '', $limit, '');
        }
        if(!empty($_GET['search']['value'])){
            $like_val = $_GET['search']['value'];
            $employee_query = Db::fetch('tbl_payroll', '', 'employee_id = ? OR employee_name = ?', array($like_val, $like_val), '', '', '');
        }
        $list_data = array();
        $total_gross_pay = 0.0;
        $total_net_pay = 0.0;
        while($tbl_employee = Db::assoc($employee_query)){
            $dataRow = array();
            $dataRow[] = $tbl_employee['employee_id'];
            $dataRow[] = $tbl_employee['employee_name'];
            $dataRow[] = 'Week 1';
            $dataRow[] = '₱ '.$tbl_employee['gross_pay'];
            $dataRow[] = '₱ '.$tbl_employee['net_pay'];
            $dataRow[] = '<button type="button" name="info" id="'.$tbl_employee['id'].'" class="btn btn-info payroll-info"><i class="material-icons">info</i></button>';
            $dataRow[] = $tbl_employee['wage_salary'];#6
            $dataRow[] = $tbl_employee['total_worked_hours'];#7
            $dataRow[] = $tbl_employee['employee_ee'];#8
            $dataRow[] = $tbl_employee['philhealth_per_month'];#9
            $dataRow[] = $tbl_employee['pag_ibig_active_loan'];#10
            $dataRow[] = $tbl_employee['cash_advance'];#11
            $dataRow[] = $tbl_employee['loan'];#12
            $dataRow[] = $tbl_employee['damages'];#13
            $list_data[] = $dataRow;

            $total_gross_pay += $tbl_employee['gross_pay'];
            $total_net_pay += $tbl_employee['net_pay'];
        }
        $query2 = Db::fetch('tbl_payroll', '', '', '', '', '', '');
        $numRows = Db::count($query2);
        $result_data = array(
            'draw'              => intval($_GET['draw']),
            'recordsTotal'      => $numRows,
            'recordsFiltered'   => $numRows,
            'data'              => $list_data,
            'netpayTotal'       => $total_net_pay,
            'grosspayTotal'     => $total_gross_pay, 
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