<?php
function getReplaceChars($object,$name=""){
	switch($name){
		case "improve":return array(
							"%%ID%%"=>$object->getId(),
							"%%NAME%%"=>$object->getName(),
							"%%CONTENT%%"=>$object->getContent(),
							"%%PICTURE%%"=>$object->getPicture(),
						);break;
		case "improve1":return array(
							"%%ID%%"=>$object->getId(),
						);break;
	}
	return array();
}
?>
<?php
	if(strcmp("fr",Config::$CURRENT_LANGUAGE)==0)$current="-page";else $current="";
	$datetime1 = new DateTime(date("Y-m-d"));
	$datetime2 = new DateTime('1986-01-01');
	$interval = $datetime1->diff($datetime2);
	$this->html->setCommonArray(array(
					"%%INDEXCLASS%%"=>"",
					"%%PORTFOLIO%%"=>"",
					"%%BLOG%%"=>"",
					"%%SERVICES%%"=>"",
					"%%ABOUT%%"=>"current".$current,
					"%%CONTACT%%"=>"",
					"%%AGE%%"=>$interval->format('%y')
				));
	$improve=Models::getImproveObject();
	$improve->fetchAllImproves();
	echo $this->html->getFilteredText(Functions::getPublicFile("includes/head.html"));
	echo $this->html->getFilteredText(Functions::getPublicFile("includes/header.html"));
	echo $this->html->getReplacedHTMLRepeatedBlockByModelObject(array("improve"=>$improve,"improve1"=>$improve),Functions::getPublicFileURL("pages/about.html"),"getReplaceChars");
	echo $this->html->getFilteredText(Functions::getPublicFile("includes/footer.html"));
?>