<?php
	class AjaxServlet extends Servlet{
		function AjaxServlet(){
		}
		public function set($request=array()){
			$this->request=$request;
		}
		public static function getInstance(){
			return new AjaxServlet();
		}
	}
?>