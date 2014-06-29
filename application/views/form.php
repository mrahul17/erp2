<head>
	<?php include('includes/head.php');?>

</head>
<body class="container" style="width:50%">
<h2>ERP SYSTEM for STUDENTS' ALUMNI CELL</h2>
<h3 style="color:red"><?php echo validation_errors(); ?></h3>
<div>
<?php if(isset($message)){
echo $message;}?>
</div>
<div >
<?php
echo form_open('erp/login');
?>
	<div class="form-group">
	<label for="username" class="form-control">Username</label>
	<input type="text" name="username" class="form-control"><br/>
	</div>
	<div class="form-group">
	<label for="password" class="form-control">Password</label>
	<input type="password" name="password" class="form-control"><br/>
	</div>
	<input type="submit" value="Login" name="submit" class="form-control">
</form>
</div>
<div>
<?php $this->load->view('templates/footer');?>
</div>
</body>