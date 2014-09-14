<?php
function getReplaceChars($object,$name=""){
	switch($name){
		case "gallery":$category=Models::getCategoryObject();return array(
							"%%ID%%"=>$object->getId(),
							"%%TITLE%%"=>$object->getName(),
							"%%DESCRIPTION%%"=>nl2br($object->getDescription()),
							"%%PICTURE%%"=>$object->getFirstPicture(),
							"%%CATEGORYID%%"=>$object->getCategoryId(),
							"%%CATEGORY%%"=>$category->getNameFromId($object->getCategoryId()),
							"%%LIEN%%"=>Functions::getDefaultURL()."portfolio/".$object->getId()."_".str_replace(" ","_",$object->getName()),
						);break;
		case "gallerydetail":return array(
							"%%ID%%"=>$object->getId(),
							"%%TITLE%%"=>$object->getName(),
							"%%DESCRIPTION%%"=>$object->getDescription(),
							"%%CATEGORY%%"=>$object->getCategoryId(),
						);break;
		case "gallerypictures":return array(
							"%%PICTURE%%"=>$object->getPicture(),
						);break;
		case "category":return array(
							"%%ID%%"=>$object->getId(),
							"%%NAME%%"=>$object->getName(),
						);break;
	}
	return array();
}
?>
<?php
	if(strcmp("fr",Config::$CURRENT_LANGUAGE)==0)$current="-page";else $current="";
	$this->html->setCommonArray(array(
					"%%INDEXCLASS%%"=>"",
					"%%PORTFOLIO%%"=>"current".$current,
					"%%BLOG%%"=>"",
					"%%SERVICES%%"=>"",
					"%%ABOUT%%"=>"",
					"%%CONTACT%%"=>"",
				));
	echo $this->html->getFilteredText(Functions::getPublicFile("includes/head.html"));
	echo $this->html->getFilteredText(Functions::getPublicFile("includes/header.html"));
	$gallerypictures=Models::getGalleryObject();
	$gallery=Models::getGalleryObject();
	$category=Models::getCategoryObject();
	$pagename="portfolio";
	if(isset($this->request["REQUEST_URI"][1]) && $gallery->existId(substr($this->request["REQUEST_URI"][1],0,strpos($this->request["REQUEST_URI"][1],"_")))){
		$gallery->fetchGalleryById(substr($this->request["REQUEST_URI"][1],0,strpos($this->request["REQUEST_URI"][1],"_")));
		$gallerypictures->fetchAllFiles(substr($this->request["REQUEST_URI"][1],0,strpos($this->request["REQUEST_URI"][1],"_")));
		$pagename="portfolio.detail";
	}else
		$gallery->fetchAllGalleries();
	$category->fetchCategoryByType("gallery");
	echo $this->html->getReplacedHTMLRepeatedBlockByModelObject(array("gallery"=>$gallery,"gallerypictures"=>$gallerypictures,"category"=>$category),Functions::getPublicFileURL("pages/".$pagename.".html"),"getReplaceChars");
	echo $this->html->getFilteredText(Functions::getPublicFile("includes/footer.html"));
?>