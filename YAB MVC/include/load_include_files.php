<?php
if ($dh = opendir(__DIR__)){
	while (($file = readdir($dh)) !== false){
		if(strcmp($file,".")!=0 && strcmp($file,"..")!=0  && strcmp($file,basename(__FILE__))!=0 && is_file(Config::$ROOT_INCLUDE."/".$file))require Config::$ROOT_INCLUDE."/".$file;
	}
	closedir($dh);
}
?>