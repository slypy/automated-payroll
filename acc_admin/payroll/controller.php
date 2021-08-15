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
        setcookie("username", "" ,time()-(60*60*24*7*30),"/", "","",TRUE);
        Page::redir("../index.php");
        break;

    case 'startCalculatePayroll':
        startCalculate();
        break;
    
    case 'getPayrollReport':
        getPayrollReport();
        break;

    case 'getPayrollSettings':
        getPayrollSettings();
        break;
    
    case 'setPayrollSettings':
        setPayrollSettings();
        break;
}

function startCalculate(){
    Payroll::startCalculate();
    return;
}

function getPayrollReport(){
    Payroll::getReport();
    return;
}

function getPayrollSettings(){
    $json_data = file_get_contents('settings.json');
    Payroll::getPayrollSettings($json_data);
    return;
}

function setPayrollSettings(){
    $json_data = file_get_contents('settings.json');
    Payroll::setPayrollSettings($json_data);
    return;
}

?>