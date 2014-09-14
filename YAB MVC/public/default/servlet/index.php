<?php
function getReplaceChars($object,$name=""){
	switch($name){
		case "products":return array(
							"%%ID%%"=>$object->getId(),
							"%%NAME%%"=>$object->getName(),
							"%%DESCRIPTION%%"=>$object->getDescription(),
							"%%PICTURE%%"=>$object->getPicture(),
						);break;
		case "gallery":return array(
							"%%ID%%"=>$object->getId(),
							"%%NAME%%"=>$object->getName(),
							"%%DESCRIPTION%%"=>$object->getDescription(),
							"%%PICTURE%%"=>$object->getFirstPicture(),
							"%%LIEN%%"=>Functions::getDefaultURL()."portfolio/".$object->getId()."_".str_replace(" ","_",$object->getName()),
						);break;
		case "improve":return array(
							"%%ID%%"=>$object->getId(),
							"%%NAME%%"=>$object->getName(),
							"%%CONTENT%%"=>$object->getContent(),
							"%%PICTURE%%"=>$object->getPicture(),
						);break;
		case "improve1":return array(
							"%%ID%%"=>$object->getId(),
						);break;
		case "slide":return array(
							"%%PICTURE%%"=>$object->getPicture(),
						);break;
		case "category":$product=Models::getProductObject();
						$product->fetchProductByCategoryId($object->getId());
						return array(
							"%%ID%%"=>$object->getId(),
							"%%NAME%%"=>$object->getName(),
							"%%CATEGORY_URL%%"=>Functions::getDefaultURL()."product/".str_replace(" ","_",$object->getName()),
							"%%PICTURE%%"=>$object->getPicture(),
							"%%LOGO%%"=>$object->getLogo(),
							"%%DESCRIPTION%%"=>$object->getDescription(),
							"%%COUNT%%"=>$product->getCount(),
							"%%SELECTED%%"=>((defined("CATEGORY_NAME") && $object->getIdFromName(str_replace("_"," ",CATEGORY_NAME))==$object->getId())?"selected":""),
						);break;
	}
	return array();
}
?>
<?php
	if(strcmp("fr",Config::$CURRENT_LANGUAGE)==0)$current="-page";else $current="";
	$this->html->setCommonArray(array(
					"%%INDEXCLASS%%"=>"current".$current,
					"%%PORTFOLIO%%"=>"",
					"%%PRODUCT%%"=>"",
					"%%BLOG%%"=>"",
					"%%SERVICES%%"=>"",
					"%%ABOUT%%"=>"",
					"%%CONTACT%%"=>"",
				));
	$category=Models::getCategoryObject();
	$product=Models::getProductObject();
	$gallery=Models::getGalleryObject();
	$improve=Models::getImproveObject();
	$slide=Models::getSlideObject();
	$category->fetchCategoryByType("product");
	$product->fetchAllProducts(0,4);
	$gallery->fetchAllGalleries(0,4);
	$improve->fetchAllImproves();
	$slide->fetchAllFiles();
	echo $this->html->getFilteredText(Functions::getPublicFile("includes/head.html"));
	echo $this->html->getFilteredText(Functions::getPublicFile("includes/header.html"));
	echo $this->html->getReplacedHTMLRepeatedBlockByModelObject(array("category"=>$category,"products"=>$product,"gallery"=>$gallery,"slide"=>$slide,"improve"=>$improve,"improve1"=>$improve),Functions::getPublicFileURL("index.html"),"getReplaceChars");
	echo $this->html->getFilteredText(Functions::getPublicFile("includes/footer.html"));
?>