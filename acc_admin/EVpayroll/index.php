<?php 
require_once("../../important.php");

if(Account::loggedIn()){
	$page_title = "Employee's Payroll Verification";
	$page_content    = 'EVpayroll.php';
	
	require_once('../page.php');
} else {
	Page::redir($web_root."index.php");
}
?>