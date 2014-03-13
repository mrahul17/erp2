<!--This page will be used to assign work to a particular student member and also review his work -->
<?php
session_start();
?>
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
<?php include("includes/head.php")?>
</head>
<body>
<?php
if (isset($_POST["userid"])){
	$userid=$_POST['userid'];
}
else{
	$userid = $_GET['userid'];
}
$query = data_query("members","*","userid",$userid);
$row = mysql_fetch_array($query);
?>
<div id="details">
	<?php echo($row['name']."<br />" .$row['phone']."<br />".$row['email']);?>
</div><hr />
<div id="assign" >
<?php
if (isset($_POST["fromid"])&&isset($_POST["toid"])&&isset($_POST['deadline'])){
	$query = insert($row["userid"],$_POST["fromid"],$_POST["toid"],$_POST['deadline']);
	unset($_POST["fromid"]);
	unset($_POST["toid"]);
	if(!$query){
		echo("Some problem occured,please try again " .mysql_error());
	}
	else{
		echo("1 extra work has been assigned");
	}
	
}
else{
	echo("No New Work Assigned");
}
?>
<form action="review.php" method="post">
<input type="hidden" name="userid" value="<?php echo($userid); ?>" />
From&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<input type="text" name="fromid" /><br />
To&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<input type="text" name = "toid" /><br />
Deadline:<input type="text" name="deadline" />
<input type="submit" value="Assign" />
</form>

</div>
</body>