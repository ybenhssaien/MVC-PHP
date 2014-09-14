<?php
	class Functions{
		public static function isArray($array=array()){
			return (is_array($array) && count($array)>0)?true:false;
		}
		public static function isEmail($email){
			$Syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
			if(preg_match($Syntaxe,$email))
				return true;
			return false;
		}
	/*******************************************************************************************************/
		public static function getDefaultURL(){
			// return "http://".$_SERVER['HTTP_HOST']."/".(substr_count($_SERVER["REQUEST_URI"],Config::$ROOT_APP)>0?Config::$ROOT_APP:"");
			return "http://".$_SERVER['HTTP_HOST']."/".Config::$ROOT_APP;
		}
		public static function getTemplateDir(){
			return Config::$ROOT_SERVLET_PUBLIC.Config::$DEFAULT_SERVLET_NAME."/".Servlet::getLanguage()."/";
		}
	/*******************************************************************************************************/
		public static function isLanguage($lang="fr",$template=""){
			if(empty($template))$template=Config::$DEFAULT_SERVLET_NAME;
			$defaultdirectory=Config::$ROOT_SERVLET_PUBLIC.$template."/";
			$directory = $defaultdirectory.$lang."/";
			if(!is_dir($directory)){
				Servlet::removeLanguage();
				return false;
			}
			return true;
		}
		public static function getPublicFileURL($name="index.php",$template="",$lang=""){
			if(empty($template))$template=Config::$DEFAULT_SERVLET_NAME;
			$defaultdirectory=Config::$ROOT_SERVLET_PUBLIC.$template."/";
			if(empty($lang)){
				$directory = $defaultdirectory.Servlet::getLanguage()."/";
				if(!is_dir($directory)){
					$directory=$defaultdirectory.Config::$DEFAULT_LANGUAGE."/";
					Servlet::removeLanguage();
				}
			}
			if(!isset($directory))$directory=$defaultdirectory;
			$filename=$directory.$name;
			if(is_file($filename))return $filename;
			return false;
		}
		public static function getPublicFile($name="index.php",$template="",$lang=""){
			if($filename=Functions::getPublicFileURL($name,$template,$lang))return file_get_contents($filename);
			return false;
		}
	/*******************************************************************************************************/
		public static function jsRedirect($url="",$msg="Redirection en cours .....",$timeout="1000"){
			echo $msg."<script type='text/javascript'>setTimeout(function(){window.location='".$url."',".$timeout."});</script>";
		}
	/*******************************************************************************************************/
		public static function getFileObject(){
			require_once(Config::$ROOT_INCLUDE."library/file.class.php");
			return new Fichier();
		}
		public static function getDirObject($dir=""){
			require_once(Config::$ROOT_INCLUDE."library/dir.class.php");
			return new Dir($dir);
		}
		public static function getHTML2PDFObject(){
			require_once(Config::$ROOT_INCLUDE."library/html2pdf.class.php");
			return new HTML2PDF();
		}
		public static function getHTMLObject(){
			require_once(Config::$ROOT_INCLUDE."library/html.class.php");
			return new HTML();
		}
		public static function getFormObject($values=array()){
			require_once(Config::$ROOT_INCLUDE."library/form.class.php");
			return new Form($values);
		}
	}
?>