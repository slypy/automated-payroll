<?php
    class Position{
        protected static $query;
        protected static $db_tbl = "tbl_positions";

        public static function add($position_name, $wage, $wage_amount){

            # if the position wage will set as per_hour, then insert 0 in perday column
            $wage_per_day = 0;

            # if the admin will set the position wage as per_day then insert 0 in perday column
            $wage_per_hour = 0;

            self::$query = Db::fetch("tbl_positions", "id", "position_name = ?", $position_name, "", "", "");

            if(Db::count(self::$query)){
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
    }
