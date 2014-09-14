<?php
/*
function __construct($url=null,$dossier=null)
public function upload($url,$dossier)
public function renameFile($vfile,$nfile)
public function getPath()
public function getExtension()
public function getName()
public function getDirectory()
public function getSize()
public function isFileShell($file)
private setVariables()
private function getFileExtension($url)
private function getFileSize($url)
private function getFileName($url)
private function getFileDirectory($url)
private function getFilePath($name,$dossier)
private function getFileRealPath($name,$dossier)
private function searchWordInFile($file,$word)
*/
class Fichier{
	private $ext,$url,$filename,$repertoire,$taille;
	function __construct($url=null,$dossier=""){
		if($url==null)
			return $this->setVariables(null);
		return $this->upload($url,$dossier);
	}
	public function upload($url,$dossier="",$dir=false){
		if($this->url=$this->getFilePath($url,$dossier)){
			if(!$this->isFileShell($this->url))
				if($this->setVariables($this->url))
					return $this->url;
			else
				unlink($url);
			}
		return false;
	}
	public function renameFile($vfile,$nfile){
		$rep=$this->getFileDirectory($vfile);
		$filename=$this->getFileName($vfile);
		$ext=$this->getFileExtension($vfile);
		if(!empty($nfile)){
			rename($vfile,$rep.'/'.$nfile.'.'.$ext);
			$this->url=$rep.'/'.$nfile.'.'.$ext;
			return true;
		}
		return false;
	}
	public function getPath(){
		return $this->url;
	}
	public function getExtension(){
		return $this->ext;
	}
	public function getName(){
		return $this->filename;
	}
	public function getDirectory(){
		return $this->repertoire;
	}
	public function getSize(){
		return $this->taille;
	}
	private function setVariables($url){
		if($url!=null){
			$this->filename=$this->getFileName($url);
			$this->ext=$this->getFileExtension($url);
			$this->repertoire=$this->getFileDirectory($url);
			$this->taille=$this->getFileSize($url);
			return true;
		}else{
			$this->filename=null;
			$this->ext=null;
			$this->repertoire=null;
			$this->taille=null;
			return false;
		}
	}
	public function getFileExtension($url){
			$ext=strrchr($url,".");
			return substr($ext,1);
	}
	public function getFileSize($url){
		return filesize($url);
	}
	public function getFileName($url){
		$name=basename($url);
		$pos=strpos($name,".");
		return substr($name,0,$pos);
	}
	public function getFileDirectory($url){
		return dirname($url);
	}
	public function getFilePath($name,$dossier){
		if(!is_dir($dossier)){
			$dossier="";
		}else{
			if(strcmp($dossier[strlen($dossier)-1],"\\")==0)
				$dossier[strlen($dossier)-1]="/";
			if(strcmp($dossier[strlen($dossier)-1],"/")!=0)
				$dossier=$dossier."/";
		}
		if(isset($_FILES[$name])){
			if(is_uploaded_file($_FILES[$name]['tmp_name'])){
				move_uploaded_file($_FILES[$name]['tmp_name'],$dossier.$_FILES[$name]['name']);
				return $dossier.$_FILES[$name]['name'];
				}
		}
		return false;
	}
	public function getFileRealPath($name,$dossier){
			return realpath($this->getFilePath($name,$dossier));
	}
	public function isFileShell($file){
		$word="<?php";
		if($this->searchWordInFile($file,$word)>0)
			return true;
		return false;
	}
	private function searchWordInFile($file,$word){
	if(is_file($file)){
			$handle = file_get_contents($file,NULL);
			$handle=strtolower($handle);
			$word=strtolower($word);
			return substr_count($handle,$word);
		}
	return false;
	}
}
?>