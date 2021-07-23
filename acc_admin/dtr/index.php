<?php 
require_once("../../important.php");

$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {
	case 'employee-dtr':
		$page_title = "Update Employee's DTR";
		$page_content = 'update_employee_time-in-out.php';
		break;
  	default :
	    $page_title = "Daily Time Record";
		$page_content    = 'dtr.php';

	}

require_once('../page.php');
?>