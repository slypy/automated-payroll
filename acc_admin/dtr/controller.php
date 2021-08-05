<?php 
# Require the Important php
require_once "../../important.php";

# GET data action from URL
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

# Switch the case what action got from the URL to be performed in this controller module
switch($action){
    case 'logout':
        //case logout destroy all sessions and cookies so that the login session will not having error
        @session_destroy(); 
        setcookie("usr", "" ,time()-(60*60*24*7*30),"/", "","",TRUE);
        Page::redir("../index.php");
        break;

    case 'getDTRdata':
        getDTRdata();
        break;

    case 'getEmployeeDTRdata':
        datatable_EmployeeDTRRecord();
        break;

    case 'listDTRRecord':
        datatable_DTRRecord();
        break;

    case 'addDTRRecord':
        add_DTRRecord();
        break;

    case 'updateDTRRecord':
        update_DTRRecord();
        break;

    case 'get_employee_name':
        getEmployeeName();
        break;

    case 'getEmployeeDTRbyID':
        getEmployeeDTRbyID();
        break;

}
function getEmployeeName(){
    Employee::getDataName();
    return;
}

function getDTRdata(){
    DTR::getDTRData();
    return;
}

function datatable_DTRRecord(){
    DTR::fetchRecordDTRData();
    return;
}

function add_DTRRecord(){
    DTR::addRecordNoScanner();
}

function update_DTRRecord(){
    DTR::updateRecord();
    return;
}

function datatable_EmployeeDTRRecord(){
    DTR::fetchEmployeeRecordDTRData();
    return;
}

function getEmployeeDTRbyID(){
    DTR::getDTRData();
    return;
}
?>