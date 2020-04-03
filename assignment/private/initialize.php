<?php
	ob_start();
	session_start();	

	define("ASSIGNMT_FOLDER", dirname(__FILE__));
	define("PUBLIC_HTML", dirname(ASSIGNMT_FOLDER));
	define("WWW_ROOT", "http://www2.cs.uregina.ca/~mmx458/assignment");

	require_once('mysql_db_functions.php');
	require_once('query_functions.php');
	require_once('auth_functions.php');
	require_once('functions.php');
	
	$db = db_connect();

?>
