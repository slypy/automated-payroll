<?php

class Account{
    protected static $id, $user, $pass, $query;

    public static function loggedIn(){
        if(isset($_COOKIE["usr"]) && $_COOKIE["usr"] != "") return true;

        return false;
    }

    public static function add($firstname, $lastname, $username, $password, $position, $profile_pic){

        self::$query = Db::fetch("tbl_accounts", "id","username = ? ", array($username), "", "", "");
    
        /**
         * TODO:
         * 
         * Fix this username and email error is bug
         */
        if(Db::count(self::$query)){
            $_SESSION['user_already_taken'] = "Username is already taken.";

            return false;
        // } else if (Db::count(self::$query)){
        //     $_SESSION['email_already_taken'] = "Email is already taken.";

        //     return false;
        } else {
            Db::insert("tbl_accounts", array("firstname", "lastname", "username", "password", "role", "profile_pic"), array($firstname, $lastname, $username, $password, $position, $profile_pic));

            return true;
        }
    }

    public static function login($username, $password){
        self::$query = Db::fetch("tbl_accounts", "","username = ? AND password = ?", array($username, $password), "", "", "");

        @session_start();

        if(Db::count(self::$query)){
            $idToken = Db::num(self::$query);
            self::$id = $idToken[0];
            $role = $idToken[5];

            setcookie("usr", self::$id, time()+(60*60*24*7*30),"/", "","",TRUE);

            switch($role){
                case "admin":
                    Page::redir("../acc_admin/index.php");
                    break;
                case "user":
                    Page::redir("../acc_user/index.php");
                    break;
            }
        } else {
            $_SESSION['invalid_account'] = "Invalid Username and Password. Please try again.";
            Page::redir("../login/index.php");   
        }
    }
}