<head>

		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'styles/bootstrap.min.css' ;?>">

</head>
<body class="container">
	<?php $this->load->view('templates/header');?>
<h3>Register </h3>
 
		<span style="color:red"> <?php if (isset($error)) echo $error;?></span>
		<span style="color:red"><?php  echo validation_errors();?></span>
		<?php echo form_open('erp/add_user');?>
		<label for="name">Name</label><input type="text" name='name' class="form-control" ><br>
		<label for="username">Username</label><input type='text' name='username' class="form-control"><br>
		<label for="password">Password</label><input type='password' name='password' class="form-control"><br>
		<label for="privilege">Privilege</label><select name='privilege' class="form-control">
			<option  value='-2' class="form-control">Office</option>
			<option  value='1' class="form-control">Student Member</option>
			<option  value='2' class="form-control">Coordinator</option>
		</select><br>
		<label for="email">Email</label><input type='text' name='email' class="form-control"><br>
		<input type='submit' value='Add new user' name='submit' class="form-control" ><br>
		</form>
<?php
$this->load->view('templates/footer');
?>
