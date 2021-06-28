<?php
    class Position{
        protected static $query;
        protected static $db_tbl = "tbl_positions";

        public static function add($position_name, $wage, $wage_amount, $start_time, $end_time, $total_work_hours){

            # if the position wage will set as per_hour, then calculate the per_day
            $wage_per_day = "";

            # if the admin will set the position wage as per_day then calculate the per_hour
            $wage_per_hour = "";

            self::$query = DB::fetch("tbl_positions", "id", "position_name = ?", $position_name, "", "", "");

            if(Db::count(self::$query)){
                $_SESSION['position_name_already_taken'] = "Position name is already exist! try use another name.";

                return false;
            } else {
                switch($wage){
                    case 'Per Hour':
                        Db::insert(self::$db_tbl, array("position_name", "wage", "per_hour", "per_day", "start_time", "end_time"), array($position_name, $wage, $wage_amount, $wage_per_day, $start_time,$end_time, $total_work_hours));
                        break;

                    case 'Per Day':
                        Db::insert(self::$db_tbl, array("position_name", "wage", "per_hour", "per_day", "start_time", "end_time"), array($position_name, $wage, $wage_per_hour, $wage_amount, $start_time,$end_time, $total_work_hours));
                        break;
                }
            }
        }
    }
