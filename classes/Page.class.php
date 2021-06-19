<?php 

/**
 * type{class} Page
 */

class Page{
	public static function redir($page){
		header("Location: $page"); 
	}
}