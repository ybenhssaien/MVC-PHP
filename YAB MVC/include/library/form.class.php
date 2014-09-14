<?php
	class Form{
/***********************************************************************/
		private $type,$values,$errors;
		private $msgAlertes=array(
									"DEFAULT_ERROR_MSG" => "Vous devez remplir les champs obligatoires !",
									"DEFAULT_TECHNIQUE_ERROR_MSG" => "Erreur technique : veuillez contacter l'équipe technique <a href='https://www.facebook.com/xper.group' target='__blank'>XPER Group</a>"
								);
		function __construct($values=array(),$type="add"){
			$this->type=$type;
			$this->values=$this->secureValues($values);
			$this->errors=array();
		}
/***********************************************************************/
		public function verifyAddLines($lines=array()){
			if(Functions::isArray($lines)){
				foreach($lines as $label => $options){
					$obligatory=(isset($options["obligatory"]))?$options["obligatory"]:true;
					$unlowed=isset($options["unlowed"])?$options["unlowed"]:array();
					$this->verifyAddLine($label,$obligatory,$unlowed);
				}
				return true;
			}
			return false;
		}
		public function verifyAddLine($inputName,$obligatory=true,$dontbeseemlike=array()){
			if(!isset($this->values[$inputName])){
				if($obligatory)$this->errors=array(true);
				else $this->values[$inputName]="";
				return true;
			}else{
				if(empty($this->values[$inputName])){
					if($obligatory)$this->errors=array(true);
				else $this->values[$inputName]="";
					return true;
				}
				if(Functions::isArray($dontbeseemlike)){
					foreach($dontbeseemlike as $unlowed){
						if(strcmp($unlowed,$this->values[$inputName])==0){
							if($obligatory)$this->errors=array(true);
							else $this->values[$inputName]="";
							return true;
						}
					}
				}elseif(!empty($dontbeseemlike)){
					if(strcmp($dontbeseemlike,$this->values[$inputName])==0){
						if($obligatory)$this->errors=array(true);
						else $this->values[$inputName]="";
						return true;
					}
				}
			}
			return false;
		}
/***********************************************************************/
		public function setFormInputs($lines=array()){
			if(Functions::isArray($lines)){
				foreach($lines as $label => $options){
					$this->inputs[$label]["method"]=isset($options["method"])?$options["method"]:null;
					$this->inputs[$label]["obligatory"]=(isset($options["obligatory"]))?$options["obligatory"]:true;
					$this->inputs[$label]["unlowed"]=isset($options["unlowed"])?$options["unlowed"]:array();
					$this->inputs[$label]["errormsg"]=isset($options["errormsg"])?$options["errormsg"]:"";
				}
				return true;
			}
			return false;
		}
		public function loadInputValueFromObject(){
			$lines=$this->getFormInputs();
			if(Functions::isArray($lines)){
				foreach($lines as $label => $options){
					$method=isset($options["method"])?$options["method"]:null;
					$this->values[$label]=$this->getValueFromObject($this->object,$method);
				}
				return $this->getVerifiedValuesFromForm();
			}
			return false;
		}
/***********************************************************************/
		public function verifyEditInputFormLines(){
			$lines=$this->getFormInputs();
			if(Functions::isArray($lines)){
				foreach($lines as $label => $options){
					$method=isset($options["method"])?$options["method"]:null;
					$obligatory=(isset($options["obligatory"]))?$options["obligatory"]:true;
					$unlowed=isset($options["unlowed"])?$options["unlowed"]:array();
					$errormsg=isset($options["errormsg"])?$options["errormsg"]:"";
					$this->verifyEditInputFormLine($label,$method,$obligatory,$errormsg,$unlowed);
				}
				return true;
			}
			return false;
		}
		public function verifyEditInputFormLine($inputName,$method,$obligatory=true,$errormsg="",$dontbeseemlike=array()){
			if(!isset($this->id) || !isset($this->object) || !isset($method))return false;
			$oldvalue=$this->getValueFromObject($this->object,$method);
			if(isset($this->values[$inputName]) && strcmp($oldvalue,$this->values[$inputName])!=0){
				if($obligatory && empty($this->values[$inputName])){
					$this->errors=array(true);
					$this->noerrors[]=false;
					return false;
				}
				if(Functions::isArray($dontbeseemlike)){
					foreach($dontbeseemlike as $unlowed){
						if(strcmp($unlowed,$this->values[$inputName])==0){
							$this->errors=array(true);
							$this->noerrors[]=false;
							return false;
						}
					}
				}
				if(!$this->setValueOnObject($this->object,$method,$this->id,$this->values[$inputName])){
					$this->errors=array(true);
					$this->noerrors[]=false;
					$this->errorsMSG[]=$errormsg;
				}else{
					$this->noerrors[]=true;
					return true;
				}
			}
			return false;
		}
/***********************************************************************/
		public function getVerifiedValuesFromForm(){
			return $this->values;
		}
		public function getFormInputs(){
			return isset($this->inputs)?$this->inputs:array();
		}
		public function getFormInputName($position){
			$inputs=$this->getFormInputs();
			if(Functions::isArray($inputs)){
				$i=0;
				foreach($inputs as $label => $options){
					if($i++ == $position) return $label;
				}
			}
			return "not found";
		}
		public function getFormInputValue($name,$defaultValue=""){
			$values=$this->getVerifiedValuesFromForm();
			if(isset($values[$name])) return $values[$name];
			return $defaultValue;
		}
		public function getFormSelectValue($name,$valueComparedBy=""){
			$value=$this->getFormInputValue($name);
			if(!empty($value)){
				if(!Functions::isArray($value)){if(strcmp($value,$valueComparedBy)==0)return "selected";}
				elseif(in_array($valueComparedBy,$value))return "selected";
			}
			return "";
		}
		public function getValueFromObject($object,$method){
			return @call_user_func(array($object,"get".$method));
		}
/***********************************************************************/
		public function setValueOnObject($object,$method,$id,$value){
			return @call_user_func(array($object,"set".$method),$id,$value);
		}
		public function setObject($object){
			$this->object=$object;
		}
		public function setIdentifier($id){
			$this->id=$id;
		}
		public function setObjectOptions($object,$id){
			$this->setObject($object);
			$this->setIdentifier($id);
		}
/***********************************************************************/
		public function existErrors(){
			if(count($this->errors)>0)return true;
			return false;
		}
		public function existNoErrors(){
			if(isset($this->noerrors) && Functions::isArray($this->noerrors)){
				foreach($this->noerrors as $value){
					if(!$value)return false;
				}
				return true;
			}
			return false;
		}
/***********************************************************************/
		public function getErrorEditMessages(){
			return isset($this->errorsMSG)?implode(", ",$this->errorsMSG):"";
		}
		public function getErrorsMessage($type="DEFAULT_ERROR_MSG"){
			if(isset($this->msgAlertes[$type]))
				return $this->msgAlertes[$type];
			return false;
		}
/***********************************************************************/
		private function secureValues($array=array()){
			$temp=array();
			foreach($array as $key => $value){
				if(Functions::isArray($value))
					$temp[$this->secureText($key)]=$this->secureValues($value);
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