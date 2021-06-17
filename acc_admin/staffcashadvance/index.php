<?php 
require_once("../../important.php");

if(Account::loggedIn()){
	$page_title = "Staff Cash Advance";
	$page_content    = 'staffcashadvance.php';
	
	require_once('../page.php');
} else {
	Page::redir($web_root."index.php");
}
?>