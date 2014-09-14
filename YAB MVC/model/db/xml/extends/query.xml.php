<?php
Class XMLQuery{
	protected $file,$fileName,$vars=array();
/***************************************************************************/
	function __construct($fileName){
		$this->fileName=$fileName;
		$this->file=simplexml_load_file($this->fileName);
		$this->getVariables();
	}
/***************************************************************************/
	public function insert($data){
		array_unshift($data,"''");
		$ligne = implode("&", $data);
		return $this->table->insert($ligne);
	}
/***************************************************************************/
	public function selectAll($from=0,$to=10000000000){
		return $this->vars;
	}
	public function selectByColumnValue($column,$value){
		if($this->getCount()>0){
			foreach($this->vars as $line){
				if(isset($line[$column]) && !isArray($line[$column]) && strcmp($line[$column],$value)==0)$lineTemp[]=$line;
			}
			if(isset ($lineTemp) && isArray($lineTemp)) return $lineTemp;
		}
		return false;
	}
	public function selectColumnByColumnUnique($column,$columnunique,$columnuniquevalue){
		$vars=$this->vars;
		if($this->getCount()>0 && isset($this->vars[$columnuniquevalue])){
			foreach($vars as $line){
				if(isset($line[$columnunique]) && !isArray($line[$column]) && strcmp($line[$columnunique],$columnuniquevalue)==0)return $line[$column];
			}
		}
		return "";
	}
	public function selectColumnById($column,$id){
		return $this->selectColumnByColumnUnique($column,"id",$id);
	}
/***************************************************************************/
	public function searchByColumn($column,$value){
	}
/***************************************************************************/
	protected function executeQuery($requete,$column=false){
	}
/***************************************************************************/
	public function getCount(){
		return count($this->vars);
	}
/***************************************************************************/
	public function existColumnValue($column,$value){
		$vars=$this->vars;
		if($this->getCount()>0){
			foreach($vars as $value){
				if(strcmp($value[$column],$value)==0)return true;
			}
		}
		return false;
	}
	protected function existMultipleValues($values){
	}
/***************************************************************************/
	public function edit($id,$column,$value){
		return $this->table->update("id",intval($id),Array("`".$column."`"=>"'".$value."'"));
	}
/***************************************************************************/
	public function deleteByColumnValue($column,$value){
		$vars=$this->vars;
		if($this->getCount()>0){
			foreach($vars as $value){
				if(strcmp($value[$column],$value)!=0)$newvars[]=$value;
			}
			
		}
		return false;
	}
}
?>