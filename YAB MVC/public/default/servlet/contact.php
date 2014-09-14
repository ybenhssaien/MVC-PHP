<?php
	//require Functions::getTemplateDir()."plugins/recaptcha-1.11/recaptchalib.php";
?>
<?php
	if(strcmp("fr",Config::$CURRENT_LANGUAGE)==0)$current="-page";else $current="";
	$this->html->setCommonArray(array(
					"%%INDEXCLASS%%"=>"",
					"%%PORTFOLIO%%"=>"",
					"%%BLOG%%"=>"",
					"%%SERVICES%%"=>"",
					"%%ABOUT%%"=>"",
					"%%CONTACT%%"=>"current".$current,
				));
	echo $this->html->getFilteredText(Functions::getPublicFile("includes/head.html"));
	echo $this->html->getFilteredText(Functions::getPublicFile("includes/header.html"));
	$result=init($request);
	$publickey = "6LfMk_YSAAAAACZWDgHHzwswD4iVmIjbirsrBv2T" ;
	$values=array(
		"%%ERROR%%"=>(Functions::isArray($result))?"<span style='font-weight:bold'>Les erreurs suivant sont identifiés:</span><div style='margin-left:15px;color:#f00'>".implode($result,"<br />")."</div>":(strcmp($result,"no")==0?"<span style='color:#0f0;font-weight:bold'>Le message été envoyé avec succés</span>":$result),
		"%%NAME_INPUT%%"=>(isset($_POST["name"]) && !empty($_POST["name"]))?$_POST["name"]:"",
		"%%EMAIL_INPUT%%"=>(isset($_POST["email"]) && !empty($_POST["email"]))?$_POST["email"]:"",
		"%%SUBJECT_INPUT%%"=>(isset($_POST["subject"]) && !empty($_POST["subject"]))?$_POST["subject"]:"",
		"%%MESSAGE_INPUT%%"=>(isset($_POST["message"]) && !empty($_POST["message"]))?$_POST["message"]:"",
		"%%MD5%%"=>md5(uniqid()),
		//"%%CAPTCHA%%"=>recaptcha_get_html($publickey),
	);
	$this->html->setCommonArray($values);
	echo $this->html->getFilteredText(Functions::getPublicFile("pages/contact.html"));
	echo $this->html->getFilteredText(Functions::getPublicFile("includes/footer.html"));
?>
<?php
	function init($request=array()){
		if(isset($_POST["action"]) && strcmp("send",strtolower($_POST["action"]))==0){
			//$privatekey = "6LfMk_YSAAAAAMIox5-yFggxrvwUmNH-gsiqROQO";
			//$resp_captcha = recaptcha_check_answer ($privatekey,$_SERVER["REMOTE_ADDR"],$_POST["recaptcha_challenge_field"],$_POST["recaptcha_response_field"]);
			//if(!$resp_captcha->is_valid)$error[]="Le code CAPTCHA ne correspond pas au code affiché sur l'image";
			$input="name";if(!isset($_POST[$input]) || (isset($_POST[$input]) && empty($_POST[$input])))$error[]="(*) Nom doit être remplir";
			$input="email";if(!isset($_POST[$input]) || (isset($_POST[$input]) && empty($_POST[$input])))$error[]="(*) Email doit être remplir";elseif((isset($_POST[$input]) && !Functions::isEmail($_POST[$input])))$error[]="Format email non valide";
			$input="subject";if(!isset($_POST[$input]) || (isset($_POST[$input]) && empty($_POST[$input])))$error[]="(*) Sujet doit être remplir";
			$input="message";if(!isset($_POST[$input]) || (isset($_POST[$input]) && empty($_POST[$input])))$error[]="(*) Message doit être remplir";
			if(!isset($error)){
				$contact=Models::getMessageObject();
				if($contact->add($_POST["name"],$_POST["email"],$_POST["subject"],$_POST["message"])){
					$error="no";
					unset($_POST);
				}else $error="Erreur Technique : votre message ne peut pas être soumettre, veuillez réessayer plus tard :(";
			}
		}
		return isset($error)?$error:false;
	}
?>