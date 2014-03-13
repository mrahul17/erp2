<?php session_start();?>
<!--This file will be used to update contact details in the masterlist -->
<?php
include("includes/connection.php");
include("includes/functions.php");
?>
<!--Some code to check access will go here, this page should open "only if"some values have changed  -->

<?php
/*$array = array(
	"fname" =>"$_GET['FNAME']",
	"lname" =>"$_GET['LNAME']",
	"dept" =>"$_GET['DEPT']",
	"batch" =>"$_GET['BATCH']",
	"degree" =>"$_GET['DEGREE']",
	"hall" ="$_GET['HALL']",
	"hall2" ="$_GET['HALL2']",
	"email" ="$_GET['EMAIL']",
	"email2" ="$_GET['EMAIL2']",
	"phone1" ="$_GET['PHONE1']",
	"phone2" ="$_GET['PHONE2']",
	"mobile" ="$_GET['MOBILE']",
	"add1" ="$_GET['ADD1']",
	"add2" ="$_GET['ADD2']",
	"add3" ="$_GET['ADD3']",
	"company" ="$_GET['COMPANY']",
	"designation" ="$_GET['DESIGNATION']"

);*/// this needs to be implemented -_- learn new things
$columns = array("FNAME","LNAME","DEPT","DEGREE","HALL","HALL2","EMAIL","EMAIL2","PHONE1","PHONE2","MOBILE","ADD1","ADD2","ADD3","COMPANY","DESIGNATION"); 
$query = "UPDATE alumni SET ";
foreach($columns as $column){
if($_POST[$column]=='/') {$_POST[$column]=0;}
	$query=$query."$column =".$_POST[$column].",";
}
$query=rtrim($query, ",");
$query = $query." "."WHERE id=".$_POST['id'];
//die($query);
$q = mysql_query($query);
if($q){
	echo("values updated");
}
else echo("Poop" .mysql_error());
 ?>