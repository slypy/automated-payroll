<?php 
    class Employee {
        protected static $tbl_employees = 'tbl_employees';
        
        public static function add(){
            $employee_number        = '';
            $card_id                = '';
            $fingerprint_number     = '';
            $worker_type            = '';
            $job_position           = '';
            $shifting_type          = '';
            $first_name             = '';
            $last_name              = '';
            $middle_name            = '';
            $birth_date             = '';
            $age                    = 0;
            $gender                 = '';
            $civil_status           = '';
            $full_address           = '';
            $email                  = '';
            $contact_number         = '';
            $contact_person         = '';
            $contact_person_number  = '';
            $relationship           = '';
            $duration_date          = '';
            $start_date             = '';
            $end_date               = '';
            $sss_number             = '';
            $employee_er            = 0;
            $employee_ee            = 0;
            $sss_active_loan        = 0;
            $philhealth_number      = '';
            $philhealth_per_month   = 0;
            $pag_ibig_number        = '';
            $pag_ibig_per_month     = 0;
            $pag_ibig_active_loan   = 0;
            if(isset($_POST["employee_number"])){
                $employee_number        = $_POST['employee_number'];
                $card_id                = $_POST['card_id'];
                $fingerprint_number     = $_POST['fingerprint_number'];
                $worker_type            = $_POST['worker_type'];
                $job_position           = $_POST['job_position'];
                $shifting_type          = $_POST['shifting_type'];
                $first_name             = $_POST['first_name'];
                $last_name              = $_POST['last_name'];
                $middle_name            = $_POST['middle_name'];
                $birth_date             = $_POST['birth_date'];
                $age                    = $_POST['age'];
                $gender                 = $_POST['gender'];
                $civil_status           = $_POST['civil_status'];
                $full_address           = $_POST['full_address'];
                $email                  = $_POST['email'];
                $contact_number         = $_POST['contact_number'];
                $contact_person         = $_POST['contact_person'];
                $contact_person_number  = $_POST['contact_person_number'];
                $relationship           = $_POST['relationship'];
                $duration_date          = $_POST['duration_date'];
                $start_date             = $_POST['start_date'];
                $end_date               = $_POST['end_date'];
                if(isset($_POST['sss_number'])){
                    $sss_number             = $_POST['sss_number'];
                    $employee_er            = $_POST['employee_er'];
                    $employee_ee            = $_POST['employee_ee'];
                    $sss_active_loan        = $_POST['sss_active_loan'];
                    $philhealth_number      = $_POST['philhealth_number'];
                    $philhealth_per_month   = $_POST['philhealth_per_month'];
                    $pag_ibig_number        = $_POST['pag_ibig_number'];
                    $pag_ibig_per_month     = $_POST['pag_ibig_per_month'];
                    $pag_ibig_active_loan   = $_POST['pag_ibig_active_loan'];
                }
            }
            $query = Db::fetch(self::$tbl_employees, "id", "employee_number = ? AND card_id = ? AND employee_status = ? AND fingerprint_number = ?", array($employee_number, $card_id, 'active',$fingerprint_number), "", "", "");

            if(Db::count($query)){
                $_SESSION['employee_data_already_taken'] = "Employee id number is already exist! try use different ID numbers";
                return false;
            } else {
                Db::insert(self::$tbl_employees, array("employee_status","employee_number", "card_id", "fingerprint_number", "worker_type", "job_position", "shifting_type_name", "first_name", "last_name", "middle_name", "birth_date", "age", "gender", "civil_status", "full_address", "email", "contact_number", "contact_person", "contact_person_number", "relationship", "duration_date", "start_date", 
                "end_date", "sss_number", "employee_er", "employee_ee", "sss_active_loan", "philhealth_number", "philhealth_per_month", "pag_ibig_number", "pag_ibig_per_month", "pag_ibig_active_loan"), array("active",$employee_number, $card_id, $fingerprint_number, $worker_type, $job_position, $shifting_type, $first_name, $last_name, $middle_name, $birth_date, $age, $gender, $civil_status, $full_address, $email, $contact_number, $contact_person, $contact_person_number, $relationship, $duration_date, $start_date, $end_date, $sss_number, $employee_er, $employee_ee, $sss_active_loan, $philhealth_number, $philhealth_per_month, $pag_ibig_number, $pag_ibig_per_month, $pag_ibig_active_loan));

                return;
            }
        }

        public static function fetchList($type){
            switch($type){
                case 'active-employee':
                    $query = Db::fetch(self::$tbl_employees, "id, employee_number, first_name, last_name, contact_number, shifting_type_name, job_position, employee_status", "employee_status = ?", "active", "", "", "");

                    $limit = $_GET['start'].', '.$_GET['length'];
                    if($_GET['length'] != -1){
                        $query = Db::fetch(self::$tbl_employees, "id, employee_number, first_name, last_name, contact_number, shifting_type_name, job_position, employee_status", "employee_status = ?", "active", "", $limit, "");
                    }
                    if(!empty($_GET['search']['value'])){
                        $like_val = '%'.$_GET['search']['value'].'%';
                        $query = Db::fetch(self::$tbl_employees, "id, employee_number, first_name, last_name, contact_number, shifting_type_name, job_position, employee_status","employee_status = ? AND CONCAT(TRIM(first_name),' ',TRIM(last_name)) LIKE ? AND employee_status = ? OR employee_number LIKE ? AND employee_status = ?", array('active', $like_val,'active', $like_val, 'active'), "", "", "");
                    }

                    $listData = array();
                    while($tbl_employee = Db::assoc($query)){
                        $dataRow = array();
                        $dataRow[] = '<input type="checkbox" id="checked_remove_'.$tbl_employee['id'].'" class="checked_remove_employee" onclick="checkedBoxRemove()" value="'.$tbl_employee['id'].'"/>';
                        $dataRow[] = $tbl_employee['employee_number'];
                        $dataRow[] = $tbl_employee['first_name'].' '. $tbl_employee['last_name'];
                        $dataRow[] = $tbl_employee['contact_number'];
                        $dataRow[] = $tbl_employee['shifting_type_name'];
                        $dataRow[] = $tbl_employee['job_position'];
                        $dataRow[] = '<button type="button" class="btn btn-success" disabled>'.$tbl_employee['employee_status'].'</button>';
                        $dataRow[] = '<button type="button" name="update" id="'.$tbl_employee['id'].'" class="btn btn-success update"><i class="material-icons">edit</i></button> <button type="button" name="info" id="'.$tbl_employee['id'].'" class="btn btn-info info"><i class="material-icons">info</i></button> <button type="button" name="delete" id="'.$tbl_employee['id'].'" class="btn btn-danger delete"><i class="material-icons">delete</i></button>';

                        $listData[] = $dataRow;
                    }
                    $query2 = Db::fetch(self::$tbl_employees, "id", "", "", "", "", "");
                    $numRows = Db::count($query2);
                    $result_data = array (
                        'draw'              => intval($_GET['draw']),
                        'recordsTotal'      => $numRows,
                        'recordsFiltered'   => $numRows,
                        'data'              => $listData
                    );

                    echo json_encode($result_data);
                    break;
                
                case 'removed-employee':
                    $query = Db::fetch(self::$tbl_employees, "id, employee_number, first_name,last_name, contact_number, job_position, employee_status", "employee_status = ?", "removed", "", "", "");
                    $limit = $_GET['start'].', '.$_GET['length'];
                    if($_GET['length'] != -1){
                        $query = Db::fetch(self::$tbl_employees, "id, employee_number, first_name, last_name, contact_number, job_position, employee_status", "employee_status = ?", "removed", "", $limit, "");
                    }
                    if(!empty($_GET['search']['value'])){
                        $like_val = '%'.$_GET['search']['value'].'%';
                        $query = Db::fetch(self::$tbl_employees, "id, employee_number, first_name, last_name, contact_number, job_position, employee_status","employee_status = ? AND CONCAT(TRIM(first_name),' ',TRIM(last_name)) LIKE ? AND employee_status = ? OR employee_number LIKE ? AND employee_status = ?", array('removed', $like_val,'active', $like_val, 'removed'), "", "", "");
                    }
                    $listData = array();
                    while($tbl_employee = Db::assoc($query)){
                        $dataRow = array();
                        $dataRow[] = '<input type="checkbox" id="checked_delete_'.$tbl_employee['id'].'" class="checked_delete_employee" onclick="checkedBoxDelete()" value="'.$tbl_employee['id'].'"/>';
                        $dataRow[] = $tbl_employee['employee_number'];
                        $dataRow[] = $tbl_employee['first_name'].' '. $tbl_employee['last_name'];
                        $dataRow[] = $tbl_employee['contact_number'];
                        $dataRow[] = $tbl_employee['job_position'];
                        $dataRow[] = '<button type="button" class="btn btn-danger" disabled>'.$tbl_employee['employee_status'].'</button>';
                        $dataRow[] = '<button type="button" name="print" id="'.$tbl_employee['id'].'" class="btn btn-info print"><i class="material-icons">print</i> print</button> <button type="button" name="delete" id="'.$tbl_employee['id'].'" class="btn btn-danger delete"><i class="material-icons">delete</i></button>';
                        $listData[] = $dataRow;
                    }
                    $query2 = Db::fetch(self::$tbl_employees, "id", "employee_status = ?", "removed", "", "", "");
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
            if(isset($_GET['employee_id'])){
                $query = Db::fetch(self::$tbl_employees, "employee_number, card_id, fingerprint_number, worker_type, job_position, shifting_type_name, first_name, last_name, middle_name, birth_date, age, gender, civil_status, full_address, email, contact_number, contact_person, contact_person_number, relationship, duration_date, start_date, end_date, sss_number, employee_er, employee_ee, sss_active_loan, philhealth_number, philhealth_per_month, pag_ibig_number, pag_ibig_per_month, pag_ibig_active_loan", "id = ?" , $_GET['employee_id'], "", "", "");
                $row = Db::assoc($query);
                echo json_encode($row);
            }
            return;
        }

        public static function getDataName(){
            if(isset($_GET['employee_id'])){
                $query = Db::fetch(self::$tbl_employees, "", "employee_number = ?" , $_GET['employee_id'], "", "", "");
                $row = Db::num($query);
                echo json_encode($row);
            }
            return;
        }

        public static function updateData(){
            $employee_number        = '';
            $card_id                = '';
            $fingerprint_number     = '';
            $worker_type            = '';
            $job_position           = '';
            $shifting_type          = '';
            $first_name             = '';
            $last_name              = '';
            $middle_name            = '';
            $birth_date             = '';
            $age                    = 0;
            $gender                 = '';
            $civil_status           = '';
            $full_address           = '';
            $email                  = '';
            $contact_number         = '';
            $contact_person         = '';
            $contact_person_number  = '';
            $relationship           = '';
            $duration_date          = '';
            $start_date             = '';
            $end_date               = '';
            $sss_number             = '';
            $employee_er            = 0;
            $employee_ee            = 0;
            $sss_active_loan        = 0;
            $philhealth_number      = '';
            $philhealth_per_month   = 0;
            $pag_ibig_number        = '';
            $pag_ibig_per_month     = 0;
            $pag_ibig_active_loan   = 0;
            if(isset($_POST["employee_number"])){
                $employee_number        = $_POST['employee_number'];
                $card_id                = $_POST['card_id'];
                $fingerprint_number     = $_POST['fingerprint_number'];
                $worker_type            = $_POST['worker_type'];
                $job_position           = $_POST['job_position'];
                $shifting_type          = $_POST['shifting_type'];
                $first_name             = $_POST['first_name'];
                $last_name              = $_POST['last_name'];
                $middle_name            = $_POST['middle_name'];
                $birth_date             = $_POST['birth_date'];
                $age                    = $_POST['age'];
                $gender                 = $_POST['gender'];
                $civil_status           = $_POST['civil_status'];
                $full_address           = $_POST['full_address'];
                $email                  = $_POST['email'];
                $contact_number         = $_POST['contact_number'];
                $contact_person         = $_POST['contact_person'];
                $contact_person_number  = $_POST['contact_person_number'];
                $relationship           = $_POST['relationship'];
                $duration_date          = $_POST['duration_date'];
                $start_date             = $_POST['start_date'];
                $end_date               = $_POST['end_date'];
                if(isset($_POST['sss_number'])){
                    $sss_number             = $_POST['sss_number'];
                    $employee_er            = $_POST['employee_er'];
                    $employee_ee            = $_POST['employee_ee'];
                    $sss_active_loan        = $_POST['sss_active_loan'];
                    $philhealth_number      = $_POST['philhealth_number'];
                    $philhealth_per_month   = $_POST['philhealth_per_month'];
                    $pag_ibig_number        = $_POST['pag_ibig_number'];
                    $pag_ibig_per_month     = $_POST['pag_ibig_per_month'];
                    $pag_ibig_active_loan   = $_POST['pag_ibig_active_loan'];
                }
            }
            Db::update(self::$tbl_employees, array("employee_number", "card_id", "fingerprint_number", "worker_type", "job_position", "shifting_type_name", "first_name", "last_name", "middle_name", "birth_date", "age", "gender", "civil_status", "full_address", "email", "contact_number", "contact_person", "contact_person_number", "relationship", "duration_date", "start_date", "end_date", "sss_number", "employee_er", "employee_ee", "sss_active_loan", "philhealth_number", "philhealth_per_month", "pag_ibig_number", "pag_ibig_per_month", "pag_ibig_active_loan"), array($employee_number, $card_id, $fingerprint_number, $worker_type, $job_position, $shifting_type, $first_name, $last_name, $middle_name, $birth_date, $age, $gender, $civil_status, $full_address, $email, $contact_number, $contact_person, $contact_person_number, $relationship, $duration_date, $start_date, $end_date, $sss_number, $employee_er, $employee_ee, $sss_active_loan, $philhealth_number, $philhealth_per_month, $pag_ibig_number, $pag_ibig_per_month, $pag_ibig_active_loan), "employee_number = ?", $employee_number);

            return;
        }

        public static function remove(){
            if(isset($_GET['employee_id'])){
                Db::update(self::$tbl_employees, array('employee_status'), array('removed'), "id = ?", $_GET['employee_id']);
            }
            return;
        }

        public static function removeSelected(){
            $selected_employee = array();
            if(isset($_POST['selected_employee'])){
                $selected_employee = $_POST['selected_employee'];
            }
            foreach($selected_employee as $employee_id){
                Db::update(self::$tbl_employees, array('employee_status'), array('removed'),'id = ?', $employee_id);
            }
            return;
        }

        public static function delete(){
            if(isset($_GET['employee_id'])){
                Db::delete(self::$tbl_employees, "id = ?", $_GET['employee_id']);
            }
            return;
        }

        public static function deleteSelected(){
            $selected_employee = array();
            if(isset($_POST['selected_removed_employee'])){
                $selected_employee = $_POST['selected_removed_employee'];
            }
            foreach($selected_employee as $employee_id){
                Db::delete(self::$tbl_employees, 'id = ?', $employee_id);
            }
            return;
        }
    }