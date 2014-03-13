<!-- The upload page-->
<?php session_start();?>
<?php
include("connection.php");
include("functions.php");
?>
<?php
if(isset($_POST['upload'])){
	//processing form data
	$tmp_file = $_FILES['file_upload']['tmp_name'];
	$target_file = basename($_FILES['file_upload']['name']);//anti hack technology :D
	$upload_dir = "../uploads";
	$file=create_file_name();
if(file_exists($upload_dir."/".$_SESSION["userid"]."/".$target_file))die("File already exists");
if(move_uploaded_file($tmp_file,$upload_dir."/".$_SESSION["userid"]."/".$target_file)){
	die("File Uploaded Successfully");
}else{
	$error = $_FILES['file_upload']['error'];
	die($error);
}
	
}


?>
<form action="upload.php" enctype="multipart/form-data" method="post" >
	<input type="hidden" name="MAX_FILE_SIZE" value="50000000" />
	<input type="file" name="file_upload" />
	<input type="submit" name="upload" value="upload" />
</form>