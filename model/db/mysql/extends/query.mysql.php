<?php
Class MySQLQuery{
	protected $table,$tableName;
/***************************************************************************/
	function __construct($tableName){
		$this->tableName=$tableName;
		$this->table=new Table($this->tableName);
	}
/***************************************************************************/
	public function insert($data,$autoincrement=true){
		if($autoincrement)array_unshift($data,"NULL");
		$ligne = implode("&", $data);
		return $this->table->insert($ligne,$autoincrement);
	}
/***************************************************************************/
	public function selectAll($from=0,$to=10000000000){
		return $this->selectAllOrderBy("id","desc",$from,$to);
	}
	public function selectAllOrderBy($column,$orderway="desc",$from=0,$to=10000000000){
		return $this->table->search("orderby=".$column."&orderway=".$orderway."&from=".$from."&to=".$to);
	}
	public function selectByColumnValue($column,$value,$orderby="*",$orderway="DESC", $fields = "*"){
		return $this->table->getItem($column,$value,$orderby,$orderway, $fields);
	}
	public function selectAllByDistinctColumn($value){
		$requete="SELECT * FROM ".$this->tableName." GROUP BY `".$value."` DESC";
		return $this->executeQuery($requete);
	}
	public function selectColumnByOtherColumn($column,$identifier,$value){
		$requete="SELECT * FROM ".$this->tableName." WHERE `".$identifier."`='".$value."'";
		$rs=$this->executeQuery($requete,$column);
		if(Functions::isArray($rs))
			foreach($rs as $line){
				return isset($line[$column])?$line[$column]:false;
			}
		return false;
	}
	public function selectColumnById($column,$id){
		return $this->selectColumnByOtherColumn($column,"id",$id);
	}
	public function selectDistinctColumn($value){
		$requete="SELECT DISTINCT(`".$value."`) FROM ".$this->tableName;
		$res=$this->executeQuery($requete);
		if(Functions::isArray($res)){
			foreach($res as $line){
				$columnline[]=$line[$value];
			}
			return $columnline;
		}
		return array();
	}
/***************************************************************************/
	public function searchByColumn($column,$value){
		$requete="SELECT * FROM ".$this->tableName." WHERE `".$column."` LIKE '%".$value."%'";
		return $this->executeQuery($requete);
	}
/***************************************************************************/
	protected function executeQuery($requete){
		$res=$this->table->query($requete);
		if($res && mysql_num_rows($res)>0){
			while($r=mysql_fetch_array($res))
				$list[]=$r;
			return $list;
		}
		return false;
	}
/***************************************************************************/
	public function getCount($conds='1',$col='*'){
		return $this->table->getCount($conds,$col);
	}
/***************************************************************************/
	public function existColumnValue($column,$value){
		$res=$this->table->getItem($column,$value);
		if(Functions::isArray($res)) return true;
		return false;
	}
	protected function existMultipleValues($values){
		$res=$this->table->search($values);
		if(Functions::isArray($res)) return true;
		return false;
	}
/***************************************************************************/
	public function editByColumn($uniquecolumn,$uniquevalue,$column,$value){
		return $this->table->update($uniquecolumn,$uniquevalue,Array("`".$column."`"=>"'".$value."'"));
	}
	public function edit($id,$column,$value){
		return $this->editByColumn("id",intval($id),$column,$value);
	}
/***************************************************************************/
	public function deleteByColumnValue($column="",$value=""){
		if(empty($column) && empty($value))$row="";
		else $row=$column."='".$value."'";
		return $this->table->remove($row);
	}
}
?>