<?php
	class XML{
		public function XML($fileName,$dir=""){
			if(empty($dir))$dir=Config::$ROOT_INCLUDE;
			$this->fileName=$dir."/".$fileName;
			$this->init();
		}
		public function get($column){
			$res=$this->getFileInArray();
			if(Functions::isArray($res)){
				$lines=array();
				foreach($res as $line)
					if(isset($line[$column]))$lines[]=$line[$column];
				return $lines;
			}
			return false;
		}
		public function getFileInArray(){
			if(isset($this->xmlArray))return $this->xmlArray;
			return array();
		}
		public function isFile(){
			if(isset($this->filePointer))return true;
			return false;
		}
	/***********************************************************************/
		private function init(){
			if(file_exists($this->fileName)){
				$this->filePointer=simplexml_load_file($this->fileName);
				$this->XMLToArray();
			}
			return false;
		}
		private function XMLToArray(){
			$this->xmlArray=array();
			foreach($this->filePointer->children() as $child){
				$xml=array();
				foreach($child->attributes() as $attr){
					$xml[$attr->getName()]=$attr;
				}
				$this->xmlArray[][$child->getName()]=$xml;
			}
		}
	}
?>