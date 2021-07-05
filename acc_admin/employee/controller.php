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

    case 'add_employee':
        doAdd_Employee();
        break;

    case 'listPositions':
        datatable_PositionList();
        break;

    case 'listShiftingHours':
        datatable_ShiftingHours();
        break;
    
    case 'add_position':
        doAdd_Position();
        break;

    case 'add_shifting_type':
        doAdd_ShiftingType();
        break;

    case 'position_delete':
        delete_Position();
        break;

    case 'shifting_type_delete':
        delete_shiftingType();
        break;

    case 'get_shifting_type':
        getShiftingData();
        break;
    
    case 'update_shifting_type':
        updateShiftingType();
        break;
}

function doAdd_Employee(){
    if(isset($_POST["FirstName"])){
        $firstname = htmlspecialchars($_POST["FirstName"], ENT_QUOTES, 'UTF-8');
        $lastname = htmlspecialchars($_POST["LastName"], ENT_QUOTES, 'UTF-8');

        Account::add($firstname, $lastname, "sample","sample", "admin", "");
    }

    return;
}

function doAdd_Position(){
    if(isset($_POST['position_name'])){
        $position_name = htmlspecialchars($_POST['position_name']);
        $wage          = htmlspecialchars($_POST['wage']);
        $wage_amount   = htmlspecialchars($_POST['wage_amount']);


        Position::add($position_name,$wage,$wage_amount);
    } 
    return;
}

function doAdd_ShiftingType(){
    if(isset($_POST['shifting_type_name'])){
        $shifting_type_name = htmlspecialchars($_POST['shifting_type_name']);
        $start_time = strval($_POST['start_time']);
        $end_time = strval($_POST['end_time']);
        $break_time = htmlspecialchars($_POST['break_time']);
        $total_work_hours = htmlspecialchars($_POST['total_work_hours']);

        ShiftingHours::add($shifting_type_name, $start_time, $end_time, $break_time, $total_work_hours);
    }
}

function datatable_PositionList(){
    Position::fetchPositionList();
    return;
}

function delete_Position(){
    Position::deletePosition();
    return;
}

function delete_shiftingType(){
    ShiftingHours::deleteRow();
    return;
}

function datatable_ShiftingHours(){
    ShiftingHours::fetchList();
    return;
}

function getShiftingData(){
    ShiftingHours::getData();
    return;
}

function updateShiftingType(){
    ShiftingHours::updateRow();
    return;
}
