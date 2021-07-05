<?php 
require_once("../../important.php");

if(Account::loggedIn()){
	$page_title = "Dashboard";
	$page_content    = 'dashboard.php';
	
	require_once('../page.php');
} else {
	Page::redir($web_root."index.php");
}
