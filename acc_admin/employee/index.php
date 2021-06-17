<?php 
require_once("../../important.php");

if(Account::loggedIn()){
	$page_title = "Employees";
	$page_content    = 'employee.php';
	
	require_once('../page.php');
} else {
	Page::redir($web_root."index.php");
}
