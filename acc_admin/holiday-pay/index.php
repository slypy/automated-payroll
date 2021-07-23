<?php 
require_once("../../important.php");

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
  	default :
	    $page_title = "Holiday Pay";
		$page_content    = 'holidaypay.php';

	}

require_once('../page.php');
