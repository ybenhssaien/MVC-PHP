<?php
	session_start();
	require "config/Config.php";
	require Config::$ROOT_INCLUDE."/load_include_files.php";
	require Config::$ROOT_SERVLET."Servlet.php";
	new Servlet($_SERVER["REQUEST_URI"]);
?>
