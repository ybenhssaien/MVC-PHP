<?php 
class Model{
	protected $mysqlfunctions,$cmpt,$ln,$data=array();
/****************************************************************************************************/
	function __construct($object=null){
		$this->cmpt=$this->ln=-1;
		$this->mysqlfunctions=$object;
	}
/****************************************************************************************************/
	protected function setfetchResult($res){
		if(Functions::isArray($res)){
			$this->ln=count($res);
			$this->setVariable($res);
			return true;
		}
		$this->ln=0;
		return false;
	}
	protected function setVariable($rA){
		$this->cmpt=$i=0;
		if(Functions::isArray($rA))
			foreach($rA as $r){
							foreach($this->columns as $column){
								if(strcmp($column["type"],"date")==0)$this->data[$column["label"]][$i]=date(Config::$DATE_FORMAT,strtotime($r[$column["label"]]));
								elseif(strcmp($column["type"],"fulldate")==0)$this->data[$column["label"]][$i]=date(Config::$DATE_FORMAT_FULL,strtotime($r[$column["label"]]));
								elseif(strcmp($column["type"],"datetime")==0)$this->data[$column["label"]][$i]=date(Config::$DATE_FORMAT_TIME,strtotime($r[$column["label"]]));
								elseif(strcmp($column["type"],"int")==0)$this->data[$column["label"]][$i]=intval($r[$column["label"]]);
								elseif(strcmp($column["type"],"password")!=0)$this->data[$column["label"]][$i]=$r[$column["label"]];
							}
							$i++;
					}
		}
/****************************************************************************************************/
	public function setCursor($crs){
		$crs=isset($crs)?intval($crs):$this->cmpt;
		if($crs>-1 AND $crs<=$this->ln)
			$this->cmpt=$crs;
		}
	public function setCursorToBegin(){
		$this->cmpt=0;
	}
	public function setCursorToLast(){
		$this->cmpt=$this->ln;
	}
/****************************************************************************************************/
	public function isMore(){
			if(++$this->cmpt < $this->ln AND $this->cmpt != -1){
				return true;
			}
			$this->cmpt=0;
			return false;
		}
/****************************************************************************************************/
	public function getCount(){
		return ($this->ln!=-1)?$this->ln:0;
	}
	protected function getAttributValue($name){
		return isset($this->data[$name][$this->cmpt])?stripslashes($this->data[$name][$this->cmpt]):0;
	}
/****************************************************************************************************/
	protected function setColumnValue($column,$id,$value){
		return $this->mysqlfunctions->edit($id,$column,$value);
	}
	protected function setColumnValueByColumn($columnunique,$column,$columnuniquevalue,$value){
		return $this->mysqlfunctions->editByColumn($columnunique,$columnuniquevalue,$column,$value);
	}
/****************************************************************************************************/
	public function fetchByColumnValue($column,$value){
		return $this->setfetchResult($res=$this->mysqlfunctions->selectByColumnValue($column,$value));
	}
	public function fetchAll($from=null,$to=null){
		return $this->setfetchResult($res=$this->mysqlfunctions->selectAll($from,$to));
	}
	public function searchByColumnValue($column,$value){
		return $this->setfetchResult($res=$this->mysqlfunctions->searchByColumn($this->column,$value));
	}
}
?>