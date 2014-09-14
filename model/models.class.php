<?php
define("PHP_DB_DIR",Config::$ROOT_MODULE);
require(PHP_DB_DIR.'db/db.interface.php');
require(PHP_DB_DIR.'db/mysql.db.class.php');
require(PHP_DB_DIR.'db/xml/extends/query.xml.php');
require(PHP_DB_DIR.'db/mysql/extends/query.mysql.php');
require(PHP_DB_DIR.'models/extends/model.class.php');
new Db(Config::$DB_NAME,Config::$SERVER_NAME,Config::$USER_NAME,Config::$USER_PASSWORD);
class Models{
	public static function getAdminObject(){
		require_once(PHP_DB_DIR."models/admin.class.php");
		return new Admin();
	}
}
?>