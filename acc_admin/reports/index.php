<?php 
require_once("../../important.php");

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
switch ($view) {
  
  	default :
	    $page_title = "Reports";
		$page_content    = 'report.php';

	}

require_once('../page.php');
?>