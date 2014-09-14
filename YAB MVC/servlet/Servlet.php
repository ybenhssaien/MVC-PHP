<?php
	require Config::$ROOT_MODULE."models.class.php";
?>
<?php
	class Servlet{
		public $languages=array("fr","en","ar","es");
		public static $lang="";
		function Servlet($request){
			$this::init(explode("/",str_replace(Config::$ROOT_APP_NAME,"",$request)));
		}
		public function init(array $request=array()){
			$this::secure();
			$request=$this::filter($request);
			if($this->verifyLanguage($request["REQUEST_URI"][0])){
				$this::setLanguage($request["REQUEST_URI"][0]);
				$request["REQUEST_URI"]=array_slice($request["REQUEST_URI"],1);
				$this::dispatch((string)$request["REQUEST_URI"][0],$request);
			}else{
				header("location:".Functions::getDefaultURL().self::getInstalledLanguage()."/".str_replace(Config::$DEFAULT_SERVLET_NAME,"",implode("/",$request["REQUEST_URI"])));
			}
		}
		public static function getLanguage(){
			if(!empty(self::$lang)){
				$lang=self::$lang;
			}else{
				$lang=self::getInstalledLanguage();
			}
			return $lang;
		}
		public static function getInstalledLanguage(){
			if(isset($_COOKIE["lang"]) && !empty($_COOKIE["lang"])){
				$lang=$_COOKIE["lang"];
			}else{
				$lang=Config::$DEFAULT_LANGUAGE;
			}
			return $lang;
		}
		public static function setLanguage($lang=""){
			if(!empty($lang)){
				setcookie("lang",$lang);
			}
			self::$lang=$lang;
		}
		public static function removeLanguage(){
			if(isset($_COOKIE["lang"]))setcookie("lang","");
		}
		public static function getInstance(){
			return $this;
		}
	/*************************************************************************************************************************/
		private function dispatch($servletName,$request=array()){
			$className=ucfirst($servletName)."Servlet";
			$defaultclassName=ucfirst(Config::$DEFAULT_SERVLET_NAME)."Servlet";
			$fileName=Config::$ROOT_SERVLET.Config::$ROOT_SERVLET_PUBLIC.$className.".php";
			$defaultfileName=str_replace($className.".php",$defaultclassName.".php",$fileName);
			if(file_exists($fileName)){
				$request["REQUEST_URI"]=array_slice($request["REQUEST_URI"],1);
				include $fileName;
			}elseif(file_exists($defaultfileName)){
				include $defaultfileName;
				$className=$defaultclassName;
			}else{
				return false;
			}
			if(class_exists($className)) {
				$class=$className::getInstance();
				$class->set($request);
				$class->init();
				return true;
			}
			return false;
		}
		private function verifyLanguage($languageName){
			if(in_array($languageName,$this->languages)){
				self::setLanguage($languageName);
				return true;
			}
			return false;
		}
		protected function getUserBrowser(){
			$u_agent = $_SERVER['HTTP_USER_AGENT'];
			$ub = '';
			if(preg_match('/MSIE/i',$u_agent))
			{
				$ub = "ie";
			}
			elseif(preg_match('/Chrome/i',$u_agent))
			{
				$ub = "chrome";
			}
			elseif(preg_match('/Safari/i',$u_agent))
			{
				$ub = "safari";
			}
			elseif(preg_match('/Firefox/i',$u_agent))
			{
				$ub = "firefox";
			}
			elseif(preg_match('/Flock/i',$u_agent))
			{
				$ub = "flock";
			}
			elseif(preg_match('/Opera/i',$u_agent))
			{
				$ub = "opera";
			}
			return $ub;
		}
	/*************************************************************************************************************************/
		private function filter(array $request){
			$temp=array();
			foreach($request as $line){
				if(!empty($line) && strcmp("/",$line)!=0 && strcmp(Config::$ROOT_APP_NAME,$line)!=0){
					if(strpos($line,"?")>0 || strcmp("?",$line[0])==0)$line=substr($line,0,strpos($line,"?"));
					$temp["REQUEST_URI"][]=$line;
				}
			}
			if(!isset($temp["REQUEST_URI"])){
				if(in_array($this->getUserBrowser(),array("ie"))){
					$temp["REQUEST_URI"][0]=Config::$DEFAULT_SERVLET_NAME;
				}else{
					$temp["REQUEST_URI"]=array(self::getInstalledLanguage(),Config::$DEFAULT_SERVLET_NAME);
				}
			}elseif(count($temp["REQUEST_URI"])==1 && $this->verifyLanguage($temp["REQUEST_URI"][0])){
				$temp["REQUEST_URI"][1]=Config::$DEFAULT_SERVLET_NAME;
			}
			return $temp;
		}
		private function secure(){
			$_GET=$this->secureArray($_GET);
			$_POST=$this->secureArray($_POST);
			$_REQUEST=$this->secureArray($_REQUEST);
		}
		private function secureArray($array=array()){
			$temp=array();
			foreach($array as $key => $value){
				if(Functions::isArray($value))
					$temp[$this->secureText($key)]=$this->secureArray($value);
				else
					$temp[$this->secureText($key)]=$this->secureText($value);
			}
			return $temp;
		}
		private function secureText($text=""){
			$text=strip_tags(addslashes($text));
			foreach($this->getUnallowdWordsArray() as $value)
				$text=str_replace($value,"",$text);
			return $text;
		}
		private function getUnallowdWordsArray(){
			return array(
				"onafterprint",
				"onbeforeprint",
				"onbeforeunload",
				"onerror",
				"onhaschange",
				"onload",
				"onmessage",
				"onoffline",
				"ononline",
				"onpagehide",
				"onpageshow",
				"onpopstate",
				"onredo",
				"onresize",
				"onstorage",
				"onundo",
				"onunload",
				"onblur",
				"onchange",
				"oncontextmenu",
				"onfocus",
				"onformchange",
				"onforminput",
				"oninput",
				"oninvalid",
				"onreset",
				"onselect",
				"onsubmit",
				"onkeydown",
				"onkeypress",
				"onkeyup",
				"onclick",
				"ondblclick",
				"ondrag",
				"ondragend",
				"ondragenter",
				"ondragleave",
				"ondragover",
				"ondragstart",
				"ondrop",
				"onmousedown",
				"onmousemove",
				"onmouseout",
				"onmouseover",
				"onmouseup",
				"onmousewheel",
				"onscroll",
				"onabort",
				"oncanplay",
				"oncanplaythrough",
				"ondurationchange",
				"onemptied",
				"onended",
				"onerror",
				"onloadeddata",
				"onloadedmetadata",
				"onloadstart",
				"onpause",
				"onplay",
				"onplaying",
				"onprogress",
				"onratechange",
				"onreadystatechange",
				"onseeked",
				"onseeking",
				"onstalled",
				"onsuspend",
				"ontimeupdate",
				"onvolumechange",
				"onwaiting",
			);
		}
	}
?>