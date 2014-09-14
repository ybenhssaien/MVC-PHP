<?php
	if(strcmp("fr",Config::$CURRENT_LANGUAGE)==0)$current="-page";else $current="";
	$this->html->setCommonArray(array(
					"%%INDEXCLASS%%"=>"",
					"%%PORTFOLIO%%"=>"",
					"%%BLOG%%"=>"",
					"%%SERVICES%%"=>"current".$current,
					"%%ABOUT%%"=>"",
					"%%CONTACT%%"=>"",
				));
	echo $this->html->getFilteredText(Functions::getPublicFile("includes/head.html"));
	echo $this->html->getFilteredText(Functions::getPublicFile("includes/header.html"));
	echo $this->html->getFilteredText(Functions::getPublicFile("pages/services.html"));
	echo $this->html->getFilteredText(Functions::getPublicFile("includes/footer.html"));
?>