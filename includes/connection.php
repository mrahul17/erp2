<?php
	$connection  = mysql_connect("localhost","root","");
	if(!$connection){
		die("Connection  failed".mysql_error());
	}
	else{
		$db_select = mysql_select_db("alumnicell",$connection);
		if(!$db_select){
		die("database selection failed");
		}	
	}
?>