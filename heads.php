<?php session_start(); ?>
<!--THis is the page for the third years -->

<?php
include("includes/connection.php");
include("includes/functions.php");
?>

<?php // the access check area
if(!isset($_SESSION["user"])){
	header("Location:login.php");
	
}
else if($_SESSION["user"]=="student"){
	header("Location:members.php");
}
else if($_SESSION["user"]=="staff"){
	header("Location:staff.php");
}
?>
<head>
<?php
include("includes/head.php");
?>
</head>
<body>
<!-- Display area of the list of the student members-->
<table>
<tr><th>Name</th></tr>
<?php
$query = data_query("members","*","user","student");
while($row = mysql_fetch_array($query)){
?><tr><td><a href = 'review.php?userid=<?php echo($row["userid"]); ?>'<?php	
echo(">".$row['name']."</a>");echo("</td>");
echo("</tr>");
}
?><!-- Include Ajax functionality over here-->
</table>
</body>