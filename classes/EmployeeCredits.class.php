<?php

class EmployeeCredits{
    protected static $tbl_staffCA = 'tbl_staffCA';
    protected static $tbl_staffLoan = 'tbl_staffLoan';
    protected static $tbl_employeeMisc = 'tbl_employee_misc';
    protected static $tbl_staffDamages = 'tbl_staffDamages';

    public static function add($type = ''){
        switch($type){
            case 'staff_ca':
                if(isset($_POST['employee_number'])){
                    $employee_number    = $_POST['employee_number'];
                    $employee_name      = $_POST['employee_name'];
                    $ca_date            = $_POST['ca_date'];
                    $ca_amount          = $_POST['ca_amount'];
                    $ca_remarks         = $_POST['ca_remarks'];
                    Db::insert(self::$tbl_staffCA, array("employee_number", "employee_name", "date_cash_advance", "cash_advance_amount", "salary_deduction", "remarks"), array($employee_number, $employee_name, $ca_date, $ca_amount, $ca_amount, $ca_remarks));
                }
                break;
            
            case 'staff_loan':
                if(isset($_POST['employee_id'])){
                    $employee_id        = $_POST['employee_id'];
                    $employee_name      = $_POST['employee_name'];
                    $loan_amount        = $_POST['loan_amount'];
                    $loan_interest      = $_POST['loan_interest'];
                    $loan_balance       = $_POST['loan_balance'];
                    $date_of_loan       = $_POST['date_of_loan'];
                    $due_date           = $_POST['due_date'];
                    $loan_remarks       = $_POST['loan_remarks'];
                    Db::insert(self::$tbl_staffLoan, array('employee_number', 'employee_name', 'date_of_loan', 'due_date', 'loan_amount', 'loan_interest', 'loan_balance', 'loan_remarks'), array($employee_id, $employee_name, $date_of_loan, $due_date, $loan_amount, $loan_interest, $loan_balance, $loan_remarks));
                }
                break;

            case 'employee_misc':

                break;
            
            case 'staff_damages':
                if(isset($_POST['employee_number'])){
                    $employee_number    = $_POST['employee_number'];
                    $employee_name      = $_POST['employee_name'];
                    $date_issue         = $_POST['date_issue'];
                    $damage_amount      = $_POST['damage_amount'];
                    $issue_name         = $_POST['issue_name'];
                    Db::insert(self::$tbl_staffDamages, array('employee_number', 'employee_name', 'date_issue','damage_amount', 'salary_deduction', 'issue_name'), array($employee_number, $employee_name, $date_issue, $damage_amount, $damage_amount, $issue_name));
                }
                break;
        }
    }

