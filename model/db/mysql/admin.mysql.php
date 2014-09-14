<?php
class MySQLAdmin extends MySQLQuery{
/***************************************************************************/
	function __construct(){
		parent::__construct("admin");
	}
/***************************************************************************/
	public function existLoginPass($login,$pass){
		return $this->existMultipleValues("login=".$login."&pass=".md5($pass));
	}
	public function existPass($id,$pass){
		return $this->existMultipleValues("id=".$id."&pass=".md5($pass));
	}
}
?>