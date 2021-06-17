<?php 

/**
 * type{class}
 * 
 */
class Page{

	public static function redir($page){
		header("Location: $page"); 
	}
}