<?php
	class Dir{
		function __construct($dirname=""){
			$this->setDir($dirname);
		}
		public function setDir($dirname="",$createifnotexist=false){
			if(!empty($dirname)){
				if(is_dir($dirname)) {
					$this->defaultdirname=$this->dirname=$dirname;
					$this->dirpointer=opendir($this->dirname);
				}elseif($createifnotexist){
					$this->defaultdirname=$this->dirname=$dirname;
					if($this->createSubDir($this->dirname))$this->dirpointer=opendir($this->dirname);
				}
			}
		}
		public function existDir(){
			return isset($this->dirpointer);
		}
		public function getCurrentDir(){
			return $this->dirname;
		}
		public function getCurrentDirFiles($filesonly=false){
			if($this->existDir())
				return $this->parseDirFiles($this->dirpointer,$this->dirname,$filesonly);
			return false;
		}
		public function getDirFiles($dirname="",$filesonly=false){
			if(!empty($dirname) && is_dir($dirname)) {
				return $this->parseDirFiles(opendir($dirname),$dirname,$filesonly);
			}
			return false;
		}
		public function createSubDir($dirname=""){
			if(!empty($dirname)){
				return mkdir($dirname,0777);
			}
			return false;
		}
		public function delFile($fileurl){
			return unlink($fileurl);
		}
		private function changeDir($newdirname=""){
			chdir();
		}
		private function parseDirFiles($dirpointer,$dirname="",$filesonly=false){
			$files=array();
			while(($currentfile=readdir($dirpointer)) !=false){
				if(strcmp($currentfile,".")!=0 && strcmp($currentfile,"..")!=0){
					$type=is_dir($dirname.$currentfile)?"dir":"file";
					if((!$filesonly || $filesonly && strcmp($type,"file")==0))
					$files[]=array(
								"name"=>substr($currentfile,0,strrpos($currentfile,".")),
								"ext"=>substr($currentfile,strrpos($currentfile,".")),
								"link"=>$dirname."/".$currentfile,"type"=>$type
								);
				}
			}
			return $files;
		}
		function __desctruct(){
			if($this->existDir())closedir($this->dirpointer);
		}
	}
?>