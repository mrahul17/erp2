<?php
//this page is for everyone related to SAC

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
<?php $table = "alumni";?>
<?php
	$fields = $this->db->list_fields($table);
echo form_open('member/generate_result');
foreach ($fields as $field)
{	if($field!="registered"){
   echo '<select name ="'.$field.'" class="form-control">';
   
    // Time to use query bindings
   $query = mysql_query("SELECT DISTINCT $field FROM $table ");
   				echo '<option selected = "selected">'.$field.'</option>';
	if($query){
		while($result = mysql_fetch_array($query)){
			 foreach ($result as $key => $value) {
			 	echo '<option class="form-control" value="'.$value.'">'.$value.'</option>';
			 	break;
			 }

			//var_dump($result);
		}
	}  
   //$this->db->query($query,array('$field','$table'));
echo '</select><br>';
   
   //echo $query;
}}
 if($field=="registered"){
	echo '<select name="registered" class="form-control">';
	echo '<option selected="selected" class="form-control" value="registered">registered</option>';
	echo '<option class="form-control" value="yes">Yes</option>';
	echo '<option class="form-control" value="no">No</option>';
	echo '</select>';
}
echo '<input type="submit" class="form-control" value = "Search" name = "submit">'; 
echo '</form>';
	
?>

</body>