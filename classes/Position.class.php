<?php
    class Position{
        protected static $db_tbl = "tbl_positions";

        public static function add($position_name, $wage, $wage_amount){

            # if the position wage will set as per_hour, then insert 0 in perday column
            $wage_per_day = 0;

            # if the admin will set the position wage as per_day then insert 0 in perday column
            $wage_per_hour = 0;

            $query = Db::fetch("tbl_positions", "id", "position_name = ?", $position_name, "", "", "");

            if(Db::count($query)){
                $_SESSION['position_name_already_taken'] = "Position name is already exist! try use another name.";

                return false;
            } else {
                switch($wage){
                    case 'Per Hour':
                        Db::insert(self::$db_tbl, array("position_name", "wage", "per_hour", "per_day"), array($position_name, $wage, floatval($wage_amount), floatval($wage_per_day)));
                        break;

                    case 'Per Day':
                        Db::insert(self::$db_tbl, array("position_name", "wage", "per_hour", "per_day"), array($position_name, $wage, floatval($wage_per_hour), floatval($wage_amount)));
                        break;
                }
            }
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
                $positionRows[] = $tbl_position['per_hour'];
                $positionRows[] = $tbl_position['per_day'];
		        $positionRows[] = '<button type="button" name="delete" id="'.$tbl_position["id"].'" class="btn btn-danger delete"><i class="material-icons">delete</i></button>';
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

        public static function deletePosition(){
            if($_GET['pos_id']){
                Db::delete(self::$db_tbl, "id = ?", $_GET['pos_id']);
            }
        }

        public static function updateRow(){
            
        }
    }