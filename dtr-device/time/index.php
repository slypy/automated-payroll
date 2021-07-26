<?php
require_once '../../important.php';

$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';

switch ($page) {
	case 'scan':
		$page_content = 'scan.php';
		break;
  	default :
		$page_content = 'time.php';
	}

require_once('../page.php');
?>