<!-- This page is only for the student members-->
<!-- Here they can see their profile and their work-->
<?php session_start();?>
<?php include_once("includes/connection.php");
include_once("includes/functions.php");?>
<?php
if(!isset($_SESSION["user"])){
	header("Location:login.php");
	
}
else if($_SESSION["user"]=="head"){
	header("Location:members.php");
}
else if($_SESSION["user"]=="staff"){
	header("Location:staff.php");
}
?>
<head>
<?php include("includes/head.php");?><!-- the place to bear the contents of the head tag--->
</head>
<!--  profile display area -->
<body>
<?php
 $query = data_query("members","*","userid",$_SESSION['userid']);
 $row = mysql_fetch_array($query);
?>
<img style="display:inline-block" src = "<?php echo($row['photo']);?>" />
<div id="details">
	<?php echo($row['name']."<br />" .$row['phone']."<br />".$row['email']);?>
</div>
<hr />
<!--work display area -->
<table>
<tr>
<th>Work</th><th>Report</th>
</tr>
<?php
$query = data_query("work","*","to_user",$_SESSION['userid']);
while($row = mysql_fetch_array($query)){
?>
<tr>
<td><a href="<?php echo($row['workfile']);?>"><?php echo($row['work']);?></a></td><td><a href="includes/upload.php" target="_blank">Report</a></th>
</tr>
<?php
}
?>
</table>
<div id="display">

</div>
</body>