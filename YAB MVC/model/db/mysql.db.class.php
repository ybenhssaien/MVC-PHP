<?php
class Table extends Db implements dbGestion{
	protected $table;
	private $dbError;
	private $columns;
	private $errFile;
	function __construct( $table,$errFile="queryError.txt" ) {
		$this->table = $table;
		$this->cols();
		$this->errFile=$errFile;
	}
	private function cols() {
		$sql = "SHOW COLUMNS FROM `" . $this->table."`";
		$res = mysql_query( $sql );
		if( mysql_errno() > 0 ){
			$this->dbError = mysql_error();
			$this->dbLog(mysql_errno(), mysql_error(), $sql );
			return false;
		}
		while( $r = mysql_fetch_assoc($res) )
			$cols[] = $r['Field'];
		$this->columns = $cols;
		return $cols;
	}
	private function iscolumn($col){
		if(in_array($col,$this->columns))
			return true;
		return false;
	}
	public function insert($row,$autoincrement=true){
		$row=str_replace("&",",",$row);
		$sql = "INSERT INTO `" . $this->table . "` VALUES(" . $row . ")";
		$res = mysql_query($sql);
		if( mysql_errno() > 0 ){
			$this->dbError = mysql_error();
			$this->dbLog(mysql_errno(), $this->dbError, $sql );
			return false;
		}
		return $autoincrement?mysql_insert_id():true;
	}
	public function update($col,$id, $row) {
		if( !is_array( $row ) )
			return false;
		foreach ($row as $k => $v)
			$str[] = $k . "=" . trim( $v ) . "";
		$setts = implode(", ", $str);

		if( strlen($setts) > 0 )
			$sql = "UPDATE `" . $this->table . "` SET ".$setts." WHERE `".$col."`='" . $id . "'";

		$res = mysql_query($sql);
		if( mysql_errno() > 0 ){
			$this->dbError = mysql_error() . "\n";
			$this->dbLog(mysql_errno(), $this->dbError, $sql );
			return false;
		}
		else
			return true;
	}
	public function remove( $params = '' ){
		if( empty( $params ) ){
			$sql = "DELETE FROM `" . $this->table;
		}else{
			$parms=str_replace("="," LIKE ",$params);
			$sql = "DELETE FROM `" . $this->table . "` WHERE " . $params."";
		}
		$res = mysql_query($sql);
		if( mysql_errno() > 0 ){
			$this->dbError = mysql_error();
			$this->dbLog(mysql_errno(), $this->dbError, $sql );
			return false;
		}
		else 
			return true;
	}
	public function search($params = ""){
		parse_str($params, $data);
		$fields = ( isset( $data['fields'] ) && strlen( $data['fields'] ) > 0 ) ? $data['fields'] : "*";
		foreach( $this->columns as $col )
			if( isset( $data[$col] ) )
				$where[] = "`".$col."`" . "='" . $data[$col] . "'";
		if( isset($where) && is_array( $where )){
			$strWhere = " WHERE " . implode(" AND ", $where);
			$strWhere = str_replace("="," LIKE ",$strWhere);
		}else{
			$strWhere ="";
		}
		if( isset( $data['to'] ) && $data['to'] > 0 ){
			$init = ( isset( $data['from'] ) ) ? $data['from'] : 0;
			$strLimit = " LIMIT " . $init . ", " . $data['to'];
		}
		else{
			$strLimit = "";
		}

		$strSort = ( isset( $data['orderby'] ) ) ? " ORDER BY `" . $data['orderby']."`" : "";
		$strSort .= ( isset( $data['orderway'] )) ? ' ' . strtoupper(trim($data['orderway'])) : "";

		$sql = "SELECT " . $fields . " FROM `" . $this->table ."`". $strWhere . $strSort . $strLimit;

		$res = mysql_query($sql);

		if( mysql_errno() > 0 ){
			$this->dbError = mysql_error();
			$this->dbLog(mysql_errno(), $this->dbError, $sql );
			return false;
		}
		if( mysql_num_rows($res) > 0 ){
			while( $row = mysql_fetch_array($res) ){
				$list[] = $row;
			}
			return $list;
		}
		else
			return false;
	}
	public function insertArray($row ){
		foreach ( $row as $c ){
				$str[] = "'" . addslashes( trim( $c ) ) . "'";
			}
		if(isset($str)){
		$insert = implode(", ", $str);
		 $sql = "INSERT INTO " . $this->table . " VALUES(" . $insert . ")";
		 return $this->insert($insert);
		}
		return false;
	}
	public function getItem($parametre,$value,$orderby="*",$orderway="DESC", $fields = "*") {
		if(strcmp($orderby,"*")==0)$orderby=$this->columns[0];
		$sql = "SELECT " . $fields . " FROM `" . $this->table . "` WHERE `".$parametre."` LIKE '" . $value . "' ORDER BY ".$orderby." ".$orderway.";";
		$res = mysql_query($sql);
		if( mysql_errno() > 0 ){
			$this->dbError = mysql_error();
			$this->dbLog(mysql_errno(), $this->dbError, $sql );
			return false;
		}
		else{
			if( mysql_num_rows($res) > 0 ){
			while( $row = mysql_fetch_array($res) ){
				$list[] = $row;
			}
			return $list;
		}
		else
			return false;
		}
	}
	public function getMax($col='id',$conds=''){
		$sql = "SELECT MAX(" . $col . ") FROM `" . $this->table . "` ".$conds;
		$res = mysql_query($sql);
		if( mysql_errno() > 0 ){
			$this->dbError = mysql_error();
			$this->dbLog(mysql_errno(), $this->dbError, $sql );
			return false;
		}
		$row = mysql_fetch_row( $res );
		return $row['0'];
	}
	public function getCount( $conds = '1', $col = '*' ){
		$conds=str_replace("&"," AND ",$conds);
		$conds=str_replace("="," LIKE ",$conds);
		$sql = "SELECT COUNT(".$col.") FROM `" . $this->table . "` WHERE " . $conds.";";
		$res = mysql_query($sql) or die ("error : " . mysql_error() . "<br />" . $sql);
		if( mysql_num_rows($res) > 0 ){
			$row = mysql_fetch_row( $res );
			return $row['0'];
		}
		else
			return 0;
	}
	public function query( $sql ){
		$res = mysql_query($sql);
		if( mysql_errno() > 0 ){
			$this->dbError = mysql_error();
			$this->dbLog(mysql_errno(), $this->dbError, $sql );
			return false;
		}
		else
			return $res;
	}
	private function dbLog( $errNo, $errMsg, $errSql ){
		if( !@file_put_contents($this->errFile, date("Y-m-d H:i:s") . " : " . $errNo . "\n\t" . $errMsg . "\t" . $errSql . "\n\n\t-----------------------\n\n\t", FILE_APPEND) )
			return $errMsg;
		return true;
	}
}
?>
<?php
class Db{
		private $dbName;
		private $dbUser;
		private $dbPass;
		private $dbHost;
		private $dbLink;
		private $error = "";
		private $charset;
		function __construct( $db ,$host='localhost', $user='root', $pass='', $charset='utf8' ){
			$this->dbName = $db;
			$this->dbUser = $user;
			$this->dbPass = $pass;
			$this->dbHost = $host;
			$this->charset = $charset;
			$this->error = "";
			$query = false;

			if( !($this->dbLink = @mysql_connect($this->dbHost, $this->dbUser, $this->dbPass)) )
				$this->error = mysql_error();
			elseif( !@mysql_select_db($this->dbName, $this->dbLink) )
				$this->error = mysql_error();

			if( strlen( $this->error ) == 0 )
			{
				if( strtolower( $this->charset ) == 'utf-8'  || strtolower( $this->charset ) == 'utf8' )
					mysql_query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
			}
			else die( $this->error );
		}
		public function Table($name){
			if(isset($name) && !empty($name)){
				return new Table($name);
				}
			else
				return false;
		}
		public function tables() {
			$sql = "SHOW TABLES FROM `" . $this->dbName."`";
			$res = mysql_query( $sql );
			if( mysql_errno() > 0 ){
				return false;
			}
			while( $r = mysql_fetch_assoc($res) )
				$cols[] = $r['Tables_in_'.$this->dbName];
			$this->columns = $cols;
			return $cols;
		}
		public function close(){
			@mysql_close();
		}

		public function getError(){
			return( strlen( $this->error ) > 0 ) ? $this->error : "";
		}
}
?>