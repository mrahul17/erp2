<head>

		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'styles/bootstrap.min.css' ;?>">

</head>
<body class="container">
	<?php $this->load->view('templates/header');?>
<h3>This is the admin page, where you can add new users, edit  their details and also edit databases.</h3>

<ol>
	<li>Add new users 
		<span style="color:red"> <?php if (isset($error)) echo $error;?></span>
		<span style="color:red"><?php  echo validation_errors();?></span>
		<?php echo form_open('admin/add_user');?>
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
	</li>
	<li>Update user detail <br>
		<?php echo form_open('admin/update_user');
		$fields = $this->db->list_fields('users');
		//var_dump($fields);
		?>
		<?php
		foreach ($fields as $field){
  	if($field=="name"){
   		echo '<label  for="'.$field.'">'.$field.'</label><select name ="'.$field.'" class="form-control">';
   $query = mysql_query("SELECT DISTINCT $field FROM users ");
  if($query){
    while($result = mysql_fetch_array($query)){
       foreach ($result as $key => $value) {
        echo '<option class="form-control" value="'.$value.'">'.$value.'</option>';
        break;
       }

      //var_dump($result);
    }
  } 
  echo '</select><br>'; 
}else{
	if($field!="id" && $field!="password")
	echo '<label  for="'.$field.'">'.$field.'</label><input type="text" name="'.$field.'" class="form-control"><br>';

}if($field=="id" || $field=="password")

		echo '<input type="hidden" name="'.$field.'" class="form-control">';

}
		?>
		

		<input type='submit' value='Update' name='submit' class="form-control">


		</form>
	</li><!--Everything below is commented, no stray comments exist, i.e REMOVE ALL comments-->
	<!-- <li>To create a new database(eg. a new version of alumnimeet), type in the name of the database. 
	<?php //echo form_open('admin/create_a_database');?>
			<input type='text' name='name' class="form-control">
			<input type='submit' value='Create Database' name='submit' class="form-control">
		</form>	
	</li>
	<li>To delete an existing database, type in the name of the existing database.The existing databases are:
		 <?php $dbs //= $this->dbutil->list_databases();?>
		<ul>
			<?php// foreach ($dbs as $db){
    			//echo '<li>'.$db.'</li>';
			} ?>
		</ul>
	<?php //echo form_open('admin/drop_database');?>
			<input type='text' name='name'>
			<input type='submit' value='Delete Database' name='submit'>
		</form>
	</li>
	<li>To delete a table from the current database, type in the name of the table.
	<?php //echo form_open('erp/drop_table');?>
			<input type='text' name='name'>
			<input type='submit' value='Delete Table' name='submit'>
		</form>
	</li>
	<li>To rename a table , type in the names of the new table and old tables..
		<?php// echo form_open('admin/rename_table');?>
			<input type='text' name='old_table'><br>
			<input type='text' name='new_table'>
			<input type='submit' value='Rename Table' name='submit'>
		</form>
	</li>
	<li> To create a new table, type in the name of the table and then the name and type of the columns.
		<?php //echo form_open('admin/create_table');?>
		<input type="text" name="name">
		<table>
			<tr><th>Column Name</th><th>Type</th></tr>
			<tr><td><input type="text" name = "column"></td><td><input type="text" name="type"></td>
		</table>

		<input type="submit" value="Add column">
	</form>
	</li>
	 -->
</ol>
<?php $this->load->view('templates/footer');?>
</body>