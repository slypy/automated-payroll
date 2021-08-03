<?php
require_once '../../important.php';

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch($action){
    case 'addDTRWithScanner':
        add_DTRWithScanner();
        break;

    case 'addInitialDTR':
        add_InitialDTR();
        break;

    case 'getDTRdata':
        get_DTRdata();
        break;
}

function add_DTRWithScanner(){
    DTR::addRecordWithScanner();
    return;
}

function add_InitialDTR(){
    DTR::addInitialDTR();
    return;
}

function get_DTRdata(){
    DTR::getDTRData();
    return;
}

?>