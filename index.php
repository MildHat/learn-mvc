<?php

	// Front Controller


	// Options
	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	// include system files
	define('ROOT', dirname(__FILE__));
	require_once(ROOT . '/components/Router.php');

	// connection to database
	include_once(ROOT . '/components/Db.php');

	// Router
	$router = new Router();
	$router->run();