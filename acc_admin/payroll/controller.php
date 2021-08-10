<?php 
# Require the Important php
require_once "../../important.php";
include "../../modules/crud.php";

# GET data action from URL
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

# Switch the case what action got from the URL to be performed in this controller module
switch($action){
    case 'logout':
        // destroy all sessions and cookies
        @session_destroy(); 
        setcookie("usr", "" ,time()-(60*60*24*7*30),"/", "","",TRUE);
        Page::redir("../index.php");
        break;

    case 'automaticAdd':
        autoAddPayroll();
        break;

    case 'autoUpdate':
        autoUpdatePayroll();
        break;

}

function autoAddPayroll(){
    Payroll::autoAdd();
    return;
}

function autoUpdatePayroll(){
    Payroll::autoUpdate();
    return;
}

?>