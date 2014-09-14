<?php
	$admin=Models::getAdminObject();
	$request=$this->request;
	if($admin->isConnected()){
		include Functions::getPublicFileURL(INCLUDE_SUBFOLDER."head.php");
		include Functions::getPublicFileURL(INCLUDE_SUBFOLDER."header.php");
		include Functions::getPublicFileURL(INCLUDE_SUBFOLDER."left.header.php");
		include Functions::getPublicFileURL("index.php");
		include Functions::getPublicFileURL(INCLUDE_SUBFOLDER."footer.php");
	}else
		Functions::jsRedirect($this::getAdminURL()."login");
?>