<?php 
require_once("../../important.php");

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
switch ($view) {
  
  	default :
	    $page_title = "Update Clock-In/Out";
		$page_content    = 'clockupdate.php';

	}

require_once('../page.php');
?>