<?php
function getReplaceChars($object,$name=""){
	switch($name){
		case "product":$category=Models::getCategoryObject();return array(
							"%%TITLE%%"=>$object->getName(),
							"%%DESCRIPTION%%"=>$object->getDescription(),
							"%%CATEGORYID%%"=>$object->getCategoryId(),
							"%%CATEGORY%%"=>$category->getNameFromId($object->getCategoryId()),
							"%%PICTURE%%"=>$object->getPicture(),
						);break;
		case "category":$product=Models::getProductObject();
						$product->fetchProductByCategoryId($object->getId());
						return array(
							"%%ID%%"=>$object->getId(),
							"%%NAME%%"=>$object->getName(),
							"%%CATEGORY_URL%%"=>Functions::getDefaultURL()."product/".str_replace(" ","_",$object->getName()),
							"%%PICTURE%%"=>$object->getPicture(),
							"%%DESCRIPTION%%"=>$object->getDescription(),
							"%%COUNT%%"=>$product->getCount(),
							"%%SELECTED%%"=>((defined("CATEGORY_NAME") && $object->getIdFromName(str_replace("_"," ",CATEGORY_NAME))==$object->getId())?"selected":""),
						);break;
	}
	return array();
}
?>
<?php
	$page="product";
	if(isset($this->request["REQUEST_URI"][1]))define("CATEGORY_NAME",$this->request["REQUEST_URI"][1]);
	if(strcmp("fr",Config::$CURRENT_LANGUAGE)==0)$current="-page";else $current="";
	$this->html->setCommonArray(array(
					"%%INDEXCLASS%%"=>"",
					"%%PORTFOLIO%%"=>"",
					"%%BLOG%%"=>"",
					"%%PRODUCT%%"=>"current".$current,
					"%%SERVICES%%"=>"",
					"%%ABOUT%%"=>"",
					"%%CONTACT%%"=>"",
				));
	echo $this->html->getFilteredText(Functions::getPublicFile("includes/head.html"));
	echo $this->html->getFilteredText(Functions::getPublicFile("includes/header.html"));
	$product=Models::getProductObject();
	$category=Models::getCategoryObject();
	$title="Nos produits";
	if(defined("CATEGORY_NAME") && $product->existCategoryId($category->getIdFromName(str_replace("_"," ",CATEGORY_NAME)))){
		$product->fetchProductByCategoryId($category->getIdFromName(str_replace("_"," ",CATEGORY_NAME)));
		$title=ucfirst(str_replace("_"," ",CATEGORY_NAME));
		$page="product.detail";
	}else
		$product->fetchProductByDistinctCategory();
	$category->fetchCategoryByType("product");
	$this->html->setCommonArray(array("%%TITLE%%"=>$title));
	echo $this->html->getReplacedHTMLRepeatedBlockByModelObject(array("product"=>$product,"category"=>$category),Functions::getPublicFileURL("pages/".$page.".html"),"getReplaceChars");
	echo $this->html->getFilteredText(Functions::getPublicFile("includes/footer.html"));
?>