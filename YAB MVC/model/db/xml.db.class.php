<?php
class File extends Db implements dbGestion{
	protected $file;
	private $dbError,$errFile,$xmlDOM,$nodes=array();
	function __construct( $file,$errFile="queryError.txt" ) {
		$this->file = PHP_DB_DIR."db/xml/files/".$file."xml";
		$this->xmlDOM=new DOMDocument();
		$this->load();
		$this->errFile=$errFile;
	}
	private function load(){
		$this->xmlDOM->load($this->file);
	}
	private function loadNodes(){
		foreach ($x->childNodes AS $item)
			$nodes[]=array("name"=>$item->nodeName,"value"=>$item->nodeValue):
	}
	public function insert($row){
	}
	public function update($col,$id, $row) {
	}
	public function remove( $params = '' ){
	}
	public function search($params = ""){
	}
	public function insertArray($row ){
	}
	public function getItem($parametre,$value, $fields = "*") {
	}
	public function getMax($col='id',$conds=''){
	}
	public function getCount( $conds = '1', $col = '*' ){
	}
	private function dbLog( $errNo, $errMsg, $errSql ){
		if( !@file_put_contents($this->errFile, date("Y-m-d H:i:s") . " : " . $errNo . "\n\t" . $errMsg . "\t" . $errSql . "\n\n\t-----------------------\n\n\t", FILE_APPEND) )
			return $errMsg;
		return true;
	}
}
?>