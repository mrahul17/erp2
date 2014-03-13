<?php

	//function to select the database
	function data_query($table,$columns,$column,$value){
		$query = mysql_query("SELECT * FROM $table WHERE $column = '$value'");
		if(!$query){
			die("Database query failed ". mysql_error());		
		}
		else{

			return $query;	
		}
	}
	
	function insert($userid,$fromid,$toid,$deadline){
	$query = mysql_query("INSERT INTO work(id,to_user,work,fromid,toid,workfile,reportfile) VALUES ('','$userid','','$fromid','$toid','$deadline','')");
	return $query;
	}
	
	function get_user($username){
	$query = mysql_query("SELECT user FROM members WHERE userid = '$username'");
	if(!$query){
		die("Database query failed ". mysql_error());		
	}
	else{
		$result = mysql_fetch_array($query);
		return $result["user"];
	}
	}
function reload(){

if($_SESSION["user"]  == "student") header("Location:member.php");
else if($_SESSION["user"]  == "head") header("Location:heads.php");
else if($_SESSION["user"]  == "staff") header("Location:staff.php");
}

function create_file_name(){
$id=0;
$userid = $_SESSION["userid"];
$query = data_query("work","id","to_user",$userid);
while($row = mysql_fetch_array($query)){
$id = $row["id"];
}
$file = $id;
return $file;
}
?>