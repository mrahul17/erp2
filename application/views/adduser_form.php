<h2>Login</h2>
<?php echo validation_errors(); ?>
<?php
echo form_open('erp/login');
?>

	<label for="username">Username</label>
	<input type="text" name="username"><br/>

	<label for="password">Password</label>
	<input type="password" name="password" ><br/>

	<input type="submit" value="Login" name="submit">
</form>
