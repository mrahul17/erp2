<?php


$privilege = $this->session->userdata('privilege');
//echo $privilege;
if($privilege!=-2 && $privilege!=1 && $privilege!=2 && $privilege!=3){
	die('Sorry, the Search Service is not available for you!!');
}

?>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'styles/bootstrap.min.css' ;?>">
</head>
<body class="container">
<h2>Search for alumni in database</h2>
<?php $table = "alumni";?><!--This is important, the databse must have a table by the name of "alumni" that should have the same headings as the rest of the alumni contacts table-->
<?php
	$fields = $this->db->list_fields($table);
echo form_open('coordinator/register_alumni');
foreach ($fields as $field)
{
   echo '<select name ="'.$field.'" class="form-control">';
   
    // Time to use query bindings
   //$tables = $this->db->list_tables();
 //  var_dump($tables);

   $query = mysql_query("SELECT DISTINCT $field FROM $table ");
   				echo '<option selected = "selected">'.$field.'</option>';

   //	foreach ($tables as $table) {
   	# code...
   $query = mysql_query("SELECT DISTINCT $field FROM $table ");
	if($query){
		while($result = mysql_fetch_array($query)){
			 foreach ($result as $key => $value) {
			 	echo '<option class="form-control" value="'.$value.'">'.$value.'</option>';
			 	break;
			 }

			//var_dump($result);
		}
	}  //}
   //$this->db->query($query,array('$field','$table'));
echo '</select><br>';
   
   //echo $query;
}
echo '<input type="submit" class="form-control" value = "Register alumni" name = "register">'; 
echo '</form>';
	
?>

</body>