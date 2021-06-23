<?php 
require_once("../../important.php");

$action = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';

if(Account::loggedIn()){
	switch($action){
		case 'time-in-out':
			$page_title = 'Update Employee Time-In/Out';
			$page_content = 'update_employee_time-in-out.php';
			break;
		default:
			$page_title = "Employees";
			$page_content    = 'employee.php';
			break;
	}
	require_once('../page.php');
} else {
	Page::redir($web_root."index.php");
}
