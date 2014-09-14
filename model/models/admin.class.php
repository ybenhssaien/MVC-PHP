<?php 
include(PHP_DB_DIR.'db/mysql/admin.mysql.php');
class Admin extends Model{
	protected $columns=array(
						array('label'=>'id','type'=>'int'),
						array('label'=>'name','type'=>'text'),
						array('label'=>'login','type'=>'text'),
						array('label'=>'pass','type'=>'password'),
						array('label'=>'profile','type'=>'text'),
						array('label'=>'date','type'=>'date')
						);
/****************************************************************************************************/
	function __construct(){
		parent::__construct(new MySQLAdmin());
	}
/****************************************************************************************************/
	public function add($nom,$login,$pass,$profile="admin"){
		$date=date("Y-m-d H:i");$i=1;
		return $this->mysqlfunctions->insert(array(
								$this->columns[$i++]["label"]=>"'".$nom."'",
								$this->columns[$i++]["label"]=>"'".$login."'",
								$this->columns[$i++]["label"]=>"'".md5($pass)."'",
								$this->columns[$i++]["label"]=>"'".$profile."'",
								$this->columns[$i++]["label"]=>"'".$date."'",
								));
	}
/****************************************************************************************************/
	public function getId(){
		return $this->getAttributValue($this->columns[0]["label"]);
	}
	public function getName(){
		return $this->getAttributValue($this->columns[1]["label"]);
	}
	public function getLogin(){
		return $this->getAttributValue($this->columns[2]["label"]);
	}
	public function getProfile(){
		return $this->getAttributValue($this->columns[4]["label"]);
	}
	public function getDate(){
		return $this->getAttributValue($this->columns[count($this->columns)-1]["label"]);
	}
/****************************************************************************************************/
	public function getAdminCount(){
		return $this->mysqlfunctions->getCount();
	}
	public function getNameFromId($id){
		return $this->mysqlfunctions->selectColumnById($this->columns[1]["label"],$id);
	}
	public function getLoginFromId($id){
		return $this->mysqlfunctions->selectColumnById($this->columns[2]["label"],$id);
	}
	public function getIdFromLogin($value){
		return $this->mysqlfunctions->selectColumnByOtherColumn($this->columns[0]["label"],"login",$value);
	}
/****************************************************************************************************/
	public function setName($id,$value){
		return $this->setColumnValue($this->columns[1]["label"],$id,$value);
	}
	public function setLogin($id,$value){
		return $this->setColumnValue($this->columns[2]["label"],$id,$value);
	}
	public function setPassword($id,$oldvalue,$value){
		if($this->existPass($id,$oldvalue))
			return $this->setColumnValue($this->columns[3]["label"],$id,md5($value));
		return false;
	}
	public function setProfile($id,$value){
		return $this->setColumnValue($this->columns[4]["label"],$id,$value);
	}
/****************************************************************************************************/
	public function existId($value){
		return $this->mysqlfunctions->existColumnValue($this->columns[0]["label"],intval($value));
	}
	public function existLogin($value){
		return $this->mysqlfunctions->existColumnValue($this->columns[2]["label"],$value);
	}
	public function existLoginPass($login,$pass){
		return $this->mysqlfunctions->existLoginPass($login,$pass);
	}
	public function isSuperAdministrator(){
		return (strcmp("super",$this->getProfile())==0)?true:false;
	}
	private function existPass($id,$pass){
		return $this->mysqlfunctions->existPass($id,$pass);
	}
/****************************************************************************************************/
	public function isConnected(){
		if(isset($_SESSION["ai"]) && isset($_SESSION["uai"])){
			if($this->existId($_SESSION["ai"]) && strcmp($_SESSION["uai"],md5($this->getLoginFromId($_SESSION["ai"])."+".$_SESSION["ai"]))==0)
				return true;
		}
		return false;
	}
	public function setConnected($id){
		if($this->existId($id)){
			$_SESSION["ai"]=$id;
			$_SESSION["uai"]=md5($this->getLoginFromId($id)."+".$id);
			return true;
		}
		return false;
	}
	public function unsetConnected(){
		if($this->isConnected()){
			unset($_SESSION["ai"]);
			unset($_SESSION["uai"]);
			return true;
		}
		return false;
	}
	public function getConnectedId(){
		if($this->isConnected())
			return $_SESSION["ai"];
		return false;
	}
/****************************************************************************************************/
	public function fetchAdminById($value){
		return $this->fetchByColumnValue($this->columns[0]["label"],intval($value));
	}
	public function fetchAdminByName($value){
		return $this->fetchByColumnValue($this->columns[1]["label"],$value);
	}
	public function fetchAdminByLogin($value){
		return $this->fetchByColumnValue($this->columns[2]["label"],$value);
	}
	public function fetchAllAdmins($from=null,$to=null){
		return $this->fetchAll($from,$to);
	}
	public function searchByName($value){
		return $this->searchByColumnValue($this->columns[1]["label"],$value);
	}
/****************************************************************************************************/
	public function deleteById($value){
		return $this->mysqlfunctions->deleteByColumnValue($this->columns[0]["label"],intval($value));
	}
}
?>