    # handle with parameter for multiple uses
    public static function fetchDataList($type){
        switch($type){
            case 'staff_ca':
                $query = Db::fetch(self::$tbl_staffCA, "", "salary_deduction > ?", "0", "", "", "");
                $limit = $_GET['start'].', '.$_GET['length'];
                if($_GET['length'] != -1){
                    $query = Db::fetch(self::$tbl_staffCA, "", "salary_deduction > ?", "0", "", $limit, "");
                }
                if(!empty($_GET['search']['value'])){
                    $like_val = $_GET['search']['value'];
                    $query = Db::fetch(self::$tbl_staffCA, "", "salary_deduction > ? AND employee_number LIKE ? OR employee_name LIKE ? AND salary_deduction > ?", array("0",'%'.$like_val.'%', '%'.$like_val.'%', "0"), "", "", "");
                }
                $listData = array();
                while($tbl_StaffCA = Db::assoc($query)){
                    $dataRow = array();
                    $dataRow[] = $tbl_StaffCA['employee_number'];
                    $dataRow[] = $tbl_StaffCA['employee_name'];   
                    $dataRow[] = date('M d, Y', strtotime(date($tbl_StaffCA['date_cash_advance'])));
                    $dataRow[] = $tbl_StaffCA['cash_advance_amount'];
                    $dataRow[] = $tbl_StaffCA['salary_deduction'];
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
                break;
            
            case 'paid_staff_ca':
                $query = Db::fetch(self::$tbl_staffCA, "", "salary_deduction <= ?", "0", "", "", "");
                $limit = $_GET['start'].', '.$_GET['length'];
                if($_GET['length'] != -1){
                    $query = Db::fetch(self::$tbl_staffCA, "", "salary_deduction <= ?", "0", "", $limit, "");
                }
                if(!empty($_GET['search']['value'])){
                    $like_val = $_GET['search']['value'];
                    $query = Db::fetch(self::$tbl_staffCA, "", "salary_deduction <= ? AND employee_number LIKE ? OR employee_name LIKE ? AND salary_deduction <= ?", array("0",'%'.$like_val.'%', '%'.$like_val.'%', "0"), "", "", "");
                }
                $listData = array();
                while($tbl_StaffCA = Db::assoc($query)){
                    $dataRow = array();
                    $dataRow[] = $tbl_StaffCA['employee_number'];
                    $dataRow[] = $tbl_StaffCA['employee_name'];   
                    $dataRow[] = date('M d, Y', strtotime(date($tbl_StaffCA['date_cash_advance'])));
                    $dataRow[] = $tbl_StaffCA['cash_advance_amount'];
                    $dataRow[] = $tbl_StaffCA['salary_deduction'];
                    $dataRow[] = '<button type="button"  id="'.$tbl_StaffCA['id'].'" class="btn btn-success" disabled><i class="material-icons">check</i> paid </button>';
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
                break;

            case 'staff_loan':
                $query = Db::fetch(self::$tbl_staffLoan, "", "loan_balance > ?", "0", "", "", "");
                $limit = $_GET['start'].', '.$_GET['length'];
                if($_GET['length'] != -1){
                    $query = Db::fetch(self::$tbl_staffLoan, "", "loan_balance > ?", "0", "", $limit, "");
                }
                if(!empty($_GET['search']['value'])){
                    $like_val = $_GET['search']['value'];
                    $query = Db::fetch(self::$tbl_staffLoan, "", "loan_balance > ? AND employee_number LIKE ? OR employee_name LIKE ? AND loan_balance > ?", array("0",'%'.$like_val.'%', '%'.$like_val.'%', "0"), "", "", "");
                }
                $listData = array();
                while($tbl_StaffLoan = Db::assoc($query)){
                    $dataRow = array();
                    $dataRow[] = $tbl_StaffLoan['employee_number'];
                    $dataRow[] = $tbl_StaffLoan['employee_name'];   
                    $dataRow[] = date('M d, Y', strtotime(date($tbl_StaffLoan['date_of_loan'])));
                    $dataRow[] = date('M d, Y', strtotime(date($tbl_StaffLoan['due_date'])));;
                    $dataRow[] = $tbl_StaffLoan['loan_amount'];
                    $dataRow[] = $tbl_StaffLoan['loan_interest'];
                    $dataRow[] = $tbl_StaffLoan['loan_balance'];
                    $dataRow[] = '<button type="button" name="update" id="'.$tbl_StaffLoan['id'].'" class="btn btn-success update"><i class="material-icons">monetization_on</i> pay </button>';
                    $listData[] = $dataRow;
                }
                $query2 = Db::fetch(self::$tbl_staffLoan, "", "", "", "", "", "");
                $numRows = Db::count($query2);
                $result_data = array (
                    'draw'              => intval($_GET['draw']),
                    'recordsTotal'      => $numRows,
                    'recordsFiltered'   => $numRows,
                    'data'              => $listData
                );
                echo json_encode($result_data);
                break;

            case 'paid_staff_loan':
                $query = Db::fetch(self::$tbl_staffLoan, "", "loan_balance <= ?", "0", "", "", "");
                $limit = $_GET['start'].', '.$_GET['length'];
                if($_GET['length'] != -1){
                    $query = Db::fetch(self::$tbl_staffLoan, "", "loan_balance <= ?", "0", "", $limit, "");
                }
                if(!empty($_GET['search']['value'])){
                    $like_val = $_GET['search']['value'];
    
                    $query = Db::fetch(self::$tbl_staffLoan, "", "loan_balance <= ? AND employee_number LIKE ? OR employee_name LIKE ? AND loan_balance <= ?", array("0",'%'.$like_val.'%', '%'.$like_val.'%', "0"), "", "", "");
                }
                $listData = array();
                while($tbl_StaffLoan = Db::assoc($query)){
                    $dataRow = array();
                    $dataRow[] = $tbl_StaffLoan['employee_number'];
                    $dataRow[] = $tbl_StaffLoan['employee_name'];   
                    $dataRow[] = date('M d, Y', strtotime(date($tbl_StaffLoan['date_of_loan'])));
                    $dataRow[] = date('M d, Y', strtotime(date($tbl_StaffLoan['due_date'])));;
                    $dataRow[] = $tbl_StaffLoan['loan_amount'];
                    $dataRow[] = $tbl_StaffLoan['loan_interest'];
                    $dataRow[] = $tbl_StaffLoan['loan_balance'];
                    $dataRow[] = '<button type="button" class="btn btn-success" disabled><i class="material-icons">check</i> paid </button>';
    
                    $listData[] = $dataRow;
                }
                $query2 = Db::fetch(self::$tbl_staffLoan, "", "", "", "", "", "");
                $numRows = Db::count($query2);
                $result_data = array (
                    'draw'              => intval($_GET['draw']),
                    'recordsTotal'      => $numRows,
                    'recordsFiltered'   => $numRows,
                    'data'              => $listData
                );
                echo json_encode($result_data);
                break;
            
            case 'employee_list':
                $query = Db::fetch('tbl_employees','', '', '', '', '', '');
                $limit = $_GET['start'].', '.$_GET['length'];
                if($_GET['length'] != -1){
                    $query = Db::fetch('tbl_employees', '', '', '', '', $limit, '');
                }
                if(!empty($_GET['search']['value'])){
                    $like_val = '%'.$_GET['search']['value'].'%';
                    $query = Db::fetch('tbl_employees', '', 'employee_name LIKE ?', $like_val, '', '', '');
                }
                $listData = array();
                while($tbl_Employees = Db::assoc($query)){
                    $dataRow = array();
                    $dataRow[] = $tbl_Employees['employee_number'];
                    $dataRow[] = $tbl_Employees['employee_name'];
                    $listData[] = $dataRow;
                }

                $query2 = Db::fetch('tbl_employees', '', '', '', '', '', '', '');
                $numRows = Db::count($query2);
                $result_data = array(
                    'draw'              => intval($_GET['draw']),
                    'recordsTotal'      => $numRows,
                    'recordsFiltered'   => $numRows,
                    'data'              => $listData
                );
                echo json_encode($result_data);
                break;
            
            case 'employee_misc':
                $query = Db::fetch(self::$tbl_employeeMisc, "", "salary_deduction > ?", "0", "", "", "");
                $limit = $_GET['start'].', '.$_GET['length'];
                if($_GET['length'] != -1){
                    $query = Db::fetch(self::$tbl_employeeMisc, "", "salary_deduction > ?", "0", "", $limit, "");
                }
                if(!empty($_GET['search']['value'])){
                    $like_val = $_GET['search']['value'];
    
                    $query = Db::fetch(self::$tbl_employeeMisc, "", "salary_deduction > ? AND employee_number LIKE ? OR employee_name LIKE ? AND salary_deduction > ?", array("0",'%'.$like_val.'%', '%'.$like_val.'%', "0"), "", "", "");
                }
                $listData = array();
                while($tbl_EmployeeMisc = Db::assoc($query)){
                    $dataRow = array();
                    $dataRow[] = $tbl_EmployeeMisc['employee_number'];
                    $dataRow[] = $tbl_EmployeeMisc['employee_name'];   
                    $dataRow[] = $tbl_EmployeeMisc['misc_name'];
                    $dataRow[] = $tbl_EmployeeMisc['misc_amount'];
                    $dataRow[] = $tbl_EmployeeMisc['salary_deduction'];
                    $dataRow[] = '<button type="button" class="btn btn-success" disabled><i class="material-icons">check</i> paid </button>';
                    $listData[] = $dataRow;
                }
                $query2 = Db::fetch(self::$tbl_employeeMisc, "", "", "", "", "", "");
                $numRows = Db::count($query2);
                $result_data = array (
                    'draw'              => intval($_GET['draw']),
                    'recordsTotal'      => $numRows,
                    'recordsFiltered'   => $numRows,
                    'data'              => $listData
                );
                echo json_encode($result_data);
                break;

            case 'paid_employee_misc':
                $query = Db::fetch(self::$tbl_employeeMisc, "", "salary_deduction <= ?", "0", "", "", "");
                $limit = $_GET['start'].', '.$_GET['length'];
                if($_GET['length'] != -1){
                    $query = Db::fetch(self::$tbl_employeeMisc, "", "salary_deduction <= ?", "0", "", $limit, "");
                }
                if(!empty($_GET['search']['value'])){
                    $like_val = $_GET['search']['value'];
    
                    $query = Db::fetch(self::$tbl_employeeMisc, "", "salary_deduction <= ? AND employee_number LIKE ? OR employee_name LIKE ? AND salary_deduction > ?", array("0",'%'.$like_val.'%', '%'.$like_val.'%', "0"), "", "", "");
                }
                $listData = array();
                while($tbl_EmployeeMisc = Db::assoc($query)){
                    $dataRow = array();
                    $dataRow[] = $tbl_EmployeeMisc['employee_number'];
                    $dataRow[] = $tbl_EmployeeMisc['employee_name'];   
                    $dataRow[] = $tbl_EmployeeMisc['misc_name'];
                    $dataRow[] = $tbl_EmployeeMisc['misc_amount'];
                    $dataRow[] = $tbl_EmployeeMisc['salary_deduction'];
                    $dataRow[] = '<button type="button" class="btn btn-success" disabled><i class="material-icons">check</i> paid </button>';
                    $listData[] = $dataRow;
                }
                $query2 = Db::fetch(self::$tbl_employeeMisc, "", "", "", "", "", "");
                $numRows = Db::count($query2);
                $result_data = array (
                    'draw'              => intval($_GET['draw']),
                    'recordsTotal'      => $numRows,
                    'recordsFiltered'   => $numRows,
                    'data'              => $listData
                );
                echo json_encode($result_data);
                break;

            case 'staff_damages':
                $query = Db::fetch(self::$tbl_staffDamages, "", "salary_deduction > ?", "0", "", "", "");
                $limit = $_GET['start'].', '.$_GET['length'];
                if($_GET['length'] != -1){
                    $query = Db::fetch(self::$tbl_staffDamages, "", "salary_deduction > ?", "0", "", $limit, "");
                }
                if(!empty($_GET['search']['value'])){
                    $like_val = $_GET['search']['value'];
    
                    $query = Db::fetch(self::$tbl_staffDamages, "", "salary_deduction > ? AND employee_number LIKE ? OR employee_name LIKE ? AND salary_deduction > ?", array("0",'%'.$like_val.'%', '%'.$like_val.'%', "0"), "", "", "");
                }
                $listData = array();
                while($tbl_StaffDamages = Db::assoc($query)){
                    $dataRow = array();
                    $dataRow[] = $tbl_StaffDamages['employee_number'];
                    $dataRow[] = $tbl_StaffDamages['employee_name'];
                    $dataRow[] = $tbl_StaffDamages['issue_name'];
                    $dataRow[] = date('M d, Y', strtotime(date($tbl_StaffDamages['date_issue'])));;
                    $dataRow[] = $tbl_StaffDamages['damage_amount'];
                    $dataRow[] = $tbl_StaffDamages['salary_deduction'];
                    $dataRow[] = '<button type="button" name="update" id="'.$tbl_StaffDamages['id'].'" class="btn btn-success update"><i class="material-icons">monetization_on</i> pay </button>';
    
                    $listData[] = $dataRow;
                }
                $query2 = Db::fetch(self::$tbl_staffDamages, "", "", "", "", "", "");
                $numRows = Db::count($query2);
                $result_data = array (
                    'draw'              => intval($_GET['draw']),
                    'recordsTotal'      => $numRows,
                    'recordsFiltered'   => $numRows,
                    'data'              => $listData
                );
                echo json_encode($result_data);
                break;

            case 'paid_staff_damages':
                $query = Db::fetch(self::$tbl_staffDamages, "", "salary_deduction <= ?", "0", "", "", "");
                $limit = $_GET['start'].', '.$_GET['length'];
                if($_GET['length'] != -1){
                    $query = Db::fetch(self::$tbl_staffDamages, "", "salary_deduction <= ?", "0", "", $limit, "");
                }
                if(!empty($_GET['search']['value'])){
                    $like_val = $_GET['search']['value'];
    
                    $query = Db::fetch(self::$tbl_staffDamages, "", "salary_deduction <= ? AND employee_number LIKE ? OR employee_name LIKE ? AND salary_deduction <= ?", array("0",'%'.$like_val.'%', '%'.$like_val.'%', "0"), "", "", "");
                }
                $listData = array();
                while($tbl_StaffDamages = Db::assoc($query)){
                    $dataRow = array();
                    $dataRow[] = $tbl_StaffDamages['employee_number'];
                    $dataRow[] = $tbl_StaffDamages['employee_name'];
                    $dataRow[] = $tbl_StaffDamages['issue_name'];
                    $dataRow[] = date('M d, Y', strtotime(date($tbl_StaffDamages['date_issue'])));;
                    $dataRow[] = $tbl_StaffDamages['damage_amount'];
                    $dataRow[] = $tbl_StaffDamages['salary_deduction'];
                    $dataRow[] = '<button type="button" class="btn btn-success" disabled><i class="material-icons">check</i> paid </button>';
                    $listData[] = $dataRow;
                }
                $query2 = Db::fetch(self::$tbl_staffDamages, "", "", "", "", "", "");
                $numRows = Db::count($query2);
                $result_data = array (
                    'draw'              => intval($_GET['draw']),
                    'recordsTotal'      => $numRows,
                    'recordsFiltered'   => $numRows,
                    'data'              => $listData
                );
                echo json_encode($result_data);
                break;
        }
    }

    public static function getData(){
        if(isset($_GET['ca_id'])){
            $query = Db::fetch(self::$tbl_staffCA, '', 'id = ?', $_GET['ca_id'], '', '', '');
            $row =  Db::num($query);
            
            echo json_encode($row);
            unset($_GET['ca_id']);
        } else if(isset($_GET['loan_id'])){
            $query = Db::fetch(self::$tbl_staffLoan, '', 'id = ?', $_GET['loan_id'], '', '', '');
            $row = Db::num($query);
            
            echo json_encode($row);
        } else if(isset($_GET['damage_id'])){
            $query = Db::fetch(self::$tbl_staffDamages, '', 'id = ?', $_GET['damage_id'], '', '', '');
            $row = Db::num($query);
            
            echo json_encode($row);
        } else {
            //do nothing
        }

        return;
    }

    public static function update($type){
        switch($type){
            case 'staff_ca':
                if(isset($_POST['employee_number'])){
                    $employee_number = $_POST['employee_number'];
                    $employee_name = $_POST['employee_name'];
                    $ca_date = $_POST['ca_date'];
                    $ca_amount = $_POST['ca_amount'];
                    $ca_remarks = $_POST['ca_remarks'];
                    $ca_pay_amount = $_POST['ca_pay_amount'];

                    $total = $ca_amount - $ca_pay_amount;
        
                    Db::update(self::$tbl_staffCA, array("employee_number", "employee_name", "date_cash_advance", "salary_deduction", "remarks"), array($employee_number, $employee_name, $ca_date, $total, $ca_remarks), "employee_number = ? AND date_cash_advance = ? AND remarks = ?", array($employee_number, $ca_date, $ca_remarks));
                }
                break;
            
            case 'staff_loan':
                if(isset($_POST['employee_id'])){
                    $employee_id        = $_POST['employee_id'];
                    $employee_name      = $_POST['employee_name'];
                    $loan_amount        = $_POST['loan_amount'];
                    $loan_interest      = $_POST['loan_interest'];
                    $loan_balance       = $_POST['loan_balance'];
                    $date_of_loan       = $_POST['date_of_loan'];
                    $due_date           = $_POST['due_date'];
                    $loan_remarks       = $_POST['loan_remarks'];
                    $loan_pay_amount    = $_POST['loan_pay_amount'];

                    $total = $loan_balance - $loan_pay_amount;

                    Db::update(self::$tbl_staffLoan, array('employee_number', 'employee_name', 'date_of_loan', 'due_date', 'loan_amount', 'loan_interest', 'loan_balance', 'loan_remarks'), array($employee_id, $employee_name, $date_of_loan, $due_date, $loan_amount, $loan_interest, $total, $loan_remarks), "employee_number = ? AND date_of_loan = ? AND due_date = ? AND loan_remarks = ?", array($employee_id, $date_of_loan, $due_date, $loan_remarks));
                }
            
            case 'staff_damages':
                if(isset($_POST['employee_number'])){
                    $employee_number            = $_POST['employee_number'];
                    $employee_name              = $_POST['employee_name'];
                    $date_issue                 = $_POST['date_issue'];
                    $issue_name                 = $_POST['issue_name'];
                    $damage_amount_balance      = $_POST['damage_amount_balance'];
                    $pay_damage_amount          = $_POST['pay_damage_amount'];
                    $total = $damage_amount_balance - $pay_damage_amount;
                    
                    Db::update(self::$tbl_staffDamages, array('salary_deduction'), array($total), "employee_number = ? AND employee_name = ? AND date_issue = ? AND issue_name = ?", array($employee_number, $employee_name, $date_issue, $issue_name));
                }
                break;
        }
    }
}