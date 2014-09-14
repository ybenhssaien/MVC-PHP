<?php
	class PanelServlet extends Servlet{
		function PanelServlet(){
		}
		public function init(array $request=array()){
			$this->initConstant();
			$defaultcontrolfilename=Functions::getPublicFileURL(SERVLET_SUBFOLDER."index.php");
			$defaultviewfilename=Functions::getPublicFileURL("index.php");
			if(isset($this->request["REQUEST_URI"][0]) && !in_array(parent::getUserBrowser(),array("ie"))){
				if(!in_array("ajax",$this->request["REQUEST_URI"])){
					echo"<script>history.pushState('page', '', '".Functions::getDefaultURL().parent::getLanguage()."/".Config::$DEFAULT_SERVLET_NAME."/".implode("/",$this->request["REQUEST_URI"])."');</script>";
				}
				$controlfilename=Functions::getPublicFileURL(SERVLET_SUBFOLDER.$this->request["REQUEST_URI"][0].".php");
				$viewfilename=$this->request["REQUEST_URI"][0].".html";
				if(is_file($controlfilename)){
					include $controlfilename;
				}elseif(is_file($viewfilename)){
					$this->showPage($viewfilename);
				}else{
					include Functions::getPublicFileURL(INCLUDE_SUBFOLDER."head.php");
					$this->showPage("404.html");
				}
			}else{
				if(is_file($defaultcontrolfilename))include $defaultcontrolfilename;
				elseif(is_file($defaultviewfilename)) include $defaultviewfilename;
				}
		}
		private function initConstant(){
			Config::$DEFAULT_SERVLET_NAME="panel";
			Config::$CURRENT_LANGUAGE=Config::$DEFAULT_LANGUAGE="fr";
			define("SERVLET_SUBFOLDER","../servlet/");
			define("INCLUDE_SUBFOLDER","includes/");
			define("PAGE_SUBFOLDER","pages/");
			define("PAGE_ADD_SUBFOLDER",PAGE_SUBFOLDER."add/");
			define("PAGE_EDIT_SUBFOLDER",PAGE_SUBFOLDER."edit/");
			define("PAGE_LIST_SUBFOLDER",PAGE_SUBFOLDER."list/");
		}
		public function showPage($name){
			$o=Functions::getHTMLObject();
			echo $o->getFilteredText(Functions::getPublicFile($name));
		}
		public function set($request=array()){
			$this->request=$request;
		}
		public static function getInstance(){
			return new PanelServlet();
		}
		public static function getAdminURL(){
			return Functions::getDefaultURL().parent::getLanguage()."/".Config::$DEFAULT_SERVLET_NAME."/";
		}
		public static function getAdminDir(){
			return Functions::getDefaultURL().Functions::getTemplateDir();
		}
	}
?>