<?php 
require_once("../../important.php");

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
switch ($view) {
  
  	default :
	    $page_title = "Scedule AutoPrint Payroll";
		$page_content    = 'SApayroll.php';

	}

require_once('../page.php');
?>