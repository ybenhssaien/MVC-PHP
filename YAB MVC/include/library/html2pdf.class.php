<?php
	require_once(dirname(__FILE__).'/tcpdf/tcpdf.php');
	class HTML2PDF extends TCPDF{
		public $author="XPER Group";
		public $title="";
		public $subject="";
		function __construct(){
			parent::__construct(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
			$this->initPDF();
		}
		private function initPDF(){
			parent::SetCreator(PDF_CREATOR);
			parent::SetAuthor($this->author);
			parent::SetTitle($this->title);
			parent::SetSubject($this->subject);
		}
		public function setContent($html){
			$this->HTMLText=$html;
		}
		public function exportPDF($name="pdf.pdf"){
			parent::AddPage();
			parent::writeHTML($this->HTMLText, true, false, true, false, '');
			parent::Output($name, 'D');
		}
		public function saveToFile($filename="pdf.pdf",$replaceold=true){
			if($replaceold && file_exists($filename))
				$filename=str_replace(".".$this->getFileExtension($filename),"(".date("is").").".$this->getFileExtension($filename),$filename);
			$fp=fopen($filename,"w+");
			fwrite($fp,$this->HTMLText);exit;
			fclose($fp);
		}
		private function getFileExtension($url){
				$ext=strrchr($url,".");
				return substr($ext,1);
		}
/********************************************************************************************************/
	}
?>