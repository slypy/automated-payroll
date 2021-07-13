<?php
    class Position{
        protected static $db_tbl = "tbl_positions";

        public static function add($position_name, $wage_salary, $wage_type){

            $query = Db::fetch("tbl_positions", "id", "position_name = ?", $position_name, "", "", "");

            if(Db::count($query)){
                $_SESSION['position_name_already_taken'] = "Position name is already exist! try use another name.";

                return false;
            } else {
                Db::insert(self::$db_tbl, array("position_name", "wage_salary", "wage_type"), array($position_name, $wage_salary, $wage_type));
            }
        }

        public static function fetchName(){
            $query = Db::fetch(self::$db_tbl, "", "", "", "", "", "");

            while($result = Db::assoc($query)){
                echo '<option value="'.$result['position_name'].'">'.$result['position_name'].'</option>';
            }

            return;
        }

        public static function fetchPositionList(){
            $query = Db::fetch(self::$db_tbl, "", "", "", "", "", "");
            
            # Page length
            $limit = $_GET['start'].', '.$_GET['length'];
            if($_GET["length"] != -1){
                $query = Db::fetch(self::$db_tbl, "", "", "", "", $limit, "");
            }

            # search respond after page length
            if(!empty($_GET["search"]["value"])){
                $like_val = $_GET['search']['value'];

                $query = Db::fetchLike(self::$db_tbl, "position_name", $like_val);
            }
            
            # data array for 
            $positionData = array();
            while($tbl_position = Db::assoc($query)){
                $positionRows = array();
                $positionRows[] = $tbl_position['position_name'];
                $positionRows[] = $tbl_position['wage_salary'];
                $positionRows[] = $tbl_position['wage_type'];
		        $positionRows[] = '<button type="button" name="update" id="'.$tbl_position['id'].'" class="btn btn-success update"><i class="material-icons">edit</i></button> <button type="button" name="delete" id="'.$tbl_position["id"].'" class="btn btn-danger delete"><i class="material-icons">delete</i></button>';
                $positionData[] = $positionRows;
            }

            # Datatable pagination
            $query2 = Db::fetch(self::$db_tbl, "", "", "", "", "", "");
            $numRows = Db::count($query2);

            $result_data = array(
                "draw"            => intval($_GET["draw"]),
                "recordsTotal"    => $numRows,
                "recordsFiltered" => $numRows,
                "data"            => $positionData
            );

            #encode json format to 
            echo json_encode($result_data);
        }

        public static function getData(){
            if($_GET['pos_id']){
                $query = Db::fetch(self::$db_tbl,"", "id = ?", $_GET['pos_id'], "", "", "");
    
                $row = DB::num($query);
                echo json_encode($row);
            }
        }

        public static function deletePosition(){
            if($_GET['pos_id']){
                Db::delete(self::$db_tbl, "id = ?", $_GET['pos_id']);
            }
        }

        public static function updateRow(){
            $position_name = $_POST['position_name'];
            $wage_salary = $_POST['wage_salary'];
            $wage_type = $_POST['wage_type'];

            if(isset($_POST['position_name'])){
                Db::update(self::$db_tbl, array('position_name', 'wage_salary', 'wage_type'), array($position_name, $wage_salary, $wage_type), "position_name = ?", $position_name);
            }
        }
    }