<?php 
require_once("../../important.php");

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
switch ($view) {
  
  	default :
	    $page_title = "Payroll";
		$page_content    = 'payrollreport.php';

	}

require_once('../page.php');
?>