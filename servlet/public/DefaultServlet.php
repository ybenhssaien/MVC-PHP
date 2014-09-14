<?php
	class DefaultServlet extends Servlet{
		function DefaultServlet(){
		}
		public function init(array $request=array()){
			$defaultcontrolfilename=Functions::getPublicFileURL("../servlet/index.php");
			$defaultviewfilename=Functions::getPublicFileURL("index.html");
			if(isset($this->request["REQUEST_URI"][0]) && !empty($this->request["REQUEST_URI"][0])){
				if( Functions::isLanguage($this->request["REQUEST_URI"][0]) ){
					$this->setLanguage(array_shift($this->request["REQUEST_URI"]));
				}
			}elseif(!in_array(parent::getUserBrowser(),array("ie"))){
				$redirectforlanguage = true;
			}
			if(isset($this->request["REQUEST_URI"][0]) && !empty($this->request["REQUEST_URI"][0])){
				$controlfilename=Functions::getPublicFileURL("../servlet/".$this->request["REQUEST_URI"][0].".php");
				$viewfilename=$this->request["REQUEST_URI"][0].".html";
				if(is_file($controlfilename)){
					include $controlfilename;
				}elseif(is_file($viewfilename)){
					$this->showPage($viewfilename);
				}else{
					$this->showPage("404.html");
				}
			}else{
				if(is_file($defaultcontrolfilename))include $defaultcontrolfilename;
				elseif(is_file($defaultviewfilename)) include $defaultviewfilename;
				}
			if(isset($redirectforlanguage))echo"<script>history.pushState('page', '', '".Functions::getDefaultURL().$this->getLanguage()."/');</script>";
		}
		public function showPage($name){
			echo $this->html->getFilteredText(Functions::getPublicFile($name));
		}
		public function set($request=array()){
			$this->request=$request;
			$this->html=Functions::getHTMLObject();
			$this->html->setCommonArray(array(
							"%%DEFAULT_TITLE%%"=>"ARENALUB S.A.R.L",
							"%%HTTP_URL%%"=>Functions::getDefaultURL(),
							"%%DESIGN_DIR%%"=>Functions::getTemplateDir()."design/",
							"%%PLUGINS_DIR%%"=>Functions::getTemplateDir()."plugins/",
							"%%CSS_DIR%%"=>Functions::getTemplateDir()."design/css/",
							"%%INDEX%%"=>Functions::getDefaultURL().$this->getLanguage()."/",
						));
			$this->html->setCommonArray(array(
							"%%LANGUAGE_SELECT%%"=>$this->html->getFilteredText(Functions::getPublicFile("language.html")),
						));
		}
		public static function getInstance(){
			return new DefaultServlet();
		}
	}
?>