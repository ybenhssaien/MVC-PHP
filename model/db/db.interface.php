<?php
	interface dbGestion{
		public function insert($settings);//$settings:String
		public function update($column,$id,$settings);//$column:String / $id:int/ $settings:Array
		public function remove($settings);//$row:String
		public function search($settings);//$settings:String {fields,init,limit,orderby,orderway}
		public function getItem($settings,$value,$columns);//$settings:String / $value:String / $conditions:String
		public function getMax($column,$conditions);//$column:String / $conditions:String / $conditions:String
		public function getCount($conditions,$column);//$column:String / $conditions:String
		public function query($query);//$query:String
	}
?>