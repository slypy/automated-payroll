<?php 

require_once "../../important.php";

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch($action){
    case 'logout':
        @session_destroy();
        setcookie("usr", "", time()-(60*60*24*7*30),
        "/", "", "", TRUE);
        Page::redir("../index.php");
        break;
    
    case 'listHolidayPay':
        datatable_HolidayPayList();
        break;

    case 'add_holiday_pay':
        doAdd_HolidayPay();
        break;

    case 'get_holiday_pay':
        doGet_HolidayPay();
        break;

    case 'update_holiday_pay':
        doUpdate_HolidayPay();
        break;

    case 'delete_holiday_pay':
        doDelete_HolidayPay();
        break;
}

function datatable_HolidayPayList(){
    HolidayPay::fetchList();
    return;
}

function doAdd_HolidayPay(){
    if(isset($_POST['holiday_name'])){
        $holiday_name = htmlspecialchars($_POST['holiday_name'], ENT_QUOTES, 'UTF-8');
        $holiday_date = $_POST['holiday_date'];
        $none_over_time_percent = $_POST['none_over_time_percent'];
        $over_time_percent = $_POST['over_time_percent'];

        HolidayPay::add($holiday_name, $holiday_date, $none_over_time_percent, $over_time_percent);
    }
    return;
}

function doGet_HolidayPay(){
    HolidayPay::getData();
    return;
}

function doUpdate_HolidayPay(){
    HolidayPay::updateRow();
    return;
}

function doDelete_HolidayPay(){
    HolidayPay::deleteRow();
    return;
}