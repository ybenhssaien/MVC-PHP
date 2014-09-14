<?php
class XMLQuestion extends XMLQuery{
	function __construct(){
		parent::__construct(PHP_DB_DIR."db/xml/files/question.xml");
	}
	protected function getVariables(){
		foreach($this->file as $line){
			$temp=array(
					"profile"=>$line["for"],
					"table"=>$line["table"]
					);
			if(isset($line->column)){
				$temp[]=
			}
			$this->vars[]=$temp;
		}
	}
/***************************************************************************/
}
?>