<?php
$file = "alumni.csv";
$csv = file_get_contents($file) ;   //This will read the entire csv file into a single string

 $data = explode("\n",$csv); 

     // This will separate out the rows.





foreach ($data as $key => $value) {
	$rowdata = explode(",",$value);
	
	
	foreach ($rowdata as $key => $value) {
		echo $value. "    ";
		die();
	}
	die();
	
}
 
 
?>