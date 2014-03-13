<!--The login page -->
<?php
session_start();
if(isset($_SESSION["user"])){
	if($_SESSION["user"]=="head"){
	header("Location:heads.php");
}
	if($_SESSION["user"]=="staff"){
	header("Location:staff.php");
}
	if($_SESSION["user"]=="member"){
	header("Location:member.php");	
	}
}
?>
<?php
include_once("includes/connection.php");
include_once("includes/functions.php");
?>

<body>
<?php
if(isset($_GET["username"])){
$query = data_query("members","*","userid",$_GET['username']);
if(mysql_num_rows($query)==0){// what to do if user does not exist

}
$result = mysql_fetch_array($query);
$password = md5($_GET["password"]);
if ($result["password"]==$password){
	$_SESSION["userid"]=$_GET["username"];
	$_SESSION["user"] =get_user($_GET["username"]);
reload();
}
}

?>
<!-- Login Form Display Area-->
<?php if(!isset($_GET['username'])){echo('
<form action="login.php" method="GET">
<label>Username</label>:<input type="text" name="username" />
<label>Password</label>:<input type="password" name="password" />
<input type="submit" value="Login"/>
</form>');}
?>
</body>