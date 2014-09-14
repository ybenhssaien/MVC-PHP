<?php
	class Functions{
		/****************************************************************************/
		static function error_settings($error_type,$error_url){
			switch($error_type){
				case "MISSED_PAGE":echo"missed page : ".$error_url;break;
				case "MISSED_FILE":echo"missed configuration file : ".$error_url;break;
				default:echo"other error";break;
			}
		}
		static function get_user_template_servlet(){
			if(is_file(TEMPLATE_DIR.SERVLET_PREFIX."template.php")){
				include TEMPLATE_DIR.SERVLET_PREFIX."template.php";
				return true;
			}
			return false;
		}
		static function get_user_control_page($name,$vars=array()){
			if(is_file(PHP_USER_DIR."pages/".$name.".php")){
				include PHP_USER_DIR."pages/".$name.".php";
				return true;
			}
			return false;
		}
		static function get_user_control_plugins($name,$vars=array()){
			if(is_file(PHP_USER_DIR."plugins/".$name.".php")){
				include PHP_USER_DIR."plugins/".$name.".php";
				return true;
			}
			return false;
		}
		static function get_user_control_includes($name,$vars=array()){
			if(is_file(PHP_USER_DIR."includes/".$name.".php")){
				include PHP_USER_DIR."includes/".$name.".php";
				return true;
			}
			return false;
		}
		static function get_includes_directory(){
			return PHP_DB_DIR;
		}
		/****************************************************************************/
		static function get_head_script_styles(){
			$script_names=array("jquery","jquery-1.7.1.min","jquery-ui-1.8.19.custom.min","ajax");
			$styles_names=array("jquery.jscrollpane.lozenge","jquery-ui-1.8.19.custom");
			$head_balise='<link rel="icon" type="image/png" href="'.get_http_url().'logo.png" />';
			if(isArray($script_names)){
				foreach($script_names as $value){
					$head_balise .= "<script type='text/javascript' src='".get_http_url().DEFAULT_JS_DIR.$value.".js'></script>";
				}
			}
			if(isArray($styles_names)){
				foreach($styles_names as $value){
					$head_balise .= "<link type='text/css' href='".get_http_url().DEFAULT_CSS_DIR.$value.".css' rel='stylesheet' media='all' />";
				}
			}
			return $head_balise;
		}
		static function set_header_description($text){
			if(!defined("DESCRIPION"))
				define("DESCRIPTION",$text);
		}
		static function set_header_title($text){
			if(!defined("TITLE"))
				define("TITLE",$text.' | Etudmedia');
		}
		static function get_header_description(){
			if(defined("DESCRIPTION"))
				$text=DESCRIPTION;
			else
				$text=DEFAULT_DESCRIPTION;
			echo'<meta name="description" content="'.$text.'">';
			return $text;
		}
		static function get_header_title(){
			if(defined("TITLE"))
				$text=TITLE;
			else
				$text=DEFAULT_TITLE;
			echo'<title>'.$text.'</title>';
			echo'<script>document.title="'.$text.'";</script>';
			return $text;
		}
		/****************************************************************************/
	}
?>