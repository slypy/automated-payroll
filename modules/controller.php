<?php

require_once("../important.php");

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';


switch($action){
    case 'login':
        Authenticate();
        break;

    case 'signup':
        doAdd();
        break;
}

function Authenticate(){
    if(isset($_POST["login"])){
        $username = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($_POST["password"],ENT_QUOTES, 'UTF-8');

        if($username == "" || $password == ""){
            return;
            
        } else {
            Account::login($username, $password);
        }
    }
}

function doAdd(){
    if(isset($_POST["register"])){
        $firstname = htmlspecialchars($_POST["firstname"], ENT_QUOTES, 'UTF-8');
        $lastname = htmlspecialchars($_POST["lastname"], ENT_QUOTES, 'UTF-8');
        $username = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($_POST["confirmpassword"], ENT_QUOTES, 'UTF-8');
        $position = htmlspecialchars($_POST["position"]);

        if(Account::add($firstname, $lastname, $username, $password, $position, "")){
            Account::login($username, $password);
        } else {
            Page::redir("../signup/index.php");
        }
    }
}
?>

?>