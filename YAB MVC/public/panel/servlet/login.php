<?php
	$object=Models::getAdminObject();
	define("CURRENT_PAGE_NAME","login");
?>
<?php
	if(isset($this->request["REQUEST_URI"][1])){
		dispatch($this->request["REQUEST_URI"][1],$this,$object,$this->request);
	}else{
		include Functions::getPublicFileURL(INCLUDE_SUBFOLDER."head.php");
		dispatch("",$this,$object,$this->request);
	}
?>
<?php
	function dispatch($name,$adminO,$object,$request=array()){
		switch($name){
			case "ajax";verifyLogin($name,$adminO,$object,$request);break;
			case "logout";$object->unsetConnected();Functions::jsRedirect($adminO::getAdminURL());break;
			default:if(!$object->isConnected())include Functions::getPublicFileURL(CURRENT_PAGE_NAME.".php");else Functions::jsRedirect($adminO::getAdminURL());
		}
	}
	function verifyLogin($name,$adminO,$object,$request=array()){
		if(isset($_POST["login"]) && isset($_POST["pass"])){
			if($object->existLoginPass($_POST["login"],$_POST["pass"])){
				if($object->setConnected($object->getIdFromLogin($_POST["login"])))
					echo "0";
				else
					echo "erreur technique";
			}else
				echo "-1";
		}
	}
?>