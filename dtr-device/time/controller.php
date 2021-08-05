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

    case 'uploadImage':
        ImageUpload();
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

function ImageUpload(){
    if(isset($_POST['image_data'])){
        $encoded_data = $_POST['image_data'];
        $data_parts = explode(';base64,', $encoded_data);
        $binary_data = base64_decode($data_parts[1]);

        $file_name = date('YmdHis').'.jpeg';
        
        $result = file_put_contents('uploads/'.$file_name, $binary_data);
        if (!$result) die("Could not save image!  Check file permissions.");
    }
}

?>