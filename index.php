<?php
 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	require_once "Config/Autoload.php";
	require_once "Config/Config.php";


	use Config\Autoload as Autoload;
	use Config\Router 	as Router;
	use Config\Request 	as Request;

		
	Autoload::start();
	session_start();
	require_once(VIEWS_PATH."header.php");
	Router::Route(new Request());
	require_once(VIEWS_PATH."footer.php");

	

?>