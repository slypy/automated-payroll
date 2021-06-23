<?php

# start new session per open per usr
ob_start();
@session_start();

# load class files
spl_autoload_register(function($file){
	require_once "classes/$file.class.php";
});

# define global variable web_root to avoid misrouting of php paths
$this_file = str_replace('\\', '/', __File__) ;
$doc_root = $_SERVER['DOCUMENT_ROOT'];
$web_root =  str_replace (array($doc_root, "important.php") , '' , $this_file);
$server_root = str_replace ('config/config.php' ,'', $this_file);

define ('web_root' , $web_root);
define('server_root' , $server_root);
?>