<?php 
require_once("../../important.php");

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
switch ($view) {
  
  	default :
	    $page_title = "Daily Time Record";
		$page_content    = 'dtr.php';

	}

require_once('../page.php');
?>