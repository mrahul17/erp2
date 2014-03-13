<!-- This file is used to display the selected work sheet to the student member-->
<!-- This file should be attached to a ajax request-->
<!-- Think something about making this file more secure---->
<?php session_start();?>
<?php 
include("includes/connection.php");
include("includes/functions.php");
?>
<?php include("includes/head.php");?>
<?php 
$userid = $_SESSION["userid"];
$query = data_query("work","*","to_user",$userid);
$row = mysql_fetch_array($query);
$fromid = $row["fromid"];
$toid = $row["toid"];
$query = mysql_query("SELECT * FROM alumni WHERE id>=$fromid AND id<=$toid ORDER BY id ");
if(!$query){
	echo("Congrats! No WOrk  or probably,there was some error -_-");
}
else{ 
	//echo("<form action='update.php' method='post'><table>");
	while($row = mysql_fetch_array($query)){  
	//print out all the alumni details
	echo("<form action='update.php' method='post'><table>");
	echo("<tr>");
		echo("<td><input name='id' type='hidden' value=".$row['id']."  /></td>");
		echo("<td><input name='FNAME' type='text' value=".$row['FNAME']."  /></td>");
		echo("<td><input name='LNAME' type='text' value=".$row['LNAME']."  /></td>");
		echo("<td><input name='DEPT' type='text' value=".$row['DEPT']."  /></td>");
		echo("<td><input name='BATCH' type='text' value=".$row['BATCH']."  /></td>");
		echo("<td><input name='DEGREE' type='text' value=".$row['DEGREE']."  /></td>");
		echo("<td><input name='HALL' type='text' value=".$row['HALL']."  /></td>");
		echo("<td><input name='HALL2' type='text' value=".$row['HALL2']."  /></td>");
		echo("<td><input name='EMAIL' type='text' value=".urlencode($row['EMAIL'])."  /></td>");
		echo("<td><input name='EMAIL2' type='text' value=".$row['EMAIL2']."  /></td>");
		echo("<td><input name='PHONE1' type='text' value=".$row['PHONE1']."  /></td>");
		echo("<td><input name='PHONE2' type='text' value=".$row['PHONE2']."  /></td>");
		echo("<td><input name='MOBILE' type='text' value=".$row['MOBILE']."  /></td>");
		echo("<td><input name='ADD1' type='text' value=".$row['ADD1']."  /></td>");
		echo("<td><input name='ADD2' type='text' value=".$row['ADD2']."  /></td>");
		echo("<td><input name='ADD3' type='text' value=".$row['ADD3']."  /></td>");
		echo("<td><input name='COMPANY' type='text' value=".$row['COMPANY']."  /></td>");
		echo("<td><input name='DESIGNATION' type='text' value=".$row['DESIGNATION']."  /></td>");
		echo("<td><input type='submit' value='Update Details' /></td>");
	echo("</tr>");
	echo("</table></form>");
	}
}
?>
